<?php

namespace App\Http\Controllers\PartnerDashboard;


use App\Models\AffiliateLinkTracker;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session, AppHelper;


class LeadController extends BaseController
{
    /**
     * Path to base view folder
     * @var string
     */
    protected $view_path = 'partner-dashboard.lead';

    /**
     * Base route
     * @var string
     */
    protected $base_route = 'partner-dashboard.lead';

    /**
     * Panel title of page using this controller
     * @var string
     */
    protected $panel_name = 'Lead';


    /**
     * Array of panel actions
     * @var string
     */
    protected $panel_actions = array( 

        [ 'link' => 'partner-dashboard/lead/download', 'label' => 'Export to Excel']
    );

    /**
     * Display a listing of the lead.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //initialize
        $data = [];

        //get only current partner's lead
        $partner_id = Auth::user()->id;
        
        $data['rows'] = AffiliateLinkTracker::with('user', 'business', 'businessOption')
            ->withAndWhereHas('affiliateLink', function($query) use ($partner_id){
                $query->where('user_id', $partner_id);
            })->paginate(10);



        //return view
        return view(parent::loadViewData($this->view_path . '.index'), compact('data'));
    }

    /**
     * This generates excel sheet and make it available for download
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function download()
    {
        try {
            //get only current partner's lead
            $partner_id = Auth::user()->id;

            $leads = AffiliateLinkTracker::with('user', 'business', 'businessOption')
                ->withAndWhereHas('affiliateLink', function($query) use ($partner_id){
                    $query->where('user_id', $partner_id);
                })->get();

            if ($leads) {
                // Initialize the array which will be passed into the Excel
                // generator.
                $leadsArray = [];

                // Define the Excel spreadsheet headers
                $leadsArray[] = ['sn', 'first_name', 'last_name', 'phone_number', 'email', 'clicked_on'];

                // Convert each member of the returned collection into an array,
                // and append it to the leads array.
                foreach ($leads as $key => $lead) {
                    $leadsArray[] = [
                        $key + 1,
                        $lead->user->first_name,
                        $lead->user->last_name,
                        $lead->user->phone_number,
                        $lead->user->email,
                        $lead->created_at
                    ];
                }

                // Generate and return the spreadsheet
                Excel::create("leads_".date('m-d-Y-His A e'), function($excel) use ($leadsArray) {

                    // Set the spreadsheet title, creator, and description
                    $excel->setTitle("leads_".date('m-d-Y-His A e'));
                    $excel->setCreator(Auth::user()->first_name . ' ' . Auth::user()->last_name)
                        ->setCompany(Auth::user()->userProfile->company);
                    $excel->setDescription('leads file');

                    // Build the spreadsheet, passing in the leads array
                    $excel->sheet('sheet1', function($sheet) use ($leadsArray) {
                        $sheet->fromArray($leadsArray, null, 'A1', false, false);
                    });

                })->download('csv');
            }

            Session::flash('error', 'No leads to download.');

        } catch (\Exception $exception) {
//            dd($exception);
            Session::flash('error', 'Something went wrong!');
        }

        return redirect()->back();
    }

}

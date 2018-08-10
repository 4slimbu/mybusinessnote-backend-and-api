<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\AffiliateLinkValidation\CreateFormValidation;
use App\Http\Requests\Admin\AffiliateLinkValidation\UpdateFormValidation;
use App\Libraries\ImageLibrary;
use App\Models\AffiliateLink;
use App\Models\BusinessCategory;
use App\Models\Section;
use App\Models\User;
use AppHelper;
use Illuminate\Http\Request;
use Session;


class AffiliateLinkController extends AdminBaseController {
	/**
	 * Path to base view folder
	 * @var string
	 */
	protected $view_path = 'admin.affiliate-link';

	/**
	 * Base route
	 * @var string
	 */
	protected $base_route = 'admin.affiliate-link';

	/**
	 * Title of page using this controller
	 * @var string
	 */
	protected $panel_name = 'Affiliate Link';

	/**
	 * Array of panel actions
	 * @var string
	 */
	protected $panel_actions = [

		[ 'link' => 'affiliate-link/create', 'label' => 'Add New' ],

	];

	/**
	 * Upload directory relative to public folder
	 * @var string
	 */
	protected $upload_directory = 'images/affiliate-links/';

	/**
	 * Display a listing of the business option.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//initialize
		$data = [];

		//get data
		$data['rows'] = AffiliateLink::with( 'partner')
		                              ->where( 'user_id', '!=', null )
		                              ->paginate( 15 );

		return view( parent::loadViewData( $this->view_path . '.index' ), compact( 'data' ) );
	}

	/**
	 * Show the form for creating a new business option.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//initialize
		$data = [];

		//get data
		$partners         = User::where( 'role_id', 3 )->get();
		$data['partners'] = $partners->mapWithKeys( function ( $item ) {
			return [ $item->id => $item->first_name . ' ' . $item->last_name ];
		} );

		return view( parent::loadViewData( $this->view_path . '.create' ), compact( 'data' ) );
	}

	/**
	 * Store a newly created business option in storage.
	 *
	 * @param CreateFormValidation|\Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( CreateFormValidation $request ) {
		$input = $request->all();

		AffiliateLink::create( $input );

		Session::flash( 'success', $this->panel_name . ' created successfully.' );

		return redirect()->route( $this->base_route );

	}

	/**
	 * Display the specified business option.
	 *
	 * @param  \App\Models\AffiliateLink $affiliateLink
	 *
	 * @return void
	 */
	public function show( AffiliateLink $affiliateLink ) {
		//
	}

	/**
	 * Show the form for editing the specified business option.
	 *
	 * @param  \App\Models\AffiliateLink $affiliateLink
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( AffiliateLink $affiliateLink ) {
		//initialize
		$data = [];

		//get data
		$data['row'] = $affiliateLink;

		$partners = User::where( 'role_id', 3 )->get();
		$data['partners'] = $partners->mapWithKeys( function ( $item ) {
			return [ $item->id => $item->first_name . ' ' . $item->last_name ];
		} );

		return view( parent::loadViewData( $this->view_path . '.edit' ), compact( 'data' ) );
	}

	/**
	 * Update the specified business option in storage.
	 *
	 * @param UpdateFormValidation|\Illuminate\Http\Request $request
	 * @param  \App\Models\AffiliateLink $affiliateLink
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( UpdateFormValidation $request, AffiliateLink $affiliateLink ) {

		$input = $request->all();

		// Save business option
		$affiliateLink->fill( $input )->save();

		Session::flash( 'success', $this->panel_name . ' updated successfully.' );

		return redirect()->route( $this->base_route );
	}

	/**
	 * Remove the specified business option from storage.
	 *
	 * @param  \App\Models\AffiliateLink $affiliateLink
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy( AffiliateLink $affiliateLink ) {
		// Remove associated icons
		ImageLibrary::removeImage( $affiliateLink->icon, $this->upload_directory );
		ImageLibrary::removeImage( $affiliateLink->hover_icon, $this->upload_directory );

		$affiliateLink->delete();

		Session::flash( 'success', $this->panel_name . ' deleted successfully.' );

		return redirect()->route( $this->base_route );
	}


	public function moveUp( AffiliateLink $affiliateLink ) {
		$itemsInCurrentSection = AffiliateLink::where( 'section_id', $affiliateLink->section_id )->count();
		if ( ! ( $itemsInCurrentSection > 1 ) ) {
			Session::flash( 'error', 'Section cannot be empty' );

			return redirect()->back();
		}

		$previousAffiliateLink = AffiliateLink::where( 'menu_order', '<', $affiliateLink->menu_order )
		                                        ->orderBy( 'menu_order', 'desc' )
		                                        ->first();

		if ( $previousAffiliateLink ) {
			$previousMenuOrder = $previousAffiliateLink->menu_order;
			$currentMenuOrder  = $affiliateLink->menu_order;

			$previousAffiliateLink->fill( [ 'menu_order' => 999999999 ] )->save();
			$affiliateLink->fill( [
				'section_id' => $previousAffiliateLink->section_id,
				'menu_order' => $previousMenuOrder,
			] )->save();
			$previousAffiliateLink->fill( [ 'menu_order' => $currentMenuOrder ] )->save();
		}

		return redirect()->back();
	}

	public function moveDown( AffiliateLink $affiliateLink ) {
		$itemsInCurrentSection = AffiliateLink::where( 'section_id', $affiliateLink->section_id )->count();
		if ( ! ( $itemsInCurrentSection > 1 ) ) {
			Session::flash( 'error', 'Section cannot be empty' );

			return redirect()->back();
		}

		$nextAffiliateLink = AffiliateLink::where( 'menu_order', '>', $affiliateLink->menu_order )
		                                    ->orderBy( 'menu_order', 'asc' )
		                                    ->first();

		if ( $nextAffiliateLink ) {
			$nextMenuOrder    = $nextAffiliateLink->menu_order;
			$currentMenuOrder = $affiliateLink->menu_order;

			$nextAffiliateLink->fill( [ 'menu_order' => 999999999 ] )->save();
			$affiliateLink->fill( [
				'section_id' => $nextAffiliateLink->section_id,
				'menu_order' => $nextMenuOrder,
			] )->save();
			$nextAffiliateLink->fill( [ 'menu_order' => $currentMenuOrder ] )->save();
		}

		return redirect()->back();
	}

	public function moveTo( AffiliateLink $affiliateLink, $to ) {
		if ( ! $affiliateLink || ! $to ) {
			return false;
		}

		if ( ! $affiliateLink->menu_order ) {
			// case: insert
			$inBetweenAffiliateLinks = AffiliateLink::where( 'menu_order', '>', $to )
			                                          ->orderBy( 'menu_order', 'desc' )
			                                          ->get();

			if ( count( $inBetweenAffiliateLinks ) === 0 ) {
				return false;
			}

			foreach ( $inBetweenAffiliateLinks as $inBetweenAffiliateLink ) {
				$inBetweenAffiliateLink->fill( [ 'menu_order' => $inBetweenAffiliateLink->menu_order + 1 ] )->save();
			}

			$finalDestination = AffiliateLink::where( 'menu_order', $to )->select( 'id', 'section_id' )->first();

			$affiliateLink->fill( [ 'section_id' => $finalDestination->section_id, 'menu_order' => $to + 1 ] )->save();

		} else if ( $affiliateLink->menu_order > $to ) {
			// case: move down
			// get the affected business option by the move in desc order
			$inBetweenAffiliateLinks = AffiliateLink::whereBetween( 'menu_order', [
				$to,
				$affiliateLink->menu_order,
			] )
			                                          ->where( 'menu_order', '!=', $affiliateLink->menu_order )
			                                          ->where( 'menu_order', '!=', $to )
			                                          ->orderBy( 'menu_order', 'desc' )
			                                          ->get();

			if ( count( $inBetweenAffiliateLinks ) === 0 ) {
				return false;
			}

			// get destination section
			$toSection = AffiliateLink::where( 'menu_order', $to )->select( 'id', 'section_id' )->first()->section_id;

			// set the last item in the range, which is current business option, to very high menu_order
			$affiliateLink->fill( [ 'menu_order' => 999999 ] )->save();
			// as the last item has menu_order set very high, its position can be considered vacant and let's
			// increase menu_order of business Options in between the range by one
			foreach ( $inBetweenAffiliateLinks as $inBetweenAffiliateLink ) {
				$inBetweenAffiliateLink->fill( [ 'menu_order' => $inBetweenAffiliateLink->menu_order + 1 ] )->save();
			}

			// now let's save the business option to destination place with new section
			$affiliateLink->fill( [ 'section_id' => $toSection, 'menu_order' => ( $to + 1 ) ] )->save();
		} else {
			// case: move up
			// get the affected business option by the move in asc order
			$inBetweenAffiliateLinks = AffiliateLink::whereBetween( 'menu_order', [
				$affiliateLink->menu_order,
				$to,
			] )
			                                          ->where( 'menu_order', '!=', $affiliateLink->menu_order )
			                                          ->orderBy( 'menu_order', 'asc' )
			                                          ->get();

			if ( count( $inBetweenAffiliateLinks ) === 0 ) {
				return false;
			}

			// get destination section
			$toSection = $inBetweenAffiliateLinks->last()->section_id;

			// set the first item in the range, which is current business option, to very high menu_order
			$affiliateLink->fill( [ 'menu_order' => 999999 ] )->save();


			// as the last item has menu_order set very high, its position can be considered vacant and let's
			// decrease menu_order of business Options in between the range by one
			foreach ( $inBetweenAffiliateLinks as $inBetweenAffiliateLink ) {
				$inBetweenAffiliateLink->fill( [ 'menu_order' => $inBetweenAffiliateLink->menu_order - 1 ] )->save();
			}

			// now let's save the business option to destination place with new section
			$affiliateLink->fill( [ 'section_id' => $toSection, 'menu_order' => $to ] )->save();
		}


	}

	public function moveToSection( AffiliateLink $affiliateLink, $destSectionId ) {
		// set menu_order
		$lastItemInSection = AffiliateLink::select( 'id', 'menu_order' )->where( 'section_id', $destSectionId )
		                                   ->orderBy( 'menu_order', 'desc' )->first();
		if ( $lastItemInSection ) {
			$destMenuOrder = $lastItemInSection->menu_order + 1;
		} else {
			$lastItemInPreviousSection = AffiliateLink::select( 'id', 'menu_order' )->where( 'section_id', $destSectionId - 1 )
			                                           ->orderBy( 'menu_order', 'desc' )->first();
			if ( $lastItemInPreviousSection ) {
				$destMenuOrder = $lastItemInPreviousSection->menu_order + 1;
			} else {
				$firstItemInNextSection = AffiliateLink::select( 'id', 'menu_order' )->where( 'section_id', $destSectionId + 1 )
				                                        ->orderBy( 'menu_order', 'asc' )->first();
				if ( $firstItemInNextSection ) {
					$destMenuOrder = $firstItemInNextSection->menu_order - 1;
				} else {
					$lastItem      = AffiliateLink::select( 'id', 'menu_order' )
					                               ->orderBy( 'menu_order', 'desc' )->first();
					$destMenuOrder = $lastItem->menu_order + 1;
				}
			}
		}

		$this->moveTo( $affiliateLink, $destMenuOrder );
	}

	/**
	 * Returns view for element data especially when called through ajax request
	 *
	 * @param Request $request
	 *
	 * @return string
	 */
	public function getElementDataView( Request $request ) {
		try {
			$element = $request->get( 'element' );
			$viewPath = $this->view_path . '.includes.elements.' . $element;
			$affiliateLinkId = $request->get( 'boid' );

			if ( $element && view()->exists( $viewPath ) ) {
				$affiliateLink = AffiliateLink::find( $affiliateLinkId );
				$data['businessCategories'] = BusinessCategory::pluck( 'name', 'id' );

				if ($affiliateLink) {
					$data['selectedElementData'] = $affiliateLink->element_data;
				} else {
					$data['selectedElementData'] = [];
				}

				return view(parent::loadViewData( $viewPath ), compact( 'data' ) )->render();
			}
		} catch (\Exception $exception) {
			return 'Something went wrong..';
		}
	}

}

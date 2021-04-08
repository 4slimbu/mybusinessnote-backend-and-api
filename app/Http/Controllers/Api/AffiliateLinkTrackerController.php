<?php

namespace App\Http\Controllers\Api;

use App\Events\LeadGenerateEvent;
use App\Libraries\ResponseLibrary;
use App\Models\AffiliateLink;
use App\Models\AffiliateLinkTracker;
use App\Traits\Authenticable;
use Illuminate\Http\Request;

class AffiliateLinkTrackerController extends ApiBaseController
{
    use Authenticable;

    /**
     * Track user's click on partner's link
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackClick(Request $request)
    {
        $user = $this->getAuthUser();

        if ($user) {
            $data = [
                'user_id'            => $user->id,
                'business_id'        => $user->business->id,
                'business_option_id' => $request->get('bo_id'),
                'affiliate_link_id'  => $request->get('aff_id'),
                'browser'            => $request->header('User-Agent'),
                'ip'                 => $request->ip(),
            ];

            AffiliateLinkTracker::create($data);

	        $this->sendLead( $user, $request->get( 'aff_id' ) );

            return ResponseLibrary::success(
                [
                    'successCode' => 'TRACKED',
                ], 200
            );
        }
    }

	/**
	 * Send lead to partner
	 *
	 * @param $user
	 * @param $affId
	 */
	private function sendLead($user, $affId) {
		$affiliateLink= AffiliateLink::find( $affId );
		if ($affiliateLink) {
			$partner = $affiliateLink->partner;
			if ($partner) {
				event(new LeadGenerateEvent($user, $partner));
			}
		}
	}
}

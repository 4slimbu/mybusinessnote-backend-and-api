<?php

namespace App\Http\Controllers\Api;

use App\Models\AffiliateLinkTracker;
use App\Traits\Authenticable;
use Illuminate\Http\Request;

class AffiliateLinkTrackerController extends ApiBaseController
{
    use Authenticable;
    /**
     * This tracks the user click on Partner Link
     *
     * @param Request $request
     */
    public function trackClick(Request $request)
    {
        $user = $this->getAuthUser();

        $data = [
            'user_id' => $user->id,
            'business_id' => $user->business->id,
            'business_option_id' => $request->get('bo_id'),
            'affiliate_link_id' => $request->get('aff_id'),
            'browser' => $request->header('User-Agent'),
            'ip' => $request->ip()
        ];

        AffiliateLinkTracker::create($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\SettingResourceCollection;
use App\Libraries\ResponseLibrary;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends ApiBaseController {

	/**
	 * Get all the app settings
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index( Request $request ) {
		// Initialize
		$data = [];
		$key    = $request->get( 'key' );
		$fields = [ 'id', 'name', 'key', 'value' ];

		// Get data
		if ( $key ) {
			$settings = Setting::where( 'key', $key )->get( $fields );
		} else {
			$settings = Setting::get( $fields );
		}

		// Return
		$data['settings'] =  new SettingResourceCollection( $settings );

		return ResponseLibrary::success(['successCode' => 'FETCHED'] + $data, 200);
	}

}

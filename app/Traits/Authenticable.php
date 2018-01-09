<?php
namespace App\Traits;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

trait Authenticable
{
    private function getAuthUser()
    {
        //get user from token
        try {
            if (JWTAuth::getToken()) {
                $decodedToken = JWTAuth::decode(JWTAuth::getToken());

                if ($decodedToken) {
                    return User::where('id', $decodedToken['user']['id'])->first();
                }
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
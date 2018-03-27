<?php


namespace App\Validators;


use GuzzleHttp\Client;

class Recaptcha
{
    public function validate(
        $attribute,
        $value,
        $parameters,
        $validator
    )
    {
        if (getenv('APP_ENV') === 'testing') {
            return true;
        }

        $client = new Client();

        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params' =>
                 [
                     'secret'   => env('GOOGLE_RECAPTCHA_SECRET'),
                     'response' => $value,
                     'remoteip' => app('request')->getClientIp(),
                 ],
            ]
        );

        $body = json_decode((string)$response->getBody());

        return $body->success;
    }
}


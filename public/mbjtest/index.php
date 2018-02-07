<?php
/*
    If you use Composer, you can add the wrapper to your composer.json file:
    {
        "require": {
            "campaignmonitor/createsend-php": "^4.1"
        }
    }

    Or download the library and include it in your project.
    https://github.com/campaignmonitor/createsend-php/
    After you have installed the library, simply include the relevant API class, as follows:
    require_once 'csrest_transactional_smartemail.php'
*/
require_once 'createsend-php-master/csrest_transactional_smartemail.php';

# Authenticate with your API key
$auth = array('api_key' => 'a2fb431fa4d61c758470215b24c60170ca0859c78a37b919');

# The unique identifier for this smart email
$smart_email_id = '734f974e-774b-4fd5-827d-857a1280c245';

# Create a new mailer and define your message
$wrap = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
$message = array(
    "To" => 'Ahmad Chowdhury <ramesh@octomedia.com.au>',
    "Data" => array(
        'x-apple-data-detectors' => 'x-apple-data-detectorsTestValue',
        'href^="tel"' => 'href^="tel"TestValue',
        'href^="sms"' => 'href^="sms"TestValue',
        'owa' => 'owaTestValue',
        'role=section' => 'role=sectionTestValue',
        'style*="font-size:1px"' => 'style*="font-size:1px"TestValue',
        'firstname' => 'firstnameTestValue',
    ),
);

# Send the message and save the response
$result = $wrap->send($message);
echo '<pre>';
print_r($result);
echo '</pre>';
?>
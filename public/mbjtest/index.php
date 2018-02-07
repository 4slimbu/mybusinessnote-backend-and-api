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
$auth = array('api_key' => '6cdb0f15e3fdf5bc458d122fabf3a8add9cad8889931b86f');

# The unique identifier for this smart email
$smart_email_id = '027c43a6-8f06-4974-a86c-047395ec781a';

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
        'expiry_date' => 'expiry_dateTestValue',
        'referal_code' => 'referal_codeTestValue',
    ),
);

# Send the message and save the response
$result = $wrap->send($message);
echo '<pre>';
print_r($result);
echo '</pre>';
?>
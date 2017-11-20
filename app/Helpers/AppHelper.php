<?php
namespace App\Helpers;

use App\Models\SiteConfiguration;

class AppHelper
{
    protected $site_configuration;
    protected $admin_config_path = 'mbj.admin';

    /**
     * This function returns the configuration value for given key as:
     * 1. if user_value is present, then it is returned
     * 2. if user_value isn't present and config value is present in the database, then it is returned
     * 3. if above conditions are false, and config value is present in the app config file, then it is returned
     * 4. if all above conditions are false, then false is returned
     *
     * @param $config_key
     * @param string $user_value
     * @return bool|mixed|string
     */
    public function getSystemConfig($config_key, $user_value = '')
    {
        //return user_value if present
        if (isset($user_value) && !empty($user_value)) {
            return $user_value;
        }

        //return site config value from database if present
        if (!$this->site_configuration) {
            $this->site_configuration = SiteConfiguration::where('config_key', $config_key)->where('status', 1)->first();
        }

        if (!empty($this->site_configuration->config_value)) {
            return $this->site_configuration->config_value;
        }

        //return site config value from app config file if present
        if (config($this->admin_config_path . '.system_configuration.'. $config_key . '.value')){
            return config($this->admin_config_path . '.system_configuration.'. $config_key . '.value');
        }

        //return false
        return false;

    }

}
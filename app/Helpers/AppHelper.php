<?php

namespace App\Helpers;

use App\Models\BusinessOption;
use App\Models\Level;
use App\Models\Setting;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AppHelper
{
    protected $setting;
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
        if (!$this->setting) {
            $this->setting = Setting::where('key', $config_key)->where('status', 1)->first();
        }

        if (!empty($this->setting->config_value)) {
            return $this->setting->config_value;
        }

        //return site config value from app config file if present
        if (config($this->admin_config_path . '.settings.' . $config_key . '.value')) {
            return config($this->admin_config_path . '.settings.' . $config_key . '.value');
        }

        //return false
        return false;

    }

    public function generateNestedBusinessOptions(LengthAwarePaginator $items)
    {
        $data['sub-rows'] = [];

        $subLevels = Level::select('id')->where('parent_id', $items[0]->level->id)->pluck('id')->toArray();

        $data['sub-rows'] = BusinessOption::with('level', 'parent', 'children', 'businessCategories')
            ->whereIn('level_id', $subLevels)
            ->where('parent_id', null)
            ->get();
    }

}
<?php

namespace App\Http\Controllers\App;

use App\Http\Constants;
use App\Model\SystemConfigItem;

class LaunchController extends AppBaseController
{
    const CONFIG_KEY = 'APP_LAUNCH_IMAGE';

    public function image()
    {
        if($configItem = SystemConfigItem::select(['value'])->where('key', self::CONFIG_KEY)->first()){
            return $this->responseJSON(Constants::APP_SUCCESS, ['image' => env('APP_URL') . $configItem->value]);
        }
        return $this->responseJSON(Constants::APP_CONFIG_ERROR);
    }
}
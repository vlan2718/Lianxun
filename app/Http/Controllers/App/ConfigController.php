<?php

namespace App\Http\Controllers\App;

use App\Http\Constants;
use App\Model\SystemConfigItem;

class ConfigController extends AppBaseController
{
    const KEY_REPORT = 'REPORT_REASON';
    const KEY_VERSION = 'APP_VERSION';
    const KEY_ABOUT = 'ABOUT';

    public function report()
    {
        $configValue = SystemConfigItem::where('key', self::KEY_REPORT)->first()->value;
        $reasons = explode("\n", $configValue);
        return $this->responseJSON(Constants::APP_SUCCESS, ['reasons' => $reasons]);
    }

    public function version()
    {
        $versionValue = SystemConfigItem::select('value')->where('key', self::KEY_VERSION)->first()->value;
        $versionInfo = explode("\n", $versionValue);
        return $this->responseJSON(Constants::APP_SUCCESS, ['version' => $versionInfo[0], 'download' => isset($versionInfo[1]) ? $versionInfo[1] : '']);
    }

    public function about()
    {
        return $this->responseJSON(Constants::APP_SUCCESS, SystemConfigItem::select('value')->where('key', self::KEY_ABOUT)->first()->value);
    }
}
<?php

namespace App\Http\Controllers\App;

use Illuminate\Support\Facades\DB;
use App\Http\Constants;
use App\Model\Advertising;
use App\Model\SystemConfigItem;

class BannerController extends AppBaseController
{
    const CONFIG_LOGO_KEY = 'APP_LOGO';

    public function list()
    {
        $host = env('APP_URL');
        $bannerList = Advertising::select(DB::raw("name, duration, concat('{$host}', image) image, url"))->orderBy('order_type')->get();
        if($configItem = SystemConfigItem::where('key', self::CONFIG_LOGO_KEY)->first()){
            return $this->responseJSON(Constants::APP_SUCCESS, ['banner_list' => $bannerList, 'logo' => "{$host}{$configItem->value}"]);
        }
        return $this->responseJSON(Constants::APP_SUCCESS, ['banner_list' => $bannerList, 'logo' => '']);
    }
}
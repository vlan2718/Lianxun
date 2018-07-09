<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Constants;
use App\Model\Users;
use App\Model\Suggest;

class SuggestController extends AppBaseController
{
    public function submit(Request $request)
    {
        if(!$request->filled(['user_id', 'contact', 'content']) || Users::whereKey($request->user_id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        Suggest::create($request->all());
        return $this->responseJSON(Constants::APP_SUCCESS);
    }
}
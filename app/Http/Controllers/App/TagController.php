<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Utility\Util;
use Illuminate\Support\Facades\DB;
use App\Http\Constants;
use App\Model\CommonTag;

class TagController extends AppBaseController
{
    public function list()
    {
         return $this->responseJSON(Constants::APP_SUCCESS, CommonTag::all(DB::raw('id, name')));
    }

    public function detail($id)
    {
        DB::connection()->enableQueryLog();
        $tag = CommonTag::whereKey($id)->first();
        $data['id'] = $tag->id;
        $data['name'] = $tag->name;
        $data['description'] = $tag->description;
        foreach ($tag->relationTags as $tag){
            $data['relation_tags'][] = ['id' => $tag->id, 'name' => $tag->name];
        }
        foreach($tag->news as $n){
            $data['news'][] = [
                'id' => $n->id,
                'title' => $n->title,
                'read' => $n->read,
                'point_num' => $n->countPoint(),
                'subscribe_num' => $n->countSubscribe(),
                'created_at' => Util::formatDate(strtotime($n->created_at), false),
            ];
        }
        return $this->responseJSON(Constants::APP_SUCCESS, $data);
    }
}
<?php

namespace App\Http\Controllers\App;

use App\Http\Constants;
use App\Http\Controllers\Utility\Util;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends AppBaseController
{
    const CATEGORY_STATUS_ONE = 1;

    public function top()
    {
        $categories = array(['id' => 'last', 'category' => '最新'], ['id' => 'recommend', 'category' => '推荐'], ['id' => 'special', 'category' => '特供']);
        $categoryList = Category::select(['id', 'name'])->where('parent_id', 0)->get();
        foreach ($categoryList as $category){
            $categories[] = ['id' => $category->id, 'category' => $category->name];
        }
        return $this->responseJSON(Constants::APP_SUCCESS, $categories);
    }

    public function one()
    {
        $category = Category::select(['id', 'name'])->where('is_nav', self::CATEGORY_STATUS_ONE)->first();
        return $this->responseJSON(Constants::APP_SUCCESS, $category);
    }

    public function subitem($id)
    {
        if($category = Category::whereKey($id)->first()){
            return $this->responseJSON(Constants::APP_SUCCESS, $category->subitems);
        }
        return $this->responseJSON(Constants::APP_CATEGORY_NOT_EXIST);
    }

    public function news(Request $request)
    {
        //$sort = 1;  时间排序或标签排序
        $data[] = [
            'id' => '1',
            'title' => '新闻标题',
            'status_label' => '政策',
            'read' => '465',
            'point_num' => '325',
            'subscribe' => '546',
            'time' => Util::formatTime(time()),
            'special_comments' =>[
                [
                    'id' => '1',
                    'time' => Util::formatTime(time()),
                    'content' => '评论详情'
                ]
            ]
        ];
        return $this->responseJSON(Constants::APP_SUCCESS, $data);
    }
}
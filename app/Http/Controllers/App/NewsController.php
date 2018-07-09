<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Utility\Util;
use Illuminate\Http\Request;
use App\Http\Constants;
use App\Model\News;
use App\Model\Users;
use App\Model\NewsPoint;

class NewsController extends AppBaseController
{
    public function search($keyword)
    {
        $result = News::search($keyword);
        $data = [];
        foreach ($result as $news){
            $item['id'] = $news->id;
            $item['title'] = $news->title;
            $item['read'] = $news->read;
            $item['point_num'] = $news->countPoint();
            $item['subscribe_num'] = $news->countSubscribe();
            $item['time'] = Util::formatTime(strtotime($news->created_at));
            $item['category'] = empty($news->category) ? $news->category->name : '';
            $data[] = $item;
        }
        return $this->responseJSON(Constants::APP_SUCCESS, $data);
    }

    public function category($category)
    {
        $data['topic_list'][] = [
            'id' => '1',
            'title' => '这是新闻标题',
            'category' => '经济资讯',
            'read' => '1000',
            'point_num' => '230',
            'img' => env('APP_URL') . '/images/default.jpg'
        ];
        $data['news_list'][] = [
            'id' => '2',
            'title' => '这是新闻标题',
            'category' => '军事',
            'read' => '123',
            'point_num' => '32',
            'subscribe_num' => '45',
            'status_label' => '已辟谣',
            'time' => Util::formatTime(time())
        ];
        return $this->responseJSON(Constants::APP_SUCCESS, $data);
    }

    public function point(Request $request)
    {
        if(!$request->filled(['user_id', 'news_id', 'point']) || intval($request->point) < 1 || Users::whereKey($request->user_id)->count() == 0 || News::whereKey($request->news_id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        if(NewsPoint::where(['user_id' => $request->user_id, 'news_id' => $request->news_id])->count() > 0){
            return $this->responseJSON(Constants::APP_NEWS_HAS_POINT);
        }
        NewsPoint::create($request->all());
        return $this->responseJSON(Constants::APP_SUCCESS);
    }

    public function read($id)
    {
        if(News::whereKey($id)->count() == 0){
            return $this->responseJSON(Constants::APP_ERROR_PARAMS);
        }
        News::whereKey($id)->increment('read', 1);
        return $this->responseJSON(Constants::APP_SUCCESS);
    }
}
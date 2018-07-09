<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserNews extends Model
{
    protected $table='u_user_news';
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
    /*
     * 会员发表新闻
     */
    public function UserAddNews($array){
        $this->user_id=$array['user_id'];
        $this->news_id='1';
        $this->is_original=$array['is_original'];
        $this->created_at=time();
        $this->description=$array['description'];
        $this->content=$array['content'];
        $this->public=$array['public'];
        $this->status='0';
        $this->title=$array['title'];
        $this->category_id=$array['category_id'];
        $this->address=$array['address'];
        $this->status_label_id=$array['status_label_id'];
        $this->status_label_id=$array['status_label_id'];
        $this->updated_at=time();
        $this->save();
        return true;
    }
    /*
     * 我的收录
     */
    public function getMyKeepByType($uid){
        return self::where('user_id','=',$uid)->get();
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Model\UserSubscribeNews;
use App\Model\NewsPoint;

class News extends Model
{
    //
    protected $table='u_news';


    public $fillable=['status','admin_id','status_examine','category_id','title','source','import_type','source_date','url','publics','description','image','attachment','author','content','status_label_id','is_origin','special_flag'];


    public const STATUS_NEW = 0;        //待审核
    public const STATUS_REVIEW = 1;     //审核中
    public const STATUS_BACK = 2;       //退回修改
    public const STATUS_PUBLIC = 3;    //审核通过

    public const SPECIAL_FLAG_NONE = 0; //没有特殊标记
    public const SPECIAL_FLAG_NEW = 1; //最新
    public const SPECIAL_FLAG_SPECIAL = 2; //特供
    public const SPECIAL_FLAG_TOPIC = 3; //专题

    public const VIEW_PUBLIC = 0; //所有人可见
    public const VIEW_MEMBER = 1; //仅会员可见

    public const IS_ORIGIN_NO = 0;  //原创：否
    public const IS_ORIGIN_YES = 1;  //原创：是



    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
    /*
     * 新闻所属分类
     * */
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }
    /*
     * 计算收藏人数
     * */
    public function countSubscribe()
    {
        return UserSubscribeNews::where('news_id', $this->id)->count();
    }
    /*
     * 计算打分人数
     * */
    public function countPoint()
    {
        return NewsPoint::where('news_id', $this->id)->count();
    }
    /*
     * 新闻搜索
     * */
    public static function search($keyword)
    {
        $tagSearch = "select distinct news_id from u_news_tag where tag_id in (select id from u_common_tag where name like '%{$keyword}%')";
        return News::whereRaw("title like '%{$keyword}%' and status=" . News::STATUS_PUBLIC . " or description like '%{$keyword}%' and status=" . News::STATUS_PUBLIC . " or id in ($tagSearch) and status=" . News::STATUS_PUBLIC)->get();
    }
    /*
     * 新闻列表
     */
    public function getNews($category_id,$uid){
        if($category_id=='time'){
            $data=self::join('u_status_label','u_status_label.id','=','u_news.status_label_id')
                ->select('u_news.id','u_news.id','u_news.title','u_news.created_at','u_news.description','u_news.image','u_news.publics','u_news.status','u_news.read','u_news.status_label_id','u_news.order_no','u_status_label.name')
                ->orderBy('u_news.created_at','desc')
                ->get();
            foreach ($data as $key=>$val){
                $data[$key]['number']=DB::table('u_user_news_history')->where('news_id',$val->id)->count();
            }
            return $data;
        }else if($category_id=='recommend'){
            $data=DB::table('u_user_subscribe_category')->join('u_news','u_user_subscribe_category.category_id','=','u_news.category_id')
                                                        ->join('u_status_label','u_status_label.id','=','u_news.status_label_id')
                                                        ->select('u_news.id','u_news.id','u_news.title','u_news.created_at','u_news.description','u_news.image','u_news.publics','u_news.status','u_news.read','u_news.status_label_id','u_news.order_no','u_status_label.name')
                                                        ->where('u_user_subscribe_category.user_id',$uid)
                                                        ->get();
            foreach ($data as $key=>$val){
                $data[$key]->number=DB::table('u_user_news_history')->where('news_id',$val->id)->count();
            }
            return  $data;
        }else if($category_id=='offer'){
                $data=self::join('u_status_label','u_status_label.id','=','u_news.status_label_id')
                    ->select('u_news.id','u_news.id','u_news.title','u_news.created_at','u_news.description','u_news.image','u_news.publics','u_news.status','u_news.read','u_news.status_label_id','u_news.order_no','u_status_label.name')
                    ->where('u_news.special_id',1)
                    ->get();
            foreach ($data as $key=>$val){
                $data[$key]['number']=DB::table('u_user_news_history')->where('news_id',$val->id)->count();
            }
            return  $data;
        }else{
            $data=self::join('u_status_label','u_status_label.id','=','u_news.status_label_id')
                ->select('u_news.id','u_news.id','u_news.title','u_news.created_at','u_news.description','u_news.image','u_news.publics','u_news.status','u_news.read','u_news.status_label_id','u_news.order_no','u_status_label.name')
                ->where('u_news.category_id',$category_id)
                ->get();
            foreach ($data as $key=>$val){
                $data[$key]['number']=DB::table('u_user_news_history')->where('news_id',$val->id)->count();
            }
            return  $data;
        }
    }
    /*
     * 新闻打分
     */
    public function UserScoreNews($array){
        $data=DB::table('u_news_point')->insert([
            'user_id'=>$array['user_id'],
            'news_id'=>$array['news_id'],
            'point'=>$array['point'],
            'created_at'=>time()
        ]);
        if($data){
            return $data;
        }else{
            return false;
        }
    }
    /*
     * 新闻/分类 收藏
     */
    public function NewsCollectionById($array){
        if(isset($array['category_id'])){
            if(DB::table('u_user_subscribe_category')->where(['user_id'=>$array['user_id'],'category_id'=>$array['category_id']])->first()){
                return false;
            }else{
                $data=DB::table('u_user_subscribe_category')->insert([
                    'user_id'=>$array['user_id'],
                    'category_id'=>$array['category_id'],
                    'created_at'=>time()
                ]);
            }
        }else{
            if(DB::table('u_user_subscribe_news')->where(['user_id'=>$array['user_id'],'news_id'=>$array['news_id']])->first()){
                return false;
            }else{
                $data=DB::table('u_user_subscribe_news')->insert([
                    'user_id'=>$array['user_id'],
                    'news_id'=>$array['news_id'],
                    'created_at'=>time()
                ]);
            }
        }
        if($data){
            return $data;
        }else{
            return false;
        }
    }
    /*
     * 新闻详情
     */
    public function getNewsDetailsById($id)
    {
        return DB::table('u_news')->where('id', $id)->first();
    }

    /*
     * 阅读记录
     */
    public function addNewsRecord($user_id,$news_id){
        $data=DB::table('u_user_news_history')->where(['user_id'=>$user_id, 'news_id'=>$news_id])->first();
        if($data){
            DB::table('u_user_news_history')->where(['user_id'=>$user_id,'news_id'=>$news_id])->update(['updated_at'=>time()]);
        }else{
            DB::table('u_user_news_history')->insert([
                'user_id'=>$user_id,
                'news_id'=>$news_id,
                'create_at'=>time(),
                'updated_at'=>time()
            ]);
        }
    }
    /*
     *会员阅读历史
     */
    public function UserReadListById($id){
        $data=DB::table('u_user_news_history')->join('u_news','u_news.id','=','u_user_news_history.news_id')
                                            ->join('u_category','u_category.id','=','u_news.category_id')
                                            ->select('u_news.id','u_news.description','u_news.created_at','u_category.name')
                                            ->where('u_user_news_history.user_id',$id)->get();
        foreach ($data as $key=>$value){
            $data[$key]->read=DB::table('u_user_news_history')->where('news_id',$value->id)->count();
            $data[$key]->keep=DB::table('u_user_subscribe_news')->where('news_id',$value->id)->count();
            $data[$key]->score=DB::table('u_news_point')->where('news_id',$value->id)->select('point')->first();
        }
        return $data;
    }
    /*
     * 我的新闻收藏列表
     */
    public function UserKeepListById($uid){
        $data=DB::table('u_user_subscribe_news')->join('u_news','u_news.id','=','u_user_subscribe_news.news_id')
                                            ->join('u_category','u_category.id','=','u_news.category_id')
                                            ->select('u_news.id','u_news.description','u_news.created_at','u_category.name')
                                            ->where('u_user_subscribe_news.user_id',$uid)->get();
        foreach ($data as $key=>$value){
            $data[$key]->read=DB::table('u_user_news_history')->where('news_id',$value->id)->count();
            $data[$key]->keep=DB::table('u_user_subscribe_news')->where('news_id',$value->id)->count();
            $data[$key]->score=DB::table('u_news_point')->where('news_id',$value->id)->select('point')->first();
        }
        return $data;
    }
    /*
     * 政策新闻列表排序
     */
    public function getNewsSortByType($type){
        if($type=='1'){
            return self::OrderBy('created_at','desc')->get();
        }else{
            return self::OrderBy('status_label_id','desc')->get();
        }
    }
    /*
     * 举报原因列表
     */
    public function getReportList(){
        return DB::table('u_system_config_item')->select('id','value')->where('group_id',17)->get();
    }
    /*
     * 专家解读
     */
    public function getExpertAnalysisListById($newsId){
        return DB::table('u_news_special_comment')->where('news_id',$newsId)->get();
    }
    /*
     * 新闻得分详情
     */
    public function getNewsPointById($new_id){
        return DB::table('u_news_point')->where('news_id',$new_id)->first();

    }
    /*
     * 新闻举报列表
     */
    public function getNewsReport(){
        return DB::table('u_system_config_item')->where('group_id',17)->get();
    }



}

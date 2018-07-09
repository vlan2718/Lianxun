<?php

namespace App\Http\Controllers\Admin\Message;

use App\Http\LogActionConst;
use App\Model\Category;
use App\Model\Common_tag;
use App\Model\News;
use App\Model\stateTag;
use App\Model\User;
use App\Model\UserNews;
use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
        protected $category=null;
        public $status_label=null;
        public $common_tag=null;
        public $users=null;
        public function __construct(Category $category,stateTag $stateTag,Common_tag $common_tag,Users $users)
        {
            $this->category=$category;
            $this->status_label=$stateTag;
            $this->common_tag=$common_tag;
            $this->users=$users;
        }

    public function NewsClass(){
        return view('admin.vue-route');
    }

    public function NewsClassList(){
        $this->addLog(LogActionConst::NEWSCLASSLIST);
            $category=$this->category->getCategoryList();
        return json_encode($category,JSON_UNESCAPED_UNICODE);
    }
    public function deleteNewsClass(Request $request){
        $this->addLog(LogActionConst::DELETENEWSCLASS);
        $category=$this->category->deleteNewsClassList($request->id);
        return json_encode(['code'=>'0','msg'=>'缺少参数'],JSON_UNESCAPED_UNICODE);
    }

    public function createNewsClass(Request $request){
        $this->addLog(LogActionConst::CREATENEWSCLASS);
        if($request->has("id")){

            $this->category->updateNewsClass($request->id,$request->name);
            return json_encode($request->id,JSON_UNESCAPED_UNICODE);
        }else {

            $category = $this->category->createNewsClass($request->all());
            return json_encode($category->id, JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateNewsClass(Request $request){
        $this->addLog(LogActionConst::UPDATENEWSCLASS);
        $this->category->updateNewsClass($request->id,$request->name);
        return json_encode($request->id,JSON_UNESCAPED_UNICODE);
    }

    public function createNewsClassSon(Request $request){
        if($request->has("id")){

            $this->category->updateNewsClassSon($request->id,$request->name,$request->parent_id);
            return json_encode($request->id,JSON_UNESCAPED_UNICODE);
        }else {

            $category = $this->category->createNewsClass($request->all());
            $categoryP=Category::where('id',$request->parent_id)->first();
            $category['parent_name']=$categoryP->name;
            return json_encode($category, JSON_UNESCAPED_UNICODE);
        }
    }

    public function NewsClassSon(Category $category){
        return view('admin.vue-route');
    }

    public function NewsClassSonList(Category $category){
            $categorySons=$this->category->getNewsClassSonList($category->id);

        return json_encode($categorySons,JSON_UNESCAPED_UNICODE);
    }



    public function stateTagAdmin(){
        return view('admin.vue-route');

    }
    public function stateTagAdminList(){
            $stateTag=stateTag::all();

        return json_encode($stateTag,JSON_UNESCAPED_UNICODE);
    }

    public function getStateTagAdminListByUser_news(UserNews $userNews,Request $request){
        $news_tags=DB::table('u_user_news_tag')->where('news_id',$userNews->id)->get();
            if ($news_tags->isEmpty()){
               return  $news_tags;
            }
            $array=null;
         foreach ($news_tags as $key=>$news_tag){
               $tag_id=DB::table('u_common_tag')->where('id',$news_tag->tag_id)->first();
               $array[$key]=$tag_id;
         }
            return $array;
    }

    public function getAdminTabNewsByNews(News $news,Request $request){
        $news_tags=DB::table('u_news_tag')->where('news_id',$news->id)->get();

        if ($news_tags->isEmpty()){
            return  $news_tags;
        }
        $array=null;
        foreach ($news_tags as $key=>$news_tag){
            $tag_id=DB::table('u_common_tag')->where('id',$news_tag->tag_id)->first();
            $array[$key]=$tag_id;
        }
        return $array;

    }



    public function add_User_new_tab(Request $request){
        DB::table('u_user_news_tag')->where('news_id',$request->u_newsId)->delete();

        $array=null;
        if ($request->stateTagAdminLists){
            foreach ($request->stateTagAdminLists as $stateTagAdminList){
                if($stateTagAdminList['checked']){
                    $array[]=$stateTagAdminList['id'];
                }
            }
            if($array){
                foreach ($array as $value){
                    DB::table('u_user_news_tag')->insert(['news_id'=>$request->u_newsId,'tag_id'=>$value]);
                }
            }
        }


        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function add_Admin_new_tab(Request $request){
        DB::table('u_news_tag')->where('news_id',$request->u_newsId)->delete();
            $array=null;
            foreach ($request->stateTagAdminLists as $stateTagAdminList){
                if($stateTagAdminList['checked']){
                    $array[]=$stateTagAdminList['id'];
                }
            }
            if($array){
                foreach ($array as $value){
                    DB::table('u_news_tag')->insert(['news_id'=>$request->u_newsId,'tag_id'=>$value]);
                }
            }


        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function get_Admin_new_tab(News $news,Request $request){
        $news_tags=DB::table('u_news_tag')->where('news_id',$news->id)->pluck('tag_id');

        return json_encode($news_tags,JSON_UNESCAPED_UNICODE);
    }

    public function tagAdminListOk(News $news,Request $request){
        $tagAdminLists=Common_tag::all();
        $news_tags=DB::table('u_news_tag')->where('news_id',$news->id)->pluck('tag_id')->toArray();
        $array=null;
        foreach ($tagAdminLists as $key=>$tagAdminList){
            $array[$key]['name']=$tagAdminList->name;
            $array[$key]['id']=$tagAdminList->id;
            if($news_tags && in_array($tagAdminList->id,$news_tags)){
                $array[$key]['checked']=true;
            }else{
                $array[$key]['checked']=false;
            }
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function CreatetagAdminListOk(Request $request){
        $tagAdminLists=Common_tag::all();
        $array=null;
        foreach ($tagAdminLists as $key=>$tagAdminList){
            $array[$key]['name']=$tagAdminList->name;
            $array[$key]['id']=$tagAdminList->id;
            $array[$key]['checked']=false;

        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }


    public function tagListOk(UserNews $userNews,Request $request){

        $tagAdminLists=Common_tag::all();
        $news_tags=DB::table('u_user_news_tag')->where('news_id',$userNews->id)->pluck('tag_id')->toArray();
        $array=null;
        foreach ($tagAdminLists as $key=>$tagAdminList){
            $array[$key]['name']=$tagAdminList->name;
            $array[$key]['id']=$tagAdminList->id;
            if($news_tags && in_array($tagAdminList->id,$news_tags)){
                $array[$key]['checked']=true;
            }else{
                $array[$key]['checked']=false;
            }
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }


    public function createStateTagAdminList(Request $request){
        if($request->has("id")){

            $this->status_label->updateStatus_label($request->id,$request->name);
            return json_encode($request->id,JSON_UNESCAPED_UNICODE);
        }else {

            $category = $this->status_label->createStatus_label($request->all());

            return json_encode($category, JSON_UNESCAPED_UNICODE);
        }
    }

    public function deleteStateTagList(Request $request){
        $stateTag=stateTag::destroy($request->id);
        return json_encode($stateTag,JSON_UNESCAPED_UNICODE);
    }


    public function tagAdmin(){
        return view('admin.vue-route');
    }
    public function tagAdminList(){
            $tagAdminLists=Common_tag::all();
            $array=null;
            foreach ($tagAdminLists as $key=>$tagAdminList){
                $array[$key]['name']=$tagAdminList->name;
                $array[$key]['id']=$tagAdminList->id;
                $array[$key]['description']=$tagAdminList->description;
              $tag_relation_id_array=DB::table('u_tag_relation')->where('tag_id',$tagAdminList->id)->pluck('tag_relation_id')->toArray();
                    if($tag_relation_id_array){
                        $array[$key]['tag_relation_id_array']=implode(",", $tag_relation_id_array);
                    }else{
                        $array[$key]['tag_relation_id_array']=null;
                    }
            }
        return json_encode($array,JSON_UNESCAPED_UNICODE);



    }



    public function deleteTagAdminList(Request $request){
        $tagAdminList=Common_tag::destroy($request->id);
        DB::table('u_news_tag')->where('tag_id',$request->id)->delete();
        DB::table('u_user_news_tag')->where('tag_id',$request->id)->delete();
        DB::table('u_tag_relation')->where('tag_id',$request->id)->delete();
        DB::table('u_tag_relation')->where('tag_relation_id',$request->id)->delete();
        return json_encode($tagAdminList,JSON_UNESCAPED_UNICODE);
    }
    public function createTagAdminList(Request $request){
        if($request->has("id")){

            $this->common_tag->updateStatus_label($request->id,$request->all());

            if($request->tag_relation_id_array){
               $ids=explode(',',$request->tag_relation_id_array);
               DB::table('u_tag_relation')->where('tag_id',$request->id)->delete();
               foreach ($ids as $id){
                   DB::table('u_tag_relation')->insert([
                       'tag_id'=>$request->id,
                       'tag_relation_id'=>$id
                   ]);
               }
            }
            return json_encode($request->id,JSON_UNESCAPED_UNICODE);
        }else {

            $category = $this->common_tag->createStatus_label($request->all());
            if($request->tag_relation_id_array){
                $ids=explode(',',$request->tag_relation_id_array);
                @DB::table('u_tag_relation')->where('tag_id',$category->id)->delete();
                foreach ($ids as $id){
                    DB::table('u_tag_relation')->insert([
                        'tag_id'=>$category->id,
                        'tag_relation_id'=>$id
                    ]);
                }
            }
            return json_encode($category, JSON_UNESCAPED_UNICODE);
        }
    }

    public function updateNewAdmin(Request $request){


        $NewAdmin=News::find($request->id);
        $NewAdmin->status=$request->status;
        $NewAdmin->category_id=$request->category_id;
        $NewAdmin->title=$request->title;
        if($request->special_flag){
            $NewAdmin->special_flag=$request->special_flag;
        }else{
            $NewAdmin->special_flag=0;
        }
        $NewAdmin->author=$request->author;
        $NewAdmin->source=$request->source;
        $NewAdmin->is_origin=$request->is_origin;
        $NewAdmin->source_date=strtotime($request->source_date);
        $NewAdmin->url=$request->url;
        $NewAdmin->publics=$request->publics;
        $NewAdmin->description=$request->description;
        $NewAdmin->image=$request->image;
        $NewAdmin->attachment=$request->attachment;
        $NewAdmin->content=$request->contents;
        $NewAdmin->status_label_id=$request->status_label_id;

        if ($request->images){
            $bg = $request->get('images');//获取图片流
            $url = explode(',',$bg);
            $filename = md5(time().str_random(8)).'.png';//自定义图片名
            $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
            $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
            file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
            $NewAdmin->image=$bgurl;
        }
       // $NewAdmin->special_id=$request->special_id;
        $NewAdmin->save();

        if ($request->publics == 1){

//            if($request->has('is_auth')){
//                $is_auth=1;
//            }else{
//                $is_auth=0;
//            }

            if($request->has('publics_level')){
                $publics_level=$request->publics_level;
            }else{
                $publics_level=0;
            }
            $news_rule=DB::table('u_news_member_rule')->where('news_id',$request->id)->first();

            if (isset($news_rule->id)){
                DB::table('u_news_member_rule')->where('news_id',$request->id)->update([
                    'level_id'=>$publics_level,
                    'is_auth'=>$request->is_auth
                ]);
                $role=DB::table('u_news_member_rule')->where('news_id',$request->id)->first();
                $roleID=$role->id;
            }else{
                $roleID=DB::table('u_news_member_rule')->insertGetId([
                    'news_id'=>$request->id,
                    'level_id'=>$publics_level,
                    'is_auth'=>$request->is_auth
                ]);
            }

            $is_user=null;
            foreach ($request->Users as $value){
                if($value['checked']){
                    $is_user[]=$value['id'];
                }
            }

            if($is_user){

                DB::table('u_news_member_rule_list')->where('rule_id',$roleID)->delete();

                foreach ($is_user as $value){
                    DB::table('u_news_member_rule_list')->insert([
                        'rule_id'=>$roleID,
                        'user_id'=>$value,
                        'type'=>2
                    ]);
                }


            }
        }

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);

        }

    public function updateMemberNewAdmin(Request $request){
        $NewAdmin=UserNews::find($request->id);
        $NewAdmin->status=$request->status;
        $NewAdmin->category_id=$request->category_id;
        $NewAdmin->title=$request->title;
        $NewAdmin->is_original=$request->is_original;
        $NewAdmin->publics=$request->publics;
        $NewAdmin->description=$request->description;
        $NewAdmin->content=$request->contents;
        $NewAdmin->status_label_id=$request->status_label_id;
        $NewAdmin->save();
        return json_encode($NewAdmin,JSON_UNESCAPED_UNICODE);
    }



    public function NewsClassListAllSon(){
        $data=Category::where('parent_id','!=' ,'0')->get();
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function getNewsClassList(){
        $data=Category::getNewsClassListTree();
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }






    public function newsadmin(){
        return view('admin.vue-route');
    }

    public function createNewAdminIndex(){
        return view('admin.vue-route');
    }

    public function createNewAdmin(Request $request){
        $NewAdmin['admin_id']=\Auth::user()->id;
        $NewAdmin['status']=$request->status;
        $NewAdmin['category_id']=$request->category_id;
        $NewAdmin['title']=$request->title;
        $NewAdmin['author']=$request->author;
        $NewAdmin['source']=strtotime($request->source_date);
        $NewAdmin['is_origin']=$request->is_origin;
        $NewAdmin['source_date']=strtotime($request->source_date);
        $NewAdmin['url']=$request->url;
        $NewAdmin['publics']=$request->publics;
        $NewAdmin['description']=$request->description;
        $NewAdmin['attachment']=$request->attachment;
        $NewAdmin['content']=$request->contents;
        $NewAdmin['status_label_id']=$request->status_label_id;
        if ($request->special_flag){
            $NewAdmin['special_flag']=$request->special_flag;
        }else{
            $NewAdmin['special_flag']=0;
        }
        if ($request->images){
            $bg = $request->get('images');//获取图片流
            $url = explode(',',$bg);
            $filename = md5(time().str_random(8)).'.png';//自定义图片名
            $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
            $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
            file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
            $NewAdmin['image']=$bgurl;
        }
        // $NewAdmin->special_id=$request->special_id;
     $news=News::create($NewAdmin);
        $array=null;
        foreach ($request->tag as $stateTagAdminList){
            if($stateTagAdminList['checked']){
                $array[]=$stateTagAdminList['id'];
            }
        }
        if($array){
            foreach ($array as $value){
                DB::table('u_news_tag')->insert(['news_id'=>$news->id,'tag_id'=>$value]);
            }
        }
        if ($request->publics == 1){

            if($request->has('is_auth')){
            $is_auth=1;
            }else{
                $is_auth=0;
            }

            if($request->has('publics_level')){
                 $publics_level=$request->publics_level;
            }else{
                $publics_level=0;
            }

  $roleID=DB::table('u_news_member_rule')->insertGetId([
        'news_id'=>$news->id,
        'level_id'=>$publics_level,
          'is_auth'=>$is_auth
    ]);


            $is_user=null;
            foreach ($request->Users as $value){
                if($value['checked']){
                    $is_user[]=$value['id'];
                }
            }

            if($is_user){

           DB::table('u_news_member_rule_list')->where('rule_id',$roleID)->delete();

              foreach ($is_user as $value){
                  DB::table('u_news_member_rule_list')->insert([
                      'rule_id'=>$roleID,
                      'user_id'=>$value,
                      'type'=>2
                  ]);
              }


            }
        }

        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }



     public function getUserList($id=null){
         $array=null;
        if (! $id){  //说明是创建news时调用的

            $array=Users::getUserRuleList();
        }else{

            $u_news_member_rule=DB::table('u_news_member_rule')->where('news_id',$id)->first();
            if(! isset($u_news_member_rule->id)){ //规则表中是否有规则

                $array=Users::getUserRuleList();
            }else{
                $u_news_member_rule_list=DB::table('u_news_member_rule_list')->where('rule_id',$u_news_member_rule->id)->pluck('user_id')->toArray(); //名单列表中是否存在

                if(!isset($u_news_member_rule_list)){

                    $array=Users::getUserRuleList();
                }else{
                  $array=$this->users->getUserRuledList($u_news_member_rule_list);
                }
            }
        }
         return json_encode($array,JSON_UNESCAPED_UNICODE);
     }

    public function getNewAdminList(){
        $this->addLog(LogActionConst::GETNEWADMINLIST);
        $getNewAdminLists=News::all();
        $array=null;
        foreach ($getNewAdminLists as $key=>$getNewAdminList){
            $array[$key]['id']=$getNewAdminList->id;
            $array[$key]['category_id']=$getNewAdminList->category_id;
            $array[$key]['admin_id']=$getNewAdminList->admin_id;
            $array[$key]['title']=$getNewAdminList->title;
            $array[$key]['source']=$getNewAdminList->source;
            $array[$key]['author']=$getNewAdminList->author;
            $array[$key]['url']=$getNewAdminList->url;
            $array[$key]['source_date']=$getNewAdminList->source_date;
            $array[$key]['description']=$getNewAdminList->description;
            $array[$key]['content']=$getNewAdminList->content;
            $array[$key]['image']=$getNewAdminList->image;
            $array[$key]['attachment']=$getNewAdminList->attachment;
            $array[$key]['public']=$getNewAdminList->public;
            $array[$key]['status']=$getNewAdminList->status;
            $array[$key]['created_at']= $getNewAdminList->created_at->format('Y-m-d H:i:s');
            $array[$key]['updated_at']=$getNewAdminList->updated_at;
            $array[$key]['read']=$getNewAdminList->read;
            $array[$key]['status_label_id']=$getNewAdminList->status_label_id;
            $array[$key]['order_no']=$getNewAdminList->order_no;
            $array[$key]['subscribe']=$getNewAdminList->subscribe;
            $array[$key]['is_origin']=$getNewAdminList->is_origin;
            $array[$key]['special_id']=$getNewAdminList->special_id;
            $special_comment=DB::table('u_news_special_comment')->where('news_id',$getNewAdminList->id)->count();
            $array[$key]['special_comment']=$special_comment;
            $array[$key]['status']=$getNewAdminList->status;
            $array[$key]['category_name']='未定义';
            $array[$key]['categoryP_name']='未定义';
            $category =DB::table('u_category')->where('id',$getNewAdminList->category_id)->first();
            if (isset($category->name)){
                $array[$key]['category_name']=$category->name;
                $array[$key]['categoryP_name']=$category->name;
            }
            if(isset($category->parent_id)){
                $categoryP =DB::table('u_category')->where('id',$category->parent_id)->first();
                if (isset($categoryP->name)){
                    $array[$key]['categoryP_name']=$categoryP->name;
                }
            }
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function deleteNewAdminList(Request $request){
            $this->addLog(LogActionConst::DELETENEWADMINLIST);
        $NewAdminList=News::destroy($request->id);
        DB::table('u_news_tag')->where('news_id',$request->id)->delete();
        return json_encode($NewAdminList,JSON_UNESCAPED_UNICODE);
    }

    public function newsEdit(){
        return view('admin.vue-route');
    }
    public function getnewsEdit(News $news,Request $request){
        $this->addLog(LogActionConst::GETNEWSEDIT);
        $array['id']=$news->id;
        $array['category_id']=$news->category_id;
        $array['admin_id']=$news->admin_id;
        $array['title']=$news->title;
        $array['source']=$news->source;
        $array['author']=$news->author;
        $array['url']=$news->url;
        $array['source_date']=date('Y-m-d H:i:s',$news->source_date);
        $array['description']=$news->description;
        $array['content']=$news->content;
        $array['image']=$news->image;
        $array['attachment']=$news->attachment;
        $array['publics']=$news->publics;
        $array['status']=$news->status;
        $array['special_flag']=$news->special_flag;
        $array['created_at']=$news->created_at->format('Y-m-d H:i:s');
        $array['updated_at']=$news->updated_at;
        $array['read']=$news->read;
        $array['status_label_id']=$news->status_label_id;
        $array['order_no']=$news->order_no;
        $array['subscribe']=$news->subscribe;
        $array['is_origin']=$news->is_origin;
        $array['special_id']=$news->special_id;
        $array['status_examine']=$news->status_examine;
        $array['status_xiuding']=$news->status_xiuding;
        $category =DB::table('u_category')->where('id',$news->category_id)->first();
        $categoryP =DB::table('u_category')->where('id',$category->parent_id)->first();
        $array['p_categories']=$categoryP->id;

        if(isset($news->publics) && $news->publics==1){
          $u_news_member_rule= DB::table('u_news_member_rule')->where('news_id',$news->id)->first();
            $array['publics_level']=$u_news_member_rule->level_id;
            $array['is_auth']=$u_news_member_rule->is_auth;
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function MemberNewsAdmin(){

        return view('admin.vue-route');
    }

    public function MemberNewsAdminList(){
        $this->addLog(LogActionConst::MEMBERNEWSADMINLIST);
        $MemberNewsAdminLists=UserNews::all();
        $array=null;
        foreach ($MemberNewsAdminLists as $key => $memberNewsAdminList){
            $array[$key]['id']=$memberNewsAdminList->id;
            $array[$key]['user_id']=$memberNewsAdminList->user_id;
            $array[$key]['news_id']=$memberNewsAdminList->news_id;
            $array[$key]['is_original']=$memberNewsAdminList->is_original;
            $array[$key]['created_at']=$memberNewsAdminList->created_at->format('Y-m-d H:i:s');
            $array[$key]['content']=$memberNewsAdminList->content;
            $array[$key]['publics']=$memberNewsAdminList->publics;
            $array[$key]['status']=$memberNewsAdminList->status;
            $array[$key]['status_examine']=$memberNewsAdminList->status_examine;
            $array[$key]['address']=$memberNewsAdminList->address;
            $array[$key]['status_label_id']=$memberNewsAdminList->status_label_id;
            $array[$key]['updated_at']=$memberNewsAdminList->updated_at;
            $array[$key]['title']=$memberNewsAdminList->title;
            $array[$key]['category_id']=$memberNewsAdminList->category_id;
            $category =DB::table('u_category')->where('id',$memberNewsAdminList->category_id)->first();
            $categoryP =DB::table('u_category')->where('id',$category->parent_id)->first();
            $array[$key]['category_name']=$category->name;
            $array[$key]['categoryPid_name']=$categoryP->name;
            $user=Users::find($memberNewsAdminList->user_id);

            if (!isset($user->name)){
                $array[$key]['user_name']='用户已经不存在';
            }else{
                $array[$key]['user_name']=$user->name;
            }



        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function deleteMemberNewsAdminList(Request $request){
            $this->addLog(LogActionConst::DELETEMEMBERNEWSADMINLIST);
            $data=UserNews::destroy($request->id);
            DB::table('u_user_news_tag')->where('news_id',$request->id)->delete();
        return json_encode($data,JSON_UNESCAPED_UNICODE);
    }

    public function getnewsEditMemberNews(UserNews $userNews  ,Request $request){
        return view('admin.vue-route');
    }

    public function getnewsEditMemberNewsAdminList(UserNews $userNews  ,Request $request){
$this->addLog(LogActionConst::GETNEWSEDITMEMBER);
        $array['id']=$userNews->id;
        $array['user_id']=$userNews->user_id;
        $array['news_id']=$userNews->news_id;
        $array['is_original']=$userNews->is_original;
        $array['created_at']=$userNews->created_at->format('Y-m-d H:i:s');
        $array['description']=$userNews->description;
        $array['content']=$userNews->content;
        $array['status']=$userNews->status;
        $array['address']=$userNews->address;
        $array['status_label_id']=$userNews->status_label_id;
        $array['updated_at']=$userNews->updated_at->format('Y-m-d H:i:s');
        $array['title']=$userNews->title;
        $array['status_examine']=$userNews->status_examine;
        $array['category_id']=$userNews->category_id;

        $category =DB::table('u_category')->where('id',$userNews->category_id)->first();
        if (!isset($category->parent_id)){
            $array['p_categories']=0;
        }else{
            $categoryP =DB::table('u_category')->where('id',$category->parent_id)->first();
        }

       if (!isset($categoryP->id)){
           $array['p_categories']=0;
       }else{
           $array['p_categories']=$categoryP->id;
       }
        return json_encode($array,JSON_UNESCAPED_UNICODE);

    }

    public function shoulu(Request $request){
$this->addLog(LogActionConst::SHOULU);
        $MemberNewsAdmin=UserNews::find($request->id);
        $MemberNewsAdmin->news_id=1;
        $MemberNewsAdmin->save();
        $array=[
            'admin_id'=>\Auth::user()->id,
            'status_examine'=>$MemberNewsAdmin->status_examine,
            'category_id'=>$MemberNewsAdmin->category_id,
            'title'=>$MemberNewsAdmin->title,
            'source'=>'用户录入',
            'author'=>'用户录入',
            'import_type'=>0,
            'source_date'=>strtotime($MemberNewsAdmin->created_at),
            'url'=>0,
            'publics'=>$MemberNewsAdmin->public,
            'description'=>$MemberNewsAdmin->description,
            'image'=>0,
            'attachment'=>0,
            'content'=>$MemberNewsAdmin->content,
        ];
        $news=  News::create($array);
        $tag_relation_id_array=DB::table('u_user_news_tag')->where('news_id',$request->id)->pluck('tag_id')->toArray();
        if($tag_relation_id_array){
            foreach ($tag_relation_id_array as $value){
               DB::table('u_news_tag')->insert([
                   'news_id'=>$news->id,
                   'tag_id'=>$value
               ]);
            }
        }
        return json_encode($news,JSON_UNESCAPED_UNICODE);
    }


    public function jiedu(News $news){
        return view('admin.vue-route');
    }

    public function deleteJiedusId(Request $request){
            DB::table('u_news_special_comment')->where('id',$request->id)->delete();
        return json_encode($request->id,JSON_UNESCAPED_UNICODE);
    }

    public function updateJiedu(Request $request){
            DB::table('u_news_special_comment')->where('id',$request->id)->update(['content'=>$request->content_text]);
        return json_encode($request->all(),JSON_UNESCAPED_UNICODE);
    }

    public function createJiedu(Request $request){

    $id= DB::table('u_news_special_comment')->insertGetId([
            'news_id'=>$request->news_id,
            'content'=>$request->content_text,
            'created_at'=>time(),
            'updated_at'=>time(),
        ]);
        $arr=DB::table('u_news_special_comment')->where('id',$id)->first();
        return json_encode($arr,JSON_UNESCAPED_UNICODE);

    }

    public function getjiedu(News $news){
       $arr=DB::table('u_news_special_comment')->where('news_id',$news->id)->get();
       $array=null;
       foreach ($arr as $item =>$value){
        $array[$item]['id']=$value->id;
        $array[$item]['news_id']=$value->news_id;
        $array[$item]['content']=$value->content;
        $array[$item]['created_at']=date('Y-m-d H:i:s', $value->created_at);
        $array[$item]['updated_at']=date('Y-m-d H:i:s', $value->updated_at);
       }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }


    public function NewsSubClass(){
        return view('admin.message.NewsSubClass');
    }
    public function tagEdit(){
        return view('admin.message.tagEdit');
    }
    public function batchImport(){
        return view('admin.message.batchImport');
    }

}

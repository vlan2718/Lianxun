<?php

namespace App\Http\Controllers\Admin\Advertise;

use App\Http\LogActionConst;
use App\Model\Advertising;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $advertising=null;
    public function __construct(Advertising $advertising)
    {
        $this->advertising=$advertising;
    }

    public function indexAd(){
        return view('admin.vue-route');
    }

    public function getAdvertisingBy(){
        $this->addLog(LogActionConst::GETADVERTISINGBY);
        $getAdvertisingBy= $this->advertising->getAdvertisingBy();
        $array=null;
        foreach ($getAdvertisingBy as $key=>$value){
            $array[$key]['id']=$value->id;
            $array[$key]['name']=$value->name;
            $array[$key]['order_type']=$value->order_type;
            if($value->from_time !=0){
                $array[$key]['from_time']=date('Y.m.d',$value->from_time);
            }
            if($value->end_time !=0){
                $array[$key]['end_time']=date('Y.m.d',$value->end_time);
            }

            $array[$key]['duration']=$value->duration;
            $array[$key]['image']=$value->image;
            $array[$key]['url']=$value->url;
            $array[$key]['created_at']=$value->created_at;
            $array[$key]['updated_at']=$value->updated_at;
        }
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function deleteAdvertising(Request $request){
        $this->addLog(LogActionConst::DELETEADVERTISING);
        $getAdvertisingBy=Advertising::destroy($request->id);
        return json_encode($getAdvertisingBy,JSON_UNESCAPED_UNICODE);
    }

    public function createAdvertising(Request $request){
        $this->addLog(LogActionConst::CREATEADVERTISING);
        if($request->has("id")){

            $this->advertising->updateStatus_label($request->id,$request->all());
            return json_encode($request->id,JSON_UNESCAPED_UNICODE);
        }else {

            if ($request->images){
                $bg = $request->get('images');//获取图片流
                $url = explode(',',$bg);
                $filename = md5(time().str_random(8)).'.png';//自定义图片名
                $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
                $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
                file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
            }
            $advertising = $this->advertising->createStatus_label($request->all());
            $advertising->image=$bgurl;
            $advertising->save();
            return json_encode(['code' => '1', 'data' => $advertising], JSON_UNESCAPED_UNICODE);
        }
    }
    public function updateAdvertising(Request $request){
        $this->addLog(LogActionConst::UPDATEADVERTISING);
        $this->advertising->updateStatus_label($request->id,$request->all());
        if ($request->images){
            $bg = $request->get('images');//获取图片流
            $url = explode(',',$bg);
            $filename = md5(time().str_random(8)).'.png';//自定义图片名
            $filepath = public_path('uploads/image').'/'.$filename;//图片存储路径
            $bgurl = '/uploads/image/'.$filename;//图片url ，具体看自己后台环境，我用的是laravel
            file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径
            $Advertising=$this->advertising->find($request->id);
            $Advertising->image=$bgurl;
            $Advertising->save();
        }
        $this->advertising->updateStatus_label($request->id,$request->all());
        return json_encode($request->id,JSON_UNESCAPED_UNICODE);
    }

}

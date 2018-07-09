<?php

namespace App\Http\Controllers\Uploads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    //
    public function upload(request $request){
        if($request->all()){
            $size = $request->photo->getClientSize();
            $name = $request->photo->getClientOriginalName();

            if ($size != "") {
                if ($size > 5120000) { //限制上传大小
                    return json_encode(['code'=>'0','msg'=>'图片大小不能超过5000k'],JSON_UNESCAPED_UNICODE);
                }
                $type = strstr($name, '.'); //限制上传格式
//                if ($type != ".psd" && $type != ".png" && $type != ".swf" && $type != ".jpg" && $type != ".zip" && $type != ".jpeg" && $type != ".svg") {
//                    return json_encode(['code'=>'0','msg'=>'图片格式不对'],JSON_UNESCAPED_UNICODE);
//                }
                $rand = rand(100, 999);
                $pics = date("YmdHis") . $rand . $type; //命名图片名称
                //上传路径
                $pic_path = '/uploads/IDPhoto/' . $pics;
                $request->photo->move('uploads/IDPhoto', $pics);
            }
//            $size = round($size / 1024, 2); //转换成kb
            $arr = array(
//                'pic_name' => $pics,
                'print_path' => $pic_path,
            );
            return json_encode(['code'=>'1','data'=>$arr]); //输出json数据
        }else{
            return json_encode(['code'=>'0','msg'=>'请上传图片'],JSON_UNESCAPED_UNICODE);
        }

    }
}

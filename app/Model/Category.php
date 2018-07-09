<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table='u_category';

    protected $fillable=['name','parent_id','order_no','is_nav'];

    /*
     *子分类
     * */
    public function subitems()
    {
        return $this->hasMany('App\Model\Category', 'parent_id')->select(Db::raw('id,name'));
    }

    public function getCategoryList(){
        return self::where('parent_id',0)->get();
    }
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }

    public function deleteNewsClassList($id){
        return self::destroy($id);
    }
    public function updateNewsClass($id,$name){
        $category=self::find($id);
        $category->name=$name;
        $category->save();
    }
    public function updateNewsClassSon($id,$name,$pid){
        $category=self::find($id);
        $category->name=$name;
        $category->parent_id=$pid;
        $category->save();
    }

    public function createNewsClass($array){
        $data['name']=$array['name'];
        $data['parent_id']=$array['parent_id'];
        $data['order_no']=1;
        $data['is_nav']=1;
        return self::create($data);
    }

    public function getNewsClassSonList($parent_id){
        $categorySons= self::where('parent_id',$parent_id)->get();
        $array=null;
        foreach ($categorySons as $key=>$categorySon){
            $array[$key]['name']=$categorySon->name;
            $array[$key]['id']=$categorySon->id;
            $array[$key]['parent_id']=$categorySon->parent_id;
            $array[$key]['order_no']=$categorySon->order_no;
            $array[$key]['is_nav']=$categorySon->is_nav;
            $parent=  DB::table('u_category')->where('id',$categorySon->parent_id)->first();
            $array[$key]['parent_name']=$parent->name;
        }
        return $array;
    }

    public static function getNewsClassListTree(){
        $categories= self::all()->toArray();
        $array=null;
        foreach ($categories as $key=>$category){
            if($category['parent_id']==0){
                $array[$category['id']]=$category;
            }
        }
        if ($array){
            foreach ($array as $item =>$value){
                foreach ($categories as $keyson => $categoryson){
                    if($categoryson['parent_id']== $value['id']){
                        $array[$item]['son'][]=$categoryson;
                    }
                }
            }
        }
        return $array;
    }
}

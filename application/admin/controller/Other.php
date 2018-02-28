<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Other extends Controller
{
    public function save(Request $request, $id){
        $data = Request::instance()->post();
        $result = db('other')->insert($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'保存失败'));
        }
    }

    public function delete($id){
        $id = input('id');
        $result = db('other')->where('id',$id)->delete();
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'Some errors occured.'));
        }
    }

    public function update(Request $request, $id){
        $data = Request::instance()->post();
        $id = input('id');
        $result = db('other')->where('id',$id)->update($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'编辑失败'));
        }
    }

    public function get($type=null){
        if($type!=null&&$type!=""){
            $result = db('other')->where("type","$type")->select();
        }else{
            $result = db('other')->select();
        }
        return json($result);
    }
}


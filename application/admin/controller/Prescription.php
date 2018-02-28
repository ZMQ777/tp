<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Prescription extends Controller
{   
    public function save(Request $request, $id){
        $data = Request::instance()->post();
        $result = db('prescription')->insert($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'保存失败'));
        }
    }

    public function delete($id){
        $id = input('id');
        $result = db('prescription')->where('id',$id)->delete();
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'Some errors occured.'));
        }
    }

    public function update(Request $request, $id){
        $data = Request::instance()->post();
        $id = input('id');
        $result = db('prescription')->where('id',$id)->update($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'编辑失败'));
        }
    }
    /**
     * 获取
     */
    public function get(){
        $result = db('prescription')->select();
        return json($result);
    }
}
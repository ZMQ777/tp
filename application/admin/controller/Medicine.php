<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Medicine extends Controller
{
    /**
     * 药品保存
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function save(Request $request, $id){
        $data = Request::instance()->post();
        $result = db('medicine')->insert($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'保存失败'));
        }
    }
    /**
     * 药品删除
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id){
        $id = input('id');
        $result = db('medicine')->where('id',$id)->delete();
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'Some errors occured.'));
        }
    }
    /**
     * 药品修改
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id){
        $data = Request::instance()->post();
        $id = input('id');
        $result = db('medicine')->where('id',$id)->update($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>false,'msg'=>'编辑失败'));
        }
    }

    /**
     * 药品模糊查询
     * @param  string  $name
     * @return \think\Response
     */
    public function get($name=null){
        if($name!=null&&$name!=""){
            $result = db('medicine')
            ->where("pn_code","like","%$name%")
            ->whereOr("medicine_name","like","%$name%")
            ->whereOr("manufacturer","like","%$name%")
            ->whereOr("generic_name","like","%$name%")
            ->select();
        }else{
            $result = db('medicine')->select();
        }
        return json($result);
    }
}


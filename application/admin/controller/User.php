<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view('');
    }

    public function get()
    {
        $result = db('user')->select();
        return json($result);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return view('');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = Request::instance()->post();
        $result = db('user')->insert($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('msg'=>'保存失败'));
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        return view('');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data = Request::instance()->post();
        $id = input('id');
        $result = db('user')->where('id',$id)->update($data);
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('msg'=>'编辑失败'));
        }

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $id = input('id');
        $result = db('user')->where('id',$id)->delete();
        if($result){
            echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('msg'=>'Some errors occured.'));
        }
    }
}

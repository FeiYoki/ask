<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * 修改排序
     */
    public function changeOrder(Request $request)
    {
        // 修改要排需的那条记录的order字段为用户指定的值
//        要修改的那条记录
        $cid = $request->input('cid');
//        要修改的值
        $order = $request->input('order');

        $cate = Cate::find($cid);
        $res = $cate->update(['order'=>$order]);

        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '修改成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '修改失败',
            ];
        }

        return $data;
    }


    public function index()
    {

        //获取所有的分类数据，返回到前台列表
//        return 111;

        $cates =  (new Cate)->tree();

        return view('admin.cate.list', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cateOne = Cate::where('pid',0)->get();
        return view('admin.cate.add',compact('cateOne'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. 获取用户提交的表单数据

        $input = $request->except('_token');
//        2. 表单验证

//        3.执行添加
        $cate = new Cate();
//        $cate->cid = $input['cid'];
        $cate->cname = $input['cname'];
        $cate->order = $input['order'];
        $cate->pid = $input['pid'];
        $res = $cate->save();
//        4.判断是否成功
        if($res){
            return redirect('admin/cate')->with('msg', '添加成功');
        }else{
            return redirect('admin/cate/create')->with('msg', '添加失败');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cates =  (new Cate)->tree();
//        dd($cates);
        $cate = Cate::find($id);
//        dd($cate);
        return view('admin.cate.edit', compact('cate','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //1.通过id找到要修改的用户
        $cate = Cate::find($id);
//        2.通过$request获取要修改的值
        $input = $request->except('_token', '_method');
//        dd($input);
//       3.使用模型的update进行更新
        $res = $cate->update($input);
        if ($res) {
            return redirect('admin/cate')->with('msg', '修改成功');
        } else {
            return redirect('admin/cate/' . $cate->cid . 'edit')->with('msg', '修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        return $id;

        $cate = Cate::find($id);
        $cates = Cate::get();

        $mark = [];
        foreach ($cates as $k=>$v) {
            if ($v->pid == $id) {
                $mark['error'] = 'ok';
                break;
            } else {
                $mark['error'] = 'no';
            }
        }
        if($mark['error'] == 'ok'){
            $res = false;
        }else{
            $res = $cate->delete();
        }


        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

        return $data;



    }
}

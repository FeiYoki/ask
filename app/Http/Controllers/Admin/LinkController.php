<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
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
        $lid = $request->input('lid');
//        要修改的值
        $order = $request->input('order');

        $link = Link::find($lid);
        $res = $link->update(['order'=>$order]);

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
//        1.获取友情链接数据
        $links = (new Link) ->tree();
//        dd($links);
//        2.显示视图发送数据
        return view('admin.link.list', compact('links'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //引入添加页面
        return view('admin.link.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $res = Link::create($input);
        // 判断是否添加成功
        if ($res) {
            return redirect('admin/link');
        } else {
            return back();
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
        $link = Link::find($id);
//        dd($cate);
        return view('admin.link.edit', compact('link'));
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
        $link = Link::find($id);
        $input = $request->except('_token', '_method');
        $res = $link->update($input);
        if ($res) {
            return redirect('admin/link')->with('msg', '修改成功');
        } else {
            return redirect('admin/link/' . $link->lid . 'edit')->with('msg', '修改失败');
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
        $res = Link::find($id)->delete();

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

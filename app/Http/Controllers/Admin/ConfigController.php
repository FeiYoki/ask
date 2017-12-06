<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{

    /**
     * @param Request $request
     * @return array
     *  修改排序
     */
    public function changeOrder(Request $request)
    {
        // 修改要排需的那条记录的order字段为用户指定的值
//        要修改的那条记录
        $id = $request->input('id');
//        要修改的值
        $order = $request->input('order');

        $config = Config::find($id);
        $res = $config->update(['order'=>$order]);

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //引入模板，并发送数据
//        $config = Config::get();
//        dd($config);
        $configs = (new Config)->tree();
//        dd($configs);
        foreach ($configs as $k=>$v) {

//            根据当前这条记录的type字段的值类决定，content的显示形式
            switch ($v->type) {
                case 'input':
                    $v->contents = '<input type="text" class="lg" name="content[]" value="' .htmlspecialchars( $v->content) . '">';
                    break;
                case 'textrea':
                    $v->contents = '<textarea id="" cols="30" rows="10" name="content[]">' . $v->content . '</textarea>';
                    break;
                case 'radio':
//                    存放最终拼接的结果
                    $str = '';
//                    dd($v->value);
                    $arr = explode(',', $v->value);
//                    dd($arr);
                    foreach ($arr as $m=>$n) {
                        $item = explode('|', $n);
//                        dd($item);
                        //如果当前网站配置记录的conf_content的值 == 单选按钮的值，应该给单选按钮添加checked属性
                        if ($item[0] == $v->content) {
                            $str.= '<input type="radio" checked name="content[]" value="'.$item[0].'" >'.$item[1];
                        } else {
                            $str.= '<input type="radio"  name="content[]" value="'.$item[0].'" >'.$item[1];
                        }
                    }

                    $v->contents = $str;

                    break;
            }
        }

        return view('admin.config.list', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        return 111;
        // 引入模板
        return view('admin.config.add');
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

        $res = Config::create($input);
        if ($res) {
            return redirect('admin/config')->with('msg', '添加成功');
        } else {
            return back()->with('msg', '添加失败');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Config::find($id)->delete();
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Point;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        ::with('user')
        $point = Point::orderby('optime','asc')
//            ->where(function($query) use($request){
//                //检查关键字
//                $id = $request->input('keywords');
//                //如果关键字不为空
//                if(!empty($title))
//                {
//                    $query->where('uid',$id);
//                }
//            })
            ->paginate(10);
//        dd($question);
        return view('admin/point/list',compact('point'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/point/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取提交的数据
        $input = $request->except('_token');
        $input["optime"] = time();
        //判断是惩罚还是奖赏,如果是惩罚,则变为负数
        if($input['optxt']=='punish'){
            $input['points'] = -$input['points'];
        }
//        dd($input);
        //表单验证
//        $rule = [
//            'title'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
//        ];
//
//        $str = [
//            'title.required'=>'问题标题不能为空',
//            'title.regex'=>'问题标题可以是字母数字下划线',
//            'title.between'=>'问题标题需在5~30个字符之间',
//        ];
//        $validator = Validator::make($input,$rule,$str);
//
//        //如果表单验证失败
//        if($validator->fails()){
//            return redirect('admin/question/create')
//                ->withErrors($validator)
//                ->withInput();
//        }
        //添加到数据库
//        dd($input);
        $res = Point::create($input);
        //判断添加是否成功
        if($res){
            return redirect('admin/point')->with(['msg','添加成功']);
        }else{
            return redirect('admin/point/create')->with('msg','添加失败');
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
        //
    }
}

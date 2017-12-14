<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Point;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $point = Point::orderby('optime','desc')
            ->paginate(10);
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
        //添加操作时间
        $input["optime"] = time();
        //去除开头输入的0
        $input['uid'] = ltrim($input['uid'],0);

        //判断是惩罚还是奖赏,如果是惩罚,则变为负数
        if($input['optxt']=='punish'){
            $input['points'] = -$input['points'];
            $input['optxt']= '惩罚';
        }else{
            $input['optxt']= '奖励';
        }

        //表单验证
        $rule = [
            'uid'=>'required|regex:/[0-9]+/',//id必须为数字
            'points'=>'required|regex:/[0-9]+/',//id必须为整数
        ];

        $str = [
            'uid.required'=>'用户ID不能为空',
            'uid.regex'=>'用户ID必须是数字',
            'points.required'=>'积分不能为空',
            'points.regx'=>'积分必须是正整数',
        ];
        $validator = Validator::make($input,$rule,$str);

        //如果表单验证失败
        if($validator->fails()){
            return redirect('admin/point/create')
                ->withErrors($validator)
                ->withInput();
        }

        //判断用户是否存在
        $user = DB::table('index_user')->where('uid',$input['uid'])->first();
        if(!$user){
            return redirect('admin/point/create')->with('errors','用户名ID不存在,不能添加');
        }

        //添加到数据库
        $res = Point::create($input);
//        dd($input);
        //判断添加是否成功
        if($res){
            return redirect('admin/point')->with('errors','添加成功');
        }else{
            return redirect('admin/point/create')->with('errors','添加失败');
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

<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cate;
use App\Http\Model\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request);
//        DB::table('question')->increment('click');

        return view('home/question/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::tree();
        return view('home/question/add',compact('cates'));
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
        $input["date"] = time();
//        dd($input);
        //表单验证

        //添加到数据库
        $res = Question::create($input);
        $input['qid'] = $res['qid'];
//        dd($input);
        //判断添加是否成功
        if($res){
            return view('home/question/list',compact('input'));
        }else{
            return redirect('home/question/create')->with('msg','添加失败');
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
        //获取所有的分类
        $cates = Cate::tree();
        //根据id找到要修改的问题记录
        $question = Question::find($id);
        //dd($art);
        return view('home.question.edit',compact('question','cates'));
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
        //通过id找到要修改的用户记录
        $question = Question::find($id);
//        dd($question);
        //通过$request获取要修改的值
        $input = $request->except('_token');

        //使用模型的update方法进行更新
        $res = $question->update($input);
//        整合并往前台传递信息
        $input['qid'] = $question->qid;
        $input['image'] = $question->image;
        $input['date'] = $question->date;
        $input['click'] = $question->click;

        //更新是否成功,跳转到相应页面
        if($res){
            return view('home/question/list',compact('input'));
        }else{
            return redirect('home/question/'.$question->qid.'/edit')->with('msg','修改失败');
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
        //
    }
}

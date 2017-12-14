<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cate;
use App\Http\Model\Question;
use App\Http\Model\User;
use App\Models\Answer;
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
    public function index()
    {

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
//        dd($question);
        //表单验证

        //添加到数据库
        $res = Question::create($input);
        $question = Question::find($res['qid']);

//        dd($question);
        //判断添加是否成功
        if($res){
            return view('home/question/detail',compact('question'));
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
        //查找问题的回答
        $answer= Answer::find($id);
        //查询用户数据
//        $user = ::HomeUser::find($question->uid);
//        dd($question);
        //通过$request获取要修改的值
        $input = $request->except('_token');

        //使用模型的update方法进行更新
        $res = $question->update($input);

        //更新是否成功,跳转到相应页面
        if($res){
            return view('home/question/detail',compact('question',$question,'answer',$answer));
        }else{
            return redirect('home/question/'.$question->qid.'/edit')->with('msg','修改失败');
        }
    }
    public function detail($id)
    {

        //通过id找到要修改的用户记录
        $question = Question::find($id);
        //查找问题的回答
        $answer = Answer::where('qid',$id)
            ->orderBy('date','desc')
            ->get();
        $count = DB::table('answer')->where('qid',$id)->count();
//        dd($answer);
        //查询用户数据
//        $user = ::HomeUser::find($question->uid);
//        dd($answer);

        return view('home/question/detail',compact('question','answer','count'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Question::find($id)->delete();
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

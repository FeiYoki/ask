<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cate;
use App\Http\Model\Point;
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
        //获取相似问题信息
        $questions = Question::orderby('date','desc')
            ->where('title','like','%'.$question->title.'%')
            ->paginate(5);

//        dd($questions);
        //判断添加是否成功
        if($res){
            return view('home/question/detail',compact('question',$question,'questions',$questions));
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
        $answer = Answer::where('qid',$id)
            ->orderBy('date','desc')
            ->get();
        $count = DB::table('answer')->where('qid',$id)->count();
//        $user = ::HomeUser::find($question->uid);
//        dd($question);
        //通过$request获取要修改的值
        $input = $request->except('_token');

        //使用模型的update方法进行更新
        $res = $question->update($input);
        //获取相似问题信息
        $questions = Question::orderby('date','desc')
            ->where('title','like','%'.$question->title.'%')
            ->paginate(5);

        //更新是否成功,跳转到相应页面
        if($res){
            return view('home/question/detail',compact('question',$question,'answer',$answer,'count',$count,'questions',$questions));
        }else{
            return redirect('home/question/'.$question->qid.'/edit')->with('msg','修改失败');
        }
    }
    /*
     * 问题详情页面
     * @param  int  $id
     * @return question(问题信息)  answer(答案信息)  questions(相似问题信息)
     */
    public function detail($id)
    {

        //通过id找到要修改的用户记录
        $question = Question::find($id);
        /*问题查看数+1*/
        $question->increment('click');
        //查找问题的回答
        $answer = Answer::where('qid',$id)
            ->orderBy('date','desc')
            ->get();
        //统计问题共有答案个数
        $count = DB::table('answer')->where('qid',$id)->count();
        //获取相似问题信息
        $questions = Question::orderby('date','desc')
            ->where('title','like','%'.$question->title.'%')
            ->paginate(5);
//        dd($questions);
        //查询用户数据
//        $user = ::HomeUser::find($question->uid);
//        dd($answer);

        return view('home/question/detail',compact('question',$question,'answer',$answer,'count',$count,'questions',$questions));
    }

    /**
     * 删除问题模块
     *
     * @param  int  $id
     * @return $data
     */
    public function destroy($id)
    {
        $data = [];
        //获取删除的问题数据
        $q = Question::find($id);
        //删除数据的用户信息
        $point = [
            'uid'      => $q->uid,
            'points'   => -30,
            'optxt'    => '删除问题',
            'optime'   => time(),
        ];
        //获取该用户所有的积分
        $score = DB::table('points_list')
            ->where('uid',$q->uid)
            ->sum('points');
//        dd($score);
        //判断积分是否足够扣除
        if($score-30 < 0){
            $data['error'] = 1;
            $data['msg'] ="积分不足30分,不能删除数据";
            return $data;
        }
        //将操作数据写入数据库
        $resp = Point::create($point);
        $resq = Question::find($id)->delete();
        $resa = Answer::where('qid',$id)->delete();

        if($resa && $resq && $resp){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

        return $data;
    }
    /**
     * 采纳最佳答案模块
     *
     * @param  int  $id
     * @return $data
     */
    public function bestAnswer($id)
    {
        $data = [];
        //找到最佳答案对应的aid
        $answer = Answer::find($id);
        //给字段赋值,记录为最佳答案
        $answer->bestanswer = 1;

        //找到最佳答案对应的qid
        $question = Question::find($answer->qid);

        //判断是否有最佳答案,如果有则返回已有
        if($question->status==1){
            $data['error'] = 1;
            $data['msg'] ="回答采纳失败，已有最佳答案！";
            //返回信息
            return $data;
        }
        //给字段赋值,记录当前问题已被解决
        $question->status = 1;

        //将最佳答案存储到数据库中去
        $resa = $answer->save();
        //将问题状态存储到数据库中去
        $resq = $question->save();

        //判断存储是否成功
        if($resa && $resq){
            $data['error'] = 0;
            $data['msg'] ="回答采纳成功!";
        }else{
            $data['error'] = 1;
            $data['msg'] ="回答采纳失败，请稍后再试！";
        }
        return $data;
    }
    
}

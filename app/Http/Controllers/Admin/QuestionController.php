<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use App\Http\Model\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $question = Question::with('cate')
            ->orderby('qid','asc')
            ->where(function($query) use($request){
                //检查关键字
                $title = $request->input('keywords');
                //如果关键字不为空
                if(!empty($title))
                {
                    $query->where('title','like','%'.$title.'%');
                }
            })
            ->paginate(5);
//        dd($question);
        return view('admin/question/list',compact('question','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::tree();
//        dd($cates);
        return view('admin/question/add',compact('cates'));
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

        $res = Question::create($input);
        //判断添加是否成功
        if($res){
            return redirect('admin/question')->with(['msg','添加成功']);
        }else{
            return redirect('admin/question/create')->with('msg','添加失败');
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
//        dd($cates);
        //根据id找到要修改的问题记录
        $question = Question::find($id);
        //dd($art);
        return view('admin.question.edit',compact('question','cates'));
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
//        dd($input);
        //使用模型的update方法进行更新
        $res = $question->update($input);
        //更新是否成功,跳转到相应页面
        if($res){
            return redirect('admin/question')->with('msg','修改成功');
        }else{
            return redirect('admin/question/'.$question->qid.'/edit')->with('msg','修改失败');
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

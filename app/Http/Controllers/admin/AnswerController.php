<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Models\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ans = Answer::all();
        // dd($ans);
        if(empty($input)){
            $answer = Answer::orderBy('aid','asc')->paginate(5);
            return view('admin.answer.list',compact('answer','input'));
       }else{
           $notice = Notice::orderBy('nid','asc')
            ->where('title','like','%'.$input.'%')
            ->orwhere('content','like','%'.$input.'%')
            ->paginate(5);
           return view('admin.notice.list',compact('answer','input'));
       }
       dd($answer);
        return view('admin.answer.list')->with('ans',$ans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ;
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
        $answer = Answer::find($id);
        // dd($answer);
        // dd($answer['status']);
        // if($answer['status']==1){
        //     $a = $answer['status'] = 0;
        // }else{
        //     $a = $answer['status'] = 1;
        // }
        // $answer->update(['status'=>$a]);
        // // dd($answer['status']);
        // return $answer['status'];
        // return view('admin.answer.edit');
        return view('admin.answer.edit')->with('answer',$answer);
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
        $answer = Answer::find($id);
        $input = $request->only('status'); 
        // dd($input);
        $answer->update($input);
        return redirect('admin/answer');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Answer::find($id)->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $data;
    }
}

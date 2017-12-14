<?php

namespace App\Http\Controllers\home;


use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class researchController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if(!empty())
        $input = $request->except('_token');
        // dd($input);
        if(!empty($input['word'])){
        $input = $input['word'];
        // dd($input);
        $res = Question::orderBy('qid','desc')
            ->join('class','question.cid','=','class.cid')
            ->where('title','like','%'.$input.'%')
            ->orwhere('content','like','%'.$input.'%')
            ->paginate(4);
        // dd($res);
        return view('home.research.research',compact('res','input'));
        }else{
        $res = Question::orderBy('qid','desc')
            ->join('class','question.cid','=','class.cid')
            ->paginate(4);
        return view('home.research.research',compact('res'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

    }

}

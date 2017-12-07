<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Models\answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class answerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.xxoo');
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
        $answer = $request->except('_token');
        $text = $answer['art_content'];
        $ltrimed = "<p>";
        $text = ltrim($text,$ltrimed);
        // $rtrimed = '/<img.*p>/';
        // $content = preg_replace($rtrimed,"",$text);
        // $preg = '/<src=".*"/';
        // preg_match_all($preg,$text,$text);
        dd($text);

        //  $input = Input::except('_token');
        // // dd($input);
        // $notice = new Notice();
        // $notice->title = $input['title'];
        // $notice->content = $input['content'];
        // $notice->date = date('Y-m-d H:i:s',time());
        // // dd($notice);
        // $res = $notice->save();
        // // dd($res);


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
        // return 111111;
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

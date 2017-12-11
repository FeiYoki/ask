<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Models\Answer;
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
        $ans = Answer::all();
        // dd($ans);
        return view('home.answer',compact('ans'));
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
        // dd($answer);
        if(empty($answer['art_content'])){
            return view('home.answer');
        }else{
            $text = $answer['art_content'];
            // dd($text);
            $ans = new Answer();
            // 取文本域中的字符串
            
            $ltrimed = "<p>";
            $text = ltrim($text,$ltrimed);
            $rtrimed = '/<img.*><\/p>/';
            $content = preg_replace($rtrimed,"",$text);
            $a = "/img/";
            
            // dd();
            // 只输入照片
            if(preg_match($a,$content,$preg)==0){
                $ans->content = $content;
            }
            // $b = preg_match('/>\w<\/p>/',$text,$preg);
            // dd($b);
            // 先输入照片再内容
            if(preg_match('>\w</p>',$text,$preg)){
                
                $ltrimed = "</p>";
                $text = rtrim($text,$ltrimed);
                // dd($text);
                $rtrimed = '/img.*>/';
                $content = preg_replace($rtrimed,"",$text);
                $ans->content = $content;
                // dd($content);
            }
            // dd($content);
            // 取文本域中的图片
            
            $preg = '/src=".*" title/';
            preg_match_all($preg,$text,$img);
            // dd($img);
            if(!empty($img[0][0])){
                $img = $img[0][0];
                $img = trim($img,'src="');
                $img = trim($img,'" title');
                $ans->image = $img;
                // dd($img);
            }else{
                $content = rtrim($text,'</p>');
            }
            
            $ans->date = date('Y-m-d H:i:s',time());
            // dd($ans);
            $res = $ans->save();
            // dd($ans[0]['attributes']);
            return redirect('home/answer');
        }
        
        // if($res){
            
        //     return view('home.xxoo',compact('ans'));
        // }else{
        //     return redirect('admin/notice/create');
        // }
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

<?php

namespace App\Http\Controllers\home;

use App\Http\Model\Question;
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
        $question = Question::all();
        // dd($ans);

        return view('home.answer.answer',compact('ans'));

    }

    public function upload(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
//        $file = $file[0];
//        $file = $request->all();

//        $file = $request->all();
        //dd($file);

        if($file->isValid()){
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();


            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;


            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';




            //将文件移动到本地服务器的指定的位置，并以新文件名命名
//            $file->move(移动到的目录, 新文件名);
            $file->move($dirpath, $newfile);



            //将文件移动到七牛云，并以新文件名命名
            //\Storage::disk('qiniu')->writeStream('uploads/'.$newfile, fopen($file->getRealPath(), 'r'));


            //将文件移动到阿里OSS
//            OSS::upload($newfile,$file->getRealPath());


            //将上传的图片名称返回到前台，目的是前台显示图片
            return $newfile;


        }

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
    public function store(Request $request )
    {
        $answer = $request->except('_token');

        // $a = $request->all();
        // dd($answer);
        // dd($answer['art_content']);
        // if(empty($answer['art_content'])){
        //     return view('home.answer.answer');
        // }else{
        //     $text = $answer['art_content'];
        //     // dd($text);
        //     $ans = new Answer();
        //     // 取文本域中的字符串
            
        //     $ltrimed = "<p>";
        //     $text = ltrim($text,$ltrimed);
        //     $rtrimed = '/<img.*><\/p>/';
        //     $content = preg_replace($rtrimed,"",$text);
        //     $a = "/img/";
            
        //     // dd();
        //     // 只输入照片
        //     if(preg_match($a,$content,$preg)==0){
        //         $ans->content = $content;
        //     }
        //     // $b = preg_match('/>\w<\/p>/',$text,$preg);
        //     // dd($b);
        //     // 先输入照片再内容
        //     if(preg_match('>\w</p>',$text,$preg)){
                
        //         $ltrimed = "</p>";
        //         $text = rtrim($text,$ltrimed);
        //         // dd($text);
        //         $rtrimed = '/img.*>/';
        //         $content = preg_replace($rtrimed,"",$text);
        //         
        //         // dd($content);
        //     }
        //     // dd($content);
        //     // 取文本域中的图片
            
        //     $preg = '/src=".*" title/';
        //     preg_match_all($preg,$text,$img);
        //     // dd($img);
        //     if(!empty($img[0][0])){
        //         $img = $img[0][0];
        //         $img = trim($img,'src="');
        //         $img = trim($img,'" title');
        //         $ans->image = $img;
        //         // dd($img);
        //     }else{
        //         $content = rtrim($text,'</p>');
        //     }
            // dd($answer);
            // $ans = Answer::get(); 
            // dd($answer['edit']);
            if(empty($answer['edit'])){
                $ans = new Answer();     
                $ans->content = $answer['art_content'];
                $ans->date = date('Y-m-d H:i:s',time());
                // dd($ans);
                $ans->save();
            }else{
                $input = $request->except('_token');
                $id = $input['edit'];

                $ans = Answer::find($id);
                // $input = $request->except('_token','edit');
                // unset($input['edit']);
                // dd($input);
                $ans->content=$input['art_content'];
                $ans->save();
                // dd($ans);
            }
            
            // dd($ans[0]['attributes']);
            return redirect('home/answer');
        

        
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
        $ans = Answer::find($id);
        $ans = $ans->content;
        return $ans;
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

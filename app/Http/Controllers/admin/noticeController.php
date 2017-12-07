<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Notice;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class noticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $notice = Notice::paginate(5);
        
        // dd($notice);
        $input = $request->input('keywords');
        // dd($input);
        
        // $notice = Notice::orderBy('nid','asc')
        //     ->where('title','like','%'.$input.'%')
        //     ->where('content','like','%'.$input.'%')
        //     ->paginate(5);
        // $notice = Notice::orderBy('nid','asc')->where('title','like','%'.$input.'%')->paginate(5);

        // return view('admin.list')->with('notice',$notice);
        if(empty($input)){
            $notice = Notice::orderBy('nid','asc')->paginate(5);
           return view('admin.notice.list',compact('notice','input'));
       }else{
           $notice = Notice::orderBy('nid','asc')
            ->where('title','like','%'.$input.'%')
            ->orwhere('content','like','%'.$input.'%')
            ->paginate(5);
           return view('admin.notice.list',compact('notice','input'));
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        // dd($input);
        $notice = new Notice();
        $notice->title = $input['title'];
        $notice->content = $input['content'];
        $notice->date = date('Y-m-d H:i:s',time());
        // dd($notice);
        $res = $notice->save();
        // dd($res);
        if($res){
            
            return redirect('admin/notice/list')->with('msg','添加成功');
        }else{
            return redirect('admin/notice/create')->with('msg','添加失败');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.edit',compact('notice'));
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
        // return 11111;
        $notice = Notice::find($id);
        // dd($notice);
        $input = Input::all();
        $res = $notice->update($input);
        if($res){
            // redirect('admin/list');
            return redirect('admin/list')->with('msg','修改成功');
        }else{
            return redirect('admin/list')->with('msg','修改失败');
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
        $res = Notice::find($id)->delete();

        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] = '删除成功';
        }else{
            $data['error'] = 1;
            $data['msg'] = '删除失败';
        }
        return $data;
    }
}

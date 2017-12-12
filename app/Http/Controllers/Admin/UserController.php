<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Role;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{



    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 返回给用户授权的页面
     */

    public function auth($id)
    {
//        获取当前授权用户
        $user = User::find($id);
//        dd($user);
//        获取所有角色
        $roles = Role::get();
//        dd($roles);
//        获取当前用户已经拥有的角色
        $own_roles = DB::table('role_user')->where('user_id', $id)->lists('role_id');
//        dd($own_roles);
        return view('admin.user.auth', compact('user', 'roles', 'own_roles'));

    }

    /**
     * 处理用户授权操作
     */
    public function doauth(Request $request)
    {

//        return 11;
//        1.接受用户提交过来的所用数据
        $input = $request->except('_token');

        DB::beginTransaction();

        try {
//            删除用户以前拥有的角色
            DB::table('role_user')->where('user_id', $input['user_id'])->delete();
//            给当前用户重新授权
//        2.将授权数据添加到role_user表中
            if (isset($input['role_id'])) {
                foreach ($input['role_id'] as $k => $v) {
                    DB::table('role_user')->insert(['user_id' => $input['user_id'], 'role_id' => $v]);

                }
            }

            //
        } catch (Exception $e) {
            DB::rollBack();
        }

        DB::commit();

//        添加成功后，跳转到列表页
        return redirect('admin/user');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $request->all()
//        $request->all()
        $users = User::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('keywords');
                //$email = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('name','like','%'.$username.'%');
                }

            })
            ->paginate($request->input('num', 10));
        //dd($user);
        return view('admin.user.list',['users'=>$users, 'request'=> $request]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取用户提交的数据
       $input = Input::except('_token');
       //进行表单验证validator
        $rule = [
            'username'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:5,20',
            "password"=>'required|between:3,20'
        ];
        $mess = [
            'username.required'=>'用户名必须输入',
            'username.regex'=>'用户名必须汉字字母下划线',
            'username.between'=>'用户名必须在5到20位之间',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码必须在5到20位之间'
        ];

        $validator = Validator::make($input,$rule,$mess);
        //如果验证失败
        if($validator->fails())
        {
            return redirect('admin/user/create')->withErrors($validator)->withInput();
        }
        //执行添加操作
        $user = new User();
        $user->name = $input['username'];
        $user->password = Crypt::encrypt($input['password']);
        $res = $user->save();
        //4判断是否成功
        if($res){
            return redirect('admin/user')->with('ms','添加成功');
        }else{
            return redirect('admin/user/create')->with('ms','添加失败');
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

        //1.通过id获取用户的信息内容
        $user = User::find($id);
        //2.返回一个使徒来展示这些页面
        return view('admin.user.edit',compact('user'));
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

        //1.通过id找到要修改的那个用户
        $user = User::find($id);
        //2.通过$request获取要修改的值
        $input = $request->only('name');//这是个数组
        //dd($input);
        //$input = $request->input('newname');
        //dd($input);
        //save方法修改数据
        //$user->name=$input;
        //$user->save();
        //update方法修改数据,如果用了update方法,则前台的input表单里的新用户字段,得变成数据库的字段
        $res = $user->update($input);

        //3.使用模型的update进行更新
        //4.判断,如果成功跳转到哪里,如果失败跳转到哪里
        if(!$res){
            return redirect('admin/user');
        }else{
            return back();
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
        $res = User::find($id)->delete();
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Permission;
use App\Http\Model\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\Validator;
class RoleController extends Controller
{


    /**
     *返回给角色授权的页面
     */

    public function auth($id)
    {
//        获取当前角色
        $role = Role::find($id);
//        获取所有的权限
        $permissions = Permission::get();
//        dd($permission);

//        获取当前角色已经拥有的权限
        $own_permissions = DB::table('permission_role')->where('role_id',$id)->lists('permission_id');

        return view('admin.role.auth', compact('role','permissions','own_permissions'));
    }

    /**
     * 处理用户授权操作
     */
    public function doauth(Request $request)
    {
//        1.接受用户提交的所有数据
        $input = $request->except('_token');

        DB::beginTransaction();
        try {
//            删除角色以前拥有的权限
            DB::table('permission_role')->where('role_id', $input['role_id'])->delete();
//            给当前角色重新授权
//            2.将授权数据添加到permission_role表中
            if (isset($input['permission_id'])) {
                foreach ($input['permission_id'] as $k => $v) {
                    DB::table('permission_role')->insert(['role_id'=>$input['role_id'], 'permission_id' => $v
                    ]);

                }
            }
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();

        //添加成功后，跳转到列表页
        return redirect('admin/role');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd(111);
//        1.获取数据
        $roles = Role::where(function ($query) use ($request) {
            $rolename = $request->input('name');
            $description = $request->input('description');
            if(!empty($rolename)) {
                $query->where('name','like','%'.$rolename.'%');
            }
            if (!empty($description)) {
                $query->where('description', 'like', '%' . $description . '%');
            }

        })
            ->paginate(1);

        return view('admin.role.list', compact('roles', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //引入页面
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        1.获取提交的数据
        $input = $request->except('_token');
//        2.表单验证
        $rule = [
            'name' => 'required|between:2,10',
            'description' => 'required|between:2,20',

        ];

        $mess = [
            'name.required' => '角色名称不能为空',
            'name.between' => '角色名称只能输入2到10位',
            'description.required' => '角色描述不能为空',
            'description.between' => '角色描述只能输入2到20位',
        ];

        $validator = Validator::make($input,$rule,$mess);

        //如果验证失败
        if($validator->fails())
        {
            return redirect('admin/role/create')->withErrors($validator)->withInput();
        }

//        3.执行添加操作
        $res = Role::create($input);

//        4.判断是否添加成功
        if ($res) {
            return redirect('admin/role')->with('msg', '添加成功');
        } else {
            return redirect('admin/role/create')->with('msg', '添加失败');
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
        //1.获取到修改的哪一条数据

        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
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

        $role = Role::find($id);
        $input = $request->except('_token', '_method', 'rid');
        $rule = [
            'name' => 'required|between:2,10',
            'description' => 'required|between:2,20',

        ];

        $mess = [
            'name.required' => '角色名称不能为空',
            'name.between' => '角色名称只能输入2到10位',
            'description.required' => '角色描述不能为空',
            'description.between' => '角色描述只能输入2到20位',
        ];

        $validator = Validator::make($input,$rule,$mess);

        //如果验证失败
        if($validator->fails())
        {
            return redirect('admin/role/' . $role->rid . '/edit')->withErrors($validator)->withInput();
        }

        $res = $role->update($input);
        if ($res) {
            return redirect('admin/role')->with('msg', '修改成功');

        } else {
                return redirect('admin/role/' . $role->rid . '/edit')->with('msg', '修改失败');

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

        $res = Role::find($id)->delete();

        $data = [];

        if ($res) {
            $data ['error'] = 0;
            $data ['msg'] = '删除成功';
        } else {
            $data ['error'] = 1;
            $data ['msg'] = '删除失败';
        }

        return $data;


    }
}

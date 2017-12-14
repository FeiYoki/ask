<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::where(function ($query) use ($request) {
            $permission_name = $request->input('name');
            $description = $request->input('description');
            if(!empty($permission_name)) {
                $query->where('name','like','%'.$permission_name.'%');
            }
            if (!empty($description)) {
                $query->where('description', 'like', '%' . $description . '%');
            }

        })
            ->paginate(2);

        return view('admin.permission.list', compact('permissions', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //引入页面
        return view('admin.permission.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $input = $request->except('_token');

        $rule = [
            'name' => 'required|between:2,10',
            'description' => 'required|between:2,60',

        ];

        $mess = [
            'name.required' => '权限名称不能为空',
            'name.between' => '角色名称只能输入2到10位',
            'description.required' => '角色描述不能为空',
            'description.between' => '角色描述只能输入2到60位',
        ];

        $validator = Validator::make($input,$rule,$mess);

        //如果验证失败
        if($validator->fails())
        {
            return redirect('admin/permission/create')->withErrors($validator)->withInput();
        }

        $res = Permission::create($input);
        if ($res) {
            return redirect('admin/permission')->with('msg', '添加成功');
        } else {
            return redirect('admin/permission/create')->with('msg', '添加失败');
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
       $permission =  Permission::find($id);
       return view('admin.permission.edit', compact('permission'));

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
        $permission = Permission::find($id);

        $input = $request->except('_token', '_method');

        $rule = [
            'name' => 'required|between:2,10',
            'description' => 'required|between:2,60',

        ];

        $mess = [
            'name.required' => '角色名称不能为空',
            'name.between' => '角色名称只能输入2到10位',
            'description.required' => '角色描述不能为空',
            'description.between' => '角色描述只能输入2到60位',
        ];

        $validator = Validator::make($input,$rule,$mess);

        //如果验证失败
        if($validator->fails())
        {
            return redirect('admin/role/' . $permission->id . '/edit')->withErrors($validator)->withInput();
        }

        $res = $permission->update($input);

        if ($res) {
            return redirect('admin/permission')->with('msg', '修改成功');
        } else {
            return redirect('admin/role/' . $permission->id . '/edit')->with('msg', '修改失败');
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
        $res = Permission::find($id)->delete();

        $data = [];

        if ($res ) {
            $data['error'] = 0;
            $data['msg'] = '删除成功';
        } else {
            $data['error'] = 1;
            $data['msg'] = '删除失败';
        }

        return $data;
    }
}

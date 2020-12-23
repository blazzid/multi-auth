<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Role::select('name','id');
            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'admin.role.button')
            ->addColumn('permission', function ($data)
            {
                $permission = '';
                foreach ($data->permissions()->pluck('name') as $value) {
                    $permission .= '&nbsp;&nbsp;<span class="badge badge-info">'.$value.'</span>';
                }
                return $permission;
            })
            ->rawColumns(['action','permission'])->toJson();
        }  

        return view('admin.role.index');
    }

    public function create()
    {
        $permissions = Permission::select('*')->orderBy('name')->get()->pluck('name', 'name');

        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles,name',
            'permission'=>'required'
        ]);

        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        \LogActivity::addToLog('Tambah role '.$request->name);

        return redirect()->route('role.index')->with('success', 'Tambah data berhasil !');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::select('*')->orderBy('name')->get()->pluck('name', 'name');

        return view('admin.role.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$role->id,
            'permission'=>'required'
        ]);

        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        \LogActivity::addToLog('Ubah role '.$request->name);

        return redirect()->route('role.index')->with('success', 'Ubah data berhasil !');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        \LogActivity::addToLog('Hapus role '.$role->name);
    }
}

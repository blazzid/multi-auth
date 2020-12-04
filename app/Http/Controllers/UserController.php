<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = User::select('name','email','status','id');
            return DataTables::of($model)
            ->addColumn('action', 'admin.user.button')
            ->addColumn('keterangan', function ($data)
            {
                if ($data->status) {
                    $button = '<label class="badge badge-success">Aktif</label>';
                } else {
                    $button = '<label for="" class="badge badge-danger">Suspend</label>';
                }
                return $button;
            })
            ->addColumn('role', function ($data)
            {
                $role = '';
                foreach ($data->roles()->pluck('name') as $value) {
                    $role .= '&nbsp;&nbsp;<span class="badge badge-info">'.$value.'</span>';
                }
                return $role;
            })
            ->rawColumns(['action','keterangan','role'])->toJson();
        }  

        return view('admin.user.index');
    }

    public function create()
    {
        $roles = Role::select('*')->orderBy('name')->get()->pluck('name', 'name');

        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'status'=>'required',
            'role'=>'required'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $roles = $request->input('role') ? $request->input('role') : [];
        $user->assignRole($roles);

        return redirect()->route('user.index')->with('success', 'Tambah data berhasil !');
    }

    public function edit(user $user)
    {
        $roles = Role::select('*')->orderBy('name')->get()->pluck('name', 'name');

        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'status'=>'required',
            'role'=>'required'
        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'status' => $request['status'],
        ]);
        $roles = $request->input('role') ? $request->input('role') : [];
        $user->syncRoles($roles);

        return redirect()->route('user.index')->with('success', 'Ubah data berhasil !');
    }

    public function ubahsandi(Request $request, user $user)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('user.index')->with('success', 'Ubah data berhasil !');
    }

    public function destroy(user $user)
    {
        $user->delete();
    }
}

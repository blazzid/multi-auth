<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use App\Rules\MatchOldPassword;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = User::select('name','email','status','last_online_at','id');
            return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'admin.user.button')
            ->addColumn('keterangan', function ($data)
            {
                if ($data->status) {
                    $button = '<label class="badge badge-success">ON</label>';
                } else {
                    $button = '<label for="" class="badge badge-danger">OFF</label>';
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
            'role'=>'required',
            'new_password' => 'required|string|min:8',
            'new_confirm_password' => 'same:new_password',
        ]);

        if (is_null($request->status)) {
            $request['status'] = "0";
        }
        if (is_null($request->kelamin)) {
            $request['kelamin'] = "W";
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'status' => $request['status'],
            'kelamin' => $request['kelamin'],
            'password' => Hash::make($request['new_password']),
        ]);

        $roles = $request->input('role') ? $request->input('role') : [];
        $user->assignRole($roles);

        \LogActivity::addToLog('Tambah user '.$request->email);

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
            'role'=>'required'
        ]);

        if (is_null($request->status)) {
            $request['status'] = "0";
        }
        if (is_null($request->kelamin)) {
            $request['kelamin'] = "W";
        }

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'status' => $request['status'],
            'kelamin' => $request['kelamin'],
        ]);
        $roles = $request->input('role') ? $request->input('role') : [];
        $user->syncRoles($roles);

        \LogActivity::addToLog('Ubah user '.$request->email);

        return redirect()->route('user.index')->with('success', 'Ubah data berhasil !');
    }

    public function ubahsandi(Request $request, user $user)
    {
        $request->validate([
            'new_password' => ['required','string','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $user->update([
            'password' => Hash::make($request['new_password']),
        ]);

        \LogActivity::addToLog('Ubah sandi '.$user->email);

        return redirect()->route('user.index')->with('success', 'Ubah data berhasil !');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','string','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        \LogActivity::addToLog('Ubah sandi '.Auth::user()->email);

        return redirect()->route('home')->with('success', 'Ubah data berhasil !');
    }

    public function destroy(user $user)
    {
        $user->delete();

        \LogActivity::addToLog('Hapus user '.$user->email);
    }
}

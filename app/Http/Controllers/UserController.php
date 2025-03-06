<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $roles = Role::all();
        view()->share('roles', $roles);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select(['id', 'name', 'level', 'username', 'email', 'created_at']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $editUrl = route('admin.user.edit', encrypt($user->id));
                    $deleteUrl = route('admin.user.destroy', encrypt($user->id));
                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-warning">Edit</a>
                        <form action="' . $deleteUrl . '" method="POST" style="display: inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin?\')">Hapus</button>
                        </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => 'required|max:255|min:6',
            'role' => 'required',
            'level' => 'required|integer',
            'username' => 'required|string|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
        ]);

        $user->assignRole($request->role);
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::where('id', decrypt($id))->first();
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string'],
            'level' => 'required|integer',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $user->syncRoles([$request->role]);
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::where('id', decrypt($id))->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}

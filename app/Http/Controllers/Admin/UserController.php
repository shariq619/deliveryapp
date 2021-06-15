<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $users = AdminModel::nosuperadmin()->get();
        // Sharing is caring
        View::share('total', $users->count());
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $users = AdminModel::nosuperadmin()->orderByDesc('id')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name',['super-admin'])->get();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = AdminModel::create($data);

        //AdminModel::$guard_name = 'admin';
        // Assign roles
        $roles = $request->input('roles');
        $user->assignRole($roles);

        return redirect()->back()->with('message', 'User Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $user = AdminModel::find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $user = AdminModel::find($id);
        $roles = Role::whereNotIn('name',['super-admin'])->get();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $user = AdminModel::find($id);
        $user->update($data);

        $roles = $request->input('roles');
        $user->syncRoles($roles);

        return redirect()->route('users.index')->with('message', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $role = AdminModel::find($id);
        $role->delete();
        return redirect()->route('users.index')->with('message', 'User Deleted Successfully');
    }
}

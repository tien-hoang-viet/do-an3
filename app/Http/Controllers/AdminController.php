<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('role')->get();
        return view('admin.pages.admin_manager.index', compact('admins'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('admin.master');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.admin_manager.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_slice($request->all(), 1);
        if (!isset($data['is_master'])) {
            $data['is_master'] = 0;
        } else {
            $data['is_master'] = 1;
            $data = array_reverse(array_slice(array_reverse($data), 1));
        }
        $data['password'] = bcrypt($data['password']);
        Admin::create($data);
        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $roleOfAdmin = $admin->role()->first();
        $permissionsOfRole = $roleOfAdmin->permissions()->pluck('permissions.id')->toArray();
        $permissions = Permission::all();
        $permissionGroups = $permissions->groupBy(function ($item, $key) {
            return $item['group'];
        });
        $roles = Role::all();
        // dd(ucwords(substr($permissions[0]->slug,  strpos($permissions[0]->slug, '-', 0) + 1, strlen($permissions[0]->slug))));
        return view('admin.pages.admin_manager.detail', compact('roleOfAdmin', 'admin', 'permissionsOfRole', 'permissionGroups', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = array_slice($request->all(), 1);
        $adminLoged = Auth::user()->id;
        if ($adminLoged == $admin->id) {
            toastr()->error("You cannot update yourself");
            return redirect(route('admin.index'));
        }
        if (!isset($data['is_master'])) {
            $data['is_master'] = 0;
        } else {
            $data['is_master'] = 1;
            $data = array_reverse(array_slice(array_reverse($data), 1));
        }
        $admin->update($data);
        $admin->save();
        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $adminLogin = Auth::id();
        if ($admin->id == $adminLogin) {
            return response()->json(['status' => false], 400);
        }
        $admin->delete();
        return response()->json(array('status' => true), 200);
    }

    public function login(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $admin = Auth::attempt($data);
        if ($admin) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login.index'));
    }

    public function getInfo()
    {
        $user = Auth::user();
        $role = Role::find($user->role_id);
        return response()->json(['user' => $user, 'role' => $role], 200);
    }
}

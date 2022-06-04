<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        Log::info($user);
        if ($user->is_master) {
            return true;
        };
        $role = $user->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('read-role', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    public function roleNav(Admin $user)
    {
        Log::info($user);
        if ($user->is_master) {
            return true;
        };
        $role = $user->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array(1, $permissions->pluck('group')->toArray())) {
            return true;
        };
        return false;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        Log::info($user);
        if ($user->is_master) {
            return true;
        };
        $role = $user->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('create-role', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user)
    {
        Log::info($user);
        if ($user->is_master) {
            return true;
        };
        $role = $user->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('update-role', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user)
    {
        Log::info($user);
        if ($user->is_master) {
            return true;
        };
        $role = $user->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('delete-role', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Role $role)
    {
        //
    }
}

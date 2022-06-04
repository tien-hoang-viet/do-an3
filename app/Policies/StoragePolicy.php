<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Storage;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class StoragePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        Log::info($admin);
        if ($admin->is_master) {
            return true;
        };
        $role = $admin->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('read-storage', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    public function nav(Admin $admin)
    {
        //admin
        Log::info($admin);
        if ($admin->is_master) {
            return true;
        };
        $role = $admin->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array(6, $permissions->pluck('group')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Storage $storage)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        Log::info($admin);
        if ($admin->is_master) {
            return true;
        };
        $role = $admin->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('create-storage', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin)
    {
        Log::info($admin);
        if ($admin->is_master) {
            return true;
        };
        $role = $admin->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('update-storage', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin)
    {
        Log::info($admin);
        if ($admin->is_master) {
            return true;
        };
        $role = $admin->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array('delete-storage', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Storage $storage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Storage $storage)
    {
        //
    }
}

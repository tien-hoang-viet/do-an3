<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class ProductPolicy
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
        if ($permissions && in_array('read-product', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    public function productNav(Admin $admin)
    {
        //admin
        Log::info($admin);
        if ($admin->is_master) {
            return true;
        };
        $role = $admin->role()->with('permissions')->first();
        $permissions = $role->permissions;
        if ($permissions && in_array(5, $permissions->pluck('group')->toArray())) {
            return true;
        };
        return false;
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Product $product)
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
        if ($permissions && in_array('create-product', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Product  $product
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
        if ($permissions && in_array('update-product', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Product  $product
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
        if ($permissions && in_array('delete-product', $permissions->pluck('slug')->toArray())) {
            return true;
        };
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Product $product)
    {
        //
    }
}

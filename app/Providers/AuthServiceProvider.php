<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('role-nav', '\App\Policies\RolePolicy@roleNav');
        Gate::define('read-role', '\App\Policies\RolePolicy@viewAny');
        Gate::define('create-role', '\App\Policies\RolePolicy@create');
        Gate::define('update-role', '\App\Policies\RolePolicy@update');
        Gate::define('delete-role', '\App\Policies\RolePolicy@delete');
        Gate::define('product-nav', '\App\Policies\ProductPolicy@productNav');
        Gate::define('read-product', '\App\Policies\ProductPolicy@viewAny');
        Gate::define('create-product', '\App\Policies\ProductPolicy@create');
        Gate::define('update-product', '\App\Policies\ProductPolicy@update');
        Gate::define('delete-product', '\App\Policies\ProductPolicy@delete');
        Gate::define('permission-nav', '\App\Policies\PermissionPolicy@permissionNav');
        Gate::define('read-permission', '\App\Policies\PermissionPolicy@viewAny');
        Gate::define('admin-nav', '\App\Policies\AdminPolicy@nav');
        Gate::define('read-admin', '\App\Policies\AdminPolicy@viewAny');
        Gate::define('create-admin', '\App\Policies\AdminPolicy@create');
        Gate::define('update-admin', '\App\Policies\AdminPolicy@update');
        Gate::define('delete-admin', '\App\Policies\AdminPolicy@delete');
        Gate::define('category-nav', '\App\Policies\CategoryPolicy@nav');
        Gate::define('read-category', '\App\Policies\CategoryPolicy@viewAny');
        Gate::define('create-category', '\App\Policies\CategoryPolicy@create');
        Gate::define('update-category', '\App\Policies\CategoryPolicy@update');
        Gate::define('delete-category', '\App\Policies\CategoryPolicy@delete');
        Gate::define('storage-nav', '\App\Policies\StoragePolicy@nav');
        Gate::define('read-storage', '\App\Policies\StoragePolicy@viewAny');
        Gate::define('create-storage', '\App\Policies\StoragePolicy@create');
        Gate::define('update-storage', '\App\Policies\StoragePolicy@update');
        Gate::define('delete-storage', '\App\Policies\StoragePolicy@delete');
        Gate::define('promotion-nav', '\App\Policies\PromotionPolicy@nav');
        Gate::define('read-promotion', '\App\Policies\PromotionPolicy@viewAny');
        Gate::define('create-promotion', '\App\Policies\PromotionPolicy@create');
        Gate::define('update-promotion', '\App\Policies\PromotionPolicy@update');
        Gate::define('delete-promotion', '\App\Policies\PromotionPolicy@delete');
        Gate::define('customer-nav', '\App\Policies\CustomerPolicy@nav');
        Gate::define('read-customer', '\App\Policies\CustomerPolicy@viewAny');
        Gate::define('create-customer', '\App\Policies\CustomerPolicy@create');
        Gate::define('update-customer', '\App\Policies\CustomerPolicy@update');
        Gate::define('delete-customer', '\App\Policies\CustomerPolicy@delete');
    }
}

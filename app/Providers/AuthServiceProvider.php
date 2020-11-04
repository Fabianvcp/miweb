<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Post;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class=>PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('Posts', function ($user, $post) {
//            return $user->id === $post->user_id || $user->hasPermissionTo('View posts');
//        });


        Gate::define('Posts', function ($user){
            if($user->hasPermissionto('View posts')){
                return true;
            }
            return false;
        });
        Gate::define('View_U', function ($user){
            if($user->hasPermissionto('View users')){
                return true;
            }
            return false;
        });
        Gate::define('Create_u', function ($user){
            if($user->hasPermissionto('Create users')){
                return true;
            }
            return false;
        });
        Gate::define('Role_v', function ($user){
            if($user->hasPermissionto('Create roles')){
                return true;
            }
            return false;
        });
        Gate::define('Role_c', function ($user){
            if($user->hasPermissionto('View roles')){
                return true;
            }
            return false;
        });
        Gate::define('permissions_c', function ($user){
            if($user->hasPermissionto('View permissions')){
                return true;
            }
            return false;
        });
    }
}

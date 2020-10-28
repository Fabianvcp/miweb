<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
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
    }
}

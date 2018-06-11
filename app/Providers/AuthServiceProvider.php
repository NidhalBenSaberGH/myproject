<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Generated reports
        Gate::define('generated_report_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Videos
        Gate::define('video_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Comments
        Gate::define('comment_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Views
        Gate::define('view_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Likes
        Gate::define('like_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Dislikes
        Gate::define('dislike_access', function ($user) {
                return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Comment_total
        Gate::define('comment_total_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Categories
        Gate::define('categories_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Channels
        Gate::define('channels_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Comment_likes
        Gate::define('comment_likes_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Comment_replies
        Gate::define('comment_replies_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
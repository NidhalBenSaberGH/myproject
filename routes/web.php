<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::get('/views', ['uses' => 'Admin\ViewsController@index', 'as' => 'views.index']);
    Route::get('/views/chart', ['uses' => 'Admin\ViewsController@chart', 'as' => 'views.chart']);
    Route::get('/views/chart2', ['uses' => 'Admin\ViewsController@chart2', 'as' => 'views.chart2']);

    Route::get('/likes', ['uses' => 'Admin\LikesController@index', 'as' =>'likes.index']);
    Route::get('/likes/chart', ['uses' => 'Admin\LikesController@chart', 'as' => 'likes.chart']);
    Route::get('/likes/chart2', ['uses' => 'Admin\LikesController@chart2', 'as' => 'likes.chart2']);

    Route::get('/dislikes', ['uses' => 'Admin\DislikesController@index', 'as' => 'dislikes.index']);
    Route::get('/comment_total', ['uses' => 'Admin\comment_totalController@index', 'as' => 'comment_total.index']);
    Route::get('/categories', ['uses' => 'Admin\categoriesController@index', 'as' => 'categories.index']);
    Route::get('/channels', ['uses' => 'Admin\channelsController@index', 'as' => 'channels.index']);

    Route::get('/comment_likes', ['uses' => 'Admin\comment_likesController@index', 'as' => 'comment_likes.index']);
    Route::get('/comment_replies', ['uses' => 'Admin\comment_repliesController@index', 'as' => 'comment_replies.index']);
 
});

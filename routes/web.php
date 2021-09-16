<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name('test.get.')->group(function() {
    Route::get('/',[TaskController::class, 'index'])->name('welcome');
    Route::get('/get-all-users',[TaskController::class, 'getAllUsers'])->name('user');
    Route::get('/get-user-with-country',[TaskController::class, 'getUserWithCountry'])->name('user.with.countries');
    Route::get('/get-all-countries',[TaskController::class, 'getAllCountry'])->name('country');
    Route::get('/active-users-company',[TaskController::class, 'activeUsersCountry'])->name('active.user.country');
    Route::get('/deleted-coment-post',[TaskController::class, 'deletedComenetPost'])->name('deleted.coment.post');
    Route::get('/post-with-not-deleted-comments',[TaskController::class, 'postWithNotDeletedComments'])->name('not-deleted-comment-post');
    Route::get('/get-user-with-roles',[TaskController::class, 'getUsersWithRoles'])->name('user.with.roles');
    Route::get('/get-role-with-users',[TaskController::class, 'getRolesWithUsers'])->name('role.with.users');
    Route::get('/get-users-with-active-roles',[TaskController::class, 'getUsersWithActiveRoles'])->name('users.with.active.roles');
    Route::get('/get-active-posts-from-all-countries',[TaskController::class, 'activePostsFromAllCountries'])->name('active.posts.from.countries');
    Route::get('/get-inactive-users-from-all-countries',[TaskController::class, 'inactiveUsersFromCountries'])->name('inactive.users.from.countries');
    Route::get('/get-post-with-country',[TaskController::class, 'postWithCountry'])->name('post.with.country');
    Route::get('/get-inactive-post-with-comments',[TaskController::class, 'inactivePostsWithComments'])->name('inactive.posts.with.comments');
    Route::get('/get-active-users-only-with-active-roels',[TaskController::class, 'activeUsersOnlyWithACtiveRoles'])->name('active.users.only.with.active.roles');

});

Route::prefix('theme/')->name('theme.')->group( function() {

    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
});


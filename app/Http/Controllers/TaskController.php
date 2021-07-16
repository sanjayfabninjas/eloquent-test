<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Country;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Role_user;
use App\Models\Role;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
      
        return view('welcome');      
    }

    // Get all users.
    public function getAllUsers(){
        
        // $users = User::chunk(2, function($users) {
        //     $result = $users->pluck('email', 'name');
        //     echo "<pre>";
        //     print_r($result);
        //     echo "</pre>";
        // });

        $users = User::get()->chunk(2)->flatten();
        foreach($users as $user){
            echo $user->name. '<br>';
        }
        
        
    }

    //Get users with countries
    public function getUserWithCountry() {
        
        $coutries = Country::with('users')->get();

        foreach($coutries as $coutry) {
            echo 'User: '  ;
                foreach($coutry->users as $user){
                    echo $user->name. ', ';
                }
            echo  ' Country: ' . $coutry->name . '<br>';
        }
    }

    // Get all countries.
    public function getAllCountry(){
        
        $countries = Country::chunk(2, function($countries) {
            
            $result = $countries->pluck('name','id');
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        
        });
    }
    
    // Get only countries who have active users. RE()
    public function activeUsersCountry() {
        
        $countries = Country::query()
                        ->whereHas('users', function($q) {
                            $q->where('is_active', 1);
                        })
                        ->get();

        foreach($countries as $country) {
            echo $country->name .'</br>';
        }

    }

    // Get only posts who have deleted comments RE ()
    public function deletedComenetPost(){
        
        $posts = Post::query()
                    ->whereHas('comments', function($q) {
                        $q->where('marked_as_deleted', 1);
                    })
                    ->get();
       
        foreach($posts as $post){
            echo 'Post: '. $post->title . '<br>';
        }
    }

    // Get all active posts with comments (comments which are not deleted) RE ()
    public function postWithNotDeletedComments(){
         
        $posts = Post::query()
                    ->where('is_active', 1)
                    ->with(['comments' => function($q) { 
                        $q->where('marked_as_deleted', 0);
                    }])
                    ->get();

        foreach($posts as $post){
            echo 'Active Post: '. $post->title. ' '; 
                foreach($post->comments as $comment) {
                    echo 'Comments: '. $comment->comment. '<br>';
                }
            echo '<br>';
        }
    }

    // Get users with roles RE (Done)
    public function getUsersWithRoles(){
      
        $users = User::with('roles')->get(); 
        
        foreach($users as $user){
           echo 'User: '. $user->name .' Roles: ';
           foreach($user->roles as $role){
                echo $role->name. ', ';
           }  
           echo '<br>';
        }
    }

    // Get roles with users RE (Done)
    public function getRolesWithUsers(){
      
        $roles = Role::with('users')->get();

        foreach($roles as $role){
            echo 'Role: '. $role->name .' Roles: ';
            foreach($role->users as $user){
                 echo $user->name. ', ';
            }  
            echo '<br>';
         }
    }

    // Get users who have active roles RE (WhereHas vs With) (Done)
    public function getUsersWithActiveRoles() {

        $users = User::query()
            ->whereHas('roles', function($q) {
                $q->where('is_Active', 1);
            })
            ->get();

        foreach($users as $user){
            
            echo 'User: '. $user->name . ', ' ;
            foreach($user->roles as $role){
                echo 'Roles: '. $role->is_Active;
            }
            echo '<br>';
        }
    }

    // Get active posts from all countries (Done)
    public function activePostsFromAllCountries() {
        
        $posts = Post::where('is_active', 1)->get();

        foreach($posts as $post){
           echo $post->title. '<br>';
        }
    }


    // Get inactive users from all countries (Done)
    public function inactiveUsersFromCountries() {
        
        $users = User::where('is_active', 0)->get();

        foreach($users as $user){
           echo $user->name. '<br>'; 
        }
    }

    // Get posts with country ()

    public function postWithCountry() {
        
        $posts = Post::with(['user' => function($q){
            $q->with('country');
        }])->get();
        
        foreach($posts as $post){
            echo 'Post: '. $post->title .'<br>';
                echo $post->user->country->name;
            echo '<br>';
        }
    }
    
    // Get inactive posts with comments
    public function inactivePostsWithComments() {
       
        $posts = Post::where('is_active', 0)->with('comments')->get();
        
        foreach($posts as $post){
            echo 'Inactive Post: '. $post->title .'<br> ';
            foreach($post->comments as $comment){
                echo 'Commetnts: '. $comment->comment. '<br> ';
            }
            echo '<br>';
        }
    }
    
    // Get active users only with active roles
    public function activeUsersOnlyWithACtiveRoles() {
        
        $users = User::query()
                    ->with(['roles' => function($q) {
                            $q->where('is_active', 1);
                    }])
                    ->wherehas('roles', function($q) {
                        $q->where('is_active', 1);
                    })
                    ->where('is_active', 1)
                    ->get();

        foreach($users as $user){
            echo 'Active user: '. $user->name. ' '. 'Role: ';
            foreach($user->roles as $role){
                echo  $role->name. ', ';
            }
            echo '<br>';
        }
    }
}

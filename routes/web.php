<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Role;
use App\Address;

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

// Route::get('/{id?}', function ($id=null) {
//     if($id == null)
//     return view('welcome');
//     //else
//    // echo $id;
// });
Route::get('/', function(){
    return view('welcome');
    
});
Route::get('/admin', 'AdminController@index')->middleware('IsAdmin');

// Route::get('/post', 'PostsController@index');
// Route::get('/post/{id}', 'PostsController@show');

//Route::resource('posts','PostsController');

// Route::get('/contact','PostsController@contact');
// Route::get('post/{id}/{name}/{password?}','PostsController@show_post');

// Route::get('/insert',function(){
//     DB::insert('insert into post (title, body) values(?, ?)',['title', 'body']);
// });

// Route::get('/show', function(){
//     $post = Post::all();
//     foreach($post as $posts){
//     echo $posts->title;
// }
// });

// Route::get('/find', function(){
//     $posts = Post::find(1);
//     return $posts->title;
// });

// Route::get('/findwhere', function(){
//     $posts = Post::where('title', 'title')->orderBy('id', 'desc')->skip(1)->take(1)->get();

//    echo ($posts);


// });

// //insert record


// Route::get('/insertdata',function(){

//     $posts = new Post;
//     $posts->title = "new title";
//     $posts->body = "new body";
//     $posts->save();
// });

// //update

// Route::get('/updatedata', function(){

//     $post = Post::find(1);
//     $post->title = 'updated title';
//     $post->body = 'updated body';
//     echo $post->save();
// });

// //create alternative


// Route::get('/create', function(){

//     Post::create(['title'=>'this is title', 'body'=>'this is body', 'is_admin'=>0]);
// });

// //update alternative

// Route::get('/update', function(){
//     echo Post::where('id', 1)->where('is_admin', 0)->update(['title'=> 'updated','body'=>'updated']);

// });

// //delete

// Route::get('/delete', function(){

//     Post::find(2)->delete();
// });

// //delete alternative

// Route::get('/deletedata', function(){

//     Post::destroy([4, 5]);
// });

// //softdelete

// Route::get('/softdelete',function(){
//     Post::find(6)->delete();
// });

// //read softdelete

// Route::get('readsoftdelete', function(){
//    return Post::onlyTrashed()->get();
// });

// //force delete

// Route::get('/forcedelete',function(){
//     Post::onlyTrashed()->where('id', '6')->forcedelete();
// });

// //restore softdelete

// Route::get('restore', function(){
//     return Post::onlyTrashed()->restore();
//  });

//  //1to1
//  Route::get('/user/{id}/post',function($id){
//     return User::find($id)->onepost;
//  });

//  //inverse 1 to 1

//   Route::get('/post/{id}/user',function($id){
//     return Post::find($id)->user;
//  });

//   //1 to M

//   Route::get('/user/{id}/posts',function($id){

//     $user = User::find($id);
//    // echo $user->posts->title;
//     foreach($user->posts as $posts){
//         echo $posts->title."<br>";
//     }

//  });

//  //M to M

//  Route::get('/user/{id}/role', function($id){

//     $user = User::find($id);
//     foreach($user->roles as $role){
//         echo $role->role;
//     }
 
   
//  });
//  //create data in 1 to 1 relationship
//  Route::get('/user/{id}/address', function($id){
//     $user = User::find($id);
//      $address = new Address(['name'=>'pakistan']);
//     $user->address()->save($address);
// });
// //update data in 1 to 1 relationship
// Route::get('/update/address', function(){
//     $addresses = Address::where('user_id', 1)->get();
//    // var_dump($addresses);
//     foreach($addresses as $address ){
//         $address->name = 'updated';
          
//     $address->save();
//     }

// });
// //delete data in 1 to 1 relationship
// Route::get('/delete/address', function(){
//     $user = User::find(1);
//     $user->address()->delete();
//     $user->save();
// }); 

//insert post 1toM relationship

// Route::get('/user/{id}/addpost', function($id){
//     $user = User::find($id);
//     $post =new Post(['title'=>'post title', 'body'=>'post body']);
//     $user->posts()->save($post);
// });

// //read post 1toM relationship

// Route::get('/user/{id}/post', function($id){
//     $user = User::find($id);
//     foreach($user->posts as $post){
//         echo $post."<br>";
//     }

// });
// //update post 1toM relationship
// Route::get('/updatepost/{post_id}/user/{user_id}', function($post_id, $user_id){
//     $user = User::findOrFail($user_id);
//     $user->posts()->whereId($post_id)->firstOrFail()->update(['title'=>'updated title', 'body'=>'updated body']);
// });
// //delete post 1toM relationship
// Route::get('deleteuser/{id}/posts', function($id){
//     $user = User::find($id);
//     $user->posts()->Forcedelete();

// });
//create role MtoM relationship
Route::get('/createuser/{id}/role',function($id){
    $user = User::find($id);
    $role = new Role(['role'=>'admin']);
    $user->roles()->save($role);
});
//read role MtoM relationship

Route::get('/readrole/user/{id}', function($id){
    $users = User::findOrFail($id);
    foreach($users->roles as $user){
        echo $user->role;
    }
});
//update role MtoM relationship
Route::get('/updaterole',function(){
    $users = User::find(2);
    if($users->has('roles')){
        foreach($users->roles as $user){
            if($user->role = 'admin'){
                $user->role = 'subscriber';
                $user->save();
            }
        }
    }

});
//delete role MtoM relationship
Route::get('deleterole',function(){
    $users = User::findOrFail(2);
    //$users->roles()->whereId(2)->delete();
    foreach($users->roles as $user){
        $user->whereId(2)->delete();
    }
});

//form crud
Route::resource('posts', 'PostsController');
Route::get('/abc/{id}/show/{name}',function($id, $name = "ali"){
    echo $id."<br>".$name;

})->name('myxyz');
Route::get('abc','PostsController@abc')->name('myabc');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactsController;

use App\Mail\Contacts;
use App\Traits\common;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('test',function(){
//     return ('welcome to our site');
// });

Route::get('addcar',[CarController::class,'create']);
Route::post('cars-data', [CarController::class,'store'])->name('cars-data');


Route::get('addnews',[NewsController::class,'create']);
Route::post('news-data', [NewsController::class,'store'])->name('news-data');

Route::get('cars',[CarController::class,'index'])->middleware('verified');
Route::get('editCar/{id}', [CarController::class,'edit']);
Route::put('updatecar/{id}', [CarController::class,'update'])->name('updatecar');

Route::get('news',[NewsController::class,'index']);
Route::get('editnews/{id}', [NewsController::class,'edit']);
Route::put('updatenews/{id}', [NewsController::class,'update'])->name('updatenews');



Route::get('Showcars/{id}', [CarController::class,'show'])->name('Showcars');
Route::get('deletecars/{id}', [CarController::class,'destroy']);

Route::get('shownews/{id}', [NewsController::class,'show'])->name('shownews');
Route::get('deletenews/{id}', [NewsController::class,'destroy']);

Route::get('trashedCar',[CarController::class,'trashed']);
Route::get('restore/{id}', [CarController::class,'restore']);
Route::get('delete/{id}', [CarController::class,'Delete']);



Route::get('trashedNew',[NewsController::class,'trashed']);
Route::get('restore/{id}', [NewsController::class,'restore']);
Route::get('delete/{id}', [NewsController::class,'Delete']);


Route::get('showupload',[ExampleController::class,'showupload']);
Route::post('uploadImages',[ExampleController::class,'uploadImages'])->name('uploadImages');



Route::get('blog',[ExampleController::class,'blog']);




// Route::get('home',[PostController::class,'index']);

Route::get('includes.explore',[PostController::class,'store']);
Route::get('Post',[PostController::class,'index']);
Route::get('addPost',[PostController::class,'create']);
Route::post('Posts-data', [PostController::class,'store'])->name('Posts-data');
Route::get('deletePost/{id}', [PostController::class,'destroy']);
Route::get('delete/{id}', [PostController::class,'Delete']);


Auth::routes(['verify'=>true]);

Route::get('session',[ExampleController::class,'mysession']);

Auth::routes();

Route::get('/home', [PostController::class, 'index'])->name('home');



 Route::get('/contacts', [ContactsController::class, 'index']);
 Route::post('/contactus', [ContactsController::class, 'SubmitContactForm'])->name('contactus');
 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('/contacts', [ContactsController::class, 'index']);
        Route::post('/contactus', [ContactsController::class, 'SubmitContactForm'])->name('contactus');

        Route::get('addcar', [CarController::class, 'create']);
        Route::post('cars-data', [CarController::class,'store'])->name('cars-data');
    });

// Route::post('/contactus', [ContactsController::class, 'show'])->name('contactus');

// Route::get('user/{name}',function($name){
//     return ('The User Name Is:' .$name);
// });
// // بيقبل قيمتين من اليوزير 

// Route::get('user/{name}/{age}',function($name ,$age){
//     return ('The User Name Is:' .$name  . ' and age is ' .$age);
// });

// لو عوزه احط قيمه اختياريه 
// Route::get('user/{name}/{age?}',function($name ,$age=0){
//     return ('The User Name Is:' .$name  . ' and age is ' .$age);
// });

//optional if 
// Route::get('user/{name}/{age?}',function($name ,$age=0){
//     if($age == 0){
//         return ('The User Name Is:' .$name);
//     }
//     else{
//         return ('The User Name Is:' .$name  . ' and age is ' .$age);

//     }
// });
//or 

// Route::get('user/{name}/{age?}',function($name ,$age=0){
//     $msg='The User Name Is:' . $name;
//     if($age == 0){
//         return $msg;
//     }
//     else{
//         $msg .= . ' and age is ' .$age;
//         return $msg;
//     }
// });

// or لو عوزين نقلل في شكل الكود

// Route::get ('user/{name}/{age?}',function($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// });


//regular Exprassion  عشان احدد شكل القيمه ال هتطبع 

// Route::get ('user/{name}/{age?}',function($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// })->where(['age'=> '[0-9]+']);


//public function whereNumber($parameters)

// Route::get ('user/{name}/{age?}',function($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// })->whereNumber(['age']);

//public function whereAlpha($parameters)


// Route::get ('user/{name}/{age?}',function($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// })->whereAlpha(['name']);

//compiasion between where

// Route::get ('user/{name}/{age?}',function($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// })->where(['name'=>'[a-zA-Z]+' ,'age'=> '[a-zA-Z0-9]+']);

//whereIN
// Route::get ('user/{name}/{age?}',function($name,$age=0){
//     $msg = 'the username is : ' . $name;
//     if($age > 0){
//         $msg .= ' and age is: ' . $age ;
//     }
//     return $msg ;
// })->whereIn('name',['Mahitab', 'taha']);


// Route::get ('About',function(){
       
//     return 'About page' ;
// });

// Route::get ('contact',function(){
       
//     return 'contact page' ;
// });

// //prefix group

// Route::prefix('Support')->group(function(){

//     Route::get ('/',function(){
       
//         return 'Support page' ;
//     });
//     Route::get ('Chat',function(){
       
//         return 'Chat page' ;
//     });
//     Route::get ('Call',function(){
//         return 'Call' ;
//     });
//     Route::get ('Ticket',function(){
       
//         return 'Ticket page' ;
//     });
// });
// Route::prefix('Training')->group(function(){

//     Route::get ('/',function(){
       
//         return 'HR page' ;
//     });
//     Route::get ('ICT',function(){
       
//         return 'ICT page' ;
//     });
//     Route::get ('Marketing ',function(){
       
//         return 'Marketing' ;
//     });
//     Route::get ('Logistics',function(){
       
//         return 'Logistics page' ;
//     });

// });

// //for redirection
// Route::fallback(function(){ 
//     return redirect('/') ;
// });

// Route::get ('cv',function(){
       
//     return view('cv') ;
// });
// Route::get ('login',function(){
       
//     return view('login') ;
// });


// Route::post ('receive',function(){ 
//     return 'Data received';
// })->name('receive');

// Route::get('test1',[ExampleController::class,'test1']);

//  Route::get ('addcar',function(){
       
//      return view('addcar') ;
//  });
//  Route::get ('cars-form',function(){
       
//     return view('cars-form') ;
// });
// Route::post ('receive',function(){ 
//     return 'Data received';
// })->name('received');


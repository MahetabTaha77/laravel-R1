<?php

use Illuminate\Support\Facades\Route;

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
Route::get('test',function(){
    return ('welcome to our site');
});
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

//prefix group

Route::prefix('product')->group(function(){

    Route::get ('/',function(){
       
        return 'product page' ;
    });
    Route::get ('laptop',function(){
       
        return 'laptop page' ;
    });
    Route::get ('pc',function(){
       
        return 'pc' ;
    });
    Route::get ('camera',function(){
       
        return 'camera page' ;
    });

});

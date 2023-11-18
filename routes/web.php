<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\carcontroller;



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


Route::get ('About',function(){
       
    return 'About page' ;
});

Route::get ('contact',function(){
       
    return 'contact page' ;
});

//prefix group

Route::prefix('Support')->group(function(){

    Route::get ('/',function(){
       
        return 'Support page' ;
    });
    Route::get ('Chat',function(){
       
        return 'Chat page' ;
    });
    Route::get ('Call',function(){
        return 'Call' ;
    });
    Route::get ('Ticket',function(){
       
        return 'Ticket page' ;
    });
});
Route::prefix('Training')->group(function(){

    Route::get ('/',function(){
       
        return 'HR page' ;
    });
    Route::get ('ICT',function(){
       
        return 'ICT page' ;
    });
    Route::get ('Marketing ',function(){
       
        return 'Marketing' ;
    });
    Route::get ('Logistics',function(){
       
        return 'Logistics page' ;
    });

});

//for redirection
Route::fallback(function(){ 
    return redirect('/') ;
});

Route::get ('cv',function(){
       
    return view('cv') ;
});
Route::get ('login',function(){
       
    return view('login') ;
});


Route::post ('receive',function(){ 
    return 'Data received';
})->name('receive');


Route::get('test1',[ExampleController::class,'test1']);

Route::get('addcar',[carcontroller::class,'index']);
Route::post('cars-form', [carcontroller::class, 'cars']);

// Route::get ('addcar',function(){
       
//     return view('addcar') ;
// });
// Route::post ('receive',function(){ 
//     return 'Data received';
// })->name('received');

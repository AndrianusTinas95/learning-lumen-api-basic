<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/foo', function () {
//     return 'Hallo, GET method';
// });

$router->post('/bar',function(){
    return 'Hello , POST method';
});

//basic route
$router->get('/user/{id}',function($id){
    return "user id = $id";
});

$router->get('/post/{pID}/comments/{cID}',function($pID,$cID){
    return "past id = $pID . comments id = $cID";
});

//opsional route parameter
$router->get('/optional[/{param}]',function($param =null){
    return "optional $param";
});

$router->get('profile',function(){
    return redirect(route('route.profile'));
});

// $router->get('/profile/tindev',['as'=>'route.profile',function(){
//     return "Route TinDev";
// }]);

// $router->group(['prefix'=>'admin','middleware'=>'auth'] , function () use($router) {
//     $router->get('home',function(){
//         return "Home admin";
//     });
//     $router->get('profile',function(){
//         return "Profile admin";
//     });
// });

$router->get('/admin/home',['middleware'=>'age',function(){
    return "Old Enough";
}]);
$router->get('/fail',function(){
    return "Not yet mature";
});

$router->get('/key','ExampleController@key');
$router->post('/foo', 'ExampleController@foo');
$router->get('/user/{id}','ExampleController@getUser');
$router->get('/post/cat1/{cat1}/cat2/{cat2}','ExampleController@getPost');
$router->get('/profile',['as'=>'profile','uses'=>'ExampleController@getProfile']);
$router->get('/profile/action',['as'=>'profile.action','uses'=>'ExampleController@getProfileAction']);
$router->get('/foo/bar',['uses'=>'ExampleController@fooBar']);
$router->post('/bar/foo',['uses'=>'ExampleController@fooBar']);

$router->post('/user/profile/req',['uses'=>'ExampleController@userProfile']);

$router->get('/response',['uses'=>'ExampleController@response']);


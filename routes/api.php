<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:api', 'prefix' => 'v1'], function ()
{

    /*
    |-----------------------------------------------------------------------
    | User Routes
    |-----------------------------------------------------------------------
    |
    */
    Route::group(['prefix' => 'user'], function ()
    {
        Route::get('/', function (Request $request)
        {
           return $request->user();
        });
        Route::get('/edit', function (Request $request)
        {
            $user = User::where('name', $request->name)->get();

            if ($user->count() <= 0) return 'Falha ao localizar usuário';

            return $user;
        });
    });
});

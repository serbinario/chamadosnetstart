<?php

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');
    });

    Route::group(['prefix' => 'serbinario', 'middleware' => 'auth', 'as' => 'serbinario.'], function () {
//    Route::get('login'  , ['as' => 'login', 'uses' => 'SecurityController@login']);
//    Route::get('logout'  , ['as' => 'logout', 'uses' => 'SecurityController@logout']);
//    Route::post('check'  , ['as' => 'check', 'uses' => 'SecurityController@check']);
//    Route::get('index'  , ['as' => 'index', 'middleware'=>'security:ROLE_ADMIN', 'uses' => 'DefaultController@index']);
//    Route::get('update2'  , ['as' => 'update2', 'middleware'=>'security:ROLE_ADMIN', 'uses' => 'DefaultController@update2']);

        Route::get('index'  , ['as' => 'index', 'uses' => 'DefaultController@index']);

        Route::group(['prefix' => 'chamado', 'as' => 'chamado.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'ChamadoController@index']);
            Route::post('grid', ['as' => 'grid', 'uses' => 'ChamadoController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'ChamadoController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ChamadoController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ChamadoController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ChamadoController@update']);
        });

        Route::group(['prefix' => 'lista', 'as' => 'lista.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'ListaController@index']);
            Route::post('grid', ['as' => 'grid', 'uses' => 'ListaController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'ListaController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ListaController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ListaController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'ListaController@update']);
        });
        
        Route::group(['prefix' => 'sublista', 'as' => 'sublista.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'SublistaController@index']);
            Route::post('grid', ['as' => 'grid', 'uses' => 'SublistaController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'SublistaController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'SublistaController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'SublistaController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'SublistaController@update']);
        });


        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'UserController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'UserController@update']);
        });

        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('index', ['as' => 'index', 'uses' => 'RoleController@index']);
            Route::get('grid', ['as' => 'grid', 'uses' => 'RoleController@grid']);
            Route::get('create', ['as' => 'create', 'uses' => 'RoleController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'RoleController@store']);
            Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'RoleController@edit']);
            Route::post('update/{id}', ['as' => 'update', 'uses' => 'RoleController@update']);
        });

        Route::group(['prefix' => 'graficos', 'as' => 'graficos.'], function () {
            Route::get('departamento', ['as' => 'departamento', 'uses' => 'GraficosController@departamento']);
            Route::post('departamentoAjax', ['as' => 'departamentoAjax', 'uses' => 'GraficosController@departamentoAjax']);
            Route::get('lista', ['as' => 'lista', 'uses' => 'GraficosController@lista']);
            Route::post('listaAjax', ['as' => 'listaAjax', 'uses' => 'GraficosController@listaAjax']);
            Route::post('graficDashboard', ['as' => 'graficDashboard', 'uses' => 'DefaultController@graficDashboard']);
            Route::get('bySecretaria', ['as' => 'bySecretaria', 'uses' => 'GraficosController@bySecretaria']);
            Route::post('graficoBySecretaria', ['as' => 'graficoBySecretaria', 'uses' => 'GraficosController@graficoBySecretaria']);
            Route::get('byTecnico', ['as' => 'byTecnico', 'uses' => 'GraficosController@byTecnico']);
            Route::post('graficoByTecnico', ['as' => 'graficoByTecnico', 'uses' => 'GraficosController@graficoByTecnico']);
        });

        Route::group(['prefix' => 'util', 'as' => 'util.'], function () {
            Route::post('search', ['as' => 'search', 'uses' => 'UtilController@search']);
            Route::post('select2', ['as' => 'select2', 'uses' => 'UtilController@queryByselect2']);
        });


//    Route::get('report/contratoAluno/{id}', ['as' => 'report.contratoAluno', 'uses' => 'ReportController@contratoAluno']);
//    Route::get('user/save/', ['as' => 'user.save', 'uses' => 'UserController@save']);
//    Route::Post('user/store/', ['as' => 'user.store', 'uses' => 'UserController@store']);
//    Route::Post('user/update/', ['as' => 'user.update', 'uses' => 'UserController@update']);
//    Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
//    Route::get('user/grid', ['as' => 'user.grid', 'uses' => 'UserController@grid']);
    });
});
<?php


    $s = 'public.';
    Route::get('/',         ['as' => $s . 'home',   'uses' => 'PagesController@getHome']);

    $s = 'social.';
    Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

    
    Route::group(['prefix' => 'home', 'middleware' => 'auth:admin'], function(){
        $a = 'home';
        Route::get('/', ['as' => 'home', 'uses' => 'UsuarioController@getHome']);    
    });

    Route::get('/home',['as' => 'home',   'uses' => 'UsuarioController@getHome']);


    Route::resource('usuarios', 'UsuarioController');
    Route::resource('roles', 'RolesController');
    Route::resource('permisos', 'PermisosController');
    Route::resource('menu', 'MenuController');
    Route::resource('cursos', 'CursosController');
    Route::resource('parametro', 'ParametroController');

    Route::get('/listaUsuarios', 'UsuarioController@listaUsuario')->name('datatable.listaUsuario');

    
    Route::group(['middleware' => 'auth:all'], function()
    {
        $a = 'authenticated.';
        Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
        Route::get('/activate/{token}', ['as' => $a . 'activate', 'uses' => 'ActivateController@activate']);
        Route::get('/activate', ['as' => $a . 'activation-resend', 'uses' => 'ActivateController@resend']);
        Route::get('not-activated', ['as' => 'not-activated', 'uses' => function () {
            return view('errors.not-activated');
        }]);

        Route::get('perfil', ['as' => 'perfil', 'uses' => function () {
            return view('pages.perfil');
        }]);

    });

Route::get('reporteria',  function () {
    return view('pages.reporteria.index');
});
Route::get('demoReport',  function () {
    return view('pages.reporteria.child.childReport');
});
    


Auth::routes(['login' => 'auth.login']);
Route::post('set_session', 'SessionController@createsession');


Route::post ( '/eliminarUsuario', 'UsuarioController@eliminar' );
Route::post ( '/eliminarRol', 'RolesController@eliminar' );
Route::post ( '/addRemovePermisos', 'PermisosController@addRemove' );
Route::post ( '/addRemoveAsistencia', 'CursosController@addRemove' );

Route::get ( '/getPermisoRol', 'PermisosController@getPermisoRol' );
Route::post ( '/updateMenu', 'MenuController@updateMenu' );
Route::post ( '/menuOrden', 'MenuController@menuOrden' );
Route::post ( '/createMenu', 'MenuController@createMenu' );
Route::post ( '/deleteMenu', 'MenuController@deleteMenu' );
Route::post ( '/eliminarCurso', 'CursosController@eliminar' );


Route::get ( '/inscripciones', 'CursosController@inscripciones' );
Route::get('cursos/inscripcion/{post}', 'CursosController@inscripcion')->name('inscripcion');
Route::post ( '/addInscripcion', 'CursosController@addInscripcion' )->name('addInscripcion');

Route::post ( '/crudEquipo', 'ParametroController@crudEquipo' )->name('crudEquipo');


Route::post ( '/crudAbout', 'ParametroController@crudAbout' )->name('crudAbout');
Route::post ( '/crudMinisterio', 'ParametroController@crudMinisterio' )->name('crudMinisterio');

Route::post ( '/eliminarEquipo', 'ParametroController@eliminarEquipo' )->name('eliminarEquipo');
Route::post ( '/eliminarAbout', 'ParametroController@eliminarAbout' )->name('eliminarAbout');
Route::post ( '/eliminarMinisterio', 'ParametroController@eliminarMinisterio' )->name('eliminarMinisterio');

Route::post ( '/enviarMensaje', 'PagesController@enviarMensaje' )->name('enviarMensaje');


Route::get ( '/asistencia', 'CursosController@asistencia' );

Route::get ( '/children', 'ChildrenController@index' );
Route::get('/listaChildren', 'ChildrenController@listaChildren')->name('datatable.listaChildren');

Route::post('/crudChild','ChildrenController@crudChild');
Route::get('/getChild','ChildrenController@getChild');
Route::post('/deleteChild','ChildrenController@deleteChild');



Route::get ( '/ChildAssistance', 'ChildAssistanceController@index' );
Route::get ( '/listaChildGrupo', 'ChildAssistanceController@asistencia' );

Route::get ( '/ChildMedicalControl', 'ChildMedicalController@index' );
Route::get ( '/CronogramaChild', 'CronogramaChildController@index' );


Route::get ( '/getCronograma', 'CronogramaChildController@getCronograma' );

Route::get ( '/tutores', 'TutoresController@index' );
Route::get ( '/listarTutores', 'TutoresController@listarTutores' );
Route::get('/getTutor','TutoresController@getTutor');
Route::post('/deleteTutor','TutoresController@deleteTutor');
Route::post('/crudTutor','TutoresController@crud');

Route::get ( '/listaGrupoTutor', 'TutoresController@listaGrupoTutor' );
Route::post('/deleteGrupoTutor','TutoresController@deleteGrupoTutor');




Route::get ( '/gruposChild', 'GruposCompChildController@index' );
Route::get ( '/listarCursos', 'GruposCompChildController@listarCursos' );
Route::post('/deleteGrupo','GruposCompChildController@deleteGrupo');
Route::get('/getGrupo','GruposCompChildController@getGrupo');
Route::post('/crudGrupo','GruposCompChildController@crud');


Route::get('homeCard', 'HomeCardController@index');
Route::get('/listarHomeCard', 'HomeCardController@listar');
Route::post('/crudCard','HomeCardController@crud');
Route::post('/deleteHomeCard','HomeCardController@delete');
Route::get('getPermisoByRol', 'HomeCardController@getPermisoByRol');
Route::post('/addRemoveCard','HomeCardController@addRemoveCard');
Route::post('/changeOrderCard','HomeCardController@changeOrderCard');

Route::get('/getCronogramasByCurso', 'CursosController@getCronogramas');
Route::post('/deleteCursoCronograma','CursosController@deleteCronograma');


Route::post('/saveCronogramaCurso','CursosController@saveCronograma');



Route::get ( '/CronogramaCurso', 'CronogramaCursoController@index' );
Route::get ( '/getCronogramaCursos', 'CronogramaCursoController@getCronograma' );
//Route::get ( '/asistenciaCurso', 'CronogramaCursoController@asistencia' );
Route::get('asistenciaCurso/{idCrono}', 'CronogramaCursoController@asistencia');

Route::post('/saveAsistenciaCurso','CronogramaCursoController@saveAsistencia');
Route::get('getAsistencia', 'CronogramaCursoController@getAsistencia');

Route::post ( '/crudHorario', 'ParametroController@crudHorario' )->name('crudHorario');

Route::post ( '/eliminarHorario', 'ParametroController@eliminarHorario' )->name('eliminarHorario');

Route::get('/listaGaleria', 'GaleriaController@listaGaleria')->name('datatable.listaGaleria');

Route::post('/uploadFileGaleria', 'GaleriaController@uploadFile');
Route::post('/eliminarImagen', 'GaleriaController@eliminarImagen');

Route::post ( '/crudEquconvenioipo', 'ParametroController@convenio' )->name('convenio');

Route::get('/allMaestros', 'CursosController@allMaestros')->name('datatable.allMaestros');
Route::post('/saveMaestro','CursosController@saveMaestro');
Route::post('/deleteMaestro','CursosController@deleteMaestro');
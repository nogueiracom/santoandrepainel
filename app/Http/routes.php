<?php
use App\Http\Middleware\Checkadmin;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Routes Estudos
Route::get('/clientes',	 'ClientesControlle	r@index');
Route::get('/clientes/novo', 'ClientesController@novo');
Route::get('/clientes/{cliente}/editar', 'ClientesController@editar');
Route::post('/clientes/salvar', 'ClientesController@salvar');
Route::patch('/clientes/{cliente}', 'ClientesController@atualizar');
Route::delete('/clientes/{cliente}', 'ClientesController@deletar');
Route::get('/usuarios', 'usuariodeController@index');
Route::post('/article/{id}/upload_images','vendor\backpack\crud\src\app\Http\Controllers\CrudFeatures\AjaxUploadImagesTrait@ajaxUploadImages');


//Verificando se está logado, e redirecionando para verificar qual página o cliente está cadastrado.
Route::group(['middleware' => ['auth']], function() {
	Route::get('/', function(){
		return redirect('/entrar');
	});
});
Route::auth();
Route::get('/entrar', 'DashboardController@index');




//Paginas Sidebar
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/documentos', 'Documentos@index');
Route::get('/fotos-da-obra', 'FotosObras@index');
Route::get('/fotos/{slug}', 'FotosObras@singleposts')->name('my_route_name');
Route::get('/comunicados', 'Comunicado@index');
Route::get('/chamados', 'ChamadoController@userChamados');
Route::get('chamados/{chamado_id}', 'ChamadoController@show');
Route::get('novo_chamado', 'ChamadoController@create');
Route::post('novo_chamado', 'ChamadoController@store');


Route::group(['middleware' => ['role:Admin']], function() {
	Route::get('admin/dashboard', 'DashboardController@admindashboard');
	Route::resource('/admin/users', 'UserController');
	Route::post('/comentario', 'ChamadoComentarioController@postComment');
  Route::get('/admin/chamados/', 'ChamadoController@index');
  Route::get('/admin/chamados/{chamado_id}', 'ChamadoController@showadmin');
  Route::post('/admin/chamados/{chamado_id}', 'ChamadoController@close');
	Route::get('/usuarios/informacoes', ['as'=>'userinfo.index','uses'=>'UserFormController@index']);
	Route::post('/usuarios/informacoes', ['as'=>'userinfo.cadastro','uses'=>'UserFormController@cadastro']);
});


//Route Criar Regras e adicionar Itens
Route::group(['middleware' => ['auth']], function() {
	Route::get('/admin/roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('/admin/roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('/admin/roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('/admin/roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('/admin/roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('/admin/roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('/admin/roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('/admin/itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	Route::get('/admin/itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	Route::post('/admin/itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	Route::get('/admin/itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	Route::get('/admin/itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	Route::patch('/admin/itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	Route::delete('/admin/itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);
});

//Criação de Páginas
Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
//Comunicados
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['auth'], 'namespace' => 'Admin'], function () {
    // Backpack\NewsCRUD
    CRUD::resource('comunicado', 'ComunicadoCrudController');
    CRUD::resource('comunicado-category', 'ComunicadoCategoryCrudController');
});

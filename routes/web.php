<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|  Route::group 
|  'prefix'    => //Pasta da View
|  'namespace' => //Pasta do Controller 
|
|
|
*/
Route::domain ('br946.teste.website/~tihubc44/suporte')->group(function($router){
  Route::get('/','Site\SiteController@Index')->name('index');
  Route::post('/',['as'=>'Site.addContatos',  'uses'=>'Site\SiteController@addContatos']);
  Route::post('/n',['as'=>'Site.addNewsletter','uses'=>'Site\SiteController@addNewsletter']);
  
   Route::get('/tw', function () {
    return redirect('https://get.teamviewer.com/6yhrjk4');
  });
});

Route::domain ('treinamento.wfweb.com.br')->group(function($router){
  //Route::resource('/wsdeniel','WSDenielController.php')->only(['store']);
  //return view('treinamento.index') ;
  //Route::get('{name?}','Treinamento\TreinamentoController@showView');
  Route::get('{name?}','Treinamento\TreinamentoController@index');


});
/*
Route::domain ('tw.tihub.com.br')->group(function($router){
  Route::get('/', function () {
    return redirect('https://get.teamviewer.com/6yhrjk4');
  }); 
});
*/

Route::domain('br946.teste.website/~tihubc44')->group(function($router) {

  Route::get('/deniel', function () {
    return 'Hello World';
  }); 
  //Route::post('/denielmonitoramento',['as'=>'Monitoramento.store','uses'=>'Deniel\MonitoramentoController@store', 'nocsrf' => true]);
  Route::post('/denielmonitoramento','Deniel\MonitoramentoController@store');
  Route::get('/denielmon','Deniel\MonitoramentoController@index');
   
  
 
  Auth::routes();
  Route::middleware(['auth'])->group(function () {

  
  
  /*
  |-------------
  | Dashboard
  |-------------
  */
  //Route::get('/index',      'HomeController@index')         ->name('index');
  Route::get('/load-events','HomeController@loadEventsUser')->name('routeLoadEventsUser');
  Route::get('/','HomeController@index')->name('index');
  
  Route::get('/home', 'HomeController@index')->name('index');
  Route::get('/teste',function(){
	  
	 return view('teste') ;
  });

  
  Route::get('/huggy/csvimport2',function(){
	  
	 return view('huggy/csvimport') ;
  });

  
  
  
  Route::get('/portalps',function(){
	 return view('portalps') ;
  });  
  
    Route::get('/wsdeniel','WSDenielController@index');
  /* 
  Route::get('{name?}','AdmireController@showView');
  Route::get('users','AdmireController@index');
  Route::post('users','AdmireController@store');
  */
  //Indicadores
  Route::get ('indicadores/suporte','Indicadores\IndicadoresSuporteController@Index')->name('Indicadores.Suporte');
  
  /* 
  |-------------
  | Funil Vendas
  |-------------
  */
  Route::get ('contatos/index',      ['as'=>'Contatos',          'uses'=>'Contatos\ContatosController@Index']);
  
  /*
  |-------------
  | Donwloads
  |-------------
  */
    Route::resource('downloads/versoes','Downloads\VersoesController');
    Route::resource('downloads/aplicativos','Downloads\AplicativosController');

  /* 
  |-------------
  | Funil Vendas
  |-------------
  */
    Route::get ('crm/index',      ['as'=>'FunilVendas',          'uses'=>'CRM\FunilVendasController@Index']);
    Route::post ('crm/addfase1',   ['as'=>'FunilVendas.addFase1', 'uses'=>'CRM\FunilVendasController@addFase1']);
    Route::get ('crm/create/{id}',  ['as'=>'FunilVendas.addFase2',   'uses'=>'CRM\FunilVendasController@addFase2']);
    Route::post('crm/update/{id}',['as'=>'FunilVendas.Atualizar','uses'=>'CRM\FunilVendasController@Atualizar']);
  
  /* 
  |-------------
  | Config
  |-------------
  */
  // Contratos
    Route::resource('config/contratos', 'Config\ContratoController');

  // Site
    Route::get ('config/site',              ['as'=>'Config.Site'                    ,'uses'=>'Config\SiteController@Index']); 
    Route::post('config/site/editServico',  ['as'=>'Config.Site.EditarServico'      ,'uses'=>'Config\SiteController@editServico']); 
    Route::post('config/site/addBlog',      ['as'=>'Config.Site.AdicionarBlog'      ,'uses'=>'Config\SiteController@addBlog']); 
    Route::post('config/site/delBlog',      ['as'=>'Config.Site.DeletarBlog'        ,'uses'=>'Config\SiteController@delBlog']); 
    Route::post('config/site/addLogo',      ['as'=>'Config.Site.AdicionarLogo'      ,'uses'=>'Config\SiteController@addLogo']); 
    Route::post('config/site/delLogo',      ['as'=>'Config.Site.DeletarLogo'        ,'uses'=>'Config\SiteController@delLogo']);  
    Route::post('config/site/addDepoimento',['as'=>'Config.Site.AdicionarDepoimento','uses'=>'Config\SiteController@addDepoimento']); 
    Route::post('config/site/delDepoimento',['as'=>'Config.Site.DeletarDepoimento'  ,'uses'=>'Config\SiteController@delDepoimento']);  

  /* 
  |-------------
  | Huggy
  |-------------
  */
    Route::resource('huggy/atendimentos',  'Huggy\HuggyAtendimentosClientesController')->only(['index','store','destroy']);
Route::get('huggy/csvimport', 'Huggy\HuggyCsvImportController@importExportView')->name('import.export.view');

Route::post('import-file', 'Huggy\HuggyCsvImportController@importFile')->name('import.file');

Route::get('export-file/{type}', 'Huggy\HuggyCsvImportController@exportFile')->name('export.file');
	
	/*
    Route::get     ('huggy/csvimport',     'Huggy\HuggyCsvImportController@getImport')->name('csvimport');
    Route::post    ('huggy/import_parse',  'Huggy\HuggyCsvImportController@parseImport')->name('import_parse');
    Route::post    ('huggy/import_process','Huggy\HuggyCsvImportController@processImport')->name('import_process');	
	*/
	
  /* 
  |-------------
  | Inovafarma
  |-------------
  */
    Route::resource('inovafarma/chamados','Inovafarma\ChamadosController')->names(['index' => 'inovafarma.chamados']);
    Route::resource('inovafarma/erroversoes','Inovafarma\ErroVersoesController')->names(['index' => 'inovafarma.erroversoes']);
    Route::resource('inovafarma/scripts','Inovafarma\ScriptsController')->names(['index' => 'inovafarma.scripts']);
  /* 
  |-------------
  | Calendario
  |-------------
  */ 
   Route::get   ('calendario/index',         'Calendario\FullCalendarController@index')->name('index');
   Route::get   ('calendario/load-events',   'Calendario\EventController@loadEvents')  ->name('routeLoadEvents');
   Route::put   ('calendario/event-update',  'Calendario\EventController@update')      ->name('routeEventUpdate');
   Route::post  ('calendario/event-store',   'Calendario\EventController@store')       ->name('routeEventStore');
   Route::delete('calendario/event-destroy', 'Calendario\EventController@destroy')     ->name('routeEventDelete');
  
  
  /**
   * Rotas para Eventos Rápidos
   */
  Route::delete('calendario/fast-event-destroy', 'Calendario\FastEventController@destroy')->name('routeFastEventDelete');
  
  Route::put('calendario/fast-event-update', 'Calendario\FastEventController@update')->name('routeFastEventUpdate');
  
  Route::post('calendario/fast-event-store', 'Calendario\FastEventController@store')->name('routeFastEventStore');
    
    
    
    
    
  
  Route::resource('Projetos', 'Projetos\ProjetoController');
  Route::get('/projeto/pdf', ['as'=>'Projetos.pdf','uses'=>'Projetos\ProjetoController@geraPdf']);
  Route::get('/projeto/proposta/{id}', ['as'=>'Projetos.proposta','uses'=>'Projetos\ProjetoController@geraProposta']);
  
    
  
  
  Route::resource('Links','LinkController'); 
    
    
    
    
    
    
    
    
    
    
   /* 
  |-------------
  | Cadastros
  |-------------
  */
  // Clientes
   Route::get ('/cadastros/clientes',               ['as'=>'Cadastros.Clientes',          'uses'=>'Cadastros\ClienteController@Index']);
   Route::get ('/cadastros/clientes/novo',          ['as'=>'Cadastros.Clientes.Novo',     'uses'=>'Cadastros\ClienteController@Novo']);
   Route::post('/cadastros/clientes/salvar',        ['as'=>'Cadastros.Clientes.Salvar',   'uses'=>'Cadastros\ClienteController@Salvar']);
   Route::get ('/cadastros/clientes/editar/{id}',   ['as'=>'Cadastros.Clientes.Editar',   'uses'=>'Cadastros\ClienteController@Editar']);
   Route::post('/cadastros/clientes/atualizar/{id}',['as'=>'Cadastros.Clientes.Atualizar','uses'=>'Cadastros\ClienteController@Atualizar']);
   Route::get ('/cadastros/clientes/busca_cep',     ['as'=>'Cadastros.Clientes.BuscaCep' ,'uses'=>'Cadastros\ClienteController@BuscaCep']);
   Route::post('/cadastros/clientes/busca_cep',     ['as'=>'Cadastros.Clientes.BuscaCep' ,'uses'=>'Cadastros\ClienteController@BuscaCep']);
  
   //Route::resource('projetos','Projetos\ProjetoController');
  
  
  
   
  
  
  });

});

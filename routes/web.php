 <?php

 use App\Http\Controllers\Diagnostik\DiagnostikController;
 use App\Http\Controllers\EntretientDiagController;
 use App\Http\Controllers\Users\UsersController;
 use Illuminate\Support\Facades\Auth;
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
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'Session','namespace'=>'Session','as'=>'session.'], function () {
    Route::post('/login', 'SessionController@login')->name('connexion');
});

Route::group(['prefix'=>'entretient','as'=>'entretient.'], function () {
    Route::get('/create/{matricule?}','EntretientDiagController@create')->name('create');
    Route::get('/msg_profile','EntretientDiagController@msg_profile')->name('msg_profile');
    Route::get('/suivie','EntretientDiagController@index')->name('index');
    Route::post('/store',[EntretientDiagController::class ,'store'])->name('store');
    Route::get('/export','EntretientDiagController@export')->name('export');
    Route::get('/loadalldemandeur','EntretientDiagController@loadAllDemandeur')->name('loadalldemandeur');
});

Route::group(['prefix'=>'verif','namespace'=>'Verif','as'=>'verif.'], function () {
    Route::get('/aejentretien/{matricule?}','VerifierController@verifAejEntretien')->name('aejentretien');
});

Route::group(['prefix'=>'Roles','namespace'=>'Roles','as'=>'roles.'], function () {
    Route::get('/', 'RoleController@index')->name('index');
    Route::post('/store', 'RoleController@store')->name('store');
    Route::delete('/destroy', 'RoleController@destroy')->name('destroy');
    Route::put('/update', 'RoleController@update')->name('update');
});

Route::group(['prefix' => 'chefagence', 'namespace' => 'Chefagence', 'as' => 'chefagence.'], function () {
    Route::get('/entretient','ChefagenceController@entretientdiag')->name('entretientdiag');
    Route::post('/entretient/export','ChefagenceController@exportFilterEntretient')->name('exportFilterEntretient');

    Route::get('/rencontre1', 'ChefagenceController@rencontre1')->name('rencontre1');
    Route::post('/rencontre1/export','ChefagenceController@exportFilter')->name('exportFilter'); // chefagence.exportFilter
    // chefagence.exportFilter

    Route::get('/getagencerenct1', 'ChefagenceController@getAgenceRenct1')->name('getagencerenct1');
    Route::get('/rencontre2', 'ChefagenceController@rencontre2')->name('rencontre2');
    Route::get('/getagencerenct2', 'ChefagenceController@getAgenceRenct2')->name('getagencerenct2');
    Route::get('/rencontre3', 'ChefagenceController@rencontre3')->name('rencontre3');
    Route::get('/getagencerenct3', 'ChefagenceController@getAgenceRenct3')->name('getagencerenct3');
    Route::get('/rencontre4', 'ChefagenceController@rencontre4')->name('rencontre4');
    Route::get('/getagencerenct4', 'ChefagenceController@getAgenceRenct4')->name('getagencerenct4');
    Route::get('/rencontre5', 'ChefagenceController@rencontre5')->name('rencontre5');
    Route::get('/getagencerenct5', 'ChefagenceController@getAgenceRenct5')->name('getagencerenct5');
    Route::get('/filter', 'ChefagenceController@filter')->name('filter');
    Route::get('/filter_entretient', 'ChefagenceController@filter_entretient')->name('filter_entretient');
    Route::get('/details/demandeur/{id?}', 'ChefagenceController@detailDemandeur')->name('detaildemandeur');
});

//diagnostik.mes_suivies
Route::group(['prefix'=>'Diagnostik','namespace'=>'Diagnostik','as'=>'diagnostik.'], function () {

    Route::get('/', 'DiagnostikController@index')->name('index');
    Route::post('/autrerdv','DiagnostikController@autrerdv')->name('autrerdv');

    // tous les suivies ici
    Route::get('/getRec1', [DiagnostikController::class,'getRec1'])->name('getrec1');
    Route::get('/getRec2', [DiagnostikController::class,'getRec2'])->name('getrec2');
    Route::get('/getRec3', [DiagnostikController::class,'getRec3'])->name('getrec3');
    Route::get('/getRec4', [DiagnostikController::class,'getRec4'])->name('getrec4');
    Route::get('/getRec5', [DiagnostikController::class,'getRec5'])->name('getrec5');
    Route::get('/getRec6', [DiagnostikController::class,'listesuivi'])->name('listsuivi');

    // la route modification

    Route::get('/modif/{matricule?}', [DiagnostikController::class,'modif'])->name('modif');
    Route::post('/update/demandeur', [DiagnostikController::class,'update_demandeur'])->name('updatedemandeur');

    // route d'exportation in excell  {{route('diagnostik.export_rc1)}}
    Route::get('/export/recontre1','DiagnostikController@exportRencontre1')->name('export_rc1');
    Route::get('/export/recontre2','DiagnostikController@exportRencontre2')->name('export_rc2');
    Route::get('/export/recontre3','DiagnostikController@exportRencontre3')->name('export_rc3');
    Route::get('/export/recontre4','DiagnostikController@exportRencontre4')->name('export_rc4');
    Route::get('/export/recontre5','DiagnostikController@exportRencontre5')->name('export_rc5');

    Route::get('/create/{matriculeaej}', [DiagnostikController::class,'create'])->name('create');
    Route::post('/store',[DiagnostikController::class,'store'])->name('store');
    Route::delete('/destroy/', 'DiagnostikController@destroy')->name('destroy');
    Route::get('/mes_suivies', 'DiagnostikController@mes_suivies')->name('mes_suivies');
    Route::get('/mes_rencontres', 'DiagnostikController@liste')->name('mes_rencontres');
    Route::put('/update/{id}', 'DiagnostikController@update')->name('umes_rencontrespdate');
    Route::get('/diagnos','DiagnostikController@diagnos')->name('diagnos');///autocomSpecialite autocomNiveauEtude
    Route::post('autocomville', 'DiagnostikController@autocomVille')->name('autocomville');
    Route::post('/store1to2rencontre', [DiagnostikController::class, 'store1to2rencontre'])->name('store1to2rencontre');
    Route::post('/store2to3rencontre', 'DiagnostikController@store2to3rencontre')->name('store2to3rencontre');
    Route::post('autocomspecialite', 'DiagnostikController@autocomSpecialite')->name('autocomspecialite');
    Route::post('autocomniveautude', 'DiagnostikController@autocomNiveauEtude')->name('autocomniveautude');
    Route::get('datatable-attente-diagnostic', [DiagnostikController::class,'listeentretient'])->name('datatable-attente-diagnostic');
    Route::get('liste-attente-diagnostic', [DiagnostikController::class,'index'])->name('liste-attente-diagnostic');
    Route::post('/update-terminer', [DiagnostikController::class,'updateTerminer'])->name('updateterminer');

});

 Route::get('/api', [DiagnostikController::class,'apiGetMatricule'])->name('api');

Route::group(['prefix' => 'users','namespace'=>'Users', 'as' => 'users.'], function () {


    Route::post('autocomplete', 'AgenceController@autocomplete')->name('autocomplete');
    Route::get('/agence', 'AgenceController@index')->name('agenceindex');
    Route::post('/agence/store', 'AgenceController@store')->name('agencestore');
    Route::delete('/agence/destroy', 'AgenceController@destroy')->name('agencedestroy');
    Route::put('/agence/update', 'AgenceController@update')->name('agenceupdate');

    Route::get('/', 'UsersController@index')->name('index');
    Route::get('/create', 'UsersController@create')->name('create');
    Route::post('/store', 'UsersController@store')->name('store');
    Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
    // Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
    Route::get('/{id}/passwordreset', 'UsersController@passwordreset')->name('passwordReset');
    Route::put('/update', 'UsersController@update')->name('update');
    Route::get('/{id}/view', 'UsersController@show')->name('view');
    //Route::get('/{id}/view', 'UsersController@show')->name('view');
    Route::post('/delete', 'UsersController@delete')->name('delete');
    Route::delete('/destroy', 'UsersController@destroy')->name('destroy');
    Route::get('/{id}/login-as', 'UsersController@loginAs')->name('login-as');
    Route::get('/logout-as', 'UsersController@logoutAs')->name('logout-as');
    Route::get('/disabled', 'UsersController@disabledUsers')->name('disabled');
    Route::get('/deleted', 'UsersController@deletedUsers')->name('deleted');
    Route::get('/activeTable', 'UsersController@activeUsersTable')->name('activeUsersTable');
    Route::get('/disabledTable', 'UsersController@disabledUsersTable')->name('disabledUsersTable');
    Route::get('/deletedTable', 'UsersController@deletedUsersTable')->name('deletedUsersTable');

    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');

    /* Users's Clients */
    Route::get('/manage-clients', 'UsersController@myClients')->name('myClients');
    Route::get('/manage-clients-table', 'UsersController@myClientsTable')->name('myClientsTable');
    Route::get('/manage-disabled-clients', 'UsersController@myDisabledClients')->name('myDisabledClients');
    Route::get('/manage-deleted-clients', 'UsersController@myDeletedClients')->name('myDeletedClients');
    Route::get('/manage-disabled-clients-table', 'UsersController@myDisabledClientsTable')->name('myDisabledClientsTable');
    Route::get('/manage-deleted-clients-table', 'UsersController@myDeletedClientsTable')->name('myDeletedClientsTable');

    /* Agency */
    Route::get('/agencies-clients', 'UsersController@agenciesClients')->name('agenciesClients');
    Route::get('/agencies-clients-table', 'UsersController@agenciesClientsTable')->name('agenciesClientsTable');
});

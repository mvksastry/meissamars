<?php


use Illuminate\Support\Facades\Route;

// All roles
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;

//kanban
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\KanbanBoardsController;
use App\Http\Controllers\KanbanCardsController;

use App\Http\Controllers\EventController;

use App\Http\Controllers\CalendarController;

//-------------------------------------------------------//
// PI and Manager specific
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\IaecProjectSubmissionController;

// Manager specific
use App\Http\Controllers\ProjectsManagerController;
use App\Http\Controllers\UsageApprovalController;

// Super Admin and Manager specific
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\BillingController;
use App\Http\Controllers\StrainManagementController;

use App\Http\Controllers\AssignSlotsController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\ReshuffleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomsnRacksController;
use App\Http\Controllers\VetController;
use App\Http\Controllers\FacilityHelpController;



//livewire - Facility Management
use App\Livewire\Occupancy;
use App\Livewire\Reorganize;
use App\Livewire\CompleteAllottment;

//Breeding - Routes
use App\Http\Controllers\Breeding\BreedingHomeController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';

Route::get('/home/passwordReset', [
  'middleware'  => ['auth', 'verified'],
  'uses' => 'App\Http\Controllers\HomeController@passwordReset'
])->name('home/passwordReset');

Route::post('/home/pwupdate', [
  'middleware'  => ['auth', 'verified'],
  'uses' => 'App\Http\Controllers\HomeController@updatePassword'
])->name('home.pwupdate');
    
    
    
    
    
    
Route::middleware(['auth','verified'])->group(function() {    

    //------ home routes with checks ------//
    Route::get('/home', [
        //'middleware'  => ['auth', 'verified'],
        'uses' => 'App\Http\Controllers\HomeController@index'
    ])->name('home');
    // -------------- //    

    //Dashboard controller
    Route::resource('kanban', KanbanController::class);

		Route::resource('calendar', CalendarController::class);
		Route::post('calendar_mass_destroy', ['uses' => 'App\Http\Controllers\CalendarController@massDestroy', 'as' => 'calendar.mass_destroy']);

		//Kanban Boards routes
		Route::resource('kanban-boards', KanbanBoardsController::class);	
		Route::post('kanbanboards_mass_destroy', ['uses' => 'App\Http\Controllers\KanbanBoardsController@massDestroy', 'as' => 'kanban-boards.mass_destroy']);

		//Kanban Cards routes
		Route::resource('kanban-cards', KanbanCardsController::class);	
		Route::post('kanbancards_mass_destroy', ['uses' => 'App\Http\Controllers\KanbanCardsController@massDestroy', 'as' => 'kanban-cards.mass_destroy']);

		//events routes
		Route::resource('events', EventController::class);	
		Route::post('events_mass_destroy', ['uses' => 'App\Http\Controllers\EventController@massDestroy', 'as' => 'events.mass_destroy']);

    //Profile routes
    Route::resource('/profile', ProfileController::class);
    


    //-- PI specific : Projects routes
    Route::resource('/projects', ProjectsController::class);   
    
    //-- PI & Manager specific : IAEC Project submission route
    Route::post('/post-iaec-project', IaecProjectSubmissionController::class);











    
    //-- Manager specific : Projects routes
    Route::get('/projectsmanager/{id}/submitted', [ProjectsManagerController::class, 'submitted'])->name('projectsmanager.submitted');
    //Route::post('projectsmanager/{id}',['as'=>'projectsmanager.update','uses'=>'ProjectsManagerController@update']);
    Route::resource('/projectsmanager', ProjectsManagerController::class);
    Route::resource('/usageapprovals', UsageApprovalController::class);    
    
    
    Route::resource('/bhome', BreedingHomeController::class);   




    //-- Manager: Routes for Facility
    Route::post('strains/updatestatus', [StrainManagementController::class, 'updatestatus'])->name('strains.updatestatus');
    Route::get('strains/changestatus', [StrainManagementController::class, 'changestatus'])->name('strains.changestatus');
    Route::resource('/strains', StrainManagementController::class);
    
    Route::resource('/facility', FacilityController::class);
    Route::resource('/building', BuildingController::class);
    Route::resource('/floor', FloorController::class);
    Route::resource('/room', RoomController::class);
    Route::resource('/rack', RackController::class);
    Route::resource('/roomsnracks', RoomsnRacksController::class);
    Route::resource('/assignslots', AssignSlotsController::class);

    Route::post('/reshuffle/cageUpdate', [ReshuffleController::class, 'cageUpdate']);
    Route::get('/reshuffle/fetchCages', [ReshuffleController::class, 'fetchCages']);
    Route::get('/reshuffle/fetchRacks', [ReshuffleController::class, 'fetchRacks']);
    Route::resource('/reshuffle', ReshuffleController::class);

    Route::resource('/infrastructure', InfrastructureController::class);
    Route::resource('/maintenance', MaintenanceController::class);
    
    //billing
    Route::post('billing/setperdiem', [BillingController::class, 'setperdiem'])->name('billing.setperdiem');
    Route::get('billing/perdiem', [BillingController::class, 'perdiem'])->name('billing.perdiem');
    Route::resource('/billing', BillingController::class);   

    // -- Livewire Manager -- //
    Route::get('reorganize', Reorganize::class);
    Route::get('occupancy', Occupancy::class);
    Route::get('comp-allot', CompleteAllottment::class);







    //-- Super admin and Manager specific routes    
		//Users routes
		Route::resource('users', UserController::class);	
		Route::post('users_mass_destroy', ['uses' => 'App\Http\Controllers\UserController@massDestroy', 'as' => 'users.mass_destroy']);

		//roles routes
		Route::resource('roles', RoleController::class);	
		Route::post('roles_mass_destroy', ['uses' => 'App\Http\Controllers\RoleController@massDestroy', 'as' => 'roles.mass_destroy']);

		//permissions routes
		Route::resource('permissions', PermissionController::class);	
		Route::post('permissions_mass_destroy', ['uses' => 'App\Http\Controllers\PermissionController@massDestroy', 'as' => 'permissions.mass_destroy']);
    
    







        
}); // end of auth and verified middle check for all routes
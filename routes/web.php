<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\RegisterController;
use app\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\eventManagerController;
use App\Http\Controllers\eventsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [eventsController::class, 'getDataEvent'])->name('EventRegister');
Route::get('EventData/{id}', [eventsController::class, 'EventData'])->name('EventData');
Route::POST('CreateAttendee', [eventsController::class, 'CreateAttendee'])->name('CreateAttendee');
Route::get('ListAttendee', [eventsController::class, 'ListAttendee'])->name('ListAttendee');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=> ['role:admin']], function(){
    Route::get('/admin', function () {
        return view('admin.dashboard');
        

    });
    Route::get('admin/ListEventManger', [eventManagerController::class, 'ListEventManger'])->name('admin.ListEventManger');
    Route::post('admin/addEventManger', [eventManagerController::class, 'CreateEventManager'])->name('admin.CreateEventManager');
    Route::get('admin/EditEventManger/{id}', [eventManagerController::class, 'EditEventManger'])->name('admin.EditEventManger');
    Route::post('admin/UpdateEventManger', [eventManagerController::class, 'UpdateEventManger'])->name('admin.UpdateEventManger');
    Route::get('admin/DeleteEventManger/{id}', [eventManagerController::class, 'DeleteEventManger'])->name('admin.DeleteEventManger');

    Route::get('admin/ListEvent/{lang?}', [eventsController::class, 'ListEvent'])->name('admin.ListEvent');
    Route::post('admin/addEvent', [eventsController::class, 'CreateEvent'])->name('admin.CreateEvent');
    Route::get('admin/EditEvent/{id}', [eventsController::class, 'EditEvent'])->name('admin.EditEvent');
    Route::post('admin/UpdateEvent', [eventsController::class, 'UpdateEvent'])->name('admin.UpdateEvent');
    Route::get('admin/DeleteEvent/{id}', [eventsController::class, 'DeleteEvent'])->name('admin.DeleteEvent');

    
});

Route::group(['middleware'=> ['role:event manager']], function(){
    Route::get('/manager', function () {
        return view('event_manager.dashboard');
    });
    Route::get('/ListEvent', [eventsController::class, 'ListEvent'])->name('ListEvent');
    Route::post('/addEvent', [eventsController::class, 'CreateEvent'])->name('CreateEvent');
    Route::get('/EditEvent/{id}', [eventsController::class, 'EditEvent'])->name('EditEvent');
    Route::post('/UpdateEvent', [eventsController::class, 'UpdateEvent'])->name('UpdateEvent');
    Route::get('/DeleteEvent/{id}', [eventsController::class, 'DeleteEvent'])->name('DeleteEvent');

});
<?php

use App\Http\Controllers\AdminComposeTow;
use App\Http\Controllers\AdminComposoFourController;
use App\Http\Controllers\AdminComposoThreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TorsadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCoupeOneController;
use App\Http\Controllers\AdminLphunkController;
use App\Http\Controllers\AdminTorsadoController;
use App\Http\Controllers\ComposeThreeComponetsController;
use App\Http\Controllers\ComposeTowComponetsController;
use App\Http\Controllers\ComposoFourController;
use App\Http\Controllers\CoupeOneController;
use App\Http\Controllers\LphunkComponetsController;
use App\Http\Controllers\MachineEntryController;
use App\Http\Middleware\Admin;
use App\Models\ComposeThree;
use App\Models\ComposoFourComponets;
use App\Models\MachineEntry;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
Route::get('/admin/dashboard',[HomeController::class,'index'])
->middleware(['auth','admin'])
->name('admin.dashboard');
Route::get('/admin/create',[AdminController::class,'create'])

// Route for showing the form to create a new machine entry
->middleware(['auth','admin'])
->name('admin.create');
Route::post('/admin/store',[AdminController::class,'store'])
->middleware(['auth','admin'])
->name('machines.store');
Route::get('/admin/sertissage',[AdminController::class,'index'])
->middleware(['auth','admin'])
->name('admin.sertissage');
// Route for showing the form to create a sertissages
Route::get('/sertissage/create',[MachineEntryController::class,'create'])
->middleware(['auth'])
->name('sertissage.create');
Route::post('/sertissage/store',[MachineEntryController::class,'store'])
->middleware(['auth'])
->name('sertissage.store');
// Route for showing the form to create a Torsado
Route::get('/torsado/create/user',[TorsadoController::class,'create'])
->middleware(['auth'])
->name('add.create');
Route::post('/torsado/store/user',[TorsadoController::class,'storedata'])
->middleware(['auth'])
->name('userto.storedata');
//create torsado by admin
Route::get('/torsado/create',[AdminTorsadoController::class,'create'])
->middleware(['auth','admin'])
->name('torsado.create');
Route::post('/torsado/store',[AdminTorsadoController::class,'store'])
->middleware(['auth','admin'])
->name('torsado.store');
Route::get('/admin/torsado/index',[AdminTorsadoController::class,'index'])
->middleware(['auth','admin'])
->name('admin.torsado');
//get machines by  date
Route::get('/machines-by-date', function (Request $request) {
    $date = $request->query('date');
    $machines = MachineEntry::where('date', $date)->get();
    return view('sertissages.machinebydate', compact('machines', 'date'));
})->name('machines.by.date');
//Create New LP Hunk and stor it
Route::get('/admin/lphunk/create',[AdminLphunkController::class,'create'])
->middleware(['auth','admin'])
->name('lphunk.create');
Route::post('/admin/lphunk/store',[AdminLphunkController::class,'store'])
->middleware(['auth','admin'])
->name('lphunk.store');
//Get all Lp Hunk
Route::get('/admin/lphunk/index',[AdminLphunkController::class,'index'])
->middleware(['auth','admin'])
->name('admin.lphunk');
// Create new lP Hunk Compoents by User
Route::get('/lphunkuser/create',[LphunkComponetsController::class,'create'])
->middleware(['auth'])
->name('lphunkuser.create');
Route::post('/lphunkuser/store',[LphunkComponetsController::class,'store'])
->middleware(['auth'])
->name('lphunkuser.store');
//Create new composetwo by admin
Route::get('/admin/composetwo/create',[AdminComposeTow::class,'create'])
->middleware(['auth','admin'])
->name('composetwo.create');
Route::post('/admin/composetwo/store',[AdminComposeTow::class,'store'])
->middleware(['auth','admin'])
->name('composotow.store');
//show all comosotwo to admin
Route::get('/admin/composetwo/shwo',[AdminComposeTow::class,'index'])
->middleware(['auth','admin'])
->name('composetwo.index');
//Create new ComposeTwo by User
Route::get('/composetwo/create',[ComposeTowComponetsController::class,'create'])
->middleware(['auth'])
->name('composetwouser.create');
Route::post('/composetwo/store',[ComposeTowComponetsController::class,'store'])
->middleware(['auth'])
->name('composotwouser.store');
//Create new composo Three
Route::get('/admin/composothreee/create',[ComposeThree::class,'create'])
->middleware(['auth','admin'])
->name('composothree.create');
// Create new ComposeThree by Admin
Route::get('/admin/composothree/create',[AdminComposoThreeController::class,'create'])
->middleware(['auth','admin'])
->name('composothree.create');
Route::post('/admin/composothree/store',[AdminComposoThreeController::class,'store'])
->middleware(['auth','admin'])
->name('composothree.store');
// Show all ComposeThree to Admin
Route::get('/admin/composothree/index',[AdminComposoThreeController::class,'index'])
->middleware(['auth','admin'])
->name('composothree.index');
// Create new composo three by user
Route::get('user/composothree',[ComposeThreeComponetsController::class,'create'])
->middleware(['auth'])
->name('usercomposothree.create');
Route::post('user/composothree',[ComposeThreeComponetsController::class,'store'])
->middleware(['auth'])
->name('usercomposothree.store');
// Create new ComposoFour by Admin
Route::get('/admin/composofour/create',[AdminComposoFourController::class,'create'])
->middleware(['auth','admin'])
->name('composofour.create');
Route::post('/admin/composofour/store',[AdminComposoFourController::class,'store'])
->middleware(['auth','admin'])
->name('composofour.store');
// Show all ComposeFour to Admin
Route::get('/admin/composofour/index',[AdminComposoFourController::class,'index'])
->middleware(['auth','admin'])
->name('composofour.index');
// Create new ComposoFour by User
Route::get('/composofour/create',[ComposoFourController::class,'create'])
->middleware(['auth'])
->name('usercomposofour.create');
Route::post('/composofour/store',[ComposoFourController::class,'store'])
->middleware(['auth'])
->name('usercomposofour.store');
Route::get('/test-excel', function () {
    return class_exists(Excel::class) ? 'Excel is working!' : 'Excel is NOT working!';
});
// Crerate new CoupeOne Machines by Admin
Route::get('/admin/coupeone/create',[AdminCoupeOneController::class,'create'])
->middleware(['auth','admin'])
->name('coupeone.create');
Route::post('/admin/coupeone/store',[AdminCoupeOneController::class,'store'])
->middleware(['auth','admin'])
->name('coupeone.store');
// show data coupe one to admin
Route::get('/admin/coupeone/index',[AdminCoupeOneController::class,'index'])
->middleware(['auth','admin'])
->name('coupeone.index');
// Create new coupe one by user
Route::get('usercoupeone/create',[CoupeOneController::class,'create'])
->middleware(['auth'])
->name('usercoupeone.create');
Route::post('usercoupeone/store',[CoupeOneController::class,'store'])
->middleware(['auth'])
->name('usercoupeone.store');
//Show Archive All Data To Admin
Route::get('/admin/archive',[AdminController::class,'archive'])
->middleware(['auth','admin'])
->name('admin.archive');
Route::get('/archive/torsado',[AdminTorsadoController::class,'archive'])
->middleware(['auth','admin'])
->name('torsado.archive');
Route::get('/archive/lphunk',[AdminLphunkController::class,'archive'])
->middleware(['auth','admin'])
->name('lphunk.archive');
Route::get('/archive/coupone',[AdminCoupeOneController::class,'archive'])
->middleware(['auth','admin'])
->name('coupeone.archive');
Route::get('/composotwo/archive',[AdminComposeTow::class,'archive'])
->middleware(['auth','admin'])
->name('composotwo.archive');
Route::get('composothree/archive',[AdminComposoThreeController::class,'archive'])
->middleware(['auth','admin'])
->name('composothree.archive');
Route::get('composofour/archive',[AdminComposoFourController::class,'archive'])
->middleware(['auth','admin'])
->name('composofour.archive');
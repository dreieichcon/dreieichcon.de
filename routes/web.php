<?php


use App\Http\Controllers\AdminProgrammController;
use App\Http\Controllers\ProfileController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $page = Page::where("slug", "home")->firstOrFail();

    return view("dc.page.show", [
        "page" => $page
    ]);
});

Route::get('/prof', function () {
    return view('prof');
});

Route::resource("/programm", \App\Http\Controllers\ProgrammController::class);

Route::resource("/games", \App\Http\Controllers\GameController::class);

Route::get("/page/{page:slug}", [\App\Http\Controllers\PageController::class, "show"]);

Route::get("/category/{category:slug}", [\App\Http\Controllers\CategoryController::class, "show"]);
Route::get("/biography/{biography:slug}", [\App\Http\Controllers\BiographyController::class, "show"]);

Route::get('/dashboard', function () {
    return redirect("/home");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::resource("/admin/navigation", \App\Http\Controllers\NavigationController::class);

    Route::resource("/admin/location", \App\Http\Controllers\AdminLocationController::class);

    Route::resource("/admin/type", \App\Http\Controllers\AdminTypeController::class);

    Route::resource("/admin/programm", \App\Http\Controllers\AdminProgrammController::class);
    Route::post("/admin/programm/{programm}/location_add", [AdminProgrammController::class, "addLocation"]);
    Route::post("/admin/programm/{programm}/location_remove", [AdminProgrammController::class, "removeLocation"]);
    Route::post("/admin/programm/{programm}/type_add", [AdminProgrammController::class, "addType"]);
    Route::post("/admin/programm/{programm}/type_remove", [AdminProgrammController::class, "removeType"]);

    Route::resource("/admin/page", \App\Http\Controllers\AdminPageController::class);
    Route::get("/admin/page/{page}/section_new", [\App\Http\Controllers\AdminPageController::class, 'sectionForm']);
    Route::post("/admin/page/{page}/section_new", [\App\Http\Controllers\AdminPageController::class, 'sectionStore']);
    Route::post("/admin/page/{page}/section_add", [\App\Http\Controllers\AdminPageController::class, 'sectionAdd']);

    Route::resource("/admin/section", \App\Http\Controllers\AdminSectionController::class);
    Route::post("/admin/section/{section}/image_new", [\App\Http\Controllers\AdminSectionController::class, 'imageStore']);
    Route::resource("/admin/section_image", \App\Http\Controllers\AdminSectionImageController::class);

    Route::resource("/admin/biography", \App\Http\Controllers\AdminBiographyController::class);
    Route::post("/admin/biography/{biography}/category_add", [\App\Http\Controllers\AdminBiographyController::class, 'categoryAdd']);
    Route::post("/admin/biography/{biography}/category_remove", [\App\Http\Controllers\AdminBiographyController::class, 'categoryRemove']);
    Route::post("/admin/biography/{biography}/link_add", [\App\Http\Controllers\BiographyLinksController::class, 'store']);
    Route::post("/admin/biography/{biography}/upload", [\App\Http\Controllers\BiographyImageController::class, 'upload']);

    Route::resource("/admin/biography_link", \App\Http\Controllers\BiographyLinksController::class);
    Route::resource("/admin/biography_image", \App\Http\Controllers\BiographyImageController::class);

    Route::resource("/admin/category", \App\Http\Controllers\AdminCategoryController::class);

    Route::resource("/admin/event", \App\Http\Controllers\AdminEventController::class);

    Route::resource("/admin/social", \App\Http\Controllers\AdminSocialController::class);

    Route::resource("/admin/user", \App\Http\Controllers\AdminUserController::class);
    Route::post("/admin/user/{user}/role_add", [\App\Http\Controllers\AdminUserController::class, "role_add"]);
    Route::post("/admin/user/{user}/role_remove", [\App\Http\Controllers\AdminUserController::class, "role_remove"]);

    Route::resource("/admin/role", \App\Http\Controllers\AdminRoleController::class);
    Route::post("/admin/role/{role}/permission_add", [\App\Http\Controllers\AdminRoleController::class, "permission_add"]);
    Route::post("/admin/role/{role}/permission_remove", [\App\Http\Controllers\AdminRoleController::class, "permission_remove"]);

    Route::resource("/admin/log", \App\Http\Controllers\LogController::class);

});

require __DIR__ . '/auth.php';



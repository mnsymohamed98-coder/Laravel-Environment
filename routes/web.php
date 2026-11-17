
<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    $courses = DB::table('courses')->get();

    return view('welcome', compact('courses'));
});

Route::post('/courses', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:100'
    ]);

    DB::table('courses')->insert([
        'name' => $request->input('name'),
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/');
});

Route::post('/courses/delete/{id}', function ($id) {
    DB::table('courses')
        ->where('id', $id)
        ->delete();

    return redirect('/');
});

Route::get('/courses/edit/{id}', function ($id) {
    $editingCourse = DB::table('courses')
        ->where('id', $id)
        ->first();

    if (!$editingCourse) {
        abort(404);
    }

    $courses = DB::table('courses')->get();

    return view('welcome', compact('courses', 'editingCourse'));
});

Route::post('/courses/update', function (Request $request) {
    $request->validate([
        'id' => 'required|integer|exists:courses,id',
        'name' => 'required|string|max:100'
    ]);

    DB::table('courses')
        ->where('id', $request->input('id'))
        ->update([
            'name' => $request->input('name'),
            'updated_at' => now()
        ]);

    return redirect('/');
});

Route::get('/users', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/users/edit/{id}', [UserController::class, 'edit']);

Route::post('/users/update/{id}', [UserController::class, 'update']);

Route::post('/users/delete/{id}', [UserController::class, 'destroy']);

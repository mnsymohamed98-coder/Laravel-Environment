
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    $courses = DB::table('courses')->get();

    return view('welcome', [
        'courses' => $courses
    ]);
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

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/users');
    }

    public function edit($id)
    {
        $editingUser = DB::table('users')
            ->where('id', $id)
            ->first();

        if (!$editingUser) {
            abort(404);
        }

        $users = DB::table('users')->get();

        return view('users', compact('users', 'editingUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now()
            ]);

        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect('/users');
    }
}

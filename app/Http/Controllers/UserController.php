<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('admin');
        return view('dashboard.data_master.user.index', [
            'title' => 'Data User',
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/dashboard/datamaster/user')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/dashboard/datamaster/user')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/dashboard/datamaster/user')->with('success', 'Data Berhasil Dihapus');
    }
}

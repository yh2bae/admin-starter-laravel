<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function changeTheme(User $user)
    {
        $user->theme = $user->theme == '1' ? '0' : '1';
        $user->save();

        return redirect()->back();
    }

    public function profile()
    {
        $data = Auth::user();
        return view('backend.profile.index', compact('data'));
    }


    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required|min:6',
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            Auth::logout();

            return redirect()->route('login.admin')->with(['success' => 'Password upadate sukses, Silahkan Login Kembali']);
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png,pdf|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('local')->delete('public/upload/profile/' . basename($user->photo));

            $image = $request->file('photo');
            $fileName = "profile-" . $user->name . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/upload/profile', $fileName);

            $user->update([
                'photo' => $fileName,
                'name' => $request->name,
                'username' => $request->username,
            ]);
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);


        return redirect()->back()->with(['success' => 'Profile update sukses']);
    }

    public function profilePassword()
    {
        $data = Auth::user();
        return view('backend.profile.password', compact('data'));
    }
}

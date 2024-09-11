<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('admin.profile', compact('data'));
    }
    public function AdminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //delete old image
            @unlink(public_path('uploads/admin_profiles/' . $data->image));
            $imageName = date('YmdHi') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin_profiles'), $imageName);
            $data->image = $imageName;
        }
        $data->save();
        return redirect()->back();
    }
}

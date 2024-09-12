<?php

namespace App\Http\Controllers\backend;

use App\Models\classes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function CreateClass()
    {
        return view('backend.class.create_class');
    }

    public function StoreClass(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'section' => 'required',
        ]);
        $class = new classes();
        $class->class_name = $request->class_name;
        $class->section = $request->section;
        $class->save();

        $notification = [
            'message' => 'Class Created Successfully',
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($notification);
    }
    public function ManageClass()
    {
        $classes = classes::all();
        return view('backend.class.manage_class', compact('classes'));
    }
}

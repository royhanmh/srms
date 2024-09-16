<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function AddStudent()
    {
        $classes = classes::get();
        return view('backend.student.add', compact('classes'));
    }

    public function StoreStudent(Request $request)
    {
        $student = new Student();
        $student->name = $request->full_name;
        $student->email = $request->email;
        $student->roll_id = $request->roll_id;
        $student->class_id = $request->class_id;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //delete old image
            @unlink(public_path('uploads/student_images/' . $student->image));
            $imageName = date('YmdHi') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/student_images'), $imageName);
            $student->image = $imageName;
        }
        $student->save();
        $notification = [
            'message' => 'Student Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
class SubjectController extends Controller
{
    public function CreateSubject()
    {
        return view('backend.subject.create');
    }
    public function StoreSubject(Request $request)
    {
        $subject = new Subject();

        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->save();

        $notification = [
            'message' => 'Subject Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}

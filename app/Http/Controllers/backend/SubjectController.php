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
    public function ManageSubject()
    {
        $subjects = Subject::all();
        return view('backend.subject.manage', compact('subjects'));
    }
    public function EditSubject($id)
    {
        $subject = Subject::findOrFail($id);
        return view('backend.subject.edit', compact('subject'));
    }
    public function UpdateSubject(Request $request)
    {
        $subject = Subject::findOrFail($request->id);
        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->save();

        $notification = [
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('manage.subject')->with($notification);
    }
    public function DeleteSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        $notification = [
            'message' => 'Subject Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}

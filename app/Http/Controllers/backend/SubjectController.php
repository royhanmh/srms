<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\classes;
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
    // subject combination all method
    public function AddSubjectCombination()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('backend.subject.add_subject_combination', compact('subjects', 'classes'));
    }
    public function StoreSubjectCombination(Request $request)
    {
        $class = classes::findOrFail($request->class_id);
        $subjects = $request->subject_ids;
        $class->subjects()->attach($subjects);

        $notification = [
            'message' => 'Subject Combination Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function ManageSubjectCombination()
    {
        $results = DB::table('classes_subject')->join('classes', 'classes_subject.class_id', 'classes.id')->join('subjects', 'classes_subject.subject_id', 'subjects.id')->select('classes_subject.*', 'classes.class_name', 'classes.section', 'subjects.name as subject_name')->get();
        return view('backend.subject.manage_subject_combination', compact('results'));
    }
    public function DeactivateSubjectCombination($id)
    {
        $status = DB::table('classes_subject')->select('status')->where('id', $id)->first();
        if ($status->status == 1) {
            DB::table('classes_subject')
                ->where('id', $id)
                ->update(['status' => 0]);
            $notification = [
                'message' => 'Subject Combination Deactivated Successfully',
                'alert-type' => 'success',
            ];
        } elseif ($status->status == 0) {
            DB::table('classes_subject')
                ->where('id', $id)
                ->update(['status' => 1]);
            $notification = [
                'message' => 'Subject Combination Acivated Successfully',
                'alert-type' => 'success',
            ];
        }

        return redirect()->back()->with($notification);
    }
}

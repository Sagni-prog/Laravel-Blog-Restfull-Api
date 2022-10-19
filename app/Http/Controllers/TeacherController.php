<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;

class TeacherController extends Controller
{
    public function teacher() {
        $teacher = Teacher::with('courses')->get();
        return $teacher;
  
      }

      public function AddTeacher(Request $req){
        
         $teacher =  Teacher::create([
              'name' => $req->name
         ]);
       
         $teacher->courses()->create(
            [
            'course_title' => $req->course
        ]
            );

    }
    public function AddCourse(Request $request){
       $teacher = Teacher::find($request->id);
       $teacher->courses()->create([
           'course_title' => $request->course
       ]);
       return 'added successfully';
    }

    public function Delete(Request $req){
        Course::find($req->id)->delete();
    }
    
}

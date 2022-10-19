<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Article;
use App\Models\Video;
use App\Models\Image;
use App\Models\Course;
use App\Models\Teacher;
// use App\Http\Controllers\Teacher;
use App\Http\Controllers\TeacherController;


Route::get('course', function () {
//    $course = Course::with('teachers')->get();
    // return view('course',compact('course'));
});

Route::get('/teacher', function () {

    $teacher = Teacher::with('courses')->get();
    $teacher = Teacher::find(3);
    echo $teacher;
    // $teacher->courses()->attach(2);
    $teacher->courses()->create(
        [
        'course_title' => 'Django'
    ]
        );
// );
    // $teacher = Teacher::create([
    //     'name' => 'Van'
    // ]);
    // return view('teacher',compact('teacher'));
});
Route::get('/teacher',[TeacherController::class,'teacher']);
Route::get('/teacher/last',[TeacherController::class,'last']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('post', function () {
    
      $post = Post::with('comments','image')->get();
        
         return view('post',compact('post'));
});

Route::get('article', function () {
      $article = Article::with('comments')->get();
    return view('article',compact('article'));
});

// Route::middleware([
//     'auth:sanctum',c
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });



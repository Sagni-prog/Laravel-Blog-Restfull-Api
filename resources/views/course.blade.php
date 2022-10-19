

<h1>Courses</h1>
@foreach ($course as $course)
 <h1>{{$course->course_title}}</h1>
        @foreach ($course->teachers as $teacher)
            <p>{{$teacher->name}}</p>
        @endforeach
@endforeach
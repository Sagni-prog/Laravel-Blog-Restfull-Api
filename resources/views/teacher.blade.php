
<h1>Teachers</h1>
@foreach ($teacher as $teacher)
 <h1>{{$teacher->name}}</h1>
        @foreach ($teacher->courses as $course)
            <p>{{$course->course_title}}</p>
        @endforeach
@endforeach
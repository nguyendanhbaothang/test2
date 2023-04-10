<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<h2>Học sinh nam ở hà nội và các lớp có nhiều hơn 2 học sinh nam</h2>
@if ($classes->count() > 0)
    <ul>
        @foreach ($classes as $class)
            <li>
                <h3>{{ $class->classname }}</h3>
                <p>Giáo viên: {{ $class->teacher }}</p>
                <p>Số sinh viên: {{ $class->students()->count() }}</p>
                <p>Danh sách sinh viên:</p>
                <ul>
                    @foreach ($class->students as $student)
                        <li>{{ $student->name }} ({{ $student->gender }}, {{ $student->address }})</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@else
    <p>Không có lớp học nào thỏa mãn yêu cầu.</p>
@endif

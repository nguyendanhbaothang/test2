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

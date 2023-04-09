<div class="container">
    <h1>Danh sách sinh viên lớp mới</h1>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ul>
</div>





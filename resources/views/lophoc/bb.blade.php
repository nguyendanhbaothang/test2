
<div class="container">
    <h1>Gộp lớp học</h1>
    <form action="{{ route('classrooms.merge') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="class1">Lớp học 1</label>
            <select name="class1" id="class1" class="form-control">
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->classname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="class2">Lớp học 2</label>
            <select name="class2" id="class2" class="form-control">
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->classname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Gộp lớp học</button>
    </form>
</div>

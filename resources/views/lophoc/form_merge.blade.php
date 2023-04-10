<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<main id="main">
        <h1> Danh sách học sinh</h1>
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form>
                            <a href="{{ route('student.create') }}" class="btn btn-info">Thêm mới
                            </a>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sinh viên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Điểm toán</th>
                        <th scope="col">Điểm văn</th>
                        <th scope="col">Tùy chỉnh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->dateofbirth }}</td>
                            <td>{{ $team->gender }}</td>
                            <td>{{ $team->address }}</td>
                            <td>{{ $team->literaryscore }}</td>
                            <td>{{ $team->mathscores }}</td>
                            
                            <td>
                                <form action="{{ route('student.destroy', $team->id) }}" method="POST">
                                        <a href="{{ route('student.edit', $team->id) }}" class="btn btn-primary">Sửa</a>
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa học sinh này xóa ko')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>


   

<!-- đúng -->
    <main id="main">
        <h4> Điểm trung bình</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sinh viên</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Điểm trung</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sum as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->dateofbirth }}</td>
                            <td>{{ $team->gender }}</td>
                            <td>{{ $team->address }}</td>
                            <td>{{ number_format($team->avg_score,1)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>


    <main id="main">
        <h4> Tuổi bé hơn 25 địa chỉ không ở hà nội</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ Nguyễn</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($age as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->dateofbirth }}</td>
                            <td>{{ $team->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>
<!--  đúng -->
    <main id="main">
        <h4> Họ Nguyễn điểm lớn hơn 6</h4>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ Nguyễn</th>
                        <th scope="col">Điểm trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nguyen as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ number_format($team->avg_score,1) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>


    

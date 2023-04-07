<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<main class="page-content">
<h2>Sửa học sinh</h2>
<div class="container">
<div class="row">
    <div class="col-lg-12 mx-auto">
     <div class="card">
         </div>
       <div class="card-body">
         <div class="border p-3 rounded">
         <form class="row g-3" action="{{ route('student.update',[$student->id]) }}" method="post"  enctype="multipart/form-data">
            @method('put')
            @csrf
           <div class="col-12">
             <label class="form-label">Tên học sinh</label>
             <input type="text" class="form-control" value="{{$student->name}}" name="name" placeholder="Tên">
           </div>
           <div class="col-12">
            <label class="form-label">Ngày sinh</label>
                <input type="text" class="form-control" value="{{$student->dateofbirth}}" name="dateofbirth" placeholder="Ngày sinh">
          </div>

          <div class="col-12">
            <label class="form-label">Giới tính</label>
                <input type="text" class="form-control" name="gender" value="{{$student->gender}}" placeholder="Giới tính">
          </div>
          <div class="col-12">
            <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="{{$student->address}}" placeholder="Địa chỉ">
          </div>
          <div class="col-12">
            <label class="form-label">Điểm toán</label>
                <input type="number" class="form-control" name="literaryscore" value="{{$student->literaryscore}}" placeholder="Điểm toán">
          </div>
          <div class="col-12">
            <label class="form-label">Điểm văn</label>
                <input type="number" class="form-control" name="mathscores" value="{{$student->mathscores}}" placeholder="Điểm văn">
          </div>
           <div class="col-12">
             <button class="btn btn-primary px-4">Hoàn thành</button>
            <a class="btn btn-primary px-4" href="{{ route('student.index') }}" class="w3-button w3-red">Quay Lại</a>
        </div>
         </form>
        </div>
        </div>
       </div>
    </div>
 </div>
 </div>
</main>


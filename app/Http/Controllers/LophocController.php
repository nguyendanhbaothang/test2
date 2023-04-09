<?php

namespace App\Http\Controllers;

use App\Models\Lophoc;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LophocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lophoc = Lophoc::orderBy('id', 'DESC')->get();

        $students = DB::table('students')
            ->join('student_class', 'students.id', '=', 'student_class.student_id')
            ->join('lophoc', 'student_class.lophoc_id', '=', 'lophoc.id')
            ->select('students.name', 'lophoc.classname as class_name')
            ->orderBy('class_name')
            ->get();
        $danhsach = DB::table('students')
                ->join('student_class', 'students.id', '=', 'student_class.student_id')
                ->select('students.name')
                ->groupBy('students.name')
                ->havingRaw('COUNT(*) > 1')
                ->get();
        $hanoi = DB::table('students')
                ->join('student_class', 'students.id', '=', 'student_class.student_id')
                ->join('lophoc', 'student_class.lophoc_id', '=', 'lophoc.id')
                ->where('students.address', '<>', 'Hà Nội')
                ->where('lophoc.teacher', '=', 'An')
                ->select('students.*')
                ->get();
        $classes = DB::table('lophoc')
                ->select('lophoc.classname', DB::raw('COUNT(students.id) as count_male_students'))
                ->join('student_class', 'lophoc.id', '=', 'student_class.lophoc_id')
                ->join('students', 'student_class.student_id', '=', 'students.id')
                ->where('students.gender', '=', 'Male')
                ->where('students.address', '=', 'Hanoi')
                ->groupBy('lophoc.id', 'lophoc.classname')
                ->having('count_male_students', '>', 2)
                ->get();




                $class1 = Lophoc::findOrFail($request->class1);
                $class2 = Lophoc::findOrFail($request->class2);

                // Tạo lớp mới
                $mergedClass = new Lophoc();
                $mergedClass->classname = $class1->classname . $class2->classname;
                $mergedClass->teacher = $class1->teacher;

                // Lưu lớp mới vào CSDL
                $mergedClass->save();

                // Lấy danh sách sinh viên đăng ký hai lớp cũ
                $students1 = $class1->students()->get();
                $students2 = $class2->students()->get();

                // Gộp danh sách sinh viên
                $mergedStudents = $students1->merge($students2)->unique('id');

                // Cập nhật thông tin lớp mới cho từng sinh viên
                foreach ($mergedStudents as $student) {
                    $student->student_class()->detach($class1->id);
                    $student->student_class()->detach($class2->id);
                    $student->student_class()->attach($mergedClass->id);
                }

                // Xóa hai lớp cũ
                $class1->delete();
                $class2->delete();

                // Trả về danh sách sinh viên của lớp mới
                return view('lophoc.index', ['students' => $mergedStudents]);






        $param = [
            'lophoc'=> $lophoc,
            'students'=> $students,
            'danhsach'=> $danhsach,
            'hanoi'=> $hanoi,
            'classes'=> $classes,
        ];
        return view('lophoc.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lophoc = Lophoc::get();

        $param = [
            'lophoc' => $lophoc,
        ];
        return view('lophoc.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $lophoc = new Lophoc();
            $lophoc->classname = $request->classname;
            $lophoc->teacher = $request->teacher;
            $lophoc->save();
            return redirect()->route('lophoc.index');
        } catch (\Exception) {
            return redirect()->route('lophoc.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lophoc = Lophoc::find($id);
        $param = [
            'lophoc' => $lophoc ,
        ];
        return view('lophoc.edit' , $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $lophoc = Lophoc::find($id);
            $lophoc->classname = $request->classname;
            $lophoc->teacher = $request->teacher;
            $lophoc->save();
            return redirect()->route('lophoc.index');
        } catch (\Exception) {
            return redirect()->route('lophoc.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $lophoc = Lophoc::find($id);
            $lophoc->delete();
            return redirect()->route('lophoc.index');
        } catch (\Exception) {
            return redirect()->route('lophoc.index');
        }
    }
}

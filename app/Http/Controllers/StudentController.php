<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'DESC')->get();

        $sum = DB::table('students')
                ->select('id', 'name', 'dateofbirth', 'gender', 'address','literaryscore','mathscores', DB::raw('(literaryscore + mathscores)/2 as avg_score'))
                ->get();

        $newDateTime = Carbon::now()->subYears(25);
        $age= DB::table('students')
        ->select()
                ->whereDate('dateofbirth', '<=', $newDateTime)
                ->where('address', '<>', 'Hà Nội')
                ->get(); 

        $nguyen =DB::table('students')
                ->select('name','literaryscore','mathscores', DB::raw('(literaryscore + mathscores)/2 as avg_score'))
                ->where('name', 'LIKE', '%Nguyễn%')
                // ->get()->where('avg_score', '>',6)->all();
                ->get()->toArray();
        $data = array_filter($nguyen, function ($item) {
                    return $item->avg_score >= 6 ;
                });   
        $param = [
            'students'=> $students,
            'sum'=> $sum,
            'age'=> $age,
            'nguyen'=> $data,
        ];
        return view('student.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.add');
        //
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
        $student = new Student();
        $student->name = $request->name;
        $student->dateofbirth = $request->dateofbirth;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->literaryscore = $request->literaryscore;
        $student->mathscores = $request->mathscores;
        $student->save();
        return redirect()->route('student.index');
    } catch (\Exception) {
        return redirect()->route('student.index');
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
        $student = Student::find($id);
        $param = [
            'student' => $student ,
        ];
        return view('student.edit',$param);
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
            $student = Student::find($id);
            $student->name = $request->name;
            $student->dateofbirth = $request->dateofbirth;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->literaryscore = $request->literaryscore;
            $student->mathscores = $request->mathscores;
            $student->save();
            return redirect()->route('student.index');
        } catch (\Exception) {
            return redirect()->route('student.index');
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
            $student = Student::find($id);
            $student->delete();
            return redirect()->route('student.index');
        } catch (\Exception) {
            return redirect()->route('student.index');
        }
        }
    }

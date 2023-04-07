<?php

namespace App\Http\Controllers;

use App\Models\Lophoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LophocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lophoc = Lophoc::orderBy('id', 'DESC')->get();
        
        $param = [
            'lophoc'=> $lophoc,
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

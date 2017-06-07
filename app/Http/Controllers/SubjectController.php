<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;
use App\Semester;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();
        return view('subject.create', ['semesters' => $semesters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject;
        $subject->key = $request->key;
        $subject->name = $request->name;
        $subject->semester_id = $request->semester;
        $subject->save();
        return response()->json(['status' => '1']);
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
        //
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
        $subject = Subject::find($id);
        $subject->key = $request->key;
        $subject->name = $request->name;
        $subject->semester_id = $request->newSemester;
        $subject->save();
        return response()->json(['status' => 1]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all()
    {
        $subjects = Subject::all();

        return response()->json($subjects->toArray());
    }

    public function references($id)
    {
        $references = Subject::find($id)->references;

        return response()->json($references->toArray());
    }

    public function missingReferences($id)
    {
        $references = Subject::find($id)->references();

        return response()->json($references->toArray());
    }

    public function getSemester($id)
    {
        $semester = Subject::find($id)->semester;

        return response()->json($semester->toArray());
    }
}

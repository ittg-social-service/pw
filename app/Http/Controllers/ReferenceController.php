<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReferenceType;
use App\SubjectReference;

use App\Reference;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct()
    {
        $this->middleware('auth');


    }
    public function index()
    {
        $references = Reference::all();

        return response()->json($references->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ReferenceType::all();
        $references = Reference::all();
        return view('subject.new_reference',['references'=>$references,'types'=>$types]);
    }
    public function allreferencetype(){
        $referencesType = ReferenceType::all();
        return response()->json($referencesType->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRefence = new Reference;
        $newRefence->description = $request->description;
        $newRefence->existence = $request->existence;
        $newRefence->reference_type_id = $request->reference_type_id;
        $newRefence->save();
        return redirect()->route('references.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types = ReferenceType::all();
        $reference = Reference::findOrFail($id);
        return view('reference.show',['reference'=>$reference,'types'=>$types]);
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
        $reference = Reference::find($id);
        $reference->description = $request->description;
        $reference->existence = $request->existence;
        $reference->reference_type_id = $request->reference_type_id;
        $reference->save();
        return redirect()->route('references.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = Reference::find($id);
        $reference->delete();
        return redirect()->route('references.create');
    }

     public function all()
    {
        $references = Reference::all();

        return response()->json($references->toArray());
    }

    public function getReferenceType($id)
    {
        $type = Reference::find($id)->referenceType;

        return response()->json($type->toArray());
    }


}

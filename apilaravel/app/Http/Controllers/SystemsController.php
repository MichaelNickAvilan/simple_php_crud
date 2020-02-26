<?php

namespace App\Http\Controllers;
use App\Systems;

use Illuminate\Http\Request;

class SystemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = Systems::all()->toArray();
        return response()->json([
            'status' => 'success',
            'message' => $systems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
       $request->validate([
            'name' => 'required'
        ]);
        $system=new Systems();
        $system->name=$request->name;
        $system->save();
        return response()->json([
            'status' => 'success',
            'message' => 'System has been added'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $system = Systems::find($id);
        return response()->json([
            'status' => 'success',
            'message' => $system
        ]);
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
        $system = Systems::find(1);
        $system->name = $request->name;
        $system->save();
        return response()->json([
            'status' => 'success',
            'message' => "System updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $system = Systems::find($id);
        $system->delete();
        return response()->json([
            'status' => 'success',
            'message' => "System deleted"
        ]);
    }
}

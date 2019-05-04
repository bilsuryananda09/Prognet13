<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;

class CourierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $couriers = Courier::all();

        return view('couriers.index', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('couriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'courier'=>'required|unique:couriers'
        ]);
        $courier = new Courier([
            'courier' => $request->get('courier')
        ]);
        $courier->save();
        return redirect('admin/couriers')->with('success', 'Courier has been added');
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
        $courier = Courier::find($id);

        return view('couriers.edit', compact('courier'));
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
        //
        $request->validate([
            'courier'=>'required'
        ]);

        $courier = Courier::find($id);
        $courier->courier = $request->get('courier');
        $courier->save();

        return redirect('admin/couriers')->with('success', 'Courier has been updated');
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
        $courier = Courier::find($id);
        $courier->delete();

        return redirect('admin/couriers')->with('success', 'Courier has been deleted successfully');
    }
}

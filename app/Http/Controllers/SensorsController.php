<?php

namespace App\Http\Controllers;

use App\Models\Sensors;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensors = Sensors::all();
        return view('sensor.index')->with('sensors', $sensors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sensor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Location' => 'required|max:255',
            'Temperature' => 'required|max:255',
            'Humidity' => 'required|max:255',
        ]);

        $sensor = new Sensors();
        $sensor->Location = $request->Location;
        $sensor->Temperature = $request->Temperature;
        $sensor->Humidity = $request->Humidity;
        $sensor->save();

        return redirect()->route('sensor.index')->with('success', 'Sensor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sensors = Sensors::findOrFail($id);
        return view('sensor.show')->with('sensors', $sensors);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sensors = Sensors::find($id);
        return view('sensor.edit')->with('sensors', $sensors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Location' => 'required|max:255',
            'Temperature' => 'required|max:255',
            'Humidity' => 'required|max:255',
            
        ]);

        $sensors = Sensors::find($id);
        $sensors->Location = $request->Location;
        $sensors->Temperature = $request->Temperature;
        $sensors->Humidity = $request->Humidity;
        $sensors->save();

        return redirect()->route('sensor.index')->with('success', 'Sensor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sensors = Sensors::find($id);
        $sensors->delete();
        return redirect()->route('sensor.index')->with('success', 'Sensor deleted successfully.');
    }
}

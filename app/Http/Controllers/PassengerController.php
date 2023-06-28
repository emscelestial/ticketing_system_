<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PassengerController extends Controller
{
    public function index()
    {

        $passengers = Passenger::all();

        return view('admin.passenger.index', compact('passengers'));
    }

    public function fetchpassenger()
    {
        $passenger = Passenger::all();
        return response()->json([
            'passenger' => $passenger,
        ]);
    }

    public function create()
    {
        return view('admin.passenger.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'from' => 'required',
            'to' => 'required',
        ]);

        $passenger = new Passenger();
        $passenger->name = $request->input('name');
        $passenger->email = $request->input('email');
        $passenger->phone = $request->input('phone');
        $passenger->from = $request->input('from');
        $passenger->to = $request->input('to');

        if ($request->hasFile('image'))
        {

            $path = 'uploads/passenger/' .$passenger->image;

            if (File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' . $extension;
            $file->move('uploads/passenger', $filename);
            $passenger->image = $filename;
        }

        $passenger->save();

        return redirect()->route('passenger.index')->with('success', 'Passenger created successfully.');
    }

    public function edit($id)
    {
        $passenger = Passenger::findOrFail($id);

        return view('admin.passenger.edit', compact('passenger'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'from' => 'required',
            'to' => 'required',
        ]);

        $passenger = Passenger::findOrFail($id);
        $passenger->name = $request->input('name');
        $passenger->email = $request->input('email');
        $passenger->phone = $request->input('phone');
        $passenger->from = $request->input('from');
        $passenger->to = $request->input('to');

        if ($request->hasFile('image'))
        {

            $path = 'uploads/passenger/' .$passenger->image;

            if (File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/passenger', $filename);
            $passenger->image = $filename;
        }

        $passenger->save();

        return redirect()->route('passenger.index')->with( 'success', 'Passenger updated successfully.');
    }

    public function destroy($id)
    {
        $passenger = Passenger::findOrFail($id);

        // Delete image if exists
        if ($passenger->image) {
            Storage::delete('public/' . $passenger->image);
        }

        $passenger->delete();

        return redirect()->route('passenger.index')->with('success', 'Passenger deleted successfully.');
    }





}

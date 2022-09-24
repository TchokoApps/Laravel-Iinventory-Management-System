<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->get();
        return view('backend.unit.index', compact('units'));
    }

    public function create()
    {
        return view('backend.unit.create');
    }

    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->created_by = Auth::id();
        $unit->created_at = Carbon::now();
        $unit->save();


        $notification = array(
            'message' => 'Unit Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.unit.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.unit.edit', compact('unit'));
    }

    public function update(Request $request)
    {
        $unit = Unit::findOrFail($request->id);
        $unit->name = $request->name;
        $unit->updated_by = Auth::id();
        $unit->updated_at = Carbon::now();
        $unit->save();

        $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.unit.index')->with($notification);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        $notification = array(
            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

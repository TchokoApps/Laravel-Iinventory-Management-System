<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function viewSupplier()
    {
//        $suppliers = Supplier::all();
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.view', compact('suppliers'));
    }

    public function createSupplierForm()
    {
        return view('backend.supplier.create-form');
    }

    public function createSupplier(Request $request)
    {

        $rules = [
            'name' => 'required|max:500',
            'mobile_number' => 'required|max:500',
            'email' => 'email:rfc,dns',
            'address' => 'required|max:500',
        ];
        $messages = [
            'name.required' => 'Name field is required',
            'mobile_number.required' => 'Name field is required',
            'email.required' => 'Upload field is required',
            'address.required' => 'Upload field is required',
        ];

        $this->validate($request, $rules, $messages);

        Supplier::insert([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('backend.supplier.view')->with($notification);
    }

    public function updateSupplierForm($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.update-form', compact('supplier'));

    }

    public function updateSupplier(Request $request)
    {
        $supplier = Supplier::findOrFail($request->id);

        $supplier->name = $request->name;
        $supplier->mobile_number = $request->mobile_number;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->updated_at = Carbon::now();

        $supplier->save();

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.supplier.view')->with($notification);
    }

    public function deleteSupplier($id)
    {
        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

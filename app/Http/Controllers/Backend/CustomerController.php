<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('backend.customer.index', compact('customers'));
    }

    public function createForm()
    {
        return view('backend.customer.create-form');
    }

    public function create(Request $request)
    {
        $customer = new Customer();

        $image = $request->file('customer_image');
        $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save('upload/customer/' . $name);
        $save_url = 'upload/customer/' . $name;

        $customer->name = $request->name;
        $customer->mobile_number = $request->mobile_number;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->customer_image = $save_url;
        $customer->created_by = Auth::id();
        $customer->created_at = Carbon::now();

        $customer->save();

        $notification = array(
            'message' => 'Customer Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.customer.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function updateForm($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.update-form', compact('customer'));
    }

    public function update(Request $request)
    {
        $customer = Customer::findOrFail($request->id);

        if($request->file('customer_image')) {
            $image = $request->file('customer_image');
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/customer/' . $name);
            $save_url = 'upload/customer/' . $name;
            $customer->customer_image = $save_url;
        }

        $customer->name = $request->name;
        $customer->mobile_number = $request->mobile_number;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->updated_by = Auth::id();
        $customer->updated_at = Carbon::now();

        $customer->save();

        $notification = array(
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.customer.index')->with($notification);
    }

    public function destroy($id)
    {
//        dd(Customer::findOrFail($id));
        $customer = Customer::findOrFail($id);
        $image = $customer->customer_image;
        if($image) {
            unlink($image);
        }

        $customer->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

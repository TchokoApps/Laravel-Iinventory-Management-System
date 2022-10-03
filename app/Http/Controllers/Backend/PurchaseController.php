<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.index', compact('purchases'));

    }

    public function createForm()
    {
        $suppliers = Supplier::all();
        $units = Unit::all();
        $categories = Category::all();
        $products = Product::all();
        return view('backend.purchase.create-form', compact('suppliers', 'units', 'categories', 'products'));

    }

    public function create(Request $request)
    {
        if (!$request->supplier_id || !$request->category_id || !$request->product_id
            || !$request->buying_qty || !$request->unit_price || !$request->buying_price) {

            $notification = array(
                'message' => 'Sorry you did not select Item',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->purchase_no[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            }
        }

        $notification = array(
            'message' => 'Data Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.purchase.index')->with($notification);

    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        Purchase::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Purchase Item deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function getPending()
    {
        $purchases = Purchase::where('status', '0')->orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.pending', compact('purchases'));

    }

    public function approve($id)
    {
        $purchase = Purchase::where(['id' => $id])->first();
        $product = Product::where(['id' => $purchase->product_id])->first();
        $product_qty = (float)$product->quantity + (float)$purchase->buying_qty;
        $product->update(['quantity' => $product_qty]);
        $purchase->update(['status' => '1']);
        $notification = array(
            'message' => 'Purchase Item Approved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.purchase.pending.get')->with($notification);
    }
}

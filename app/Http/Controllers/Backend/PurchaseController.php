<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
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
        if (in_array(null, $request->supplier_id, true) || in_array(null, $request->category_id, true) || in_array(null, $request->product_id, true) ||
            in_array(null, $request->buying_qty, true) || in_array(null, $request->unit_price, true)) {

            $notification = array(
                'message' => 'Sorry you did not select Item or provide item',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $count_category = count($request->category_id);
        for ($i = 0; $i < $count_category; $i++) {
            Purchase::create([
                'date' => date('Y-m-d', strtotime($request->date[$i])),
                'purchase_no' => rand(),
                'supplier_id' => $request->supplier_id[$i],
                'category_id' => $request->category_id[$i],
                'product_id' => $request->product_id[$i],
                'buying_qty' => $request->buying_qty[$i],
                'unit_price' => $request->unit_price[$i],
                'buying_price' => $request->buying_price[$i],
                'description' => $request->description[$i],
                'created_by' => Auth::user()->id,
                'status' => 0,
            ]);
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

    public function getCategoryBySupplierId(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $cateogries = Product::select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->with('category')->get();
        return response()->json($cateogries);
    }

    public function getProductByCategoryId(Request $request)
    {
        $products = Product::where('category_id', $request->category_id)->get();
        return response()->json($products);
    }

    public function getProductById(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        return response()->json($product->quantity);
    }
}

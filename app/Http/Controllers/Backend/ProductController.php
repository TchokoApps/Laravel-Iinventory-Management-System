<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::latest()->get();
        $categories = Category::latest()->get();
        $units = Unit::latest()->get();

        return view('backend.product.create', compact('suppliers', 'categories', 'units'));

    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->quantity = $request->quantity;
        $product->created_by = Auth::id();
        $product->created_at = Carbon::now();

        $product->save();

        $notification = array(
            'message' => 'Product Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.product.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $suppliers = Supplier::latest()->get();
        $categories = Category::latest()->get();
        $units = Unit::latest()->get();
        $product = Product::findOrFail($id);

        return view('backend.product.edit', compact('suppliers', 'categories', 'units', 'product'));
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        $product->unit_id = $request->unit_id;
        $product->quantity = $request->quantity;
        $product->created_by = Auth::id();
        $product->created_at = Carbon::now();

        $product->save();

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('backend.product.index')->with($notification);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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

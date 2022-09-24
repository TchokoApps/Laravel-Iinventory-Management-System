<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc');
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

    public function create()
    {

    }

    public function updateForm()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}

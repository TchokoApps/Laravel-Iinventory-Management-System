<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;
use function Symfony\Component\Finder\in;
use function Symfony\Component\HttpFoundation\isInvalid;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('status', 1)->orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.invoice.index', compact('invoices'));
    }

    public function createForm()
    {
        $units = Unit::all();
        $categories = Category::all();
        $customers = Customer::all();
        $invoice = Invoice::orderBy('updated_at', 'desc')->first();
        $invoice_no = rand();

        $date = date('Y-m-d');
        return view('backend.invoice.create-form', compact('units', 'categories', 'invoice_no', 'date', 'customers'));
    }

    public function create(Request $request)
    {
        if (in_array(null, $request->category_id, true) || in_array(null, $request->product_id, true) ||
            in_array(null, $request->selling_qty, true) || in_array(null, $request->unit_price, true) ||
            in_array(null, $request->selling_price, true)) {

            $notification = array(
                'message' => 'Sorry you did not select Item or provide item',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        if ($request->paid_amount > $request->estimated_amount) {
            $notification = array(
                'message' => 'Sorry Paid Amount is greater than Maximal Price.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $invoice = Invoice::create([
            'date' => date('Y-m-d', strtotime($request->date)),
            'invoice_no' => $request->invoice_no,
            'description' => $request->description,
            'status' => 0,
            'created_by' => \Auth::user()->id
        ]);

        DB::transaction(function () use ($request, $invoice) {
            if ($invoice) {
                $categoryCount = count($request->category_id);
                for ($i = 0; $i < $categoryCount; $i++) {
                    InvoiceDetail::create([
                        'date' => date('Y-m-d', strtotime($request->date)),
                        'invoice_id' => $invoice->id,
                        'category_id' => $request->category_id[$i],
                        'product_id' => $request->product_id[$i],
                        'selling_qty' => $request->selling_qty[$i],
                        'unit_price' => $request->unit_price[$i],
                        'selling_price' => $request->selling_price[$i],
                        'status' => 1
                    ]);
                }

                if ($request->customer_id == '0') {
                    $customer = Customer::create([
                        'name' => $request->name,
                        'mobile_no' => $request->mobile_no,
                        'email' => $request->email,
                    ]);
                    $customer_id = $customer->id;
                } else {
                    $customer_id = $request->customer_id;
                }

                $paymentDetail = new PaymentDetail();
                $payment = new Payment();

                $payment->invoice_id = $invoice->id;
                $payment->customer_id = $customer_id;
                $payment->paid_status = $request->paid_status;
                $payment->discount_amount = $request->discount_amount;
                $payment->total_amount = $request->estimated_amount;

                if ($request->paid_status == 'full_paid') {
                    $payment->paid_amount = $request->estimated_amount;
                    $payment->due_amount = 0;
                    $paymentDetail->current_paid_amount = $request->estimated_amount;
                } elseif ($request->paid_status == 'full_due') {
                    $payment->paid_amount = 0;
                    $payment->due_amount = $request->estimated_amount;
                    $paymentDetail->current_paid_amount = 0;
                } elseif ($request->paid_status == 'partial_paid') {
                    $payment->paid_amount = $request->paid_amount;
                    $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                    $paymentDetail->current_paid_amount = $request->paid_amount;
                }

                $payment->save();

                $paymentDetail->invoice_id = $invoice->id;
                $paymentDetail->date = date('Y-m-d', strtotime($request->date));
                $paymentDetail->save();
            }
        });

        $notification = array(
            'message' => 'Invoice Data Inserted Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('backend.invoice.pending')->with($notification);


    }

    public function getProductByCategoryId(Request $request)
    {
        $products = Product::where('category_id', $request->category_id)->get();
        return response()->json($products);
    }

    public function getProductQuantityById(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        return response()->json($product->quantity);
    }

    public function pending()
    {
        $invoices = Invoice::where('status', 0)->orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.invoice.pending', compact('invoices'));
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        InvoiceDetail::where('invoice_id', $invoice->id)->delete();
        Payment::where('invoice_id', $invoice->id)->delete();
        PaymentDetail::where('invoice_id', $invoice->id)->delete();

        $notification = array(
            'message' => 'Invoice Data Deleted Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function approve($id)
    {
        $invoice = Invoice::with('invoiceDetail')->findOrFail($id);
        $payment = $invoice->payment()->firstOrFail();
        $customer = $payment->customer()->firstOrFail();
        return view('backend.invoice.approve', compact('invoice', 'customer'));
    }

}

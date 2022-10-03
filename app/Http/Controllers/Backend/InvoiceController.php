<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.invoice.index', compact('invoices'));
    }

    public function createForm()
    {
        $units = Unit::all();
        $categories = Category::all();
        $customers = Customer::all();
        $invoice = Invoice::orderBy('id', 'desc')->first();
        if (!$invoice) {
            $invoice_no = 1;
        } else {
            $invoice_no = $invoice->invoice_no + 1;
        }

        $date = date('Y-m-d');
        return view('backend.invoice.create-form', compact('units', 'categories', 'invoice_no', 'date', 'customers'));
    }

    public function create(Request $request)
    {
//        dd($request);
        if (!$request->category_id) {

            $notification = array(
                'message' => 'Sorry You do not select any item.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            if ($request->paid_amount > $request->estimated_amount) {
                $notification = array(
                    'message' => 'Sorry Paid Amount is greater than Maximal Price.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {
                $invoice = Invoice::create([
                    'date' => date('Y-m-d', strtotime($request->date)),
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
                                'unit_price' => $request->unit_price[i],
                                'selling_price' => $request->selling_price[$i],
                                'status' => 1
                            ]);
                        }

                        if ($request->customer_id == '0') {
                            $customer = Customer::create([
                                'name' => $request->name,
                                'mobile_number' => $request->mobile_number,
                                'email' => $request->email,
                            ]);
                            $customer_id = $customer->id;
                        } else {
                            $customer_id = $request->customer_id;
                        }

                        $payment = Payment::create([
                            'invoice_id' => $invoice->id,
                            'customer_id' => $customer_id,
                            'paid_status' => $request->paid_status,
                            'discount_amount' => $request->discount_amount,
                            'total_amount' => $request->estimated_amount,
                        ]);

                        $paymentDetail = new PaymentDetail();
                        $payment = new Payment();

                        $payment->invoice_id = $invoice->id;
                        $payment->customer_id = $customer_id;
                        $payment->paid_status = $request->paid_status;
                        $payment->discount_amount = $request->discount_amount;
                        $payment->total_amount =  $request->estimated_amount;

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
                            $paymentDetail->current_paid_amount =  $request->paid_amount;
                        }

                        $payment->save();

                        $paymentDetail->invoice_id = $invoice->id;
                        $paymentDetail->date = date('Y-m-d', strtotime($request->date));
                        $paymentDetail->save();
                    }
                });
            }
            $notification = array(
                'message' => 'Invoice Data Inserted Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('backend.invoice.index')->with($notification);
        }
    }
}

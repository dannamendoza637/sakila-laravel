<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['customer', 'staff'])->paginate(20);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $customers = Customer::all();
        $staffs = Staff::all();
        return view('payments.create', compact('customers', 'staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'staff_id' => 'required',
            'amount' => 'required|numeric'
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pago creado correctamente');
    }

    public function show($id)
    {
        $payment = Payment::with(['customer', 'staff'])->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $customers = Customer::all();
        $staffs = Staff::all();

        return view('payments.edit', compact('payment', 'customers', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'staff_id' => 'required',
            'amount' => 'required|numeric'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Pago actualizado correctamente');
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect()->route('payments.index')->with('success', 'Pago eliminado');
    }
}


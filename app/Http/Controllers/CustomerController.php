<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        return view('userside.pages.become_customer');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:customers,email',
            'product_details' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('customer_files', 'public');
        }

        Customer::create($data);

        return redirect()->back()->with('success', 'Your request has been submitted successfully.');
    }
}

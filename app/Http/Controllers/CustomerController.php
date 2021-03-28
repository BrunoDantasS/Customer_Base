<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomers()
    {
        $customers = Customer::all();
        return $customers;
    }

    public function saveCustomer(Request $request)
    {
        $customer = new Customer();

        $customer->name         = $request->name;
        $customer->birth_date   = $request->birth_date;
        $customer->cpf          = $request->cpf;
        $customer->cell         = $request->cell;
        $customer->email        = $request->email;
        $customer->address      = $request->address;
        $customer->note         = $request->note;

        if ($customer->save()) {
            return response()->json(['status' => true, 'message' => 'Customer Added Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'There is some problem. Please try again.']);
        }

    }

    public function deleteCustomer($id) {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return response()->json(['status' => true, 'message' => 'Customer Deleted Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'There is some problem. Please try again.']);
        }
    }
}

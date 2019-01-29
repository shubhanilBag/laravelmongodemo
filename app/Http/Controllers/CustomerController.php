<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->save();
        return response()->json([
            "data" => "Customer ".$request->name." added successfully!"
        ],200);
    }

    public function search(Request $request)
    {
        $customer = Customer::find($request->name);
        if ($customer) {
            return response()->json([
                "data" => [
                    "name"=> $customer->name,
                    "address"=> $customer->address
                ]
            ],200);
        }
        return response()->json([
            "message" => "Customer ".$request->name." was not found!"
        ],401);
    }
}

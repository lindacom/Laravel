<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerCollection;

use App\Customers;
use App\Review;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return CustomerCollection::collection(Customer::paginate(20));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customer;
      $customers->customerName = $request->customerName;
            $customers->save();

      return response()->json([
        "message" => "customer record created"
      ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ( $request->exists() ) {
          $custreview = $request;
          return new CustomerResource(Customer::find($custreview)->review);  
        } else {
          return new CustomerResource($customer);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * e.g. UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1;
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->id;
          if (Customer::where($id)->exists()) {
            $customers = Customer::find($id);
            $customers->Email = $request->Email;
          
            $customers->save();
           
            return response([
                'data' => new CustomerResource($customers)
            ],Response::HTTP_CREATED);
          } else {
            return response()->json([
              "message" => "customer not found"
            ], 404);
          }

    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
          "message" => "customer deleted"
        ], 201);

            }
}
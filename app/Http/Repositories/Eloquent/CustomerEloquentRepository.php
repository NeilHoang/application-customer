<?php


namespace App\Http\Repositories\Eloquent;


use App\City;
use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;

class CustomerEloquentRepository implements CustomerRepositoryInterface
{
    protected $customer;
    
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    
    function index()
    {
        $customers = Customer::paginate(5);
        return $customers;
    }
    
    function save($customer)
    {
        $customer->save();
    }
    
    function find($id)
    {
        return $this->customer->findOrFail($id);
    }
    
    function delete($obj)
    {
        return $obj->delete();
    }
    
}

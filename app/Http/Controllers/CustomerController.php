<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CustomerManager;
use App\Http\Services\CustomerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    protected $customerService;
    protected $city;
    
    public function __construct(CustomerServiceInterface $customerService, City $city)
    {
        $this->customerService = $customerService;
        $this->city = $city;
        $this->middleware('auth');
    }
    
    public function index()
    {
        $customers = $this->customerService->getAll();
        $cities = $this->city->All();
        return view('customer.index', compact('customers', 'cities'));
    }
    
    public function create()
    {
        $cities = City::all();
        return view('customer.create', compact('cities'));
    }
    
    public function store(CustomerManager $request)
    {
        $this->customerService->create($request);
        return redirect()->route('customer.index');
    }
    
    public function destroy($id)
    {
        $this->customerService->delete($id);
        return redirect()->route('customer.index');
    }
    
    public function edit($id)
    {
        $customers = $this->customerService->findById($id);
        $cities = $this->city->All();
        return view('customer.edit', compact('customers', 'cities'));
    }
    
    public function update(Request $request, $id)
    {
        $this->customerService->update($id, $request);
        return redirect()->route('customer.index');
    }
    
    public function search(Request $request)
    {
        $search = $request->get('search');
        $dataSearch = DB::table("customers")->where("name", "like", "%$search%")
            ->orwhere("age", "like", "%$search%")
            ->paginate(3);
        return view('customer.search', compact('dataSearch'));
    }
}

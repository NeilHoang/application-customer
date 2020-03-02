<?php


namespace App\Http\Services\Implement;


use App\Customer;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Services\CustomerServiceInterface;
use Illuminate\Support\Facades\File;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepository;
    
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    
    function getAll()
    {
        return $this->customerRepository->index();
    }
    
    function create($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->phone = $request->phone;
        $customer->city_id = $request->city;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $this->customerRepository->save($customer);
    }
    
    public function findById($id)
    {
        return $this->customerRepository->find($id);
    }
    
    function delete($id)
    {
        $customer = $this->customerRepository->find($id);
        File::delete(storage_path("/app/public/$customer->image"));
        $this->customerRepository->delete($customer);
    }
    
    function update($id, $request)
    {
        $customer = $this->customerRepository->find($id);
        
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->phone = $request->phone;
        $customer->city_id = $request->city;
        
        if ($request->hasFile('image')) {
            File::delete(storage_path("/app/public/$customer->image"));
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $this->customerRepository->save($customer);
    }
}

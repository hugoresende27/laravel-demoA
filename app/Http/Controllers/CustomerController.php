<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositores\CustomerRepository;
use App\Repositores\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return $this->customerRepository->all();
    }

    public function show($customerID)
    {
        return $this->customerRepository->findById($customerID);
    }

    public function update($customerID)
    {
        $this->customerRepository->update($customerID);

        return redirect('/customer/'.$customerID);
    }

    public function destroy($customerID)
    {
        $this->customerRepository->delete($customerID);

        return redirect('/customers');
    }
}

<?php

namespace App\Repositores;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{

    public function all()
    {
        return Customer::orderBy('name')
            ->where ('active', 1)
            ->with ('user') //relation in model Customer, BelongsTo
            ->get()
            ->map->format();

    }


    public function findById($customerID)
    {
        return Customer::where('id', $customerID)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();
    }

    public function findByUsername($customerName)
    {

    }

    public function update($customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();

        $customer->update(request()->only('name'));
    }


    public function delete($customerId)
    {
        Customer::where('id',$customerId)->delete();
    }

}

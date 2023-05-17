<?php

namespace App\Repositores;

interface CustomerRepositoryInterface
{
    public function all();

    public function findById($customerID);

    public function findByUsername($customerName);

    public function update($customerId);

    public function delete($customerId);
}

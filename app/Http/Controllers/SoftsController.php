<?php

namespace App\Http\Controllers;

use App\Models\Softs;
use Illuminate\Http\Request;

class SoftsController extends Controller
{
    public function index()
    {
        return Softs::all();
    }

    public function findWithTrashed(int $id)
    {
        return Softs::where('id', $id)->withTrashed()->get();
    }

    public function restore(int $id)
    {
        return Softs::where('id', $id)->withTrashed()->first()->restore();
    }

    public function delete(int $id)
    {
        return Softs::where('id', $id)->delete();
    }

    public function forceDelete(int $id)
    {
        return Softs::where('id', $id)->withTrashed()->first()->forceDelete();
    }
}

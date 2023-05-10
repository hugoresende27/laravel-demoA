<?php

namespace App\Http\Controllers;

use App\Services\SampleServices;
use Illuminate\Http\Request;

class IoC_DIController extends Controller
{
    private SampleServices $sampleService;

    /**
     * @param SampleServices $sampleService
     * DEPENDENCY INJECTION ON THE CONSTRUCTOR
     */
    public function __construct(SampleServices $sampleService)
    {
        $this->sampleService = $sampleService;
    }

//    public function __invoke(Request $request)
//    {
//
//        return [1,2,3, $request->input('name')];
//    }

    public function index(Request $request, SampleServices $sampleService)
    {

        $this->sampleService->log('Hi');
        $this->check1($sampleService);
        return [1,2,3, $request->input('name')];
    }

    private function check1()
    {
        $sampleService->log('Hello');
        $this->check2($sampleService);
    }
    private function check2()
    {

        $sampleService->log('Hello World');
    }
}

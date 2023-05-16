<?php

namespace App\QueryFilters;

class Active extends Filter
{

//    public function handle($request, \Closure $next)
//    {
//        //solution 1 of refactoring
//        //parent::handle($request, $next);
//
//
//        if ( ! request()->has('active')) {
//            return $next( $request);
//        }
//
//
//        $builder = $next($request);
//
//        return $builder->where('active', request('active'));
//
//    }

    //solution 2, create protecte abstract function applyFilter in parent class
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}

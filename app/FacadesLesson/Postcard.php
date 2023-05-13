<?php

namespace App\FacadesLesson;

use Illuminate\Contracts\Container\BindingResolutionException;

class Postcard
{


    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return void
     * callStatic php feature to return any name and arguments of method
     */
    public static function __callStatic(string $method, array $arguments)
    {
        //same dump [] or make()
//        dump(app()['Postcard']);
//        dump(app()->make('Postcard'));
//
//        echo"<hr>";
//        dump($name);
//        echo"<hr>";
//        dump($arguments);

//        dd($arguments);
        return (self::resolveFacade('Postcard'))
            ->$method(...$arguments);
    }
}

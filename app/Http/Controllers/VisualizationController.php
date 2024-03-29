<?php

namespace App\Http\Controllers;

use App\Orchid\Screens\StartHandlingStatDataScreen;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use App\Services\VisualizationAggregators\AggregatorsFactory;

class VisualizationController extends Controller
{
    /**
     * @throws NotFoundExceptionInterface
     * @throws \ReflectionException
     * @throws ContainerExceptionInterface
     * @throws BindingResolutionException
     */
    public function index()
    {
        $screen = new StartHandlingStatDataScreen();

        // Отображение контента через Orchid Screen
        return $screen->handle(new Request());
    }

    public function getData()
    {
        return response()->json((new AggregatorsFactory)->process());
    }
}

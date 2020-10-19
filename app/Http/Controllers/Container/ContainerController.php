<?php

namespace App\Http\Controllers\Container;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Services\ContainerService;
use Illuminate\Http\Request;

class ContainerController extends Controller
{

    private $containerService;

    public function __construct(ContainerService $containerService)
    {
        $this->containerService = $containerService;
    }

    public function index()
    {
        $containers = $this->containerService->all();
        return view('containers.index', compact('containers'));
    }

    public function create()
    {
        return view('containers.create');
    }

    public function store(Request $request)
    {
        $this->containerService->store($request);

        return redirect()->route('containers.index');
    }

    public function edit(Container $container, Request $request)
    {
        return view('containers.edit');
    }

    public function update()
    {

    }

    public function destroy(Container $container)
    {
         $container->delete();
    }

}

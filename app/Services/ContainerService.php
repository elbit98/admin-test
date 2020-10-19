<?php

namespace App\Services;

use App\Models\Container;

class ContainerService
{

    public function all()
    {
        return Container::all();
    }

    public function store($request)
    {
        Container::create([
            'name' => $request->name,
            'working' => $request->working
        ]);
    }

}

<?php

namespace App\Http\Controllers\Container;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Services\ContainerService;
use Illuminate\Http\Request;

class CommentController extends Controller
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


}

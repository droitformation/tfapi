<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    /**
     *
     * @return Response
     */
    public function index()
    {
        return view('backend.index');
    }
}

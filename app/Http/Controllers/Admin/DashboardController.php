<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
        //if(Gate::denies('admin')){    //or simply write $this->authorize)('admin')
        //    abort(403);
        //}
        return view('admin.dashboard');
    }
}

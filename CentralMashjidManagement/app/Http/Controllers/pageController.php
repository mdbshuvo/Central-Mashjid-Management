<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pageController extends Controller
{
    //
    public function index() 
    {
        return view('login');
    }

    public function homepage() 
    {
        return view('welcome');
    }

    public function viewMashjids()
    {
        return view('viewMashjids');
    }

    public function showPeople()
    {
        return view('showPeople');
    }

    public function detailsView()
    {
        return view('detailsView');
    }

    public function newMashjid()
    {
        return view('newMashjid');
    }

    public function delete_mashjid()
    {
        return view('delMashjid');
    }

    public function addEmp()
    {
        return view('addEmp');
    }

    public function addEqp()
    {
        return view('addEqp');
    }

    public function new_expendature()
    {
    	return view('new_expendature');
    }


}

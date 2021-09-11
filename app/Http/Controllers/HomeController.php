<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("index");
    }

    public function create(){
        return view("create");
    }

    public function store(Request $request){

    }

    public function edit($id){

    }

    public function update($id, Request $request){

    }

    public function destroy($id){

    }
}

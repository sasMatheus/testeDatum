<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::table(table:'users')->paginate(perPage:5);
        dd($users);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index()
    {
        return Admin::all();
    }

    function show ($id)
    {
        return Admin::find($id);

    }

    function create (Request $request)
    {
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;
        $admin->save();

    }

    function delete ($id)
    {
        $admin = Admin::find($id);

        $admin->delete();
    }

    function update (Request $request, $id)
    {
        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;
        // $admin->save();
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importing laravel-permission models
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

//models
use Auth;
use App\Models\Teams;
use App\Models\Teamusers;
use App\Models\Teaminvitations;
use App\Models\User;

//traits
use App\Traits\Groupidentity;

//Requests
use App\Http\Requests\TeamsRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::whereNotIn('role', ["superadmin","manager"])->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

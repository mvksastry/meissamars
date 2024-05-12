<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Infrastructure;

use App\Http\Requests\InfrastructureFormRequest;

use App;
use File;

use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infra = Infrastructure::all();
        return view('facility.infrastructure.index')->with('infra', $infra);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facility.infrastructure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $infra = new Infrastructure();
        $infra->name = $input['name'];
        $infra->nickName = $input['nickname'];
        $infra->description = $input['desc'];
        $infra->date_acquired = $input['dateacqrd'];
        $infra->make = $input['make'];
        $infra->model = $input['model'];
        $infra->vendor_address = $input['vendor'];
        $infra->vendor_phone = $input['phone'];
        $infra->vendor_email = $input['email'];
        $infra->building = $input['building'];
        $infra->floor = $input['floor'];
        $infra->room = $input['room'];
        $infra->amc = $input['amc'];
        $infra->amc_start = $input['amcstart'];
        $infra->amc_end = $input['amcend'];
        $infra->supervisor = $input['supervisor'];
        //dd($infra);

        $result = $infra->save();

        return redirect()->route('infrastructure.index')
            ->with('flash_message',
             'Infrastructure entry successfully added.');
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
        $infra = Infrastructure::with('user')->where('infra_id', $id)->first();
        return view('infrastructure.nedit')->with('infra', $infra);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $infra = Infrastructure::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

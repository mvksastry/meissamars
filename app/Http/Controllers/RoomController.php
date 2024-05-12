<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Room;
use App\Models\Building;
use App\Models\Floor;

use File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;


class RoomController extends Controller
{
    use HasRoles;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('facility.rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $buildings = Building::all();
      $floors = Floor::all();
      return view('facility.rooms.create')
          ->with('buildings',$buildings)
          ->with('floors',$floors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate name and permissions field
        $this->validate($request, [
          'room' =>  'required|regex:/(^[A-Za-z0-9 -_]+$)+/|max:25',
        	'notes' => 'nullable|regex:/(^[A-Za-z0-9 -_]+$)+/|max:250'
        ]);
        
        //upload image file here
        $image = $request->file('userfile');
        
        $request->validate([
        'userfile' => 'required|image|mimes:jpeg,png,jpg|max:1048',
        ]);
        
        $oExt = $request->file('userfile')->getClientOriginalExtension();
        
        $imageName = time().'.'.$oExt;
        

        $folder = "rooms";
        $destPath = "/facility/".$folder."/";
    
        $path = $request->file('userfile')->storeAs($destPath, $imageName);
        
        
        /* Store $imageName name in DATABASE from HERE */
        $room = new Room();
        $room->building_id = 1;
        $room->floor_id = 1;
        $room->room_name = $request['room'];
        $room->notes = $request['notes'];
        $room->image_id = $imageName;
        
        $room->save();
        
        return redirect()->route('room.index')
        ->with('flash_message',
        'room'. $room->room_name.' added!');
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

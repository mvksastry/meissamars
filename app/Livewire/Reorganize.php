<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Models\Rack;
use App\Models\Cage;
use App\Models\Slot;


class Reorganize extends Component
{
    public $rackUpdate = false;

		public $layoutRack = false;
		public $cageInfos = false;
		public $reshuffle = false;

		public $reorg, $infos, $rack_id;

		public $adminFolder = "uTdd5jGuTdfHkli";

		public $destPath = "/institutions/uTdd5jGuTdfHkli/";

		public $irqMessage, $racks;
		public $rack_info, $caInfos;

    public $rack_name, $rows, $cols, $levels;
    
    public $slots;
    
    public $groups = [
                  "0"=>array("id"=>1, "name"=>"Level#1")];
                //  "1"=>array("id"=>2, "name"=>"Level#2"),
                //  "2"=>array("id"=>3, "name"=>"Level#3"),
                //  "3"=>array("id"=>4, "name"=>"Level#4")];
    
    public function render()
    {
				$rooms = Room::all();

        return view('livewire.reorganize')->with(['rooms'=>$rooms]);
    }
    
    
    public function showRacks($id)
    {
				$this->rackUpdate = true;
				//$this->rackLayout = false;
				//$this->cageInfos = false;
				$this->irqMessage = "";
				//$this->irqMessage = $id;

				$room = Room::where('image_id', $id)->first();

				$this->racks = Rack::where('room_id', $room->room_id)->get();

				$this->destPath = "/institutions/uTdd5jGuTdfHkli/";

		}
    
    public function rackLayoutTable($id)
    {
				$this->rackUpdate = true;
				$this->layoutRack = true;
				//$this->cageInfos = false;

				$this->irqMessage = "Rack Selected is: ".$id;

				$rack_info = array();

				$rackInfos = Rack::where('rack_id', $id)->first();
        $this->rack_id = $id;
				$this->rows = $rackInfos->rows;
				$this->cols = $rackInfos->cols;
				$this->levels = $rackInfos->levels;
				$this->rack_name = $rackInfos->rack_name;

				$cageIds = Slot::where('rack_id', $id)->get();

				foreach($cageIds as $val)
				{
						$info['slot_id'] = $val->slot_id;
	      		$info['cage_id'] = $val->cage_id;
	      		$info['status'] = $val->status;
						array_push($rack_info, $info);
						$info = array();
				}
        
        $this->slots = $cageIds;
       
				$this->rack_info = $rack_info;
//dd($this->rack_info);
				$this->reshuffle = true;
    }    
    
    public function updateTaskOrder($slots)
    {
      dd($slots);
        //foreach ($tasks as $task) {
        //    Task::whereId($task['value'])->update(['order' => $task['order']]);
        //}
    }

    public function updateCagelocationsOrder()
    {
      dd($this->slots);
        //foreach ($tasks as $task) {
        //    Task::whereId($task['value'])->update(['order' => $task['order']]);
        //}
    }    
    
    public function updateGroupOrder()
    {
      dd($this->slots);
        //foreach ($tasks as $task) {
        //    Task::whereId($task['value'])->update(['order' => $task['order']]);
        //}
    } 
}

<?php

namespace App\Livewire\Common\Inventory;

use Livewire\Component;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Jantinnerezo\LivewireAlert\LivewireAlert;

//Research Projects

//models
use App\Models\Categories;
use App\Models\Consumption;
use App\Models\Products;
use App\Models\Repository;
use App\Models\Supplier;
use App\Models\Units;
use App\Models\User;

//Traits
use App\Traits\Base;
use App\Traits\TCommon\Fileupload;
use Livewire\WithFileUploads;
use Validator;

//
//use App\Traits\TElab\ResProjectQueries;
use File;

// Log trails recorder
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;

class UpdateConsumption extends Component
{
	//panels
	public $viewFineChemForm = false;
	public $viewConsumptionForm = false;
	public $viewNewCategoryForm = false;
	public $viewBulkUploadOptions = false;
	public $showInventoryPanel = false;
	
	//public $viewSearchForm = false;
	public $fullInventoryTable = true;
	public $showConsumptionUpdate = false;
	public $fullInventorySearchTable = false;
  
    public function render()
    {
        return view('livewire.common.inventory.update-consumption');
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Storage;

use App\Models\Species;
use App\Models\Strain;
use App\Models\Tempproject;
use App\Models\Tempstrain;
use App\Models\Project;
use App\Models\Assent;
use App\Models\Projectstrains;

//use File;
use App\Traits\Base;
use App\Traits\Notes;
use App\Traits\NewFormDTable;

trait ProjectQueries
{
  use Base;
  use Notes;
  use NewFormDTable;

  public function projectById($id)
  {
    return Project::where('project_id', $id)->first();
  }

  public function allowedProjectIds()
  {
    return Assent::with('project')
              ->with('permitted')
              ->where('allowed_id', Auth::id())
              ->where('end_date', '>=', date('Y-m-d'))
              ->where('status', 1)
              ->get();

  }

  public function checkProjectAllowedOrNot($id)
  {
    $res = Assent::where('project_id', $id)
            ->where('allowed_id', Auth::id())
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', 1)
            ->get();

    if( count($res) == 1 )
    {
      return true;
    }
    else {
      return false;
    }

  }
}

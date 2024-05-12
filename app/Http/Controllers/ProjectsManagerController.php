<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;
use App\Models\Iaecproject;
use App\Models\Issue;
use App\Models\Projectstrains;
use App\Models\Strain;
use App\Models\Species;
use App\Models\Tempproject;
use App\Models\Tempstrain;
use App\Models\Usage;

use Illuminate\Support\Facades\Route;
//---------------

use App\Traits\ProjectDecision;
use App\Traits\StrainConsumption;
use App\Traits\costByProjectId;
use App\Traits\Openstrains;
use App\Traits\Ownerstrains;
use App\Http\Requests\ProjectApprovalRequest;

//use File;
use Validator;

  
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;

class ProjectsManagerController extends Controller
{
  use HasRoles, ProjectDecision, StrainConsumption, costByProjectId;
use Openstrains;
use Ownerstrains;

	public function __construct()
  {
    //$this->middleware(['role:manager']);
  }
  
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
    // manager can only see the project submitted by Pi belong to enterprise.

    $tps = Tempproject::with('user')->where('status', 'submitted')->get();
    $aps = Iaecproject::with('user')->where('status', 'active')->get();
  //dd($tps);
    
    /*   
    $tps = Tempproject::join('users', 'tempprojects.pi_id', '=', 'users.id')
                            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                            ->where('roles.name', '=', 'pient')
                            ->get();

    $aps = Iaecproject::join('users', 'iaecprojects.pi_id', '=', 'users.id')
                            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                            ->where('roles.name', '=', 'pient')
                            ->get();
    */
    //dd($aps);
    return view('projects.manager.index')
        ->with(['subProjects'=>$tps,
        'activeProjects'=>$aps ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //Get all strain, species information and pass it on.
		$freestrains = $this->strains_open();
		$own_strains = $this->strains_by_owner(Auth::id());

			return view('projects.manager.create',
				[	'freestrains'=>$freestrains,
						'own_strains'=>$own_strains]);
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
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function submitted($id)
  {
    $subProject = Tempproject::where('tempproject_id', $id)->first();
    $strainsPosted = Tempstrain::with('strains')
                  ->where('tempproject_id', $id )->get();
    //dd($subProject);
    return view('projects.manager.submittedProjectDetails',
              [ 'subProject'=>$subProject,
                'strainsPosted'=>$strainsPosted]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function showXC($id)
  {
    $subProjects = Tempproject::where('tempproject_id', $id)->get();
    $strainsPosted = Tempstrain::with('strains')
                  ->where('tempproject_id', $id )->get();

    return view('projects.adminApprove',
        [	'subProjects'=>$subProjects,
          'strainsPosted'=>$strainsPosted]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
    $table = $id."formd";
    
    $iaecproject = Iaecproject::with('user')->where('iaecproject_id', $id)->first();
    
    $projectstrains = Projectstrains::with('strain')
                    ->where('iaecproject_id', $id )->get();
                    
    $issueConfirmed	= Usage::with('strain')->where('iaecproject_id', $id )
                  ->whereIn('issue_status', ['confirmed'])
                  ->get();
                  
    $issue	= Usage::with('strain')->where('iaecproject_id', $id )
                    ->whereIn('issue_status', ['approved', 'issued'])
                    ->get();
                 
    $swc	= $this->consumptionByProjectId($id);
    
    $formd = DB::table($table)->get();

    $costs = $this->ProjectWiseCost($id);
    
    return view('projects.manager.showProjectDetails',
                [	'iaecproject'=>$iaecproject,
                  'projectstrains'=>$projectstrains, 
                  'swc'=>$swc, 
                  'formd'=>$formd,
                  'issue'=>$issue, 
                  'issueConfirmed'=>$issueConfirmed,
                  'costs'=>$costs
                ]);
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
    $result = Tempproject::find($id);
    $input = $request->all();
    //dd($id, $input, $result);
    if( $result != null )
    {
      $input = $request->validated();
      $input['id'] = $id;
      $input['NBformD'] = "yes";
      $msg = $this->accordDecision($input);
    }
        
    return redirect()->route('projectsmanager.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
      //
  }
}

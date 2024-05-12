<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Iaecproject extends Model
{
  use HasFactory;
  use HasRoles;
  use LogsActivity;
    
	protected $primaryKey = 'iaecproject_id';
  
	/**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'pi_id',
    'title',
    'start_date',
    'end_date',
    'iaec_meeting_info',
    'iaec_comments',
    'comments',
    'filename',
    'date_approved',
    'status',
    'formD'				
  ];
		
	public function user()
  {
    return $this->hasOne(User::class, 'id', 'pi_id');
  }
  
  public function projectstrains()
  {
    return $this->hasMany(Projectstrains::class, 'project_id', 'project_id');
  }
  
  public function iaecassents()
  {
    return $this->hasMany(Iaecassent::class, 'project_id', 'project_id');
  }

  // Customize log name
  protected static $logName = 'Project';

  // Only defined attribute will store in log while any change
  protected static $logAttributes = [
    'pi_id',
    'title',
    'start_date',
    'end_date',
    'iaec_meeting_info',
    'iaec_comments',
    'comments',
    'filename',
    'date_approved',
    'status',
    'formD'
  ];
  // Customize log description
  public function getDescriptionForEvent(string $eventName): string
  {
    return "This model has been {$eventName}";
  }

  public function getActivitylogOptions(): LogOptions
  {
    return LogOptions::defaults();
  }	  
  
  
  
}

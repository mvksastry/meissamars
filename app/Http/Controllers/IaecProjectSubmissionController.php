<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class IaecProjectSubmissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        if( Auth::user()->hasAnyRole('pient','manager') )
        {
          $input = $request->all();
                    
          $purpose = "new";
          $id = "null";
      
          $this->validate($request, [
            'title'      => 'required|regex:/(^[A-Za-z0-9 -_]+$)+/|max:200',
            'start_date' => 'required|date|date_format:Y-m-d',
            'end_date'   => 'required|date|date_format:Y-m-d|after:start_date',
            'species'    => 'present|array',
            'exp_strain' => 'present|array',
            'spcomments' => 'nullable|regex:/(^[A-Za-z0-9 -_]+$)+/',
          ]);
      
          if( $request->hasFile('projfile') )
          {
            $request->validate([
              'userfile' => 'required|mimes:pdf|max:4096'
            ]);
            
            $filename = $this->projFileUpload($request);
            // for testing uncomment below and comment above
            //$filename = "abvdedfadklj";
          }
      
          $result = $this->postProjectData($request, $purpose, $id, $filename);
          
          return redirect()->route('piprojects.index')
                  ->with('flash_message',
                      'New Project Posted Successfully.');
        }
    }
}

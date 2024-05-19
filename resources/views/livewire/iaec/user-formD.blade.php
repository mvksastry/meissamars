    <!--Table Card-->
    <div class="w-full p-3">
      <div class="bg-orange-100 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-900">Form-D</h5>
        </div>
        <div class="p-5">
          <table id="userIndex2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th colspan="6"> Form-D - Project Animal Experiments </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Project Number:
                </td>
                <td>
                  {{ $project_id }}
                </td>
                <td>
                  Address of Breeder:
                </td>
                <td>
                  AAA, BBBB, yyy
                </td>
                <td>
                  Project Start Date:
                </td>
                <td>
                {{ $start_date }}
                </td>
              </tr>
              <tr>
                <td>
                  Date of Approval:
                </td>
                <td>
                {{ $date_approved }}
                </td>
                <td>
                  Experiment In-Charge:
                </td>
                <td>
                {{ Auth::user()->name }}
                </td>
                <td>
                  Project End Date:
                </td>
                <td>
                  {{ $end_date }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    
    		<div class="border-b border-gray-800 p-3">
    			<h5 class="font-bold uppercase text-gray-900">Detailed Entries</h5>
    		</div>
    		<div class="p-5">
    			@if(count($nbes) > 0 )
    				<table id="userIndex2" class="table table-bordered table-hover">
    					<thead>
    						<tr>
    							<th> Select </th>
    							<th> AV Inf </th>
    							<th> Entered By </th>
    							<th> Date </br> Entry </th>
    							<th> Issue Id </th>
    							<th> Cage Id </th>
    							<th> Animal # </th>
    							<th> Details </th>
    							<th> Expt. Date </th>
    							<th> Expt. Desc </th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach($nbes as $row)
    							<?php $ixd = $row->project_id."_".$row->issue_id."_".$row->cage_id;?>
    							<tr>
    								<td>
    									<button wire:click="nbUpdate('{{ $ixd }}')" class="bg-blue-500 w-30 hover:bg-blue-800 text-white font-normal py-2 px-2  mx-3 rounded">Update</button>
    								</td>
    								<td>{{ ucfirst($row->av_info) }}</td>
    								<td>{{ Auth::user()->name }}</td>
    								<td>{{ $row->entry_date }}</td>
    								<td>{{ $row->issue_id }}</td>
    								<td>{{ $row->cage_id }}</td>
    								<td>{{ $row->number_animals }}</td>
    								<td>{{ $row->species_name }};{{ $row->strain_name }};{{ $row->sex }};{{ $row->age }}- {{ $row->ageunit }}</td>
    								<td>{{ $row->expt_date }}</td>
    								<td>{{ $row->expt_description }}</td>
    							</tr>
    						@endforeach
    					</tbody>
    				</table>
    			@else
    				<table id="userIndex2" class="table table-bordered table-hover">
    					<thead>
    						<tr class="border-b bg-purple-100 border-purple-200">
    							<th scope="col" class="text-sm font-medium text-gray-900 px-3 py-2 text-left">No Information to show </td>
    						</tr>
    					</thead>
    					<tbody>
    					</tbody>
    				</table>
    			@endif
    			</br></br>
        </div>
	    </div>
    </div>
<!--/table Card-->

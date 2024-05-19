	<!--Table Card-->
	<div class="w-full p-3">
        <div class="bg-orange-100 border border-gray-800 rounded shadow">
            <div class="border-b border-gray-800 p-3">
                <h5 class="font-bold uppercase text-gray-900">Form-D</h5>
            </div>
            <div class="p-5">
                <table class='w-full table-auto whitespace-wrap rounded-lg bg-white divide-y divide-gray-300'>
                	<thead class="bg-gray-900">
                		<tr class="text-white text-left">
                			<th colspan="6" class="font-semibold text-sm uppercase px-6 py-2"> Form-D - Project Animal Experiments </th>
                		</tr>
                	</thead>
                    <tbody>
                        <tr class="border-b bg-indigo-100 border-indigo-200">
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		Project Number:
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		{{ $project_id }}
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		Address of Breeder:
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		AAA, BBBB, yyy
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		Project Start Date:
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        	{{ $start_date }}
                        	</td>
                        </tr>
                        <tr class="border-b bg-indigo-100 border-indigo-200">
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		Date of Approval:
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        	{{ $date_approved }}
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		Experiment In-Charge:
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        	{{ Auth::user()->name }}
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
                        		Project End Date:
                        	</td>
                        	<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
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
    				<table class='w-full table-auto whitespace-wrap rounded-lg bg-white divide-y divide-gray-300'>
    					<thead class="bg-gray-900">
    						<tr class="text-white text-left">
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Select </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> AV Inf </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Entered By </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Date </br> Entry </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Issue Id </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Cage Id </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Animal # </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Details </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Expt. Date </th>
    							<th class="font-semibold text-sm uppercase px-6 py-2"> Expt. Desc </th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach($nbes as $row)
    							<?php $ixd = $row->project_id."_".$row->issue_id."_".$row->cage_id;?>
    							<tr class="border-b bg-indigo-100 border-indigo-200">
    								<td class="text-xs text-gray-900">
    									<button wire:click="nbUpdate('{{ $ixd }}')" class="bg-blue-500 w-30 hover:bg-blue-800 text-white font-normal py-2 px-2  mx-3 rounded">Update</button>
    								</td>
    								<td class="text-xs text-gray-900">{{ ucfirst($row->av_info) }}</td>
    								<td class="text-xs text-gray-900">{{ Auth::user()->name }}</td>
    								<td class="text-xs text-gray-900">{{ $row->entry_date }}</td>
    								<td class="text-center text-xs text-gray-900">{{ $row->issue_id }}</td>
    								<td class="text-center text-xs text-gray-900">{{ $row->cage_id }}</td>
    								<td class="text-center text-xs text-gray-900">{{ $row->number_animals }}</td>
    								<td class="text-xs text-gray-900">{{ $row->species_name }};{{ $row->strain_name }};{{ $row->sex }};{{ $row->age }}- {{ $row->ageunit }}</td>
    								<td class="text-xs text-gray-900">{{ $row->expt_date }}</td>
    								<td class="text-xs text-gray-900">{{ $row->expt_description }}</td>
    							</tr>
    						@endforeach
    					</tbody>
    				</table>
    			@else
    				<table class="w-full p-5 text-gray-700">
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

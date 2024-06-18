	<div class="p-2 mt-3 bg-grey-200 border border-gray-800 rounded shadow">
		<table class="w-full p-5 text-gray-700">
			<thead>
				<tr>
					<th align="center">
					</th>
				</tr>
			</thead>
			<tbody> 
				<tr>
					<td colspan="2">
					  <label class="block text-gray-900 text-sm font-bold mb-2" for="sampdesc">Made By</label>
						{{ Auth::user()->name }}
					</td>
					<td>
					  <label class="block text-gray-900 text-sm font-bold mb-2" for="sampdesc">Date</label>
						{{ date('Y-m-d') }}
					</td>
					<td>
					  <label class="block text-gray-900 text-sm font-bold mb-2" for="sampdesc">Code</label>
						{{ $reagentCode }}
					</td>
				</tr>
				<tr>
					<td colspan="2">
					  <label class="block text-gray-900 text-sm font-bold mb-2" for="sampdesc">Name*</label>
					  <input placeholder="Name" class="shadow appearance-none border 
					  border-red-500 rounded w-full py-1 px-1 text-gray-700 mb-1 
					  leading-tight focus:outline-none focus:shadow-outline" 
					  wire:model.defer="reagent_name">
					</td>
					<td colspan="2">
					  <label class="block text-gray-900 text-sm font-bold mb-2" for="sampdesc">Nickname*</label>
					  <input placeholder="Nickname" class="shadow appearance-none 
					  border border-red-500 rounded w-full py-1 px-1 text-gray-700 mb-1 
					  leading-tight focus:outline-none focus:shadow-outline" 
					  wire:model.defer="reagent_nickname">
					</td>
				</tr>
				<tr>
					<td colspan="4">
					  <label class="block text-gray-900 text-sm font-bold mb-2" for="sampdesc">Description*</label>
					  <input placeholder="Description" class="shadow appearance-none 
					  border border-red-500 rounded w-full py-1 px-1 text-gray-700 mb-1 
					  leading-tight focus:outline-none focus:shadow-outline" 
					  wire:model.defer="reagent_desc">
					</td>
				</tr>
				<tr>
					<td colspan="4">
					  <label class="block text-gray-900 text-sm font-normal font-bold mb-2" for="type">Classification*</label>
						<div class="relative h-8 w-full min-w-[200px]">
							<select wire:model="reagentClassCode" 
								class="form-select appearance-none
                              block w-full px-3 py-1.5 text-base font-normal
                              text-gray-700 bg-white bg-clip-padding bg-no-repeat
                              border border-solid border-gray-300
                              rounded transition ease-in-out m-0
                              focus:text-gray-700 focus:bg-white 
										border border-red-500 rounded focus:border-blue-600 
										focus:outline-none">
									<option value="-1">Select</option>
									<option value="1">Custom</option>
									<option value="2">Bulk Media-Buffers-Solutions</option>
							</select>
						</div>
					</td>										
				</tr>
			</tbody>
		</table>
	</div>	
	<div class="p-2 mt-3 bg-grey-200 border border-gray-800 rounded shadow">	
		<table class="w-full p-5 text-gray-700">
			<thead>
			</thead>
			<tbody>	
				<tr>
					<td colspan="4">
						<label class="block text-gray-900 text-sm font-bold pt-3 mb-2" for="stroeinfos">
							Ingradients*  (Select from inventory panel)
						</label>
					</td>
				</tr>	
			</tbody>
		</table>
		
		@if($searchResultBox1)
			<div class="p-2 bg-grey-200 border border-gray-800 rounded shadow">
				<table class="text-gray-900 text-sm font-normal pt-3 pb-2 mb-2">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						@foreach($inputs as $key1 => $row)
							<tr>
								<td class="px-2 py-2 text-sm text-gray-900"> Pack Mark Code</td>
								<td>
									{{ $inputs[$key1]['pmc'] }}
								</td>
							</tr>
							<tr>
								<td class="px-2 py-2 pb-2 text-sm text-gray-900">Name</td>
								<td>
									{{ $inputs[$key1]['name'] }}
								</td>
							</tr>
							<tr>
								<td class="px-2 py-2 pb-2 text-sm text-gray-900">Quantity</td>
								<td>      
									<input type="text" class="w-1/2 shadow appearance-none border border-red-500 
										rounded w-auto py-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  wire:model="quantityProd.{{ $key1 }}" placeholder="Used">
										@if($inputs[$key1]['unit_desc1'] == 'm') &#956; @endif{{ $inputs[$key1]['unit_desc2'] }}
										@error('usageProd.'.$row['usage']) 
										<span class="text-danger error">{{ $message }}</span>
										@enderror
									
								</td>
							</tr>
							<tr>
								<td class="px-2 py-2 text-sm text-gray-900">Usage</td>
								<td>      
									<input type="text" class="w-full shadow appearance-none border border-red-500 
										rounded w-auto py-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline"  wire:model="usageProd.{{ $key1 }}" placeholder="Description">
										@error('usageProd.'.$row['usage']) 
										<span class="text-danger error">{{ $message }}</span>
										@enderror
								</td>
							</tr>
							<tr class="pb-2">
								<td colspan="2">
									<button class="bg-pink-500 w-30 hover:bg-blue-800 text-white font-normal py-2 px-3 mx-3  rounded" wire:click.prevent="remove({{$key1}})">Remove</button>
								</td>
							</tr>								
						@endforeach
					</tbody>    
				</table>
			</div>
		@endif

		<table class="w-full p-5 text-gray-700">
			<thead>
			</thead>
			<tbody>		
				<tr>
					<td >
					  <label class="block text-gray-900 text-sm font-normal font-bold mb-2" for="type">Quantity Made*</label>
					  <input class="shadow appearance-none border border-red-500 rounded 
					  w-full py-1 text-gray-700 mb-1 leading-tight focus:outline-none 
					  focus:shadow-outline" placeholder="Number only" 
					  wire:model="quantity_made" type="text">
					</td>
					<td>
						<label class="block text-gray-900 text-sm font-bold font-normal mb-2" for="bulkcode">Unit Desc</label>
						<div class="relative h-8 w-full min-w-[200px]">
							<select wire:model="units_desc" 
								class="form-select appearance-none
                              block w-full px-3 py-1.5 text-base font-normal
                              text-gray-700 bg-white bg-clip-padding bg-no-repeat
                              border border-solid border-gray-300
                              rounded transition ease-in-out m-0
                              focus:text-gray-700 focus:bg-white 
										border border-red-500 rounded focus:border-blue-600 
										focus:outline-none">
								<option value="-1">Select</option>
									@foreach($units as $unit)
									<option value="{{ $unit->unit_id }}">{{ ucfirst($unit->description) }}</option>
									@endforeach
							</select>
						</div>
					</td>
					<td>
					  <label class="block text-gray-900 text-sm font-normal font-bold mb-2" for="type">Expiry Date*</label>
					  <input class="shadow appearance-none border border-red-500 rounded 
					  w-full py-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" 
					  id="description" wire:model="expirty_date" type="date">
					</td>											
				</tr>
			</tbody>
		</table>
	</div>
	<div class="p-2 mt-3 bg-grey-200 border border-gray-800 rounded shadow">
		<table class="w-full p-5 text-gray-700">
			<thead>
			</thead>
			<tbody>			
				<tr>
					<td colspan="4"> 
						<label class="block text-gray-900 text-sm font-bold pt-3 mb-2" for="stroeinfos">
							Storage Information*
						</label>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<label class="block text-gray-900 text-sm font-bold font-normal mb-2" for="username">Container*</label>
						<div class="relative h-8 w-72 min-w-[200px]">
							<select wire:model="container_id" 
								class="form-select appearance-none
                              block w-full px-3 py-1.5 text-base font-normal
                              text-gray-700 bg-white bg-clip-padding bg-no-repeat
                              border border-solid border-gray-300
                              rounded transition ease-in-out m-0
                              focus:text-gray-700 focus:bg-white 
										border border-red-500 rounded focus:border-blue-600 
										focus:outline-none">
								<option value="-1">Select</option>
								@foreach($repositories as $row)
								<option value="{{ $row->repository_id }}">{{ $row->repository_type }}</option>
								@endforeach
							</select>
						</div>
					</td>
					<td colspan="2">
						<label class="block text-gray-900 text-sm font-bold font-normal mb-2" for="username">Compartment ID*</label>
						<input size="15" placeholder="Compartment" class="shadow appearance-none border 
						border-red-500 rounded w-full py-1 text-gray-700 mb-1 leading-tight focus:outline-none 
						focus:shadow-outline" id="validTill" wire:model="rack_shelf" type="text">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label class="block text-gray-900 text-sm font-bold font-normal mb-2" for="username">Box/Sack ID*</label>
						<input size="15" placeholder="Box or Sack" class="shadow appearance-none border 
						border-red-500 rounded w-full py-1 text-gray-700 mb-1 leading-tight focus:outline-none 
						focus:shadow-outline" id="validTill" wire:model="box_sack" type="text">
					</td>
					<td colspan="2">
						<label class="block text-gray-900 text-sm font-bold font-normal mb-2" for="seriescode">Location ID</label>
						<input size="15" placeholder="Location" class="shadow appearance-none border 
						border-red-500 rounded w-full py-1 text-gray-700 mb-1 leading-tight focus:outline-none 
						focus:shadow-outline" id="approvedRef" wire:model="location_code" type="text">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="p-2 mt-3 bg-grey-200 border border-gray-800 rounded shadow">
		<table class="w-full p-5 text-gray-700">
			<thead>
			</thead>
			<tbody>			
				<tr>
					<td colspan="4"> 
						<label class="block text-gray-900 text-sm font-bold pt-3 mb-2" for="stroeinfos">
							Open or Restricted
						</label>   
					</td>
				</tr>
					<td colspan="2">
						<div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
							<input wire:model="openrestriced" value="1"
							  class="relative float-left mt-0.5 mr-1 -ml-[1.5rem] h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
							  type="radio"/>
							<label
							  class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
							  for="radioDefault01">
							  Open 
							</label>
						</div>
					</td>
					<td colspan="2">
						<div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
							  <input wire:model="openrestriced" value="0"
							  class="relative float-left mt-0.5 mr-1 -ml-[1.5rem] h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
							  type="radio"/>
							<label
							  class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer"
							  for="radioDefault01">
							  Restricted
							</label>
						</div>
					</td>
				</tr>
				
				<tr>
					<td colspan="4">
						<label class="block text-gray-900 text-sm pt-3 mb-2" for="sampdesc">
							Notes, If any
						</label>
						<input placeholder="Sample remarks, if any" class="h-15 shadow appearance-none 
						border border-red-500 rounded w-full py-1 px-1 text-gray-700 mb-1 leading-tight 
						focus:outline-none focus:shadow-outline" wire:model.defer="note_remark">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<table class="w-full p-5 text-gray-700">
		<thead>
			<tr>
				<th align="center">
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				 <td colspan="3" class="text-sm text-gray-900">
					</br>
					@hasanyrole('pisg|researcher|veterinarian')
					<button wire:click="postReagentInfo()" class="bg-green-800 w-22 hover:bg-blue-800 text-white font-normal py-2 px-4 mx-3  rounded">Post Reagent</button>
					@endhasanyrole
				 </td>
			</tr>
		</tbody>    
	</table>	
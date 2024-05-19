<!--Table Card-->
<div class="w-full p-3">
	<div class="bg-orange-100 border border-gray-800 rounded shadow">
		<div class="border-b border-gray-800 p-3">
		<h5 class="font-bold uppercase text-gray-900">Form-D / Note Book Entries: Input Fields with * Mandatory</h5>
		</div>
		<div class="p-5">
			<table class='w-full table-auto whitespace-wrap rounded-lg bg-white divide-y divide-gray-300'>
				<thead class="bg-gray-900">
					<tr class="text-white text-left">
						<th class="font-semibold text-sm uppercase px-6 py-2"> Entered By </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Entry Date </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Animal # </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Details </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Expt. Date </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Expt. Desc </th>
					</tr>
				</thead>
				<tbody>
					@foreach($nbqs as $row)
						<tr class="border-b bg-indigo-100 border-indigo-200">
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ Auth::user()->name }}</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->entry_date }}</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->number_animals }}</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->species_name }};{{ $row->strain_name }};{{ $row->sex }};{{ $row->age }}- {{ $row->ageunit }}</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->expt_date }}</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->expt_description }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<!-- inser another table showing images -->
			</br>
			@if($nbimages != 'None')
				<table class="w-full p-5 text-gray-700">
					<thead>
					</thead>
					<tbody>
						<tr>
							<td class="text-xs font-bold text-gray-900">NoteBook ID</td>
							<td class="text-xs font-bold text-gray-900">Name</td>
							<td class="text-xs font-bold text-gray-900">Date </td>
							<td class="text-xs font-bold text-gray-900">Cage # </td>
							<td class="text-xs font-bold text-gray-900">Notes</td>
							<td class="text-xs font-bold text-gray-900">Image</td>
						</tr>
						@foreach($nbimages as $row)
							<?php   $folder = Auth::user()->folder;
							$tenant = tenant('id');
							$path = 'institutions/'.$folder.'/'.$row->image_file; ?>
							<tr class="border-b bg-indigo-100 border-indigo-200">
								<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->notebook_id }}</td>
								<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->staff_name }}</td>
								<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->entry_date }}</td>
								<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->cage_id }};{{ $row->strain_name }};{{ $row->sex }};{{ $row->age }}- {{ $row->ageunit }}</td>
								<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $row->remarks }}</td>
								<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"><img class="w-20 h-20 " src="{{ asset($path) }}" alt="User Avatar"></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
			</br>
			<!-- inser another table showing images -->

			<table class='w-full table-auto whitespace-wrap rounded-lg bg-white divide-y divide-gray-300'>
				<thead class="bg-gray-900">
					<tr class="text-white text-left">
						<th class="font-semibold text-sm uppercase px-6 py-2"> Usage Id* </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Cage Id* </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Expt. Date </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Protocol </th>
					</tr>
				</thead>
				<tbody>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							{{ $idissue }}
						</td>
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							{{ $idcage }}
						</td>
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<input class="shadow appearance-none border border-red-500 rounded  py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="expdate" wire:model.defer="dateexpt" type="date">
						</td>
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<input class="shadow appearance-none border border-red-500 rounded py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="protocolId" wire:model.defer="idprotocol" type="text">
						</td>
					</tr>
				</tbody>
			</table>
			</br>
			<table class='w-full table-auto whitespace-wrap rounded-lg bg-white divide-y divide-gray-300'>
				<thead class="bg-gray-900">
					<tr class="text-white text-left">
						<th class="font-semibold text-sm uppercase px-6 py-2"> Experiment Description </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap" colspan="5">
							<textarea placeholder="Description" class="h-40 shadow appearance-none border border-red-500 rounded w-full py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" wire:model.defer="descexpt"></textarea>
						</td>
					</tr>
				</tbody>
			</table>
		</br>
		<table class='w-full table-auto whitespace-wrap rounded-lg bg-white divide-y divide-gray-300'>
			<thead class="bg-gray-900">
				<tr class="text-white text-left">
					<th colspan="4" class="font-semibold text-sm uppercase px-6 py-2"> Images / Videos </th>
				</tr>
			</thead>
			<tbody>
				<tbody>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap" colspan="4">
						</td>
					</tr>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<input type="file" class="w-60 form-control" wire:model.defer="expimages" multiple>
							@if($errors->has('expimages.*'))
							<p class="help-block text-red-900">
							{{ $errors->first('empimages') }}
							</p>
							@endif
						</td>
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap" colspan="3">
							<input type="text" class="w-96 shadow appearance-none border border-red-500 rounded py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Legend" wire:model="legend">
							@error('legend.0') <span class="text-danger error">{{ $message }}</span>@enderror
						</td>
					</tr>
					<tr>
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap" colspan="4" align="center">
							</br>
							<button wire:click="saveNotebook()" class="bg-pink-500 w-30 hover:bg-blue-800 text-white font-normal py-2 px-3 mx-3  rounded">Note Book</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--/table Card-->

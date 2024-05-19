<!--Table Card-->
<div class="w-1/2 p-3">
	<div class="bg-orange-100 border border-gray-800 rounded shadow">
		<div class="border-b border-gray-800 p-3">
		<h5 class="font-bold uppercase text-gray-900">Select File</h5>
		</div>
		<div class="p-5">

			<table class='table-auto mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
				<thead class="bg-gray-900">
					<tr class="text-white text-left">
						<th colspan ="3" class="font-semibold text-sm uppercase px-6 py-2"> Report for Project ID: {{ $project_id }} </th>
					</tr>
				</thead>
				<tbody>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							Report
						</td>
						<td colspan ="2" class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<select name="type" wire:model="reportx" class="shadow appearance-none border border-red-500 rounded w-auto py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="reportx" name="reportx" type="select">
							<option value="Monthly">Montly</option>
							<option value="Querterly">Querterly</option>
							<option value="HalfYear">Half Year</option>
							<option value="Annual">Annual</option>
							<option value="Completion">Completion</option>
						</td>
					</tr>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							From
						</td>
						<td colspan ="2" class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<input size="5" wire:model="repFromDate" class="shadow appearance-none border border-red-500 rounded w-auto py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="repFromDate" name="repFromDate" type="date">
						</td>
					</tr>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							To
						</td>
						<td colspan ="2" class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<input size="5" wire:model="repToDate" class="shadow appearance-none border border-red-500 rounded w-auto py-1 px-1 text-gray-700 mb-1 leading-tight focus:outline-none focus:shadow-outline" id="repToDate" name="repToDate" type="date">
						</td>
					</tr>
					<tr class="border-b bg-indigo-100 border-indigo-200">
						<td colspan ="3" class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<input type="file" wire:model="photo">
							@error('photo')
							<span class="error">{{ $message }}</span>
							@enderror
						</td>
					</tr>
					<tr>
						<td colspan ="2">
						</td>
						<td align="right">
							<button wire:click="" class="bg-blue-500 w-20 hover:bg-blue-800 text-white font-normal py-2 px-2  mx-3 rounded">Save</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--/table Card-->

<!--Table Card-->
<div class="w-1/2 p-3">
	<div class="bg-orange-100 border border-gray-800 rounded shadow">
		<div class="border-b border-gray-800 p-3">
			<h5 class="font-bold uppercase text-gray-900">List of Reports for Project Id: {{ $project_id }}</h5>
		</div>
		<div class="p-5">
			<table class='table-auto mx-auto w-full whitespace-wrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
				<thead class="bg-gray-900">
					<tr class="text-white text-left">
						<th class="font-semibold text-sm uppercase px-6 py-2"> Type </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> From </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> To </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> Posted By </th>
						<th class="font-semibold text-sm uppercase px-6 py-2"> View </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($projReps as $val)
						<tr class="border-b bg-indigo-100 border-indigo-200">
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							{{ $val->report_type}}
							</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							{{ date('d-m-Y', strtotime($val->date_from))}}
							</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							{{ date('d-m-Y', strtotime($val->date_to))}}
							</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							{{ $val->user->name}}
							</td>
							<td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">
							<button wire:click="piReportDownload('{{ $val->filename }}')" class="bg-blue-500 w-20 hover:bg-blue-800 text-white font-normal py-2 px-2  mx-3 rounded">View</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--/table Card-->

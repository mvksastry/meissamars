<div class="w-1/2 md-1/2">
	<div class="bg-purple-100 border border-gray-800 rounded shadow">
		<div class="border-b border-gray-800">
			<h5 class="font-bold uppercase mx-3 text-gray-600"><font color="blue">{{ $speciesName }}</font> to DB: </h5>
		</div>
		<div class="p-1">
			<table class="w-full p-5 text-sm text-gray-900">
				<thead>
				</thead>
				<tbody>
					<tr class="bg-warning">
						<td colspan="2" class="border px-2 p-1">
							You can add to DB only when the Total A = B + C + D + E + F.
						</td>
					</tr>
					<tr>
						<td class="mx-4">
							Put pups in Database
						</td>
						<td class="mx-4">
							<input wire:model.lazy="ppidb" type="checkbox" value="true">
						</td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              Auto Generate mouse Records
						</td>
            <td class="border px-2 p-1">
							<input wire:model.lazy="agmr" type="checkbox" value="true">
						</td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              Females First
						</td>
            <td class="border px-2 p-1">
              <input wire:model.lazy="femaleFirst" value="true" type="checkbox">
						</td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              Base Mouse Id
            </td>
            <td class="border px-2 p-1">
              <input wire:model.lazy="baseMouseId" type="text">
						</br>
						<button class="btn btn-primary btn-sm rounded">Populate ID</button>
						<button class="btn btn-primary btn-sm rounded">Search ID</button>
            </td>
					</tr>
					<tr>
						<td class="border px-2 p-1 bg-gray-300">
              Protocol ID
						</td>
            <td class="border bg-gray-300 px-2 p-1">
							<select wire:model.lazy="protoKey" >
                <option value="null">Select</option>
                  @foreach($protocols as $item)
                    <option value="{{ $item->_mouseProtocol_key }}">{{ $item->id }}</option>
                  @endforeach
              </select>
						</td>
					</tr>
					<tr>
						<td class="border px-2 p-1 bg-gray-300">
              Use Schedules
            </td>
            <td class="border px-2 p-1 bg-gray-300">
							<select wire:model.lazy="useScheduleKeys" multiple>
							<option value=""></option>
								@foreach($useScheduleTerms as $item)
									<option value="{{ $item->_useScheduleTerm_key }}">{{ $item->useScheduleTermName }}</option>
								@endforeach
							</select>
            </td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              Leave Pups in Mating Cage
            </td>
            <td class="border px-2 p-1">
              <input wire:model.lazy="lpimc" type="checkbox">
            </td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              Cage Id
						</td>
            <td class="border px-2 p-1">
              <input wire:model.lazy="cageId" type="text">
							<button class="btn btn-primary btn-sm rounded">Cage Info</button>
						</td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              # Females / Cage
            </td>
            <td class="border px-2 p-1">
                <input wire:model.lazy="femalePerCage" type="text">
            </td>
					</tr>
					<tr>
						<td class="border px-2 p-1">
              # Males / Cage
            </td>
            <td class="border px-2 p-1">
              <input wire:model.lazy="malePerCage" type="text">
            </td>
					</tr>

					@if($litterCalculation)
            <tr>
              <td class="border px-2 p-1">
                <button wire:click="post" class="btn btn-primary rounded">Enter</button>
              </td>
              <td class="border px-2 p-1">
                <button wire:target.prevent="resetForm" class="btn btn-primary rounded">Cancel</button>
              </td>
            </tr>
					@endif

				</tbody>
			</table>
			<div>
			</div>
		<!-- Submit Button -->
		</div>
	</div>
</div>
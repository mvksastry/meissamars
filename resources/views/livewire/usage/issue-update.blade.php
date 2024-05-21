	<div class="inline-flex flex-row flex-wrap flex-grow mt-2">
		<!-- Right Panel Graph Card-->
    <div class="w-1/2 md:w-1/2 p-3">
    	<div class="bg-orange-100 border border-gray-800 rounded shadow">
     		<div class="border-b border-gray-800 p-3">
     			<h5 class="font-bold uppercase text-gray-900">Issue Request Form</h5>
     		</div>
				<div class="errors">
					<span class="mx-5 my-3 text-base text-red-900 text-sm">
						{{ $irqMessage }}
					</span>
				</div>
        <div class="p-5">
					<div class="">
						<form>
            	<table class="table table-hover" align='l'>
								<tr>
         					<td class="text-text-base text-left text-gray-900">Request Id</td>
									<td class="text-sm text-left text-gray-900"></td>
									<td class="text-sm text-left text-gray-900">
										{{ $issue_id }}
									</td>
       					</tr>
								<tr>
           				<td class="text-text-base text-left text-gray-900">Project Id</td>
									<td class="text-sm text-left text-gray-900"></td>
									<td class="text-sm text-left text-gray-900">
									{{ $project_id }}
									</td>
       					</tr>
								<tr>
           				<td class="text-text-base text-left text-gray-900">Strain</td>
									<td class="text-sm text-left text-gray-900"></td>
									<td class="text-sm text-left text-gray-900">
										<select class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" name="psbi1" id="psbi1" wire:model.lazy="psbi1">
										<option value="">Select</option>
										@foreach($psbi as $val)
										<option value="{{ $val['species_id'].";".$val['strain_id'] }}">{{ $val['name'] }}</option>
										@endforeach
									</select>
									</td>
       					</tr>
								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('psbi1')
											<span class="text-red-500 text-sm">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
       					<tr>
         					<td class="text-base text-left text-gray-900">
         						Sex
									</td>
									<td></td>
									<td class="text-xs text-left text-gray-900">
										<select class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" name="sex" id="sex" wire:model.lazy="sex">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Any">Any</option>
									</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('sex')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
								<tr>
	                <td class="text-base text-left text-gray-900">
	                  Age
	                </td>
	                <td class="text-xs text-left text-gray-900">
	                </td>
	                <td class="text-xs text-left text-gray-900">
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="age" placeholder="Age" wire:model="age">
	                </td>
								</tr>
								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('age')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
					      <tr>
					        <td class="text-base text-left text-gray-900">Age - Unit</td>
									<td class="text-xs text-left text-gray-900"></td>
					        <td class="text-xs text-left text-gray-900">
										<select class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" name="ageunit" id="ageunit" wire:model.lazy="ageunit">
											<option value="">Select</option>
											<option value="Days">Days</option>
											<option value="Weeks">Weeks</option>
											<option value="Months">Months</option>
											<option value="Years">Years</option>
										</select>
					        </td>
					      </tr>
		            <tr>
									<td colspan="2"></td>
									<td>
										@error('ageunit')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
								<tr>
                	<td class="text-base text-left text-gray-900">Required Number</td>
									<td ></td>
									<td class="text-base text-left text-gray-900">
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="number" placeholder="Number" wire:model="number">
									</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td>
											@error('number')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
											@enderror
									</td>
								</tr>
						    <tr>
						      <td class="text-base text-left text-gray-900">
						        Number of Cages
						      </td>
						      <td class="text-base text-left text-gray-900"></td>
						      <td class="text-xs text-left text-gray-900">
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="cagenumber" placeholder="Cage Number" wire:model="cagenumber">
						      </td>
						    </tr>
								<tr>
									<td colspan="2"></td>
									<td>
										@error('cagenumber')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
						    <tr>
						      <td class="text-base text-left text-gray-900">
						        Expt Termination
						      </td>
						      <td class="text-xs text-left text-gray-900"></td>
						      <td class="text-xs text-left text-gray-900">
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="termination" placeholder="Termination" wire:model="termination">
						      </td>
						    </tr>
								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('termination')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
						    <tr>
						      <td class="text-base text-left text-gray-900">
						        Animal Products
						      </td>
						      <td class="text-xs text-left text-gray-900"></td>
						      <td class="text-xs text-left text-gray-900">
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="products" placeholder="Products" wire:model="products">
									</td>
						    </tr>
								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('products')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
						    <tr>
						      <td class="text-base text-left text-gray-900">Issue Remarks</td>
						      <td class="text-xs text-left text-gray-900"></td>
						      <td class="text-xs text-left text-gray-900">
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="remarks" placeholder="Remarks" wire:model="remarks">
						      </td>
						    </tr>
								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('products')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
							  <tr>
							    <td class="text-xs text-left text-gray-900" colspan="3">
										<input type="checkbox" class="shadow appearance-none border rounded py-2 px-2  text-base text-gray-200 leading-tight focus:outline-none focus:shadow-outline" id="agree" placeholder="Agree" wire:model="agree" value="1">
							      <label class="mb-5 text-base"for="agree">Have you submitted all reports?</label>
							    <td></td>
							  </tr>
								<tr>
									<td colspan="2"></td>
									<td>
										@error('agree')
											<span class="text-red-500 text-xs">
												{{ $message }}
											</span>
										@enderror
									</td>
								</tr>
						    <tr>
						      <td class="text-base text-left text-gray-900" colspan="3">
										<button wire:click.prevent="store()" class="bg-green-900 hover:bg-green-500 text-white font-normal py-2 px-4 mt-8 rounded">Submit</button>
						      </td>
						    </tr>
            	</table>
						</form>
					</div>
        </div>
      </div>
		</div>
		<!-- / End of right Panel Graph Card-->
  </div>
<!--/table Card-->

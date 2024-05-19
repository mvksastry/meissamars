<!--Table Card-->
		<div class="bg-orange-100 border border-gray-800 rounded shadow">
			<div class="border-b border-gray-800 p-3">
				<h5 class="font-bold uppercase text-gray-900">Details</h5>
			</div>
			<div class="p-5">
        <table id="userIndex2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th> Information </th>
							<th> Detail </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<p> Title </p>
							</td>
							<td>
								<p> {{ $title }} </p>
							</td>
						</tr>

						<tr>
							<td>
								<p> Start Date </p>
							</td>
							<td>
								<p> {{ date('d-m-Y', strtotime($start_date)) }} </p>
							</td>
						</tr>

						<tr>
							<td>
								<p> End Date </p>
							</td>
							<td>
								<p> {{ date('d-m-Y', strtotime($end_date)) }} </p>
							</td>
						</tr>

						<tr>
							<td>
								<p> Date Approved </p>
							</td>
							<td>
								<p> {{ $date_approved }} </p>
							</td>
						</tr>

						<tr>
							<td>
								<p> IAEC Meeting </p>
							</td>
							<td>
								<p> {{ $iaec_meeting_info }} </p>
							</td>
						</tr>

						<tr>
							<td>
								<p> IAEC Comments </p>
							</td>
							<td>
								<p> {{ str_replace("none", "", $iaec_comments) }} </p>
							</td>
						</tr>

						<tr>
							<td>
								File
							</td>
							<td>
								<button wire:click="piprojectDownload('{{ $projfile }}')" class="bg-blue-500 w-30 hover:bg-blue-800 text-white font-normal py-2 px-2 rounded">View Projet</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<!-- / End of table Card-->

	<!-- Left Panel Graph Card-->
    <div class="bg-orange-100 border border-gray-800 rounded shadow">
  		<div class="border-b border-gray-800 p-3">
        <h5 class="font-bold uppercase text-gray-900">Usage: Strain wise Issue Info</h5>
  		</div>
			<div class="p-5">
				@if(count($issueConfirmed) > 0)
          <table id="userIndex2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th> Usage ID </td>
								<th> Date </td>
								<th> Strain </td>
								<th> Number </td>
								<th> Cages </td>
								<th> Status </td>
							</tr>
						</thead>
						<tbody>
							@foreach($issueConfirmed as $val)
								<tr>
									<td>
						      	{{ $val->usage_id }}
						      </td>
						      <td>
										{{ date('d-m-Y', strtotime($val->status_date)) }}
						      </td>

						      <td>
						      	{{ $val->strain->strain_name }}
						      </td>
						      <td>
						      	{{ $val->number }}
						      </td>
						      <td>
						      	{{ $val->cagenumber }}
						      </td>
									<td>
						      	{{ ucfirst($val->issue_status) }}
						      </td>
						    </tr>
							@endforeach
						</tbody>
					</table>
				@else
          <table id="userIndex2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th> No Entries Found. </td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				@endif
			</div>

      <div class="p-5">
        <div class="content table-responsive table-full-width">
          <table id="userIndex2" class="table table-bordered table-hover">
						<thead>
							<tr>
	              <th>Strain</td>
	              <th>Sanctioned <br>(All Years)</td>
	              <th>Total Consumed <br> (All Years)</td>
	              <th>Balance (All Years)</td>
	              <th>Cur. <br> Year <br>Limit</td>
	              <th>Cur. <br>Year <br> Used</td>
	              <th>Cur. <br> Year <br> Left</td>
							<tr>
						</thead>
						<tbody>
						<?php $strainwise_info = array(); ?>
        			@if (!empty($swc))
        				@foreach ($swc as $row)
                  <tr>
                    <td>{{ $row[0] }}</td>
                    <td>{{ $row[2] }}</td>
                    <td>{{ $row[1] }}</td>
                    <td>{{ $row[2]-$row[1] }}</td>
				  					<td>{{ $row[4] }}</td>
                    <td>{{ $row[3] }}</td>
                    <td>{{ $row[4]-$row[3] }}</td>
                  </tr>
        				@endforeach
        			@endif
      				<tr>
        				<td colspan='7' class="text-xs text-left text-gray-900">End of Details</td>
      				</tr>
						</tbody>
        	</table>
    		</div>
  		</div>
		</div>
	<!-- / End of Left Panel Graph Card-->

	<!--Table Card-->
		<div class="bg-orange-100 border border-gray-800 rounded shadow">
  		<div class="border-b border-gray-800 p-3">
    		<h5 class="font-bold uppercase text-gray-900">Cost</h5>
  		</div>
  		<div class="p-5">
        <table id="userIndex2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>
								Click the Cost to view all details</th>
						<tr>
					</thead>
					<tbody>
					</tbody>
				</table>
  		</div>
		</div>
  </div>
	<!--/table Card-->

	<!-- Right Panel Graph Card-->
		<div class="bg-orange-100 border border-gray-800 rounded shadow">
  		<div class="border-b border-gray-800 p-3">
    			<h5 class="font-bold uppercase text-gray-900">Usage Request Form</h5>
  		</div>
			<div class="errors">
				<span class="mx-5 my-3 text-base text-red-900 text-lg">
					{{ $irqMessage }}
				</span>
			</div>
	  	<div class="p-5">
				<div class="">
					<form>
            <table id="userIndex2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>
										Item
									</th>
									<th>
									</th>
									<th>
										Details
									</th>
								<tr>
							</thead>
		      		<tbody>
								<tr>
		          		<td>Project Id</td>
									<td></td>
									<td>
									{{ $project_id }}
									</td>
		        		</tr>

								<tr>
		          		<td>Strains</td>
									<td></td>
									<td>
										<select class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" name="pstx1" id="pstx1" wire:model.lazy="pstx1">
										<option value="">Select</option>
										@foreach($pstx as $val)
										<option value="{{ $val['species_id'].";".$val['strain_id'] }}">{{ $val['name'] }}</option>
										@endforeach
									</select>
									</td>
		        		</tr>

								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('pstx1')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>

	      				<tr>
	        				<td>
	          					Sex
									</td>
									<td></td>
									<td>
										<select class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" name="sex" id="sex" wire:model.lazy="sex">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Any">Any</option>
										</select>
									</td>
								</tr>

								<tr>
									<td colspan="2"></td>
									<td>
										@error('sex')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>

								<tr>
		      				<td>
		        					Age
		      				</td>
		      				<td>
		      				</td>
		      				<td>
										<input type="text" id="age" placeholder="Age" wire:model="age">
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

	              <tr class="border-b bg-indigo-100 border-indigo-200">
	                <td>Age - Unit</td>
	                <td></td>
	                <td>
										<select name="ageunit" id="ageunit" wire:model.lazy="ageunit">
											<option value="">Select</option>
											<option value="Days">Days</option>
											<option value="Weeks">Weeks</option>
											<option value="Months">Months</option>
											<option value="Years">Years</option>
										</select>
	                </td>
	              </tr>

	      				<tr>
									<td colspan="2">
									</td>
									<td>
										@error('ageunit')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>

								<tr>
	        				<td>Required Number</td>
	      					<td></td>
									<td>
										<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="number" placeholder="Number" wire:model="number">
									</td>
								</tr>

								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('number')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>

	              <tr>
	                <td>
	                  Number of Cages
	                </td>
	                <td></td>
	                <td>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-base text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="cagenumber" placeholder="Cage Number" wire:model="cagenumber">
	                </td>
	              </tr>

								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('cagenumber')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>

	              <tr>
	                <td>
	                  Expt Termination
	                </td>
	                <td></td>
	                <td>
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
	                <td>
	                  Animal Products
	                </td>
	                <td></td>
	                <td>
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
	              	<td>Issue Remarks</td>
	              	<td></td>
	              	<td>
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
	                <td colspan="3">
										<input type="checkbox" class="shadow appearance-none border rounded py-2 px-2  text-base text-gray-200 leading-tight focus:outline-none focus:shadow-outline" id="agree" placeholder="Agree" wire:model="agree" value="1">
	                <label class="mb-5 text-base"for="agree">Have you submitted all reports?</label>
	              </tr>

								<tr>
									<td colspan="2">
									</td>
									<td>
										@error('agree')
											<span class="text-red-500 text-xs">
											{{ $message }}
											</span>
										@enderror
									</td>
								</tr>

	          		<tr>
		            	<td>
										<button wire:click.prevent="store()" class="bg-green-900 hover:bg-green-500 text-white font-normal py-2 px-4 mt-8 rounded">Submit</button>
		              </td>
									<td>
									</td>
									<td>
										<form>
											<button wire:click.prevent="resetIssueForm()" class="bg-red-500 hover:bg-red-900 text-white font-normal mt-8 py-2 px-4 rounded">Reset</button>
										</form>
									</td>
	            	</tr>
							</tbody>
	      		</table>
					</form>
	  		</div>
	  	</div>
		</div>
	<!-- / End of right Panel Graph Card-->

<!--/table Card-->

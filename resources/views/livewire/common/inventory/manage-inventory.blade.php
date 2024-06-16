<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        {{-- Success is as dangerous as failure. --}}
      <!-- Never delete or modify this div -->
    	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Home: Reagents</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
							<li class="breadcrumb-item active">Reagents</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
    <?php 
      $roomPath = "storage/facility/rooms/";
      $rackPath = "storage/facility/racks";
    ?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
        @hasrole('manager')
					@include('livewire.common.inventory.flexMenuInventory')
				@endhasrole
				
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-4 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Add New Stock Item
							</h3>
							<div class="card-tools">
							  <ul class="nav nav-pills ml-auto">
                  <li class="nav-item"></li>
                  <li class="nav-item"></li>
							  </ul>
							</div>
						  </div><!-- /.card-header -->
						  <div class="card-body">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								<div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                  <div class="p-2">
                  <!-- Inside existing Livewire component -->
                    @if($viewFineChemForm)
                      @include('livewire.common.inventory.newFineChemForm')
                    @endif

                    @if($viewConsumptionForm)
                      @include('livewire.common.inventory.newConsumptionForm')
                    @endif
                    
                    @if($viewStockDetails)
                      @include('livewire.common.inventory.stockProductDetails')
                    @endif
                    
                  </div>                 
								</div>
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>

          <section class="col-lg-8 connectedSortable">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="card card-primary card-outline">
						  <div class="card-header">
							<h3 class="card-title">
							  <i class="fas fa-chart-pie mr-1"></i>
							  Stock
							</h3>
							<div class="card-tools">
							  <ul class="nav nav-pills ml-auto">
                  <li class="nav-item"></li>
                  <li class="nav-item"></li>
							  </ul>
							</div>
						  </div><!-- /.card-header -->
						  <div class="card-body">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								<div class="chart tab-pane active" id="revenue-chart" style="position: relative;">

                  @if($viewBulkUploadOptions)
                      @include('livewire.common.inventory.bulkUploadForm')
                  @endif

                  @if($viewNewCategoryForm)
                    @include('livewire.common.inventory.newCategoryForm')
                  @endif

                  @if($showInventoryPanel)
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                    
                          @if($fullInventoryTable)
                            <!--Divider-->
                            <div class="p-2 mt-2">
                              								 
                                
                                  <table id="inventoryx" class="table table-sm table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>#</th>
                                          <th>PMC Code</th>
                                          <th>Name</th>
                                          <th>Catalog #</th>
                                          <th>num_packs</th>
                                          
                                          <th>vial_cost</th>

                                          
                                          <th>status_open_unopened</th>
                                          <th>quantity_left</th>
                                          <th>full_empty</th>
                                          <th>storage_container_id</th>
                                          <th>shelf_rack_id</th>
                                          <th>box_id</th>
                                          <th>box_position_id</th>
                                          <th>open_storage</th>
                                          <th>enteredby_id</th>
                                          <th>date_entered</th>
                                          <th>notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($products as $product)
                                        <tr>
                                          <div wire:key="{{$product->product_id}}">
                                            <td>
                                              <button class="btn btn-warning btn-sm" 
                                                wire:key="{{$product->product_id}}" wire:click="$dispatch('openModal', 
                                                {component: 'common.modals.product-confirm', arguments: 
                                                {product_id: {{ $product->product_id }} 
                                                } } )">
                                                Modal
                                              </button>
                                            </td>

                                            <td>
                                              <button wire:click="stockItemDetails('{{ $product->product_id }}')" 
                                                 id="invent" class="btn btn-sm btn-success rounded">
                                                  Details
                                              </button>
                                            </td>
                                            <td>{{ $product->pack_mark_code }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->catalog_id }}</td>
                                            <td>{{ $product->num_packs }}  x{{ $product->pack_size }} {{ $product->units->description }}</td> 
                                            

                                            <td>{{ $product->vial_cost }} {{ $product->item_currency }}</td>

                                           
                                            <td>{{ $product->status_open_unopened }}</td>
                                            <td>{{ $product->quantity_left }}</td>
                                            <td>{{ $product->full_empty }}</td>
                                            <td>{{ $product->storage_container_id }}</td>
                                            <td>{{ $product->shelf_rack_id }}</td>
                                            <td>{{ $product->box_id }}</td>
                                            <td>{{ $product->box_position_id }}</td>
                                            <td>{{ $product->open_storage }}</td>
                                            <td>{{ $product->enteredby_id }}</td>
                                            <td>{{ $product->date_entered }}</td>
                                            <td>{{ $product->notes }}</td>                            
                                          </div>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                
                              
                            </div>
                            <!-- insert table -->
                          @endif
                    
                          @if($fullInventorySearchTable)
                            <!--Divider-->
                            <div class="p-2">
                              <div class="flex flex-row flex-wrap flex-grow mt-2">									 
                                <div class="w-full">		
                                  <livewire:common.inventory.product-search
                                    searchable="pack_mark_code, name, catalog_id"
                                    exportable
                                    theme="bootstrap-5"
                                  />
                                </div>
                              </div>
                            </div>
                            <!-- insert table -->
                          @endif
                    
                          <table class="w-full p-5 text-gray-700">
                            <tbody>
                            </tbody>
                          </table>
                    
                        </div>
                      </div>
                    </div><!-- /.card-body -->
                  @endif


								</div>
							</div>
						  </div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<!-- /.card -->
					</section>
          

					<!-- /.Left col -->
					<!-- right col -->
				</div><!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
    <!-- / End of Left Panel Graph Card-->
	</div>

</div>


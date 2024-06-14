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
					<section class="col-lg-5 connectedSortable">
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

          <section class="col-lg-7 connectedSortable">
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
                            <div class="p-2">
                              <div class="flex flex-row flex-wrap flex-grow mt-2">									 
                                <div class="w-full">		
                                  <table id="inventoryx" class="table table-sm table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>IDx</th>
                                            <th>ID</th>
                                            <th>PMC Code</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($products as $product)
                                        <tr>
                 <div wire:key="{{$product->product_id}}">
                    <td>
                      <button x-data wire:click="stockItemDetails({{$product}})" 
                         class="btn btn-sm btn-success rounded">
                          Details
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
                                            <td>{{ $product->pack_size }}{{ $product->unit_id }}</td>
                                        </div>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
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

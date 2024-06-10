<?php

namespace App\Livewire\Common\Inventory;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Products;

class ProductSearch extends DataTableComponent
{
    protected $model = Products::class;

    public function configure(): void
    {
      //original line
        //$this->setPrimaryKey('product_id');
        
      //the following block added
        $this->setPrimaryKey('product_id')
        ->setTableRowUrl(function($row) {
            return route('admin.users.show', $row);
        })
        ->setTableRowUrlTarget(function($row) {
            if ($row->isExternal()) {
                return '_blank';
            }
 
            return '_self';
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Product id", "product_id")
               ->sortable(),
            /*
            Column::callback(['pack_mark_code'], function ($pack_mark_code) {
                return view('livewire.common.inventory.select-actions', 
									['pack_mark_code' => $pack_mark_code]);
            })->label('Select')
					->unsortable(),
          */
            //Column::make("Pack mark code", "pack_mark_code")
            //    ->sortable(),
            Column::make("Category id", "category_id")
                ->sortable(),
            //Column::make("Resproject id", "resproject_id")
            //    ->sortable(),
            Column::make("Catalog id", "catalog_id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Pack size", "pack_size")
                ->sortable(),
            Column::make("Unit id", "unit_id")
                ->sortable(),
            Column::make("Num packs", "num_packs")
                ->sortable(),
            Column::make("Mfd date", "mfd_date")
                ->sortable(),
            Column::make("Batch code", "batch_code")
                ->sortable(),
            Column::make("Vial cost", "vial_cost")
                ->sortable(),
            Column::make("Item currency", "item_currency")
                ->sortable(),
            Column::make("Expiry date", "expiry_date")
                ->sortable(),
            Column::make("Supplier id", "supplier_id")
                ->sortable(),
            Column::make("Status open unopened", "status_open_unopened")
                ->sortable(),
            Column::make("Quantity left", "quantity_left")
                ->sortable(),
            Column::make("Full empty", "full_empty")
                ->sortable(),
            Column::make("Storage container id", "storage_container_id")
                ->sortable(),
            Column::make("Shelf rack id", "shelf_rack_id")
                ->sortable(),
            Column::make("Box id", "box_id")
                ->sortable(),
            Column::make("Box position id", "box_position_id")
                ->sortable(),
            Column::make("Open storage", "open_storage")
                ->sortable(),
            Column::make("Enteredby id", "enteredby_id")
                ->sortable(),
            Column::make("Date entered", "date_entered")
                ->sortable(),
            Column::make("Notes", "notes")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}

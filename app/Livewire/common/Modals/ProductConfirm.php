<?php

namespace App\Livewire\Common\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ProductConfirm extends ModalComponent
{
  public $displayingModal = false;

	protected $listeners = [
		'displayConfirmation' => 'display',
	];

	public $state = [
		'title' => 'Select Item',
		'message' => 'Select Catalog Number',
		'return' => [
		'component' => 'manage-inventory',
		'args' => [],
	  ],
	];
	
	public function display($title, $message, $component, $args)
	{
		$this->state['title'] = $title;
		$this->state['message'] = $message;
		$this->state['return'] = [
			'component' => $component,
			'args' => $args,
		];

	  $this->displayingModal = true;
	}	 
	
	public function confirm()
	{
		$this->emitTo(
			$this->state['return']['manage-inventory'],
			$this->state['return']['args']
		);

		$this->displayingModal = false;
	}

	public function cancel()
	{
		$this->state = [
			'title' => '',
			'message' => '',
			'return' => [
			'component' => '',
			'args' => [],
      ],
    ];
		$this->displayingModal = false;
	}	

  public function render()
  {
      return view('livewire.common.modals.product-confirm');
  }
}

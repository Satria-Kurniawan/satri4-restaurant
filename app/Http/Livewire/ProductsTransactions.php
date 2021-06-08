<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductTransaction;

class ProductsTransactions extends Component
{
    public $productstransactions;

    public function render()
    {

        $this->productstransactions = ProductTransaction::all();

        return view('livewire.products-transactions');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductTransaction;

class ProductsTransactions extends Component
{
    public $productstransactions;
    public $selectedDate;

    public function render()
    {
        $selectedDate = '%'.$this->selectedDate.'%';

        if ($selectedDate != null){
            $this->productstransactions = ProductTransaction::where('created_at', 'like', $selectedDate)->get();
        }

        return view('livewire.products-transactions');
    }

    public function delete($id){

        ProductTransaction::find($id)->delete();
        session()->flash('deletemessage', 'Deleted Successfully');
     }

    public function deleteAll(){

        ProductTransaction::truncate();
        session()->flash('deletemessage', 'Deleted All Successfully');
    }
}

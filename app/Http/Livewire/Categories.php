<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $search;
    public $categories;
    public $categoryId, $category;
    public $isOpen = 0;
    public $deleteOpen = 0;

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        $this->categories = Category::where('category', 'like', $searchParams)->get();

        return view('livewire.categories');
    }

    public function showModal(){
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function delShowModal(){
        $this->deleteOpen = true;
    }

    public function delHideModal(){
        $this->deleteOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'category' => 'required',
            ]
        );

        Category::updateOrCreate(['id' => $this->categoryId], [
            'category' => $this->category,
        ]);

        $this->hideModal();

        session()->flash('message', $this->categoryId ? 'Updated Successfully' : 'Created Successfully');

        $this->categoryId = '';
        $this->category = '';
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->category = $category->category;

        $this->showModal();
    }

    public function delete($id){
        Category::find($id)->delete();
        $this->delHideModal();
        session()->flash('deletemessage', 'Deleted Successfully');
    }
}

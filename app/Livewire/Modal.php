<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Modal extends Component
{
    public $category;
    public $action;

    public function mount()
    {
        $this->category = new Category();
        $this->action = route('category.create');
    }
    
    public function openModal($categoryId)
    {
        if (is_null($categoryId)) {
            $this->category = new Category();
        } else {
            $category = Category::find($categoryId);
            $this->category = $category;
            $this->action = route('category.update', $category->id);
        }
    }

    public function render()
    {
        return view('livewire.modal');
    }
}

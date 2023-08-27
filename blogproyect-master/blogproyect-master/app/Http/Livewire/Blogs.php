<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Blogs extends Component
{
    public function render()
    {


        $categories=Category::with('article')->get();
        return view('livewire.blogs',compact('categories'));
    }
}

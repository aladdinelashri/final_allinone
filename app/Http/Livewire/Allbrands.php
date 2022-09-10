<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;

class Allbrands extends Component
{

    public $search = '';
    public $name;
    public $editMode = false;
    public $brandId;

    protected $rules = [
        'name' => 'required',
    ];

    public function loadCountries()
    {
        $brand = Brand::find($this->brandId);
        
        $this->name = $brand->name;
    }

    public function render()
    {
        $query = Brand::query();
        if ($this->search) {
            $query->where('Name', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }

        return view('livewire.allbrands', [
            'brands' => $query->paginate(20)
        ]);
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    
}

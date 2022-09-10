<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Item;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;


class Items extends Component
{
    use WithPagination;
    public $search = '';
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $Name;
    public $Size;
    public $Weight;
    public $Color;
    public $sizeoptionId;
    public $coloroptionId;
    public $weightoptionId;
    public $categoryitemId;
    public $brandId;
    public $Note;
    public $in_stock;
    public $coloroptions;
    public $sizeoptions;
    public $weightoptions;
    public $categoryitems;
    public $brands;
    public $itemId;
    public $selectedBrandId = null;

    


    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'Name' => 'required',
            'Size' => 'required',
            'Weight' => 'required',
            'Color' => 'required',
            'sizeoptionId' => 'required',
            'coloroptionId' => 'required',
            'weightoptionId' => 'required',
            'categoryitemId' => 'required',
            'brandId' => 'required',
            'Note' => 'required',
            'in_stock' => 'required',
               
        ];
    }

    public function loadModel()
    {
        $item = Item::find($this->itemId);
        $this->Name =  $item->Name;
        $this->Size =  $item->Size;
        $this->Weight =  $item->Weight;
        $this->Color =  $item->Color;
        $this->sizeoptionId =  $item->sizeoption_id;
        $this->coloroptionId =  $item->coloroption_id;
        $this->weightoptionId =  $item->weightoption_id;
        $this->categoryitemId =  $item->categoryitem_id;
        $this->brandId =  $item->brand_id;
        $this->Note =  $item->Note;
        $this->in_stock =  $item->in_stock;
    }

/**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'name' => $this->name,
            'note' => $this->note,
           'Name' =>$this->Name ,
           'Size' => $this->Size ,
           'Weight' =>$this->Weight ,
           'Color' =>$this->Color ,
           'sizeoption_id' =>$this->sizeoptionId,
           'coloroption_id' =>$this->coloroptionId,
           'weightoption_id' =>$this->weightoptionId,
           'categoryitem_id' =>$this->categoryitemId,
           'brand_id' =>$this->brandId ,
           'Note' =>$this->Note,
           'in_stock'=>$this->in_stock,

        ];
    }

    

 /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Item::create($this->modelData());

        $this->modalFormVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'New Page',
            'eventMessage' => 'Another page has been created!',
        ]);
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Item::paginate(5);  
    
        
    }

/**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }



   

    public function render()
    {
        $items = Item::paginate(5);
        if (strlen($this->search) > 2) {
            if ($this->selectedBrandId) {
                $items = Item::where('Name', 'like', "%{$this->search}%")
                             ->where('bramd_id', $this->selectedBrandId)
                             ->paginate(5);
            } else {
                $items = Item::where('Color', 'like', "%{$this->search}%")->paginate(5);
            }
        } elseif ($this->selectedBrandId) {
            $items = Item::where('brand_id', $this->selectedBrandId)->paginate(5);
        }

        return view('livewire.items', ['items' => $items]);
    }
}

<?php
namespace App\Http\Livewire;
use App\Models\Categoryproduct;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Sdelcategoryproducts extends Component
{
    use WithPagination;
    public $modal2FormVisible = false;
    public $modal2ConfirmRestoreVisible= false;
    public $modal2ConfirmDeleteVisible = false;
    public $modelId2;
    public $name;

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'note' => 'required',

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
        Categoryproduct::create($this->modeldata2());
        $this->modal2FormVisible = false;
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
        return Categoryproduct::onlyTrashed()->paginate(5);
    }
    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Categoryproduct::find($this->modelId2)->update($this->modeldata2());
        $this->modal2FormVisible = false;
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Updated Page',
            'eventMessage' => 'There is a page (' . $this->modelId2 . ') that has been updated!',
        ]);
    }
    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Categoryproduct::onlyTrashed()->find($this->modelId2)->forceDelete($this->modeldata2());
        $this->modal2ConfirmDeleteVisible = false;
        $this->resetPage();
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Deleted Page',
            'eventMessage' => 'The page (' . $this->modelId2 . ') has been deleted!',
        ]);
    }


     /**
     * The delete function.
     *
     * @return void
     */
    public function restore()
    {
        Categoryproduct::withTrashed()->find($this->modelId2)->restore();
        $this->modal2ConfirmRestoreVisible = false;
        $this->resetPage();
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Restored Page',
            'eventMessage' => 'The Sizeoption (' . $this->modelId2 . ') has been restored!',
        ]);
    }



    /**
     * Shows the form modal2
     * of the create function.
     *
     * @return void
     */
    public function createShowmodal2()
    {
        $this->resetValidation();
        $this->reset();
        $this->modal2FormVisible = true;
    }
    /**
     * Shows the form modal2
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowmodal2($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId2 = $id;
        $this->modal2FormVisible = true;
        $this->loadModel();
    }
    /**
     * Shows the delete confirmation modal2.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowmodal2($id)
    {
        $this->modelId2 = $id;
        $this->modal2ConfirmDeleteVisible = true;
    }

    /**
     * Shows the delete confirmation modal2.
     *
     * @param  mixed $id
     * @return void
     */
    public function restoreShowmodal2($id)
    {
        $this->modelId2 = $id;
        $this->modal2ConfirmRestoreVisible = true;
    }


    /**
     * Loads the model data2
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data2 = Categoryproduct::withTrashed()->find($this->modelId2);
        $this->name = $data2->name;
        $this->note = $data2->note;
    }
    /**
     * The data2 for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modeldata2()
    {
        return [
            'name' => $this->name,
            'note' => $this->note,

        ];
    }


    /**
     * Dispatch event
     *
     * @return void
     */
    public function dispatchEvent()
    {
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Sample Event',
            'eventMessage' => 'You have a sample event notification!',
        ]);
    }
    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.sdelcategoryproducts', [
            'data2' => $this->read(),
        ]);
    }
}




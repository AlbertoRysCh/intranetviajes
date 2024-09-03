<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Checkin;
use Illuminate\Support\Facades\Auth;

class CheckinEditor extends Component
{
    public $checkin; // Cambiado a singular para un solo Checkin
    public $editMode = false;

    public function mount(Checkin $checkin)
    {
        $this->checkin = $checkin;
    }

    public function edit()
    {
        $this->editMode = true;
    }

    public function cancelEdit()
    {
        $this->editMode = false;
    }

    public function save()
    {
        // Guardar la información editada
        $this->checkin->save();

        $this->editMode = false;

        session()->flash('message', 'Check-in updated successfully.');
    }

    public function render()
    {
        return view('livewire.checkin-editor');
    }
}

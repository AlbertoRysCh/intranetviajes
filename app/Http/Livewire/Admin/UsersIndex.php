<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UsersIndex extends Component
{
    use WithPagination;
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected $paginateTheme = "bootstrap";

    public function render()
    {
        

        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(10);

        return view('livewire.admin.users-index', compact('users'));
    }
}

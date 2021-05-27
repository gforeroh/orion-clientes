<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination; // Importante

class UsersTable extends Component
{

    use WithPagination; // Importante

    protected $queryString = ['search' => ['except' => '']];
    public $search = '';

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE', "%{$this->search}%")
                ->paginate(5)
        ]);
    }

    public function clear(){
        $this->search = '';
    }
}

// php artisan make:seeder UserSeeder
<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Create extends Component implements HasForms
{
    use InteractsWithForms;

    public User $user;
 
    public function mount(): void
    {
        $this->form->fill();
    }
 
    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('firstname')->required(),
            TextInput::make('lastname')->required(),
            TextInput::make('phone')->required()->unique('users', 'phone'),
            TextInput::make('email')->required()->unique('users', 'email'),
            TextInput::make('password')->password()->confirmed(),
            TextInput::make('password_confirmation')->password(),
            DatePicker::make('dateOfbirth')->required()->label('date of birth')->before(Carbon::now(env('APP_TIMEZONE'))),
            Select::make('role')->options(Role::pluck('name', 'id')->toArray())->required()
        ];
    }

    public function create()
    {
        $user = $this->form->getState();
        $role = $user['role'];
        unset($user['role']);
        $user = User::create($user);

        $user->attachRole((int) $role);
        
        return redirect()->route('users');

    }

    public function render()
    {
        return view('livewire.dashboard.users.create');
    }
}

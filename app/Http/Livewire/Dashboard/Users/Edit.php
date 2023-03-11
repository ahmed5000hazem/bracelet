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
use Filament\Notifications\Notification;
use Livewire\Component;

class Edit extends Component implements HasForms
{
    use InteractsWithForms;
    
    public User $user;

    public function mount(): void
    {
        $this->form->fill($this->user->toArray());
    }

    protected function getFormSchema(): array 
    {
        return [
            TextInput::make('firstname')->required(),
            TextInput::make('lastname')->required(),
            TextInput::make('phone')->required()->unique('users', 'phone', $this->user),
            TextInput::make('email')->required()->unique('users', 'email', $this->user),
            TextInput::make('password')->password()->confirmed(),
            TextInput::make('password_confirmation')->password(),
            DatePicker::make('birthdate')->required()->label('date of birth')->before(Carbon::now(env('APP_TIMEZONE'))),
            Select::make('role')->options(Role::pluck('name', 'id')->toArray())->default("Admin")->required()
        ];
    }
    
    public function update()
    {
        $user = $this->form->getState();
        
        $role = $user['role'];
        unset($user['role']);
        if (!$user['password']) {
            unset($user['password']);
        } else {
            $user['password'] = bcrypt($user['password']);
        }
        
        $this->user->update($user);
        
        $this->user->roles()->sync((int) $role);
        
        Notification::make() 
            ->title('Saved successfully')
            ->success()
            ->send(); 
        
        return redirect()->route('users');


    }

    public function render()
    {
        return view('livewire.dashboard.users.edit');
    }
}

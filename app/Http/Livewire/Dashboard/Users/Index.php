<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Livewire\Component;

class Index extends Component implements HasTable
{
    use InteractsWithTable;

    public function getTableQuery()
    {
        return User::with('roles')->orderBy('id', 'desc');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('firstname'),
            TextColumn::make('lastname'),
            TextColumn::make('phone'),
            TextColumn::make('email'),
            TextColumn::make('birthdate')->date(),
            TextColumn::make('roles.display_name'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('role')
            ->relationship('roles', 'display_name')
        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function applySearchToTableQuery($query)
    {
        if (filled($searchQuery = $this->getTableSearchQuery())) {
            $query->whereIn('id', User::search($searchQuery)->keys());
        }
    
        return $query;
    }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('delete')
                ->action(function ($records) {
                    $ids = $records->pluck('id');
                    User::whereIn('id', $ids)->delete();
                })
                ->requiresConfirmation()
                ->deselectRecordsAfterCompletion()
                ->color('danger')
                ->modalHeading('Delete users')
                ->modalSubheading('Are you sure you\'d like to delete these users? This cannot be undone.')
                ->modalButton('Yes, delete them')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->label('Edit post')
                ->url(fn (User $record) => route('users.edit', ['user' => $record]))
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.users.index');
    }
}

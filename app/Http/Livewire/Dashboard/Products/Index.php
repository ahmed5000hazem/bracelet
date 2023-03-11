<?php

namespace App\Http\Livewire\Dashboard\Products;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class Index extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery()
    {
        return Product::query()->orderBy('id', 'desc');
    } 

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name'),
            TextColumn::make('user.phone')
                ->url(fn (Product $record): string => route('products.edit', ['product' => $record->id]))
                ->openUrlInNewTab(),
            TextColumn::make('category.name'),
            TextColumn::make('description')->limit(50),
            
            TextColumn::make('created_at')->date(),
            TextColumn::make('qty')->color('success'),
            TextColumn::make('price')->formatStateUsing(fn (string $state): string => "{$state} EGP")->color('warning'),
            TextColumn::make('discount'),
            ToggleColumn::make('hidden'),
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.products.index');
    }
}

<?php

namespace App\Http\Livewire\Dashboard\Products;

use App\Events\Product\ProductCreated;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class Create extends Component implements HasForms
{

    use InteractsWithForms;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array 
    {
        
        return [
            Wizard::make([
                Wizard\Step::make('Product info')
                    ->schema([
                        TextInput::make('name')->required(),
                        Textarea::make('description'),
                        TextInput::make('qty')->numeric()->required(),
                        TextInput::make('price')->numeric()->required(),
                        TextInput::make('discount')->numeric()->default(0),
                        Toggle::make('hidden')
                    ]),
                Wizard\Step::make('Images')
                    ->schema([
                        FileUpload::make('images')
                            ->enableOpen()
                            ->multiple()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->minFiles(1)
                            ->maxFiles(10)
                    ]),
                Wizard\Step::make('additional info')
                    ->schema([
                        Select::make('category_id')
                            ->label('Product Category')
                            ->options(Category::pluck('name', 'id')->toArray())
                            ->required(),
                        KeyValue::make('custom')
                            ->keyLabel('Property name')
                            ->valueLabel('Property value')
                            ->keyPlaceholder('EX: Weight')
                            ->valuePlaceholder('3 KG')
                    ])
            ])
        ];
    }
    
    public function create()
    {
        $data = $this->form->getState();

        $product = auth()->user()->products()->create($data);

        $images = collect($data['images'])->map(function ($item) {
            return ['path' => $item];
        })->toArray();

        
        $product->images()->createMany($images);
        
        event(new ProductCreated($product));
        
        Notification::make() 
            ->title('Product Created successfully')
            ->success()
            ->send();
        
        return redirect()->route('products');

    }

    public function render()
    {
        return view('livewire.dashboard.products.create');
    }
}

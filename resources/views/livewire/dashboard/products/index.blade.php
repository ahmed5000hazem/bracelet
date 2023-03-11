<div>
    <div class="flex flex-col px-14 mb-24">
        <div class="links">
            @component('components.link')
                @slot('href', route('products.create'))
                @slot('label', 'create')
                @slot('color', 'primary')
            @endcomponent
        </div>
        <div class="table text-gray-800">
            {{$this->table}}
        </div>
    </div>
</div>

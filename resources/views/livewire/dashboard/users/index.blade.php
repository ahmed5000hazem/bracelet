<div>
    <div class="flex flex-col">
        <div class="links">
            @component('components.link')
                @slot('href', route('users.create'))
                @slot('label', 'create')
                @slot('color', 'primary')
            @endcomponent
        </div>
        <div class="table text-gray-800">
            {{$this->table}}
        </div>
    </div>
</div>

<div>
    <form wire:submit.prevent='create'>
        <div class="flex justify-center">
            @component('components.dashboard.form-placeholder')
                @slot('title', 'Create User')
                @slot('form', $this->form)
            @endcomponent
        </div>
        
        @component('components.submit-button')
            @slot('centered', true)
            @slot('label', 'Create User')
        @endcomponent
    </form>
</div>

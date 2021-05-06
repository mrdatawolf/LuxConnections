<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @livewire('require-token-to-register')

    </x-jet-authentication-card>
</x-guest-layout>

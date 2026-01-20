<x-filament-panels::page.simple>
    <x-filament-panels::form wire:submit="register">
        {{ $this->form }}

        <x-filament-panels::form.actions :actions="$this->getCachedFormActions()" :full-width="$this->hasFullWidthFormActions()" />
    </x-filament-panels::form>

    <div class="text-center mt-4">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Already have an account?
            <a href="{{ filament()->getLoginUrl() }}"
                class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-500 dark:hover:text-primary-400">
                Sign in
            </a>
        </p>
    </div>
</x-filament-panels::page.simple>

@props(['submit'])
<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg']) }}>
    @if(isset($title))
        <div class="text-lg px-6 py-4 dark:text-gray-300 dark:border-b dark:border-gray-700">
            {{ $title }}
        </div>
    @endif
    <form wire:submit.prevent="{{ $submit }}">
        <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
            <div class="grid grid-cols-6 gap-6">
                {{ $form }}
            </div>
        </div>

        @if (isset($actions))
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                {{ $actions }}
            </div>
        @endif
    </form>

        @if(isset( $footer))
            <div class="flex flex-row justify-end px-6 py-4 dark:border-t dark:border-gray-700 text-right">
                {{ $footer }}
            </div>
        @endif
</div>

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg']) }}>
    @if(isset($title))
    <div class="text-lg px-6 py-4 dark:text-gray-300 dark:border-b dark:border-gray-700">
        {{ $title }}
    </div>
    @endif
    <div class="px-6 py-4">
        <div class="mt-4">
            {{ $content }}
        </div>
    </div>
@if(isset( $footer))
    <div class="flex flex-row justify-end px-6 py-4 dark:border-t dark:border-gray-700 text-right">
        {{ $footer }}
    </div>
        @endif

</div>

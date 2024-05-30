@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="text-lg px-6 py-4 dark:text-gray-300 dark:border-b dark:border-gray-700">
        {{ $title }}
    </div>
    <div class="px-6 py-4">
        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 dark:border-t dark:border-gray-700 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>

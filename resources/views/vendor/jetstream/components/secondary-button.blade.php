<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-5 py-2.5 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-900 border-transparent border-purple-300 focus:border-purple-900 rounded-md font-bold text-xs text-white uppercase tracking-widest shadow-sm disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

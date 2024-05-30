<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 border-transparent bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 rounded-md font-bold text-xs text-white uppercase tracking-widest focus:border-cyan-900 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

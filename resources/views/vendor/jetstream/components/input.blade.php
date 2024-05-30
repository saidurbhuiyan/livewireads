@props(['disabled' => false])
@props(['rounded' => ''])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:autofill:bg-gray-800 dark:text-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 '.($rounded ? $rounded : 'rounded-md').' shadow-sm']) !!}>

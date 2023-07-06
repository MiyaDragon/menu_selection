@props(['disabled' => false])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-1/3 text-white bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-3', 'onClick' => 'history.back();']) }}>
    {{ $slot }}
</button>

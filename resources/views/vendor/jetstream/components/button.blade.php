<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-1 mt-5 bg-paleta-4  rounded-md  text-base text-white  hover:shadow-xl']) }}>
    {{ $slot }}
</button>

@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => ' px-3 rounded-full border border-[#756e5f] bg-white outline-none"']) }}>

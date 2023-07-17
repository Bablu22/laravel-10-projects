<div {{ $attributes }}>
    <nav class="flex items-center  mb-4">
        <a href="/" class="text-purple-600 hover:text-purple-800 transition-colors duration-300">Home</a>
        <div class="w-3 h-3 rounded-full bg-purple-600 mx-2"></div>

        @php
            $lastKey = array_key_last($links);
        @endphp

        @foreach ($links as $label => $link)
            <a href="{{ $link }}"
                class="text-pink-600 hover:text-pink-800 transition-colors duration-300">{{ $label }}</a>
            @if (!$loop->last)
                <div class="w-3 h-3 rounded-full bg-pink-600 mx-2"></div>
            @endif
        @endforeach
    </nav>
</div>

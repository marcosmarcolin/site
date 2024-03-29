<div class="flex flex-col mb-4">
    <p class="text-gray-700 font-medium my-2">
        {{ $post->getDate()->format('d/m/Y') }}
    </p>

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Leia mais - {{ $post->title }}"
            class="text-gray-900 font-extrabold"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>
</div>

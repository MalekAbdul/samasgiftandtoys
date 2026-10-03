@props(['items' => []])

<nav aria-label="Breadcrumb" class="flex text-xs text-slate-500 mb-6 gap-2 items-center">
    <a href="{{ route('home') }}" class="hover:text-brand-primary">Home</a>
    @foreach ($items as $item)
        <i class="fa-solid fa-chevron-right text-[10px]" aria-hidden="true"></i>
        @if ($loop->last || empty($item['url']))
            <span @isset($item['id']) id="{{ $item['id'] }}" @endisset class="font-semibold text-slate-900" aria-current="page">{{ $item['label'] }}</span>
        @else
            <a href="{{ $item['url'] }}" class="hover:text-brand-primary">{{ $item['label'] }}</a>
        @endif
    @endforeach
</nav>

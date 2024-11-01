<div class="mb-3">
    <p>{{ $message }}</p>

    @if ($title == "Home")
        <button class="btn btn-primary" onclick="window.location.href='{{ url('/') }}'">
            {{ $title}}
        </button>
    @else
        <button class="btn btn-primary" onclick="window.location.href='{{ url('/' . strtolower($title)) }}'">
            {{ $title }}
        </button>
    @endif
</div>

@props([
    'service',
    'municipalityId'
])

<div class="events-card">
    <img src="{{ $service->thumbnail }}" alt="image">
    <div class="events-card-text">
        <h4><a href="{{ route('services.show', [getCurrentMunicipality(), $service->id]) }}">{{ $service->name }}</a></h4>
        <p> <a href="{{ route('services.show', [getCurrentMunicipality(), $service->id]) }}">
                {{ $service->description }}
            </a></p>
        <a class="read-more-btn" href="{{ route('services.show', [getCurrentMunicipality(), $service->id]) }}">اقرأ المزيد</a>
    </div>
</div>

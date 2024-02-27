@if ($driver->status == 'available')
    <span class="available label block">Disponible</span>
@endif

@if ($driver->status == 'unavailable')
    <span class="breakdown label block">En location</span>
@endif

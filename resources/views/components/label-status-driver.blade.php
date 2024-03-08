@if ($driver->status == 'available')
    <span class="available label block w-fit">Disponible</span>
@endif

@if ($driver->status == 'unavailable')
    <span class="breakdown label block w-fit">Assigné</span>
@endif

@if ($vehicle->status == 'breakdown')
    <span class="breakdown label">En panne</span>
@endif

@if ($vehicle->status == 'available')
    <span class="available label">Disponible</span>
@endif

@if ($vehicle->status == 'unavailable')
    <span class="unavailable label">En location</span>
@endif

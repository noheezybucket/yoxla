@foreach ($vehicle->rental as $rent)
    @if (date('Y-m-d H:i:s') >= $rent->starting_date && $rent->ending_date >= date('Y-m-d H:i:s'))
        <span class="unavailable label">En location</span>
    @elseif ($vehicle->status == 'breakdown')
        <span class="breakdown label">En panne</span>
    @else
        <span class="available label">Disponible</span>
    @endif
@endforeach

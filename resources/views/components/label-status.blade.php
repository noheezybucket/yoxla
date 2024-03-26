@if ($vehicle->status == 'unavailable')
    @foreach ($vehicle->rental as $rent)
        @if (date('Y-m-d H:i:s') >= $rent->starting_date && $rent->ending_date >= date('Y-m-d H:i:s'))
            <span class="unavailable label">{{ $rent->starting_date }} - {{ $rent->ending_date }}</span>
            {{-- @else
            <span class="available label">Disponible</span> --}}
        @endif
    @endforeach
@else
    @if ($vehicle->status == 'breakdown')
        <span class="breakdown label">En panne</span>
    @elseif($vehicle->status == 'available')
        <span class="available label">Disponible</span>
    @endif
@endif

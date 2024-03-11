@if ($vehicle->status == 'unavailable')
    @foreach ($vehicle->rental as $rent)
        @if (date('Y-m-d H:i:s') >= $rent->starting_date &&
                $rent->ending_date >= date('Y-m-d H:i:s') &&
                ($vehicle->status = 'unavailable'))
            {{-- <span class="unavailable label">En location</span> --}}
            {{-- @else
            <span class="available label">Disponible</span> --}}
        @endif
    @endforeach
@else
    @if ($vehicle->status == 'breakdown')
        <span class="breakdown label">En panne</span>
    @elseif($vehicle->status == 'unavailable')
        <span class="available label">Disponible</span>
    @endif

@endif

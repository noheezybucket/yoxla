@if (date('Y-m-d H:i:s') < $driver->license_expiration_date)
    <span class="available label block w-fit">En règle</span>
@else
    <span class="breakdown label block w-fit">Permis Expiré</span>
@endif

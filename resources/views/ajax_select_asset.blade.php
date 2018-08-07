@if(!empty($assetTenants))

    @foreach($assetTenants as $key => $value)

        <option value="{{ $key }}">{{ $value }}</option>

    @endforeach

@endif
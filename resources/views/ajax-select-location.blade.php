<option>--- Select A Location ---</option>

@if(!empty($address))

    @foreach($address as $key => $value)

        <option value="{{ $key }}">{{ $value }}</option>

    @endforeach

@endif
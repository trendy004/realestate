<option>--- Select A Description ---</option>

@if(!empty($category))

    @foreach($category as $key => $value)

        <option value="{{ $value }}:{{ $key }}">{{ $key }}</option>

    @endforeach

@endif
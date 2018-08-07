{{--<option>--- Select A Price ---</option>--}}

@if(!empty($price))

        @foreach($price as $key => $value)

                <option value="{{ $value }}">{{ $value }}</option>

        @endforeach

@endif
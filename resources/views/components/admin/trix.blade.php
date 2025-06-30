<input id="{{$name}}" type="hidden" {{ $attributes }} value="{{ old($attributes->get('name')) }}">

@error($attributes->get('name'))

<trix-editor input="{{$name}}" class="textarea-error"></trix-editor>

@else

<trix-editor input="{{$name}}"></trix-editor>

@enderror




@once

@push('css')

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

@endpush

@push('js')

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

@endpush

@endonce
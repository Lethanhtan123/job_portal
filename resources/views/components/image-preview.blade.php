@props(['height','width','source'])
@if($source)
<div>
<img class="" {{ $attributes->merge(["style" => "height: {$height}px; width: {$width}px; object-fit:cover;" ]) }} src="{{ $source }}" alt="">
</div>

@endif
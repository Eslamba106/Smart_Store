@props([
    'type' => 'text',
    'name' ,
    'placeholder',
    'label',
    'value' => ''
])
@if(isset($label))
<lable for="">{{ $label }}</lable>
@endif
{{-- <label for="">{{ $label }}</label> --}}
<input 
type="{{ $type }}" 
name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" value="{{ old($name, $value )}}"
{{ $attributes->class([
    'form-control',
    'is-invalid' => $errors->has($name),
]) }}
>
@error($name)
<div class="text-danger">
   {{ $message }}
</div>
@enderror
{{-- @error($name)
<div class="invalid-feedback">
   {{ $message }}
</div>
@enderror --}}
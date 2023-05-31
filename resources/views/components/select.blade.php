@props([
    'name',
    'label',
    'list',
    'selected' => null ,
    'required' => null,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    {!! Form::select($name, $list,$selected , ['class'=>"form-control",'id'=>"$name",'required' => $required]) !!}
</div>
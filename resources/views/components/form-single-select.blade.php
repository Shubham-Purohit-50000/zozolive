@props([
    'name',
    'label',
    'list',
    'selected' => null ,
    'required' => null,
    'selectId' => 2,
    'showLabel'=> true,
    'class'    => '' 
])

<div class="form-group">
    @if($showLabel)
        <label for="{{ $name }}">{{ $label ?? generateLabel($name) }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    {!! Form::select($name, $list,$selected , ['class'=>"form-control $class",'id'=>"kt_select2_$selectId",'required' => $required]) !!}
</div>
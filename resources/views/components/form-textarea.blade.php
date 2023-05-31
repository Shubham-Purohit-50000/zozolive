@props([
    'name',
    'label'    => null,
    'showLabel'=> true,
    'required' => null,
    'oldValue' => old($name),
    'rows'     => 5,
    'id'       => $id ?? '',
    'placeholder'   => null
])
<div class="form-group">
    @if($showLabel)
        <label for="{{ $name }}">{{ $label ?? generateLabel($name) }} 
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    {!! Form::textarea($name, $oldValue, ['class' => 'form-control','id'=> $id, 'rows' => $rows, 'placeholder' => $placeholder, 'required' => $required]) !!}
</div> 
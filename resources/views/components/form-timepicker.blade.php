@props([
    'id'      => 1,
    'label'   => null,
    'required'=> null,
    'name',
    'value'   => old($name)  
])
<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? generateLabel($name) }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input class="form-control" id="{{ 'kt_timepicker_'.$id }}" name="{{ $name }}" {{ $required }} type="text" value="{{ $value }}"/>
</div> 
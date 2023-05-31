@props([
    'name',
    'label' => null,
    'id'    => 1,
    'value' => old($name),
    'required' => null
])
<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? generateLabel($name) }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="input-group date" id="kt_datepicker_{{ $id }}" >
        <input type="text" name="{{ $name }}" class="form-control datepicker-input" value="{{ $value }}" autocomplete="off"   />
        <div class="input-group-append" data-target="kt_datepicker_{{ $id }}" data-toggle="datepicker" >
            <span class="input-group-text">
                <i class="la la-calendar glyphicon-th"></i>
            </span>
        </div>
    </div>   
</div>
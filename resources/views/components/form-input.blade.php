@props([
    'name',
    'label'         => generateLabel($name),
    'showLabel'     => true,
    'type'          => 'text',
    'required'      => null,
    'oldValue'      => old($name),
    'hideValue'     => false,
    'class'         => null,
    'classes'       => null,
    'addId'         => true,
    'placeholder'   => null,
    'rootId'        => '',
    'style'         => '',
    'extra'         => '',
    'id'            => ''
])
<div class="form-group {{ $classes }}" style="{{ $style }}" {{ $rootId ? 'id='. $rootId : '' }}>
    @if($type !== 'hidden' && $showLabel)
        <label for="{{ $name }}">{{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif
    <input class="form-control {{ $class }}" placeholder="Enter {{ $label }}" id="{{ $id ? $id : $name }}" name="{{ $name }}" {{ $required }} {{ $extra }} type="{{ $type }}" autocomplete="off" value="{{ $hideValue ? NULL : $oldValue }}"/>
</div> 
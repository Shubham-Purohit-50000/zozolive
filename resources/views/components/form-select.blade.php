@props([
    'name',
    'label',
    'list',
    'selected' => null,
    'multiple' => null,
    'id'    => 1,
    'showLabel' => true
])
<div class="form-group">
    @if ($showLabel)
        <label for="{{ $name }}">{{ $label }}<span class="text-danger">*</span></label>
    @endif
    {!! Form::select($name.'[]',$list,$selected , ['class'=>"form-control",$multiple,'id'=>"kt_select2_$id"]) !!}
</div>
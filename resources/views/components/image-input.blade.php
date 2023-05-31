@props([
    'imgId'   => 1,
    'name',
    'imgPath'   => null,
    'title'     => generateLabel($name),
    'required' => null,
])
<label for="{{ $name }}">{{ $title }}
    @if($required)
        <span class="text-danger">*</span>
    @endif
</label><br>
<div class="image-input image-input-outline" id="kt_image_{{ $imgId }}">
    <div class="image-input-wrapper" style="background-image: url('{{ $imgPath }}');"></div>
    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{ 'Upload '. $title }}">
        <i class="fa fa-pen icon-sm text-muted"></i>
        <input type="file" name="{{ $name }}" accept=".png, .jpg, .jpeg, .svg" >
        <input type="hidden" name="{{ $name }}_remove" value="0">
    </label>
    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="{{ 'Cancle '. $title }}">
        <i class="ki ki-bold-close icon-xs text-muted"></i>
    </span>
</div>
@props([
    'listName',
    'hideAdd' => false,
    'repeaterId' => 1
])
<div class="kt_repeater_{{ $repeaterId }}">
    <div class="form-group row">
        <div data-repeater-list="{{ $listName }}" class="col-lg-12">
            <div data-repeater-item class="form-group row m-0 p-0 align-items-center">
                <div class="col-md-10 m-0 p-0">
                    {{ $body }}
                </div>
                <div class="col-md-2">
                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger d-flex justify-content-center align-items-center">
                        <i class="la la-trash-o"></i>Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if(!$hideAdd)
    <div class="form-group row">
        <div class="col-lg-8">
            <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                <i class="la la-plus"></i>Add
            </a>
        </div>
    </div>
    @endif
</div>
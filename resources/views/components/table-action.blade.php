@props([
    'route' => null,
    'url'   => null,
    'id'
])
<div class="d-flex justify-content-center">
    @if($route && $id)
        {{Form::open([ 'method'  => 'delete', 'route' => [ $route.'.destroy', $id ],'onsubmit'=>"delete_confirm()"])}}
        <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
            <i class="la la-trash"></i>
        </button>
        {{Form::close()}}
    @endif
    @if($url && $id)
        <a href="{{url($url.'/'.$id.'/edit')}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
            <i class="la la-edit"></i>
        </a>
    @endif
    {{ $custombtn ?? null }}
</div>

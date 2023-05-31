{{Form::open([ 'method'  => 'delete', 'route' => [ $route, $id ],'onsubmit'=>"delete_confirm()"])}}
    {{ $slot }}
{{Form::close()}}
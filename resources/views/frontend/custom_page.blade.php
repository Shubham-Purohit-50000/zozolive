@extends('layouts.front')
@section('content')

<section class="section">
<div class="container-lg my-2">
    <h1>{{$data->title}}</h1>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-12">          
          <div>
              {!!$data->content!!}
          </div>
      <hr>
    </div>
    </div>
</div>
    </section>
    <style type="text/css">
      .sticky-top{top:100px !important;}
      .list-group-item.list-group-item-action{
        background:none;
        border:none;
        color:#fff;
      }
      .list-group-item.list-group-item-action.active{
        background:none;
        border:none;
        color:#fff;
        font-weight:600;
      }
    </style>
@endsection
@extends('layouts.front')
@section('content')

<section class="section">
<div class="container-lg my-2">
    <h1>Terms of Use</h1>
    <div class="row">
        <div class="col-sm-4" id="myScrollspy" style="z-index:9">
            <div class="list-group sticky-top">
              @foreach($list as $key => $data)
                <a class="list-group-item list-group-item-action {{($key==0)?'active':''}}" href="#section{{$key}}">{{$data->title}}</a>
              @endforeach
            </div>
        </div>
        <div class="col-sm-8">
          @foreach($list as $key => $data)
          <div id="section{{$key}}">
            <h2>{{$data->title}}</h2>
            <div>
              {!!$data->description!!}
            </div>
          </div>
          @endforeach
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
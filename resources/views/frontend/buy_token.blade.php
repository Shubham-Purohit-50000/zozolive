@extends('layouts.front')
@section('subheader')
    @include('layouts.sub-header')
@endsection
@section('css')
    <style type="text/css">
        .card.active {
            background: #9fe20d;
        }

        .card.active .card-body label {
            color: #fff !important;
        }
    </style>
@endsection
@section('content')
    @if($list && count($list) > 0)
        <section class="section container">
            <div class="row align-items-top">
                @foreach($list as $data)
                    <div class="col-lg-2">
                        <div class="card toggleClass">
                            <div class="card-body" style="padding:0;text-align: center;">
                                <label for="plan_0" style="color: #000;padding: 15px;text-align: center;">
                                    <p style="font-size: 24px;font-weight: 600;">{{ $data->coin }} Token</p>
                                    <span style="font-size: 20px;font-weight: 500;">${{ $data->amount }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="btn btn-info theme-btn" style=" width: auto;color: #fff;display: block;">Continue</button>
        </section>
    @else
        <h4 class="text-center">Plans Not Found</h4>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('click', '.toggleClass', function () {
            $('.toggleClass').removeClass('active');
            $(this).addClass('active');
        })
    </script>
@endsection

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
    @if ($list && count($list) > 0)
        {!! Form::open([
            'method' => 'POST',
            'route' => 'checkout',
            'class' => 'kt-form',
        ]) !!}
        <section class="section container">
            <div class="row align-items-top">
                @if ($errors && count($errors))
                    <div class="alert alert-elevate" id="errors" role="alert" style="color: #a2262e">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    <h3>{{ $error }}</h3>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach ($list as $key => $data)
                    <div class="col-lg-2">
                        <div class="card toggleClass">
                            <div class="card-body" style="padding:0;text-align: center;">
                                <label for="plan_{{ $key }}" style="color: #000;padding: 15px;text-align: center;">
                                    <p style="font-size: 24px;font-weight: 600;">{{ $data->coin }} Token</p>
                                    <input type="radio" id="plan_{{ $key }}" name="coin_plan"
                                        value="{{ $data->uuid }}">
                                    <span style="font-size: 20px;font-weight: 500;">${{ $data->amount }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn theme-btn"
                style=" width: auto;color: #fff;display: block;background-color: #a2262e">Continue</button>
        </section>
        {!! Form::close() !!}
    @else
        <h4 class="text-center">Plans Not Found</h4>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('click', '.toggleClass', function() {
            $('.toggleClass').removeClass('active');
            $(this).addClass('active');
        })
    </script>
@endsection

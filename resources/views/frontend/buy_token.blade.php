@extends('layouts.front')
@section('subheader')
    @include('layouts.sub-header')
@endsection
@section('css')
    <style type="text/css">
        .card.active {
            background: #1f1f1f;
            border-radius:20px;
            border:5px solid #a2262e
        }
        .token_list .card {
            min-height: 115px;
        }

        .card.active .card-body label {
            color: #fff !important;
        }
        .badge {
            color: #fff;
            background-color: #a2262e;
            position: absolute;
            top: -10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            line-height: 15px;
            font-size: 14px;
           
        }      
        
        .badge3 {
            color: #fff;
            background-color: #a2262e;
            padding: 3px 5px;
            border-radius: 10px;
         
            font-size: 12px;
         
           top:3px;
        }

        .badge2 {
            color: #b30a0a;
            background-color: #fff6f6;
            position: absolute;
            top: -10px;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            line-height: 20px;
            right: 0px;
            text-align: center;
           
        }
        .card-img-overlay {
    background-color: rgb(145 45 81 / 60%);
}
.show_agent_list .card {
    min-height: auto !important;
}
.text-black {
    color: #000 !important;
}
.show_agent_list, .show_agent_list-2 {
    display: none;
}
.img_style {
    border-radius: 10px;
    width: 200px;
    margin-bottom: 10px;
}
.font-size-20 {
    font-size: 20px;
}
        @media (max-width: 640px) {
  
            .token .col-sm-2 {
                width: 50%;
            }
            .show_agent_list .col-md-2 {
                width: 80px;
            }
            .show_agent_list .col-md-7 {
                width: 200px;
            }
            .show_agent_list .share_link {
                position: absolute;
                top: 10px;
                right: 20px;
            }
            }

    </style>
@endsection
@section('content')
    @if ($list && count($list) > 0)
        {!! Form::open([
            'method' => 'POST',
            'route' => 'checkout',
            'class' => 'kt-form',
            'id' => 'checkoutForm',
        ]) !!}
        <section class="section container">
            <div class="row align-items-top token">
                <div class="col-md-12">
                    <h3 class="mb-3">Tokens Details</h3>
                </div>
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
                    <div class="col-lg-2 col-sm-2 token_list">
                        <div class="card toggleClass">
                            <div class="card-body" style="padding:0;text-align: center;">
                                <label for="plan_{{ $key }}" style="color: #000;padding: 15px;text-align: center;">
                                    <p  class="mb-0" style="font-size: 20px;font-weight: 600;"><i class="bi bi-coin"></i> {{ $data->coin }}<span style="font-size:14px"> Token </span>
                                    @if ($data->discount > 0)
                                    <span  class="badge mb-0" style="font-size: 18px">{{ $data->discount}}% <br/><span style="font-size: 10px;">off</span></span>
                                    @endif
                                   
                                </p>
                                @if ($data->discount > 0)
                                <p class="mb-0">
                                    <span style="text-decoration: line-through;">${{ $data->amount}} </span>

                                </p>
                                @endif
                                    <input type="radio" id="plan_{{ $key }}" name="coin_plan"
                                        value="{{ $data->uuid }}">
                                    <span style="font-size: 20px;font-weight: 500;"><i class="bi bi-currency-dollar"></i>{{ $data->amount - ( $data->amount * ($data->discount / 100))  }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
              <div class="col-md-12 mb-5">
              <!-- <button type="button" id="submit_button" class="btn theme-btn"
                style=" width: auto;color: #fff;display: block;background-color: #a2262e">Continue</button> -->
              </div>
            </div>
            <div class="row">
                <!-- offline -->
                <div class="col-md-4 col-12">


                        <div class="card bg-dark text-white" style="min-height: 170px;">
                        <img src="/img/photo.jpg" class="card-img" >
                        <div class="card-img-overlay">
                            <h5 class="card-title text-white">Buy offline token</h5>
                            <span  class="badge2 mb-0" style="font-size: 22px; font-weight:bold"><span style="font-size: 10px;">Upto</span> <br/>50% <br/><span style="font-size: 10px;">off</span></span>
                            <h4 class="card-text">ऑफलाइन कॉइन खरीदें सस्ते दाम में</h4>
                            <a class="card-text buy-offline-token text-white" href="javascript:void(0)">Click Here</a>
                        </div>
                        </div>

                        <div  id="show_agent_list" class="show_agent_list">
                                <div class="card">
                                        <div class="card-body pb-2 pt-2 pl-1">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <img src="/img/messages-1.jpg" class="card-img mt-2" >
                                                    </div>
                                                    <div class="col-md-7">
                                                    <h5 class="card-title pb-0 pt-1">Agent Name</h5>
                                                    <p class="card-text text-black"><span style="color:green; font-size:20px"><i class="bi bi-whatsapp"></i></span> +91 000 234 9020</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                    
                                                    <p class="card-text text-black mb-1">
                                                    <span  class="badge3 mb-0" style="font-size: 18px">Offline</span> 
                                                
                                                    </p> 
                                                    <p class="card-text text-black mt-0">
                                                    <a href="javascript:void(0)" class="share_link" style=" font-size:20px; margin-top:20px"><i class="bi bi-share"></i></a>
                                                            
                                                    </p>
                                                    </div>
                                                    <div>
                                                
                                                    </div>
                                                </div>
                                        
                                        </div>
                                </div>
                        </div>
                </div>
                </div>
            </div>

        
  </div>
        </section>
        {!! Form::close() !!}
        <div class="modal fade" id="showPaymentModel" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background: transparent">
        <div class="modal-header ps-0">
          <button
              type="button"
              class="customClose"
              data-bs-dismiss="modal"
              aria-label="Close"
          >
            ×
          </button>
        </div>

        <div class="modal-body modal-body-all">
          <div
              class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center"
          >
            <div class="card mb-3">
              <div class="card-body formbody px-3 py-0 pb-2 modal-body-all">
                <div class="pt-3 pb-2">
                  <h3
                      class="text-center pb-0 mb-2 font-size-20"
                  >
                    Select Payment Method
                  </h3>
                </div>

                <div class="text-center">
                   <button class="btn btn-link">
                   <img src="/img/stripe.png" class="img_style stripe_button" style="width: 200px;"/>
                   </button>
                   <button class="btn btn-link">
                   <img src="/img/What-is-Skrill.png" class="img_style" style="width: 200px;"/>
                   </button>
                   <!-- <div class="col-md-12 col-12">


                        <div class="card bg-dark text-white" style="width: 200px; margin:0 auto; min-height:100px" >
                        <img src="/img/photo.jpg" class="card-img" >
                        <div class="card-img-overlay">
                        <div style="font-size: 14px;">Upto 50% off</div>
                            <h5 class="text-white">Buy offline token</h5>
                           
                            <a class="card-text buy-offline-token-2 text-white" href="#">Click Here</a>
                        </div>

                        </div>

                         <div  id="show_agent_list-2" class="show_agent_list-2">
                                <div class="card">
                                        <div class="card-body pb-2 pt-2 pl-1">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <img src="/img/messages-1.jpg" class="card-img mt-2" >
                                                    </div>
                                                    <div class="col-md-7">
                                                    <h5 class="card-title pb-0 pt-1">Agent Name</h5>
                                                    <p class="card-text text-black"><span style="color:green; font-size:20px"><i class="bi bi-whatsapp"></i></span> +91 000 234 9020</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                    
                                                    <p class="card-text text-black mb-1">
                                                    <span  class="badge3 mb-0" style="font-size: 18px">Offline</span> 
                                                
                                                    </p> 
                                                    <p class="card-text text-black mt-0">
                                                    <a href="#" style=" font-size:20px; margin-top:20px"><i class="bi bi-share"></i></a>
                                                            
                                                    </p>
                                                    </div>
                                                    <div>
                                                
                                                    </div>
                                                </div>
                                        
                                        </div>
                                </div>
                        </div> 
                   </div>
                </div> -->
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @else
        <h4 class="text-center">Plans Not Found</h4>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('click', '.toggleClass', function() {
            $('.toggleClass').removeClass('active');
            $(this).addClass('active');
            document.getElementById('show_agent_list').style.display='none';
            $("#showPaymentModel").modal("show");
        })

        $(document).on('click', '.buy-offline-token', function() {
            document.querySelectorAll('.toggleClass').forEach(el => el.checked = false);
           document.getElementById('show_agent_list').style.display='block';
           $('.toggleClass').removeClass('active');
          
        }) 
        
        $(document).on('click', '.stripe_button', function() {
            $('#checkoutForm').get(0).submit();
           
        })

        // $(document).on('click', '.buy-offline-token-2', function() {
        //    document.getElementById('show_agent_list-2').style.display='block';
        // //    $('.toggleClass').removeClass('active');
        // //    document.querySelectorAll('.toggleClass').forEach(el => el.checked = false);
        // }) 
    </script>
@endsection

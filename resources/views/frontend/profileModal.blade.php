@extends('layouts.front')
@section('content')
    <section>
        <button class="profile">Profile</button>
        <button class="level">League & Level</button>
        <hr />
        <div class="profilebackgroundImage">

            <div class="header-content">
                <div class="circleModal">
                    <h1 class="d-flex justify-content-center align-items-center h-100">M</h1>
                </div>
                <div style="margin: 2rem 9rem;">
                    <h4>Modal name</h4>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 1rem;">

            <div class="col-md-7">
                <div class="card ">
                <div class="card-body">
               
                <div style="display:flex  ; justify-content: space-between; margin-bottom:30px">
                    <div>
                        <h5> My Information</h5>
                    </div>
                    <div role="button">
                        <i class="bi bi-pencil"></i>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-3 " style="color:#878787;">From:</div>
                    <div class="col-md-6">united State</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3" style="color:#878787">League & level:</div>
                    <div class="col-md-6">grey league, level 1 </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-3" style="color:#878787">Membership:</div>
                    <div class="col-md-6">none</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3" style="color:#878787">Intrests:</div>
                    <div class="col-md-6"> <label for="fileinput1" class="fileClass">Upload File</label>
                        <input type="file" id="fileinput1" placeholder="Please, select...... "
                            class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                    </div>
                </div>
            </div> </div> </div>
            <div class=" col-md-5 card">
                <div class=" card">
                <div class="card-body">
                <div style="display:flex  ; justify-content: space-between;">
                    <div>
                        My Photos
                    </div>
                    <div role="button">
                        <i class="bi bi-pencil"></i>
                    </div>
                </div></div></div>
            </div>
        </div>
        <!-- <img src="{{ asset('img/messages-1.jpg') }}" class="card-img-top" alt="..."> -->

    </section>
@endsection
@section('css')
    <style>
        .header {
            /* min-height: 150px; */
        }

        #fileinput1 {
            display: none;

        }

        .fileClass {
            display: inline-block;
            border: 3px solid #79943d;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 12px;
            padding: 8px 10px;
            font-size: 12px;
            background-color: #79943d;
        }


        .profile {
            text-decoration: none;
            border: none;
            background: none;
            color: white
        }

        .level {
            text-decoration: none;
            border: none;
            background: none;
            color: white;
            margin-left: 3rem;
        }

        .profilebackgroundImage {
            background-image: url("{{ asset('img/messages-1.jpg') }}");
            border-top-left-radius: calc(0.42rem - 1px);
            border-top-right-radius: calc(0.42rem - 1px);
            height: 30rem;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0;
            
            position: relative;
  

        }

        .header-content {
            display: flex;
            position: absolute;
            bottom: 0;
            /* left: 0; */
            background: #222222;
            width: 100%;
            height: 5rem;
        }


        .circleModal {
            position: absolute;
            bottom: 20%;
            width: 8rem;
            height: 8rem;
            border-radius: 50%;
            background-color: #26272b;
            border: 6px solid #9f9f9f;
            /* margin-left: 10px; */
            font-size: 10px;
            line-height: 80px;
            text-align: center;
            margin: auto;

        }

        /* .informationDiv {
            background-color: #26272b;
            

        } */

        /* .PrfileDiv2 {
            background-color: #26272b;
            width: 40%;
            padding: 1rem 1rem;




        } */
        .card {
        background-color: #26272b !important;

       
    }
    .card-body {
    padding: 0 20px 20px 20px;
}
    </style>
    <style media="all and (max-width: 500px)">
  button {
    background-color: yellow;
    color: blue;
  }  
</style>
@stop

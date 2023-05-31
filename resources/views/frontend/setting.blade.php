@extends('layouts.front')
@section('content')
<section>
    <div class="settingAndp">
        <div>
            <h5>Setting and privacy</h5>
        </div>
        <div class="deleteButton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#forgetPassword">
            Delete my account
        </div>
        <div class="modal fade" id="forgetPassword" tabindex="-1">
            <div class="modal-dialog  modal-md  ">
                <div class="modal-content" style="background:transparent;">
                    <div class="modal-header ps-0">
                        <h5>Delete My Account</h5>
                        <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button>
                    </div>

                    <div class="modal-body modal-body-all radius10">

                        <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center radius10">
                            <div class="card mb-3 radiusT">
                                <div class="card-body formbody modal-body-all radiusB">
                                    <div class="pt-8 pb-2">
                                        <h1 class="card-title-modal-login text-center pb-0 fs-4 mb-0 ">Restore Password
                                        </h1>

                                    </div>

                                    <form class="row g-3 needs-validation loginForm" novalidate="">

                                        <div class="col-12">
                                            <!-- <label for="yourUsername" class="form-label">Username</label> -->
                                            <!-- <div class="input-group has-validation"> -->
                                            <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                            <input type="text" name="username" class="form-control modal-input" placeholder="Username or Email" id="yourUsername" required="">
                                            <!-- <div class="invalid-feedback">Please enter your username.</div> -->
                                            <!-- </div> -->
                                        </div>


                                        <p class="text-center mt-50" style="color:#fff;"></p>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 btn-login" type="submit">Submit
                                            </button>
                                        </div>



                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-6">
            <div class="BannedDiv">
                <h6>Banned Countries</h6>
                <p class="para">To ban a whole country, just add it b the list. To ban only a country's specific regions (available for
                    some countries), add the country to the list first, and then choose its regions you want to ban below</p>
                <select class="inputBox" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <h6>Banned region of</h6>

                    </div>
                    <div class="col-md-6" style="display: flex; justify-content: end; align-items: end;">
                        <select class="inputBox2" style="color: #888; ">
                            <option value="option1">Please, select......</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
                    </div>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        All
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Only following
                    </label>
                </div>
                <select class="inputBox" style="color: #888; ">
                    <option value="option1">Please, select......</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
                <button class="saveButton" style="background-color: #859e4f;">Save</button>
            </div>
            <div class="countryDiv">
                <h5>Country Appearance</h5>
            </div>
        </div>
        <div class=" col-md-6">
            <div class="BannedDiv">

                <div style="display: flex;">
                    <div>
                        <h6>My Email</h6>
                    </div>
                    <div> <span style="color: #859e4f; margin-left: 7px; font-size:12px">mo***@**.com </span></div>
                </div>

                <div class="buttonCenter">
                    <button class="emailButton">Change Email</button>

                </div>

            </div>

            <div class="BannedDiv" style="margin-top: 1rem;">

                <h6>My Password</h6>
                <div class="buttonCenter">
                    <button class="emailButton">Change Password</button>

                </div>

            </div>

            <div class="BannedDiv" style="margin-top: 1rem;">
                <div style="display: flex;">
                    <div>
                        <h6>My Username</h6>
                    </div>
                    <div> <span style=" margin-left: 7px; font-size:10px">monika</span></div>
                </div>

                <div class="buttonCenter">
                    <button class="emailButton">Change Username</button>

                </div>

            </div>

        </div>

    </div>
    <!-- <div class="MainBannedDiv">
        <div class="BannedDiv">

            <h6>My Email</h6>
            <div>
                <button class="saveButton">Save</button>

            </div>
        </div>

    </div> -->
    </div>
</section>
@endsection
@section('css')
<style>
    .settingAndp {
        display: flex;
        justify-content: space-between;

    }

    .MainBannedDiv {
        /* background-color: #26272b; */
        width: 50%;

    }


    .BannedDiv {
        background-color: #26272b;
        /* width: 50%; */
        /* padding: 1rem 1rem; */
        padding: 1rem 1rem;

    }

    .countryDiv {
        background-color: #26272b;
        margin-top: 1rem;
        /* width: 50%; */
        /* padding: 1rem 1rem; */
        padding: 1rem 1rem;

    }

    .inputBox {
        /* border-radius: 20px; */
        width: 100%;
        background: black;
        padding: 0 15px;
        height: 42px
    }

    .inputBox2 {
        /* align-items: right; */
        border-radius: 20px;
        width: 50%;
        background: black;
        padding: 0 10px;
        height: 38px
    }

    .saveButton {
        display: inline-block;
        /* border: 3px solid transparent; */
        border-radius: 20px;
        padding: 0px 30px;
        font-size: 14px;
        height: 40px;
        background: #5b5b5b;
        text-align: center;
        margin-top: 10px;
        color: white;
        font-weight: 600;
        border: none;

    }

    .emailButton {
        display: inline-block;
        /* border: 3px solid transparent; */
        border-radius: 20px;
        padding: 0px 30px;
        font-size: 14px;
        height: 40px;
        background: #5b5b5b;
        text-align: center;
        margin-top: 10px;
        color: white;
        font-weight: 600;
        border: none;
        /* margin-left: 18rem; */
    }

    .deleteButton {
        cursor: pointer;
        /* border: 3px solid transparent; */
        border-radius: 20px;
        padding: 9px 25px;
        font-size: 14px;
        height: 40px;
        background: #5b5b5b;
        text-align: center;
        margin-top: 10px;
        color: white;
        font-weight: 600;
        border: none;

    }

    .buttonCenter {
        display: flex;
        justify-content: center;
    }
</style>
@stop
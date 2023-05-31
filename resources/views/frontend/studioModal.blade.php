@extends('layouts.front')
@section('content')
<section>
   <div style="background-color: #373737; padding: 1rem 1rem ">
      <h6>Important note</h6>
      <p>In order to start broadcasting you must first fill your personal information and upload the following documents:</p>
      <ul>
         <li>Close-up color photo of your ID. For IDs with relevant information on both sides, provide a single photo including both the front and back side of the ID.</li>
         <li>Color photo of you holding your ID and a piece of paper with the current date and your account username written by hand.</li>
      </ul>
      <p>
         Make sure that you type your personal information exactly as it appears on your ID.
         You can only have a maximum of 6 persons registered to one model account.
      </p>
   </div>
   <!-- gap: 13px; display:flex -->
   
   <div style="margin-top: 1rem;" class="row">
   <div class="backColor mt-3 col-md-5" >
      <div class="card">
         <div class="card-body">
            <h6>Details</h6>
            <div class="row mt-6">
               <div class="col-md-3 ">
                  First Name
               </div>
               <div class="col-md-9">
                  <input class="inputBox2" placeholder="As written in your offial document " />
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-3 ">
                  Last Name
               </div>
               <div class="col-md-9">
                  <input class="inputBox2" placeholder="As written in your offial document " />
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-3 ">
                  Gender
               </div>
               <div class="col-md-9 ">
                  <select class="inputBox2" style="color: #888; ">
                     <option value="option1">Female</option>
                     <option value="option1">Male</option>
                  </select>
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-3 ">
                  Last Name
               </div>
               <div class="col-md-9">
                  <input type="date" class="inputBox2" />
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-3 ">
                  ID Number
               </div>
               <div class="col-md-9">
                  <input type="text" class="inputBox2" />
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-3 ">
                  Address
               </div>
               <div class="col-md-9">
                  <input type="text" class="inputBox2" />
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-3 ">
                  City
               </div>
               <div class="col-md-9">
                  <input type="text" class="inputBox2" />
               </div>
            </div>
            <div class="row mt-4">
               <p style="font-size: 11px;">The rest of your details are hidden for security reasons <br />
                  To view all the details and change (or clear) any setting, use the button below. we will send and email with a link to your verified email address <br>
                  The link will allow you to view all and changes or clear 
               </p>
            </div>
            <button class="emailButton">View & Change Details</button>
            <div class=" mt-4"></div>
         </div>
      </div>
   </div>
   <div class="backColor mt-3 col-md-7" >
      <div class="card">
         <div class="card-body">
            <div>
               <h6>Document Upload</h6>
               <div  class="row">
                  <div class="col-md-6">
                    
                     <div>
                        <p >Close-up photo of your Id </p>
                     </div>
                     <div style="background-color: #242424; height:200px; display:flex;
                        align-items: center;
                        justify-content: center; flex-direction:  column;">
                        <div>
                           <label for="fileinput1" class="emailButton" style="padding: 10px 25px;">Select file From Computer</label>
                           <input type="file" id="fileinput1" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div>
                           <a href="#">Show Example</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div>
                        <p class="mt-10" style="margin-top: 10px;">Status </p>
                     </div>
                     <div style="background-color: #242424; height:200px; display:flex;
                        align-items: center;
                        justify-content: center; flex-direction:  column;">
                        <div>Not Uploades yet
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div>
               <div style="margin-top: 10px;  "class="row">
                  <div class="col-md-6">
                     <div>
                        <p>Photo of your id and a handwritten note with your username and current date </p>
                     </div>
                     <div style="background-color: #242424; height:200px; display:flex;
                        align-items: center;
                        justify-content: center; flex-direction:  column;">
                        <div>
                           <label for="fileinput1" class="emailButton" style="padding: 10px 25px;">Select file From Computer</label>
                           <input type="file" id="fileinput1" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                        </div>
                        <div>
                           <a href="#">Show Example</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div>
                        <p style="    margin-top: 22px;">Status </p>
                     </div>
                     <div style="background-color: #242424; height:200px; display:flex;
                        align-items: center;
                        justify-content: center; flex-direction:  column;">
                        <div>Not Uploades yet
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
   <div class="requestButton">
      <button class="search-bar-toggle loginLink outline_button nav-link nav-icon" style="background-color: #79943D; border:none">Request Approval</button>
   </div>
</section>


@endsection
@section('css')
<style>
    .card {
        background-color: #141414;
        /* width: 50%; */
        /* 141414 */
        /* padding: 1rem 1rem; */
        /* padding: 1rem 1rem; */

    }

    .inputBox2 {
        /* align-items: right; */
        border-radius: 20px;
        width: 100%;
        background: black;
        padding: 0 10px;
        height: 38px;
        color: aliceblue;
        border: 0
    }

    .emailButton {
        display: inline-block;
        /* border: 3px solid transparent; */
        border-radius: 20px;
        padding: 0px 30px;
        font-size: 14px;
        height: 40px;
        background: #5b5b5b;
        /* text-align: center; */
        margin-top: 10px;
        color: white;
        font-weight: 400;
        border: none;
        /* margin-left: 18rem; */
    }

    #fileinput1 {
        display: none;
    }

    .requestButton {
        align-items: center;
        justify-content: center;
        width: 100%;
        display: flex;
        margin-top: 1rem;

    }
</style>
@stop
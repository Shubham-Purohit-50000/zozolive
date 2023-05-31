@extends('layouts.front')
@section('content')

<section>
  <h6>My Documents</h6>
  <div style="bottom: 0;
    position: relative;
    padding: 19px 13px;


    width: 100%;
    background-color: #26272b;
    font-size: 15px;
  ">
    <div style="display: flex; justify-content: space-between;     margin-bottom: 10px;
 ">
      <div> My persons</div>
      <div>Edit</div>
    </div>
    <div class="chip" style="margin-bottom: 10px;">
      <div class="chip-content" data-bs-toggle="modal" data-bs-target="#afterLOgin">Chip Content</div>
      <div class="chip-close"></div>
    </div>
    <hr style="margin-bottom: 10px;" />
    <div style="display: inline-flex;
  flex-direction: row;">
      <div class="circle"> not reviewed</div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
    </div>
  </div>
  <div>
    <!-- <div>ctfefgr</div><div class="modal-header ps-0"><button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button></div> -->
  </div>
  <div class="modal fade modalBody " id="afterLOgin" tabindex="-1">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content" style="background:transparent;">
        <div class="modal-header ps-0 " style="display: flex; justify-content: space-between; ">
          <div class="ps-0 createAcount ">
            <h5>Create Modal Account</h5>
          </div>
          <div> <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button> </div>
        </div>
        <div class="modal-body " style="background-color:#3b3b3b;">
          <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center; background: #3b3b3b">
            <div class="card mb-0  container-fluid ">
              <div class=" formbody  row align-items-center " style="background-color:#3b3b3b;">
                <div style="margin-bottom: 20px; margin-top:10px">
                  <div class="odList">
                    <div>Email Verification</div>
                    <div data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#SecondModal">Profile Setting</div>
                    <div>Identification</div>
                    <hr />
                  </div>
                  <div class="welcomeText">
                    <div>Welcome Studying_Superior!</div>
                    <div>Please confirm your email.</div>
                  </div>
                  <div class="inboxText"> Check your inbox or <u>resend the email confirmation.</u> </div>
                  <div class="confirmationText"> We have sent the confirmation link to the following email: </div>
                  <div class="email">anjal@yopgmail.com</div>
                  <div class="chngeEmail"> If this is wrong, please <u> change the email</u> address. </div>
                </div> <!-- <div class="col-md-6 background-image-createlogin" style="min-height:560px;"></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- --------secondModal-------- -->
  <div class="modal fade modalBody " id="SecondModal" tabindex="-1">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content" style="background:transparent;">
        <div class="modal-header ps-0 " style="display: flex; justify-content: space-between; ">
          <div class="ps-0 createAcount ">
            <h5>Create Modal Account</h5>
          </div>
          <div> <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button> </div>
        </div>
        <div class="modal-body " style="background-color:#3b3b3b;">
          <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center; background: #3b3b3b">
            <div class="card mb-0">
              <div class=" formbody  row align-items-center " style="background-color:#3b3b3b;">
                <div style="margin-bottom: 20px; margin-top:10px">
                  <div class="odList">
                    <div>Email Verification</div>
                    <div data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#SecondModal">Profile Setting</div>
                    <div data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#ThirdModal">Identification</div>
                  </div>
                  <hr />
                </div>
                <div>
                  <h5>Complete your Profile details</h5> <span> ewrtwertwer twe </span>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Interested in: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; height:35px ">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div> <br />
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Languages: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; ">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div> <br />
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Body Type: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Ethnicity: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Specifics </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Hair Color </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; ">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2 inputLabel">
                  <div class="col-3">Eye Color: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888;">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Subculture </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888;">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-3 inputLabel">About me: </div>
                  <div class="col-md-9"> <textarea id="w3review" name="w3review" rows="4" cols="50" class="TextArea" style="color: #888;"></textarea> </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3"> </div>
                  <div class="col-9" style="font-size: small; color: #888; ">Let your fans know you better by providing more info about yourself! Models who add "About Me" information attract a lot of attention of users and earn more money. Be creative, feel free to share some secret desires or interesting facts about yourself. </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Your profile Photo: </div>
                  <div class="col-3">
                    <label for="fileinput1" class="fileClass">Upload File</label>
                    <input type="file" id="fileinput1" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                  </div>
                  <div class="col-4">
                    <label for="fileinput1" class="fileClass" style="    width: 16rem;
    text-align: center;">Upload File</label>
                    <input type="file" id="fileinput1" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->

                    <!-- <input type="file" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                  </div>
                  <div class="col-2"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Cover Image: </div>
                  <div class="col-3">
                    <label for="fileinput1" class="fileClass">Upload File</label>
                    <input type="file" id="fileinput1" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->

                    <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                  </div>
                  <div class="col-6"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3"> </div>
                  <div class="col-9 inputLabel"> make sure your cover image dosn't violate <a href="#"> our rules </a> <!-- <input type="file" placeholder="Please, select...... "class="inputBox1 file-input" style="color: #888;"> -->
                    <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                  </div>
                  <div class="col-3"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3">
                    <h6> Pricing</h6>
                  </div>
                  <div class="col-9 inputLabel"> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Private </div>
                  <div class="col-3">
                    <div></div> <select class="inputBox" style="color: #888;">
                      <option value="option1">24</option>
                      <option value="option1"> 1</option>
                      <option value="option2"> 2</option>
                      <option value="option3"> 3</option>
                    </select>
                  </div>
                  <div class="col-2 inputLabel" style="margin-top: 7px;">tokens/min</div>

                  <!-- <div class="col-2">tokens/min</div> -->
                  <div class="col-4"></div>


                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Exclusive Private </div>
                  <div class="col-3">
                    <div></div> <select class="inputBox" style="color: #888;">
                      <option value="option1">24</option>
                      <option value="option1"> 1</option>
                      <option value="option2"> 2</option>
                      <option value="option3"> 3</option>
                    </select>
                  </div>
                  <div class="col-2 inputLabel" style="margin-top: 7px;">tokens/min</div>

                  <!-- <div class="col-2">tokens/min</div> -->
                  <div class="col-4"></div>


                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Spying </div>
                  <div class="col-3">
                    <div></div> <select class="inputBox" style="color: #888;">
                      <option value="option1">24</option>
                      <option value="option1"> 1</option>
                      <option value="option2"> 2</option>
                      <option value="option3"> 3</option>
                    </select>
                  </div>
                  <div class="col-2 inputLabel" style="margin-top: 7px;">tokens/min</div>

                  <!-- <div class="col-2">tokens/min</div> -->
                  <div class="col-4"></div>


                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Group Show </div>
                  <div class="col-3">
                    <div></div> <select class="inputBox" style="color: #888;">
                      <option value="option1">24</option>
                      <option value="option1"> 1</option>
                      <option value="option2"> 2</option>
                      <option value="option3"> 3</option>
                    </select>
                  </div>
                  <div class="col-2 inputLabel" style="margin-top: 7px;">tokens/min</div>

                  <!-- <div class="col-2">tokens/min</div> -->
                  <div class="col-4"></div>


                </div>


                <div class="row mb-2">
                  <div class="col-3 inputLabel">Ticket Show </div>
                  <div class="col-3">
                    <div></div> <select class="inputBox" style="color: #888;">
                      <option value="option1">24</option>
                      <option value="option1"> 1</option>
                      <option value="option2"> 2</option>
                      <option value="option3"> 3</option>
                    </select>
                  </div>
                  <div class="col-2 inputLabel" style="margin-top: 7px;">tokens/min</div>

                  <!-- <div class="col-2">tokens/min</div> -->
                  <div class="col-4"></div>


                </div>
                <div> </div>
              </div> <!-- <div class="col-md-6 background-image-createlogin" style="min-height:560px;"></div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- --------ThirdModal-------- -->
  <div class="modal fade modalBody " id="ThirdModal" tabindex="-1">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content" style="background:transparent;">
        <div class="modal-header ps-0 " style="display: flex; justify-content: space-between; ">
          <div class="ps-0 createAcount ">
            <h5>Create Modal Account</h5>
          </div>
          <div> <button type="button" class="customClose" data-bs-dismiss="modal" aria-label="Close">×</button> </div>
        </div>
        <div class="modal-body " style="background-color:#3b3b3b;">
          <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center; background: #3b3b3b">
            <div class="card mb-0">
              <div class=" formbody  row align-items-center " style="background-color:#3b3b3b;">
                <div style="margin-bottom: 20px; margin-top:10px">
                  <div class="odList">
                    <div>Email Verification</div>
                    <div data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#SecondModal">Profile Setting</div>
                    <div>Profile setting</div>
                  </div>
                  <hr />
                </div>
                <div>
                  <h5>fill the form with personal details</h5>
                </div>
                <p style="color: #888;">This Direct Model Appearance Agreement and Release (this “Agreement”), 
dated as of the date set forth above (the “Effective Date”), between the 
undersigned individual (“Model”) and , a Republic of Cyprus company with 
registration number HE349515 and registered address at  (“Operator”).</p>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">First name: </div>
                  <div class="col-9">
                    <input type="text" placeholder="As written in your official documents" class="inputBox" style="color: #888;" />
                  </div>
                </div> <br />
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Last name: </div>
                  <div class="col-9"> 
                  <input type="text" placeholder="As written in your official documents" class="inputBox" style="color: #888;"/> 
                  </div>
                </div> <br />
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Gender: </div>
                  <div class="col-9">
                    <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Female</option>
                      <option value="option1">Male  </option>
                      
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Birth date: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">ID number: </div>
                  <div class="col-9"> 
                  <input type="text" class="inputBox" style="color: #888;"/> 
                   </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Address: </div>
                  <div class="col-9"> 
                  <input type="text"  class="inputBox" style="color: #888;"/> 
                  </div>
                </div>
                <div class="row mb-2 inputLabel">
                  <div class="col-3">ID Issuing Country: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888;">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">City: </div>
                  <div class="col-9"> <select class="inputBox" style="color: #888;">
                      <option value="option1">Please, select......</option>
                      <option value="option1">Option 1</option>
                      <option value="option2">Option 2</option>
                      <option value="option3">Option 3</option>
                    </select> </div>
                </div>


                <h5>Document upload</h5>
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Close-up photo of your ID: </div>
                  <div class="col-3">
                    <label for="fileinput1" class="fileClass">Upload File</label>
                    <input type="file" id="fileinput1" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->

                    <!-- <input type="file" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;">  -->
                    <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                  </div>
                  <div class="col-6">
                    <div class="col-4 inputLabel" style="margin-top: 7px; text-decoration:underline">show example</div>
                  </div>
                  <div class="col-6"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3"> </div>
                  <div class="col-9 inputLabel">
                  </div>
                  <div class="col-3"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3">
                    <!-- <h6> Pricing</h6> -->
                  </div>
                  <div class="col-9 inputLabel"> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel"> </div>
                  <div class="col-3">
                    <div></div>

                  </div>
                  <!-- <div class="col-2 inputLabel" style="margin-top: 7px;">tokens/min</div> -->
                  <!-- <canvas id="myCanvas" width="500" height="500" style="border:1px solid">
                        Your browser does not support the HTML5 canvas tag.
                  </canvas> -->
                  <div class="col-2" style="height:200px; width:200px; background-color: #771796;"></div>

                  <!-- <div class="col-2">tokens/min</div> -->
               
                <div class="row mb-2">
                  <div class="col-3 inputLabel">Photos of you holding your ID and a handwritten note with your username and current date: </div>
                  <div class="col-3">
                     <input type="file" placeholder="Please, select...... " class="inputBox1 file-input" style="color: #888;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                  </div>
                  <div class="col-6">
                  <div class="col-4 inputLabel"  style="margin-top: 7px; text-decoration:underline">show example</div>
                  </div>
                  <div class="col-6"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3"> </div>
                  <div class="col-9 inputLabel">
                  </div>
                  <div class="col-3"></div>
                </div>
                <div class="row mb-2">
                  <div class="col-3">
                    <!-- <h6> Pricing</h6> -->
                  </div>
                  <div class="col-9 inputLabel"> </div>
                </div>
                <div class="row mb-2">
                  <div class="col-3 inputLabel"> </div>
                  <div class="col-3">
                    <div></div>
                    
                  </div>
                  <div class="col-2" style="height:200px; width:200px; background-color: #771796;"></div>

                  
                  <hr style="color:black; width:100%; margin-top:1rem"/>
                 
                  <div class="col-9"> </div>
                
                    <div class="col-3">
                      <button type="text" style="color: #888;    border-radius: 3rem;
                    height: 2rem;
                    text-align: center;"> <!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                                      </div>
                  
                <div> </div>
              
                  <h5 style="text-align: center; font-size: 1.2rem;">Please fill in the fields below</h5>
                 
                  <div class="row mb-2">
                  <div class="col-4 inputLabel" style="text-align: right;" >Document issue country: </div>
                  <div class="col-5">
                  <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">India</option>
                      <option value="option1">gfg  </option>
                      
                    </select>
                  </div>
                </div><br/>
                <div class="row mb-2">
                  <div class="col-4 inputLabel" style="text-align: right;" >ID type: </div>
                  <div class="col-5">
                  <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Identity card</option>
                      <option value="option1">hhj  </option>
                      
                    </select>
                  </div>
                </div><br/>
                <div class="row mb-2">
                  <div class="col-4 inputLabel" style="text-align: right;" >Gender: </div>
                  <div class="col-5">
                  <select class="inputBox" style="color: #888; height:35px">
                      <option value="option1">Female</option>
                      <option value="option1">Male  </option>
                      
                    </select>
                  </div>
                </div><br/>
                <div class="row mb-2">
                  <div class="col-4 inputLabel" style="text-align: right;" >City (optional) </div>
                  <div class="col-5">
                    <input type="text" class="inputBox" style="color: #888;"/>
                  </div>
                </div><br/>
                <div class="row mb-2">
                  <div class="col-4 inputLabel" style="text-align: right;" >Address (optional) </div>
                  <div class="col-5">
                    <input type="text" class="inputBox" style="color: #888;"/>
                  </div>
                </div><br/>
                
                <hr style="color:black; width:100%; margin-top:1rem"/>
                 
                 <div class="col-9"> </div>
               
                   <div class="col-3">
                  <input type="text" placeholder="Next "  style="color: #888;    border-radius: 3rem;
                   height: 2rem;
                   width:50%;
                   border: 1px solid transparent;
                   text-align: center;">next </button><!-- <textarea id="w3review" name="w3review" rows="4" cols="50" class="inputBox" style="color: #888;"></textarea>  -->
                    </div>

                  
              </div> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('css')
<style>
  #fileinput1{display: none;}

  .fileClass {
    display: inline-block;
    border: 3px solid transparent;
    border-radius: 20px;
    padding: 7px 42px;
    font-size: 14px;
    height: 40px;
    background: white;
    text-align: center
}
  .circle {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background-color: #292929;
    border: 1px solid transparent;
    margin-left: 10px;
    font-size: 10px;
    line-height: 80px;
    text-align: center;


  }

  .createAcount {
    width: 20rem;
    font-Size: 1.5rem;

  }

  .odList {
    justify-content: space-between;
    flex-direction: row;
    width: 100%;
    display: flex;

  }

  .welcomeText {
    text-align: center;
    margin-top: 8rem;
    font-size: 1.2rem;
  }

  .inboxText {
    text-align: center;
    margin-top: 2rem;
    font-size: 1rem;
    color: #878787
  }

  .confirmationText {
    text-align: center;
    font-size: 1rem;
    color: #878787
  }

  .email {
    text-align: center;
    font-size: 1rem;
    margin-top: 2rem;
    cursor: pointer
  }

  .chngeEmail {
    text-align: center;
    margin-top: 2rem;
    font-size: 1rem;
    color: #878787
  }

  .inputBox {
    border-radius: 20px;
    width: 100%;
    background: black;
    padding: 0 15px;
    height: 42px
  }
  .TextArea {
    border-radius: 20px;
    width: 100%;
    background: black;
    padding: 0 15px;
    /* height: 42px */
  }

  .inputBox::placeholder {
    color: red;
    /* font-style: italic;padding */
  }

  .inputBox1 {
    border-radius: 20px;
    width: 100%;
    background: white;
    height: 35px;
    padding: 0 15px;
  }

  input[type="file"]::before {
    content: none;
  }



</style>
@stop

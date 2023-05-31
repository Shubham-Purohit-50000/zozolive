"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');
        _login.removeClass('login-otp-on');
        _login.removeClass('login-newpass-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
						},
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // submitButton: new FormValidation.plugins.SubmitButton(),
                    // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();
            validation.validate().then(function(status) {
		        if (status == 'Valid') {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "login",
						method:"POST",
						data: $('#kt_login_signin_form').serialize(),
						success:function(response){
							swal.fire({
								text: "You have login successfully.",
								icon: "success",
								buttonsStyling: false,
								// confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							})
							setTimeout(function() {
								window.location="/home";
							}, 1500);
						},
						error: function (xhr, ajaxOptions, thrownError, $form) {
							if(xhr.status==423)
							{
								swal.fire({
									text: "Mobile not verified, please verify your mobile...",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								})
							}else if(xhr.status==424)
							{   
								swal.fire({
									text: "Your account has been deactivated by admin, please contact Tropo Admin.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								})
							}else
							{
								swal.fire({
									text: "You are not authorized to login.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								})
							}
		
						}
					});
				} else {
					swal.fire({
		                text: "Please fill all input.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			form,
			{
				fields: {
					fullname: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					email: {
                        validators: {
							notEmpty: {
								message: 'Email address is required'
							},
                            emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signup_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    swal.fire({
		                text: "All is cool! Now you submit this form",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					mobile: {
						validators: {
							notEmpty: {
								message: 'Mobile Number is required'
							},
							phone: {
								country: 'IN',
								message: 'The value is not a valid phone number'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
			e.preventDefault();
            validation.validate().then(function(status) {
		        if (status == 'Valid') {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "/password/email/",
						method:"POST",
						data: $('#kt_login_forgot_form').serialize(),
						success:function(response){
							var userid = response.data[1]
							swal.fire({
								text: "Please check your mobile for OTP.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								_showForm('otp');
								$('#user_id_otp').val(userid);
							}); 
						},
						error: function (xhr, ajaxOptions, thrownError, $form) {
							if(xhr.status==422)
							{
								swal.fire({
									text: "There was a problem. Please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}else if(xhr.status==400)
							{   
								swal.fire({
									text: "There is no account associate with this number.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}else
							{
								swal.fire({
									text: "There was a problem. Please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}
		
						}
					});
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
	}
	
	var _handleOtpForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_otp_form'),
			{
				fields: {
					otp: {
						validators: {
							notEmpty: {
								message: 'OTP is required'
							},
							numeric: {
								message: 'The value is not a number',
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_otp_submit').on('click', function (e) {
			e.preventDefault();
            validation.validate().then(function(status) {
		        if (status == 'Valid') {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "otp/submit",
						method:"POST",
						data: $('#kt_login_otp_form').serialize(),
						success:function(response){
							var userid = response.data[1]
							swal.fire({
								text: "OTP Verified SuccessFully.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								_showForm('newpass');
								$('#user_id_pass').val(userid);
							});
						},
						error: function (xhr, ajaxOptions, thrownError, $form) {
							if(xhr.status==400)
							{
								swal.fire({
									text: "There is a problem, try after some time.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}else if(xhr.status==422)
							{   
								swal.fire({
									text: "OTP not verified.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}else
							{
								swal.fire({
									text: "There was a problem. Please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}
		
						}
					});
                    KTUtil.scrollTop();
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_otp_cancel').on('click', function (e) {
            e.preventDefault();
			_showForm('forgot');
        });
	}
	
	var _handleNewpassForm = function(e) {
        var validation;
		var form = KTUtil.getById('kt_login_newpass_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_newpass_form'),
			{
				fields: {
					password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_newpass_submit').on('click', function (e) {
			e.preventDefault();
            validation.validate().then(function(status) {
		        if (status == 'Valid') {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "new_pass/submit",
						method:"POST",
						data: $('#kt_login_newpass_form').serialize(),
						success:function(response){
							swal.fire({
								text: "Password change successfully.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light-primary"
								}
							}).then(function() {
								_showForm('signin');
							});
							
						},
						error: function (xhr, ajaxOptions, thrownError, $form) {
							if(xhr.status==400)
							{
								swal.fire({
									text: "There is a problem, try after some time.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}else
							{
								swal.fire({
									text: "There was a problem. Please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn font-weight-bold btn-light-primary"
									}
								}).then(function() {
									KTUtil.scrollTop();
								});
							}
		
						}
					});
                    KTUtil.scrollTop();
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn font-weight-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        $('#kt_login_newpass_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
			_handleForgotForm();
			_handleOtpForm();
			_handleNewpassForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});

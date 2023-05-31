<html lang="en"><head>

  <meta charset="UTF-8">
  
  <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">

  <meta name="apple-mobile-web-app-title" content="CodePen">

  <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script>
  <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111">
    <link href="{{ asset('assets/css/videocall.css') }}" rel="stylesheet">

    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.6.11.js"></script>
  <title inertia>{{ config('app.name', 'Laravel') }}</title>
   @routes
   @inertiaHead
       <script src="{{ asset(mix('js/manifest.js')) }}" defer></script>
    <script src="{{ asset(mix('js/vendor.js')) }}" defer></script>
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>
  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no">
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&amp;display=swap" rel="stylesheet"> 
     @inertia
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script id="rendered-js">
$(document).ready(function () {
  $('button.mode-switch').click(function () {
    $('body').toggleClass('dark');
  });

  $(".btn-close-right").click(function () {
    $(".right-side").removeClass("show");
    $(".expand-btn").addClass("show");
  });

  $(".expand-btn").click(function () {
    $(".right-side").addClass("show");
    $(this).removeClass("show");
  });
});
//# sourceURL=pen.js
    </script>
  </body>
</html>
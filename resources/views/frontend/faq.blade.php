@extends('layouts.front')
@section('content')
<section>
    <div class="wrapper bg-white rounded shadow">
        <div class="h2 text-center fw-bold"></div>
        <div class="h3 text-primary text-center">How can we help you?</div>
        <div class="d-flex justify-content-center">
        </div>
        <div class="accordion accordion-flush border-top border-start border-end" id="myAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> How can i create Live Streaming </button> </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        Camera: A camera is needed to record the video. You can use your smartphone, webcam, or a professional camera.

                        Microphone: To ensure that the audio quality of your stream is good, you'll need a microphone. You can use a built-in microphone on your camera, but an external microphone will provide better audio quality
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo"> how to perform live </button> </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        Prepare your performance: Choose your material carefully and practice your performance until you feel comfortable with it. Consider the venue and audience when selecting your material.

                        Rehearse with your equipment: If you're using any equipment such as a microphone, instruments or a sound system, rehearse with it to make sure everything is working properly.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne"> <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree"> how can i become a performer </button> </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse border-0" aria-labelledby="flush-headingOne" data-bs-parent="#myAccordion">
                    <div class="accordion-body p-0">
                        Becoming a performer requires a combination of talent, hard work, and dedication. Here are some steps you can follow to become a performer:

                        Identify your passion: Figure out what type of performer you want to be, whether it's a singer, dancer, actor, comedian, or something else.

                        Develop your skills: Hone your skills through training, practice, and performance. Take classes, work with coaches, and practice your craft regularly.

                        Build a portfolio: Create a portfolio that showcases your talent, including videos of your performances, headshots, and a resume.
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@stop
@section('css')
<style></style>
@stop
@section('js')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsession
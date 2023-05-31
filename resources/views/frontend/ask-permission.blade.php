@extends('layouts.app')
@section('content')
    <div class="permission">
        <div>
            <div class="main-gradient">
                <div class="content">
                    <h1>ZOZO LIVE</h1>
                    <h5>Powered By - Ashu Live Agency</h5>
                    <p class="mt-6">Zozo Live is an 
                        <!-- 18+ adult -->
                         entertainment social platform with LIVE action fun.
                        Watch, interact and chat for free.</p>
                    <div class="mt-6 terms text-gray-light">
                        By entering and using this website you agree to be bound by the <a href="{{ url('terms-of-use') }}">Terms of Use</a> and <a href="{{ url('privacy-policy') }}">Privacy Policy</a><br/> <a href="javascript:void(0)">18
                        U.S.C. 2257 Record-Keeping Requirements Compliance Statement</a>
                    </div>
                    <a href="{{ route('allow-permission') }}" class="btn">
                        I'm Over 18
                    </a>
                    <p class="mt-4 text-gray-light">If you provide sensitive personal data, by entering the website you give
                        your explicit consent to process this data to tailor the website to your preferences.</p>
                </div>
            </div>
            <hr class="w-100" />
            <div class="main-content text-gray-light w-40">
                <div>
                    <a href="http://google.com" class="exit d-block">Exit Here</a>
                    <!-- Todo -->
                    <!-- <p class="mt-8">THIS WEBSITE CONTAINS MATERIAL THAT IS SEXUALLY EXPLICIT. You must be at least eighteen (18) years of age
                        to use this Website, unless the age of majority in your jurisdiction is greater than eighteen (18) years
                        of age, in which case you must be at least the age of majority in your jurisdiction. Use of this Website
                        is not permitted where prohibited by law.<br/><br/>

                        This Website also requires the use of cookies. More information about our cookies can be found at our
                        Privacy Policy. BY ENTERING THIS WEBSITE AND USING THIS WEBSITE YOU AGREE TO THE USE OF COOKIES AND
                        ACKNOWLEDGE THE PRIVACY POLICY.<br/><br/>

                        All models were 18 and over at the time of the creation of such depictions.</p> -->
                </div>
            </div>
        </div>
    </div>
@endsection

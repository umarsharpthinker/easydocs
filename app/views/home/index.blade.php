@extends('layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Home
@stop



<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_home")
class="active"
@stop



<!--========================================================
                          CONTENT
=========================================================-->
@section('content')
<section id="content">
    <div class="container">
        <div class="row mT30">
            <div class="col-md-3">
                <div class="box_1">
                    <div class="icon_1"></div>
                    <h3 class="text_2 color_7 maxheight1"><a href="#">Fee Management</a></h3>
                    <p class="text_3 color_2 maxheight">
                        Online creation and generation of patient's Bills anywhere, anytime.

                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_1">
                    <div class="icon_2"></div>
                    <h3 class="text_2 color_7 maxheight1"><a href="#">Appointment on Phone</a></h3>
                    <p class="text_3 color_2 maxheight">
                        Now Appointment reservation also is just ahead of a Phone Call, by Receptionist.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_1">
                    <div class="icon_3"></div>
                    <h3 class="text_2 color_7 maxheight1"><a href="#">Patient Check-Up</a></h3>
                    <p class="text_3 color_2 maxheight">
                        Now Check your patients with much convinience by keeping medical records
                        Online.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_1">
                    <div class="icon_4"></div>
                    <h3 class="text_2 color_7 maxheight1"><a href="#">Administration</a></h3>
                    <p class="text_3 color_2 maxheight">
                        Now administrator could manage everything in the system using his full access rights.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_1 col-md-12">
        <div class="container">
            <div class="row">
                <div class="preffix_2 grid_8">
                    <h2 class="header_1 wrap_3 color_3">
                        The Best Medical Services, <br/>
                        Treatment & Analysis
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box_1">
                        <p class="text_3">
                            Now, clinical practices will become more accurate and
                             efficient by maintaining all data regarding Patients and Users online.
                            <br/>
                             As all users of the System can access information within Medical
                             Records of Patients more accurately, conveniently and in <br/> timely manner i.e. Anywhere, Anytime.
                            <br/>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mB30">
                    <div class="box_2 h300">
                        <div class="put-left"><img src="images/index_img01.png" alt="Image 1"/></div>
                        <div class="caption">
                            <h3 class="text_2 color_7">
                                Save Your Time <br/>
                                with Us
                            </h3>
                            <p class="text_3" style="text-align: justify;">
                                Our biggest goal is to save your time by making all relavent information online and easily accessable
                                everywhere, anytime.
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="mB30">
                        <div class="box_2 h300">
                            <div class="put-left"><img src="images/index_img02.png" alt="Image 2"/></div>
                            <div class="caption">
                                <h3 class="text_2 color_7">
                                    The Highest <br/>
                                    Quality Services
                                </h3>
                                <p class="text_3" style="text-align: justify;">
                                    Our goal is to retain all information regarding clinical practices online
                                    , so you can access your required information anytime around the clock.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    <div class="bg_1 col-md-12">
        <div class="container mB85">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="header_1 wrap_8 color_3">
                        Objectives of Application
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="grid_12">
                    <div id="owl">
                        <div class="item">
                            <p class="text_3">
                                This application automates the System of a Company.
                                This application could also be used in multiple branches (if any) of a Company </br>
                                that should be linked through Internet, so that application could share data
                                across all branches.
                                <br/>

                            </p>
                        </div>
                        <div class="item">
                            <p class="text_3">
                                The other most important objective of application is to maintain the Medical
                                Records of patients online, so that users could </br> access and analyze medical
                                records of the Patients whenever they want conviniently.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    {{--<div class="row wrap_9 wrap_4 wrap_10">--}}
    @if(Auth::user())
    @else
        @include('includes.webSocialLinks')
    @endif
</div>
@stop
﻿<head>
    <link href="{{asset('css/doctorList.css')}}" rel="stylesheet">
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function submitForm() {
var city = document.getElementsByName('city');
var speciality = document.getElementsByName('speciality');
var cityLength = city.length;
var specialityLength = speciality.length;
                                                //For City Select
for (var i = 0; i< cityLength; i++)
{
if (city[i].checked)
{
cityId = city[i].value;
  break;
}
}
                                                //For Speciality Select
for (var j = 0; j< specialityLength; j++)
{
if (speciality[j].checked)
{
specialityId = speciality[j].value;
  break;
}
}
   getDoctors += "route('getDoctors/'" + cityId + "/0/" + specialityId + ")";
   alert(getDoctors);
   }
</script>
<style>.btn span.glyphicon {
       	opacity: 0;

       }
       .btn.active span.glyphicon {
       	opacity: 1;
       }</style>
>>>>>>> 96bb01dc71e52c72ffebdce2412eaf902a65c863
</head>
{{--This fill CSS Save in CSS Folder As doctorList--}}
@extends('layouts.master')
<!--========================================================
   TITLE
   =========================================================-->
@section('title')
    EP-Sociale Doctors
@stop
@section('redBar')
    <div class = "user_logo">
        <div class="header_1 wrap_3 color_3 login-bar">
            Searched In
            @if(!empty($doctors))
            "{{$doctors[0]->cityName}}"
            @endif
        </div>
    </div>
@stop
@section('sliderContent')
@stop
<!--========================================================
   CONTENT
   =========================================================-->
@section('content')

    <!-- Page Loader -->
    <div class="container-fluid">
        <div class="row"></div>
        <div class="block-header">
            <h3 style="margin-left: 50px;"><strong>EP-Sociale</strong></h3>
        </div>
                                                                                                   {{--//Total Screen--}}
        <div class="col-md-12 col-sm-12  col-lg-12" style="background-color: whitesmoke">
                                                                                                       {{--//Left Panel--}}
            <div class="col-md-3 col-sm-3  col-lg-3">
                <div class="col-md-12 col-sm-12  col-lg-12 card pT10" style="border-radius: 5px;">


                                {{--Cities List at Left Panel Of Doctor List--}}

            <form method="GET" action="{{route('getDoctors')}}">
                                                                            {{--Form--}}
             <div role="tab" id="headingOne">

 <div class="col-lg-12 col-md-12" role="tab" id="headingOne">
     <h4 class="panel-title s-18">
        <button type="button" class="col-lg-12 col-md-12 btn btn-info caretForCity" data-toggle="collapse" data-target="#cities"  aria-controls="collapseOne" ><strong>City</strong><span id="cityCaret" class="caret" style="float: right;"></span></button>
     </h4>
  </div>
  <div id="cities" class="collapse pL10">
     <div class="panel-body" style="padding-top: 0; border-bottom: 1px solid #01ADD5">
        {{--<div class="chbxs listm">--}}
            @foreach($cities as $city)

            <div class="btn-group">
            <label class="container">&nbsp;&nbsp;&nbsp;{{$city->name}}
              <input name="cities[]" type="checkbox" value="{{$city->id}}">
              <span class="checkmark"></span>
            </label></div>

                @endforeach
           <div class="clearfix"></div>
        {{--</div>--}}
     </div>
     <br>
  </div>


                                                                            {{--Speciality--}}

  <div class="col-lg-12 col-md-12 left_panel" role="tab" id="headingOne">
     <h4 class="panel-title s-18">
        <button type="button" class="col-lg-12 col-md-12 btn btn-info caretForSpeciality" data-toggle="collapse" data-target="#speciality"  aria-controls="collapseOne" ><strong>Specility</strong><span id="specialityCaret" class="caret" style="float: right;"></span></button>
     </h4>
  </div>
  <div id="speciality" class="collapse pL10">
     <div class="panel-body" style="padding-top: 0; border-bottom: 1px solid #01ADD5">
        <div class="chbxs listm">
               @foreach($specialities as $speciality)
               <div class="btn-group">
                           <label class="container">&nbsp;&nbsp;&nbsp;{{$speciality->name}}
                             <input name="specialities[]" type="checkbox" value="{{$speciality->id}}">
                             <span class="checkmark"></span>
                           </label></div>
         @endforeach
           <div class="clearfix"></div>
        </div>
     </div>
     <br>
  </div>

 <div class="doctorSearchOption">
    <div class="col-lg-12 col-md-12">
       <button type="submit" onclick="submitForm()" class="btn btn-raised btn-sm btn- w100p">Search &nbsp; <span class="glyphicon glyphicon-search"></span></button><br><br>
    </div>
 </div>
 </div>
                        {{--{{ Form::close() }}--}}
                        </form>
    </div>
 </div>
            {{--Right Panel--}}
            <div class="col-md-9 col-sm-9  col-lg-9">

                @if(empty($doctors))
                                            {{--No Record Found Error--}}
                                <div class="col-lg-offset-4 col-md-offset-4">
                                <span><img src="{{asset('images/not_found.png')}}"></span><br>
                </div>
                @else
                    @for($i=0; $i<sizeof($doctors);$i++)

                    <div class="col-md-12 col-sm-12  col-lg-12 card listBox" style="border-radius: 5px; padding-top: 10px; ">
                        <div class="col-md-3 col-sm-3 col-lg-3">

                        <div class="col-md-10 col-sm-10  col-lg-10   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-2">
                            <div class="thumb-xl member-thumb " style="align-items: center">
                                <img src="{{asset('images/random-avatar3.jpg')}}" class="img-circle" alt="profile-image" >
                                <i class="zmdi zmdi-info" title="verified user"></i>
                            </div>
                         </div>
                         <div class="col-md-8 col-sm-8  col-lg-8   col-lg-offset-2 col-md-offset-2 col-sm-offset-2" style="text-align: center; border-radius:25px; margin-top:10px;border: 2px solid wheat; background-color: #01ADD5; color: white ">Exp. 15 year</div>
                        </div>
                        <div class="col-md-3 col-sm-3  col-lg-3" >
                            <div class="col-xs-12 col-md-12 col-sm-12" style="text-align: center">
                                <h4 align="center"><strong>
                                {{$doctors[$i]->full_name}}

                                </strong></h4>
                                <p align="center" >

                               <strong>{{$doctors[$i]->code}}</strong><br>

                                     <span> <a href="#" style="color: red">websitk.ename.com</a> </span></p>
                                <a style="" href="{{route('drProfile',$doctors[$i]->doctorsId)}}"  class="btn btn-raised btn-sm">View Profile</a>
                                <ul class="social-links list-inline m-t-10">
                                    <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a title="instagram" href="3.html" ><i class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3  col-lg-3" style="text-align: center">
                            <div style="">
                                <h5 align="center" ><strong style="color:  #01ADD5; font-size: 15px">Speciality:</strong><strong>

                                            {{$doctors[$i]->specialityName}}
                                        </strong></h5>

                                <p align="center" >(

                                        {{$doctors[$i]->start}}
                                    <strong>AM</strong>)<br><strong>To</strong><br>
                                        {{$doctors[$i]->end}}
                                    <strong>PM</strong>)</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3  col-lg-3">
                            <div style=" margin-top: 10px; text-align: center ">
<button type="button" class="btn btn-raised btn-sm btn-1" data-toggle="modal" data-target="#myModal"><strong>Call Now</strong></button>
                                {{--<button class="btn btn-raised btn-sm btn-warning" style="width: inherit ">Call Now</button>--}}
                                <p>Fee Starting</p>
                                <p> <strong>{{$doctors[$i]->min_fee}} </strong>PKR <strong>
                                To</strong>
                                    <strong>{{$doctors[$i]->max_fee}} </strong>PKR</p>
                            </div>
                        </div>
                    </div>
                @endfor
@endif
<!-- Modal -->
                 <div class="modal fade" id="myModal" role="dialog">
                     <div class="modal-dialog modal-sm">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4>Contact Detail</h4>
                         </div>
                         <div class="col-md-offset-4">
                         <img src="{{asset('images/dr_contact.jpg')}}" width="150px" height="150px"></div>
                           <p style="text-align: center">Have a health related question?<br>

                              Would you like to connect to a doctor?</p>

                          <h2 style="text-align:center ;color:  #01ADD5;">0900-78601</h2>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                       </div>
                     </div>
                   </div>

                 </div>

                </div>
            </div>
@stop

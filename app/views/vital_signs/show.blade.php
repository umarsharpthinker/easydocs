<script>
    alert("aitzaz");
</script>

@extends('vital_signs.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Vital Sign Details
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content1')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Vital Sign Details
            </div>
		</div>
		<br><br><br>
    </section>
@stop

@section('content2')

    {{ $_view }}

	   {{--<center>--}}
            {{--<div id="vitalSignsForm" style="border: 4px solid #129894; width: 800px; height: 100%; background-color: #EBEBEB">--}}
                {{--<table class="row_border" style=" border-radius: 10px; margin: 5%;" width="621" height="720">--}}
              {{----}}
			 {{--<tr>--}}
                {{--<td width="272" height="55"><label>Weight</label> </td>--}}
                {{--<td width="333"><label>{{{ $vitalsign->weight}}} (kg)</label></td>--}}
             {{--</tr>--}}

             {{--<tr>--}}
                {{--<td width="272" height="55"><label>Height</label> </td>--}}
                {{--<td width="333"><label>{{{$vitalsign->height}}} (cm)</label></td>--}}
             {{--</tr>--}}

             {{--<tr>--}}
                {{--<td width="272" height="55"><label>BP (systolic)</label> </td>--}}
                {{--<td width="333">--}}
                    {{--<label>{{{$vitalsign->bp_systolic}}} (mmHg)</label>--}}
                {{--</td>--}}
                {{--</tr>--}}
             {{--<tr>--}}
                {{--<td width="272" height="55"><label>BP (diastolic)</label> </td>--}}
                {{--<td width="333">--}}
                    {{--<label>{{{$vitalsign->bp_diastolic}}} (mmHg)</label>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td width="272" height="55"><label>Blood Group</label> </td>--}}
                {{--<td width="333">--}}
                   {{--<label>{{{$vitalsign->blood_group}}} </label>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td width="272" height="55"><label>Pulse Rate</label> </td>--}}
                {{--<td width="333">--}}
                    {{--<label>{{{$vitalsign->pulse_rate}}} (per min)</label>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td width="272" height="55"><label>Respiration Rate</label> </td>--}}
                    {{--<td width="333">--}}
                        {{--<label>{{{$vitalsign->respiration_rate}}} (per min)</label>--}}
                    {{--</td>--}}
                {{--</tr>--}}

                {{--<tr>--}}
                {{--<td width="272" height="55"><label>Temprature</label> </td>--}}
                {{--<td width="333">--}}
                    {{--<label>{{{$vitalsign->temprature}}} (F)</label>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td width="350"><label>Note:</label></td>--}}
                {{--<td colspan="2" width="333" height="200"><label><div style="width: 333px; word-wrap: break-word">{{{ $vitalsign->note }}}</div></td>--}}
                {{--</tr>--}}


              {{----}}
            {{--</table>--}}
            {{--<center>--}}
                  {{--<section style="margin-bottom: 10%">--}}
                     {{--<input type="submit" onclick="back()" value="Back" class="submit" />--}}
                  {{--</section>--}}
             {{--</center>--}}
            {{--</div>--}}
        {{--</center>--}}

		{{--<br><br>--}}
@stop

@section('scripts')
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('plugins/file-input/css/fileinput.min.css')}}">
    <script src="{{asset('plugins/file-input/js/fileinput.min.js')}}"></script>
    <script src="{{asset('js/view-pages/vital_signs/VitalSignsList.js')}}"></script>
    <script>
        window.patientPrescriptionUrl = 0;
        $(document).ready(function () {
            var options = {
                saveCloseUrl: "{{route('patients.index')}}",
                VitalSignUrl: "{{route('fetchappointmentsbypatientid')}}"
            };


        });
    </script>
@stop
@extends('layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Manage Appointments
@stop

@section('redBar')
    <div class = "user_logo">
        <div class="header_1 wrap_3 color_3 login-bar">Easy Physician
            {{--<div class="col-md-12 mL25 taL">Easy Physician</div>--}}
        </div>
    </div>
@stop

@section('sliderContent')
@stop


<!--========================================================
                          CONTENT
=========================================================-->

@section('content')
    <div class="container mT20">
                <h1 class="mT10 mB0 c3" style="font-family: 'Marvel'">Users List</h1>
                <hr class="w100p fL mT0" />
                <section id="form-Section">
                    <!--========================================================
                                             Data Table
                    =========================================================-->
                    @if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Receptionist')
                        {{ link_to_route('appointments.create', 'Create Appointment', '', ['class' => 'btn_1'])}}
                    @endif
                    <table id="tblRecordsList" class="mT20 table table-hover table-striped display">
                        <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(($appointments) != null)
                            @if(($appointments->count()))
                                @foreach($appointments as $appointment)
                                    <tr class="row-data">
                                        <td>{{{ $appointment->patient->name }}}</td>
                                        <td>{{{ $appointment->employee->name }}}</td>
                                        <td>{{{ date('j F, Y', strtotime($appointment->date)) }}}</td>
                                        <td>{{{ isset($appointment->timeslot) ? $appointment->timeslot->slot : ''}}}</td>

                                        <td>

                                            | <a href="{{route('prescriptions.create')}}?appointmentId={{$appointment->id}}">Add Prescription</a> |
                                            <a href="{{route('prescriptions.index')}}?id={{$appointment->patient_id}}">Prescription History</a>
                                            {{ link_to_route('appointments.show', '', [$appointment->id], ['class' => 'btn-view-icon fL', 'title'=> 'View Record'])}}
                                            @if(Auth::user()->role != 'Doctor')
                                                @if($appointment->status == 0 || $appointment->status == 1 || $appointment->status == 2)
                                                    <span class="fL">&nbsp;|&nbsp;</span>{{ link_to_route('appointments.edit', '', [$appointment->id], ['class' => 'btn-edit-icon fL'])}}
                                                @else
                                                    <span class="fL">&nbsp;|&nbsp;</span><a href="javascript:void(0)" class="btn-edit-disable-icon fL" title="Edit Record not allowed"></a>
                                                @endif
                                            @else
                                                <span class="fL">&nbsp;|&nbsp;</span><a href="javascript:void(0)" class="btn-edit-disable-icon fL" title="Edit Record not allowed"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"> There is no record found</td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="6"> There is no record found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $appointments->links('partials.pagination') }}
                </section>
            </div>
@stop


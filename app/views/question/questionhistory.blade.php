
@extends('layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
    Questions History
@stop

@section('redBar')

    <div >

    </div>
@stop

@section('sliderContent')
@stop
@section('headScript')

    {{--<link src="{{ asset('css/jquery.rateyo.min.css') }}">--}}
@endsection



@section('content')
<div class="container">
    <h2>Asked questions</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Question</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if($questions)
        @foreach($questions as $question)
            <tr>
                <td class="align-top">{{$question->id}}</td>
                <td>{{$question->question}}</td>
                <td>{{$question->status}}</td>
                <td>
                    <a href="{{route('answer.create')}}/?questionId={{$question->id}}">Reply</a>

                </td>

            </tr>

        @endforeach
        @endif


        </tbody>
    </table>
    <div class="center" >
        <?php echo $questions->links(); ?>

    </div>




</div>
@section('scripts')
    <style>
        td, th {
            vertical-align:top;
        }
    </style>
    <script>



    </script>

    @endsection



@endsection
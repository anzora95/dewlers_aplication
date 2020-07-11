@extends('layouts.app')
@section('extra_links')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/scripts.js') }}" type="application/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
        <div class="text-center">

            @foreach($selected as $select)

                <form action="/send_f_request">
                    @csrf

                <div class="row" style="border: 1px solid #000000;border-radius: 5px; padding: 3px 0 3px 0; margin: 5px 0 5px 0" >

                    <div class="col-lg-6">{{$select->username}}</div>
                    <input type="text" name="user_id" id="id_user" value="{{$select->id}}" hidden>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary">Send Request</button>
                    </div>
{{--                    <div class="col-lg-4">Button</div>--}}

                </div>
                </form>

                @endforeach

        </div>

            </div>
        </div>
    </div>
    @endsection

@extends('layouts.app')
@section('content')
    <script type="application/javascript" src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <div class="container">
        <div class="row justify-content-center text-center">

            {{--                AQUI EL MENU--}}
            <div class="container">
                <div  class="row">
                    <div class="col">
                        <a href="{{ url('/dashboard') }}">
                            {{-- <button type="button" class="btn btn-outline-secondary">Go Back</button> --}}
                            {{ Html::image('img/left-1.svg', 'back', array('style' => 'max-width: 40px; margin:auto; margin-top:15px;color:#6c757d','class'=>'arrow-back')) }}
                        </a>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col text-right">
                    </div>
                </div>
            </div>

            <input type="text" id="datepicker">
            <script type="application/javascript">
                console.log("pika");
                var picker = new Pikaday({ field: document.getElementById('datepicker') });
            </script>



        </div>
    </div>
@endsection

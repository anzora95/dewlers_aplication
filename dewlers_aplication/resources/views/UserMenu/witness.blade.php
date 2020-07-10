@extends('layouts.app')
@section('extra_links')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}" type="application/javascript"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

@endsection
@section('content')

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!--
        RTL version
    -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>



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


                {{-- DUelos donde se es witness--}}
                @foreach($duels as $du)
                    @if($du->duelstate==2 or $du->duelstate==3)

                    <div class="col-md-8 duelwitness">
                        <div class="card">
                            <div class="card-header">{{$du->tittle}}</div>
                            <div class="card-body">

                                {{--                                    @if($witness_acept==1)--}}

                                <form action="#" method="POST" id="witnees_contract{{$du->id}}">
                                    @csrf

                                    <div class="container">
                                        <div> You have been invited as a Witness to this Dewl.
                                            <br> Please select your Witness Percentage.
                                        </div>
                                        <br>
                                        <div class="row text-center">
                                            <div class="col-lg-4 offset-lg-4">

                                                <input type="number" name="percentage">
                                            </div>
                                        </div>
                                        <br>
                                        <input type="text" value="{{$du->id}}" name="id" hidden>
                                        <div class="row text-center">


                                            {{--                                            <div class="row text-center">--}}
                                            <div class="col-lg-6">
                                                <button class="btn-primary btn" style="background-color: #00B6E3;" id="acept{{$du->id}}" type="submit" formaction="/witn_validate">Acept</button>
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="btn btn-danger" style="background-color: #D5130B" id="refuse{{$du->id}}" type="submit" formaction="/nowith">Refuse</button>

                                            </div>
{{--                                            </div>--}}
                                        </div>
                                        <div class="text-center">



                                        </div>

                                    </div>

                            </form>
                        </div>

                        </div>
                    </div>




                        @else
                        <div class="col-md-8 duelwitness">
                            <div class="card">
                                <div class="card-header">{{$du->tittle}}</div>
                                <div class="card-body">

{{--                                    @if($witness_acept==1)--}}

                                        <form action="#" method="post">
                                            @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col"><h4>${{$du->pot}}</h4> </div>

                                                </div>
                                                <div class="col"><h5> Select a winner</h5> </div>
                                                <div class="radio-group">
                                                    <div class="row">
                                                        <div  class="col-md-5 option{{$du->id}}  option challenger"   id="challenger{{$du->id}}" >
                                                            {{ Html::image('img/avatar.svg', 'challenger', array('style' => 'max-width: 40px; margin:auto; margin-top:15px;')) }}
                                                            <h5 >{{$du->ctlUser0->username}}</h5>
                                                        </div>
                                                        <div class="col-md-2"><img src="https://img.icons8.com/ios/50/000000/head-to-head.png" class="vslogo" id="vslogo" ></div>
                                                        <div class="col-md-5 option2{{$du->id}} option challenged" id="challenged{{$du->id}}"  >

                                                            {{ Html::image('img/avatar.svg', 'challenged', array('style' => 'max-width: 40px; margin:auto; margin-top:15px;')) }}

                                                            <h5 class="card-title">{{$du->ctlUser1->username}}</h5>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div id="collapseExample" class="col collapser{{$du->id}} collapse" >
                                                    <a class="btn btn-primary" onclick="ajaxwinner{{$du->id}}()" role="button">Winner</a>
                                                </div>
                                            </div>
                                </div>
                                </form>


                            </div>
                        </div>
                    @endif

                @endforeach


            </div>

        <br>
        <br>
@foreach($duels as $du)

            @if($du->duelstate==2 or $du->duelstate==3)

{{--                <script type="application/javascript">--}}

{{--                    $('#acept{{$du->id}}').click(function(){--}}
{{--                        $('#witnees_contract{{$du->id}}').attr('action', '/dashboard');--}}
{{--                        $('#witnees_contract{{$du->id}}').submit();--}}
{{--                    });--}}

{{--                    $('#refuse{{$du->id}}').click(function(){--}}
{{--                        $('#witnees_contract{{$du->id}}').attr('action', '/addcoins');--}}
{{--                        $('#witnees_contract{{$du->id}}').submit();--}}
{{--                    });--}}


{{--                </script>--}}



                @else
{{--            -----------------------------------------------------------    ELSE   -------------------------------------------------------------------------                     --}}



        <script type="application/javascript">
            $(document).ready(
                function()
                {
                    $(".option{{$du->id}}").click(
                        function(event)
                        {
                            $('#challenger{{$du->id}}').toggleClass("active");

                            var element = document.getElementById("collapseExample");
                            if($("#challenger{{$du->id}}").hasClass("active") || $("#challenged{{$du->id}}").hasClass("active")){
                                $(".collapser{{$du->id}}").collapse('show');
                            }
                            else{
                                $(".collapser{{$du->id}}").collapse('hide');
                            }
                            $('#challenger{{$du->id}}').siblings().removeClass("active");
                        }
                    );
                    $(".option2{{$du->id}}").click(
                        function(event)
                        {
                            $('#challenged{{$du->id}}').toggleClass("active");

                            var element = document.getElementById("collapseExample");
                            if($("#challenger{{$du->id}}").hasClass("active") || $("#challenged{{$du->id}}").hasClass("active")){
                                $(".collapser{{$du->id}}").collapse('show');
                            }
                            else{
                                $(".collapser{{$du->id}}").collapse('hide');
                            }
                            $('#challenged{{$du->id}}').siblings().removeClass("active");
                        }
                    );
                });

            // ESPACIO PARA AJAX
            function ajaxwinner{{$du->id}}(){
                console.log("hola"+{{$du->id}});
                if($("#challenger{{$du->id}}").hasClass("active")){
                    console.log('Gano el retador');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {


                        }
                    };
                    xhttp.open("GET", "/update_balance/{{$du->id}}/{{$du->ctl_user_id_challenger}}/{{$du->ctl_user_id_challenged}}", true);
                    xhttp.send();
                    alertify.alert('Ready!');

                    setTimeout(function(){ location.reload(); }, 3000);
                }
                else{
                    console.log('Gano el retado');
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {

                        }
                    };
                    xhttp.open("GET", "/update_balance/{{$du->id}}/{{$du->ctl_user_id_challenged}}/{{$du->ctl_user_id_challenger}}", true);
                    xhttp.send();
                    alertify.alert('Ready!');
                    setTimeout(function(){ location.reload(); }, 3000);

                }
            }
        </script>


            @endif
        @endforeach
            {{--         FIN de DUelos donde se es witness--}}
        </div>

@endsection

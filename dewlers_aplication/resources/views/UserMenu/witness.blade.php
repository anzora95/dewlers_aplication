@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="container witness-div">
                <div  class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col text-right">
                        <a href="{{ url('/dashboard') }}">
                            <button type="button" class="btn btn-outline-secondary">Go Back</button>
                        </a>
                    </div>
                </div>
            </div>
{{--            DUelos donde se es witness--}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fastes Man in the office</div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col"><h3> $1500.00</h3> </div>
                                </div>
                                <div class="radio-group">
                                <div class="row">
                                    <div  class="col-md-5 option challenger"  data-toggle="collapse" href="#collapseExample" onclick="selectwinner()">
                                            {{ Html::image('img/avatar.svg', 'challenger', array('style' => 'max-width: 40px; margin:auto; margin-top:15px;')) }}
                                                <h5 >Challenger</h5>
                                        </div>
                                    <div class="col-md-2"><img src="https://img.icons8.com/ios/50/000000/head-to-head.png" class="vslogo" id="vslogo" ></div>
                                    <div class="col-md-5 option challenger" onclick="selectwinner()" data-toggle="collapse" href="#collapseExample">

                                            {{ Html::image('img/avatar.svg', 'challenged', array('style' => 'max-width: 40px; margin:auto; margin-top:15px;')) }}

                                                <h5 class="card-title">Challenged</h5>

                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div id="collapseExample" class="col choosewinnerbutton collapse">
                                        <a class="btn btn-info" href="#"  role="button">Winner</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--         FIN de DUelos donde se es witness--}}
        </div>
</div>
@endsection

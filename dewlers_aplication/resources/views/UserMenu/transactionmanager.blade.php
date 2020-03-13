@extends('layouts.app')
@section('content')
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Stacks</div>
                        <div class="card-body">
                            <form action="/savecoins" method="post">
                                @csrf
                                {{--                                Tittle--}}
                                <div class="container">
                                <div class="form-group ">
                                    <label for="tittle" class="deposit">How much do you want to deposit?</label>
                                    <br>
                                    <div class="btn-group btn-group-toggle radios" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <input type="radio" name="option" id="option1" value="20" checked> $20.00
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="option" id="option2" value="60"> $60.00
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="option" id="option3" value="100"> $100.00
                                        </label>
                                    </div>
                                </div>

                                {{--                                POT--}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input type="number" id="ownAmount" name="ownAmount" class="form-control" placeholder="Own Amount" aria-label="pot" aria-describedby="pot" >
                                </div>

                                {{--                                RETADO--}}



                                {{--                                      TESTIGO--}}



                                <button type="submit" class="btn btn-success">DEPOSIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




        </div>
    </div>
@endsection

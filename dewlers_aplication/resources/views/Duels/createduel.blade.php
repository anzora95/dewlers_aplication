@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">

                {{--                AQUI EL MENU--}}
            <div class="container">
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Create a Duel</div>
                        <div class="card-body">
                            <form action="/saveduel" method="post">
                                @csrf
{{--                                Tittle--}}
                                <div class="form-group">
                                    <label for="tittle">Tittle</label>
                                    <input type="text" class="form-control" id="tittle" name="tittle" aria-describedby="tittle" required>
                                </div>

{{--                                POT--}}
                                <label for="pot">Bet</label>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input type="number" id="pot" name="pot" class="form-control" placeholder="10.00" aria-label="pot" aria-describedby="pot"  required min="10" >
                                </div>

{{--                                RETADO--}}
                                <div class="form-group">
                                    <label for="challendged">VS</label>
                                    <select class="form-control" id="challendged"  name="challendged" >
                                        @foreach($challengeds as $chall)
                                            <option value="{{$chall->id}}" > {{ $chall->username }} </option>
                                        @endforeach

                                    </select>
                                </div>


{{--                                      TESTIGO--}}
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Witness</label>
                                    <select class="form-control" name="witness" id="witness">
                                        @foreach($challengeds as $chall)
                                            <option value="{{$chall->id}}" > {{ $chall->username }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-danger">DUEL</button>
                            </form>
                        </div>
                    </div>
                </div>

{{--            <div>--}}
{{--                @foreach($f_root as $groot)--}}
{{--                    {{$groot}}--}}
{{--                    @endforeach--}}
{{--            </div>--}}

        </div>
    </div>
@endsection

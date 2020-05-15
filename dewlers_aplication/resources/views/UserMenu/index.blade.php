@extends('layouts.app')
@section('extra_links')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    {{--    {{HTML::asset('images/icons/favicon.ico')}}--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer ></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@stop
@section('content')


    <div  class="container vertical-center">
        <div class="row justify-content-center text-center">
                <div class="container-fluid">
                    <div  class="d-md-flex">
                        <div  class="col-md-6 overflow-auto dewl-flex">
                            <div class="row add-dewl-icon">
                                <div class="col text-left" style="padding-left: 30px;">
                                    <button class="btn" onclick="createdewl()">
                                    <i>
                                        <svg class="bi bi-plus-circle-fill" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zM8.5 4a.5.5 0 00-1 0v3.5H4a.5.5 0 000 1h3.5V12a.5.5 0 001 0V8.5H12a.5.5 0 000-1H8.5V4z" clip-rule="evenodd"/>

                                        </svg>
                                    </i>
                                    </button>
                                    <span class="title-dashboard" style="color: white">Create Dewl</span>
                                </div>
                                <div class="col"></div>


                            </div>
                            <div class="container dewl-content text-center">
                                @foreach($duels as $du)
                                <div class="row dewl-row">
                                    <div class="col-md-3 vs-div" >VS</div>
                                    <div class="col-md-4 info-div-first">{{$du->ctlUser1->username}}</div>
                                    <div class="col-md-3 info-icon">
{{--                                        <svg class="bi bi-person-fill text-dewl-green" width="2.3em" height="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>--}}

                                        @switch($du->duelstate)
                                            @case(1)
                                            {{ HTML::image('img/Dewlers_iconos_Lo-P2.svg', '303', array('style' => 'width: 33px; high: 33px;')) }}
                                            @break

                                            @case(2)
                                            {{ HTML::image('img/Dewlers_iconos_Lo-P2-Wi.svg', '303', array('style' => 'width: 33px; high: 33px;')) }}
                                            @break

                                            @case(3)
                                            {{ HTML::image('img/Dewlers_iconos_Lo-Wi.svg', '303', array('style' => 'width: 33px; high: 33px;')) }}
                                            @break

                                            @case(4)
                                            {{ HTML::image('img/Dewlers_iconos_P1vP2.svg', '303', array('style' => 'width: 33px; high: 33px;')) }}
                                            @break

                                            @default
                                            {{ HTML::image('img/Dewlers_iconos_X2.svg', '303', array('style' => 'width: 33px; high: 33px;')) }}
{{--                                            @break--}}

{{--                                            @default--}}
{{--                                            {{ HTML::image('img/Dewlers_iconos_Lo-P2.svg', '303', array('style' => 'width: 33px; high: 33px;')) }}--}}

                                        @endswitch
{{--                                        </svg>--}}
                                    </div>
                                    <div class="col-md-2 info-div text-dewl-green">
                                        {{$du->pot}}
                                    </div>

                                </div>
                                @endforeach

{{--                                <div class="row dewl-row">--}}
{{--                                    <div class="col-md-3 vs-div">VS</div>--}}
{{--                                    <div class="col-md-4 info-div-first">NAME</div>--}}
{{--                                    <div class="col-md-3 info-icon">--}}
{{--                                        <svg class="bi bi-person-fill text-dewl-green" width="2.3em" height="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 info-div text-dewl-green">1520</div>--}}
{{--                                </div>--}}
{{--                                <div class="row dewl-row">--}}
{{--                                    <div class="col-md-3 vs-div">VS</div>--}}
{{--                                    <div class="col-md-4 info-div-first">NAME</div>--}}
{{--                                    <div class="col-md-3 info-icon">--}}
{{--                                        <svg class="bi bi-person-fill text-dewl-green" width="2.3em" height="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 info-div text-dewl-green">1520</div>--}}
{{--                                </div>--}}
{{--                                <div class="row dewl-row">--}}
{{--                                    <div class="col-md-3 vs-div">VS</div>--}}
{{--                                    <div class="col-md-4 info-div-first">NAME</div>--}}
{{--                                    <div class="col-md-3 info-icon">--}}
{{--                                        <svg class="bi bi-person-fill text-dewl-green" width="2.3em" height="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 info-div text-dewl-green">1520</div>--}}
{{--                                </div>--}}
{{--                                <div class="row dewl-row">--}}
{{--                                    <div class="col-md-3 vs-div">VS</div>--}}
{{--                                    <div class="col-md-4 info-div-first">NAME</div>--}}
{{--                                    <div class="col-md-3 info-icon">--}}
{{--                                        <svg class="bi bi-person-fill text-dewl-green" width="2.3em" height="2.3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-2 info-div text-dewl-green">1520</div>--}}
{{--                                </div>--}}

                            </div>

                        </div>
                        <div class="col-md-6 history-flex">
                            <div class="div-history overflow-auto">
                                <div class="row add-dewl-icon">
                                    <div class="col text-left" style="padding-left: 30px;">

                                        <span class="title-dashboard-history-witness" >History </span>
                                    </div>
                                    <div class="col"></div>

                                </div>
                                <div class="container history-content">

                                </div>
                            </div>
                            <div class="div-witness overflow-auto">
                                <div class="row add-dewl-icon">
                                    <div class="col text-left" style="padding-left: 30px;">

                                        <span class="title-dashboard-history-witness" >Witness </span>
                                    </div>
                                    <div class="col"></div>

                                </div>
                                <div class="container witness-content">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--            BOOSTRAP MODAL--}}

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create a Dewl</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/saveduel" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Title</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Description</label>
                                    <textarea type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Dewl</label>
                                    <input type="number" id="pot" name="pot" class="form-control" placeholder="10.00" aria-label="pot" aria-describedby="pot"  required min="10" >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">VS</label>
                                    <select class="form-control" id="challendged"  name="challendged" >
                                        @foreach($challengeds as $chall)
                                            <option value="{{$chall->id}}" > {{ $chall->username }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Witness</label>
                                    <select class="form-control" name="witness" id="witness">
                                        @foreach($challengeds as $chall)
                                            <option value="{{$chall->id}}" > {{ $chall->username }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">DEWL</button>
                            </form>

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
{{--            BOOSTRAP MODAL--}}



        </div>
    </div>

@endsection

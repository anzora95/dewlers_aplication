@extends('layouts.app')
@section('extra_links')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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

                                        @endswitch

                                    </div>
                                    <div class="col-md-2 info-div text-dewl-green">
                                        {{$du->pot}}
                                    </div>

                                </div>
                                @endforeach


                            </div>

                        </div>
                        <div class="col-md-6 history-flex">
                            <div class="div-history overflow-auto">
                                <div class="row add-dewl-icon">
                                    <div class="col text-left" style="padding-left: 30px;">


                                    </div>
                                    <div class="col"></div>

                                </div>
                                <div class="container history-content">
                                    <div class="row add-dewl-icon">
                                        <div class="col text-left" style="padding-left: 30px;">
                                            <span class="title-dashboard" style="color: white">Record</span>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li onclick="active_li(0)"  class="history-li" style="background-color: #00d9aa"><a class="navigation-url" data-toggle="tab" href="#home">Win</a></li>
                                        <li onclick="active_li(1)"  class="history-li"><a class="navigation-url" data-toggle="tab" href="#menu1">Lost</a></li>
                                        <li onclick="active_li(2)"  class="history-li"><a class="navigation-url" data-toggle="tab" href="#menu2">Witness</a></li>

                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-header">
                                            <div class="row">
                                                <div class="col-md-4 text-center"><strong>Challenge</strong></div>
                                                <div class="col-md-2 text-center"><strong>Stacks</strong></div>
                                                <div class="col-md-3 text-center"><strong>Date</strong></div>
                                                <div class="col-md-3 text-center"></div>

                                            </div>
                                        </div>
                                        <div id="home" class="tab-pane fade in active show">
                                            {{--                                            THIS IS A LINE INSIDE THE WIN TAB--}}
                                            @foreach($r_winner as $winner)
                                            <div class="row win-row">
                                                @if($winner->ctl_user_id_winner == $winner->ctl_user_id_challenger) {{-- si el id del GANADOR es igual al de EL RETADOR  poner el nombre del retador --}}
                                                <div class="col-md-4 history-challenge text-center">{{$winner->ctlUser1->username}}</div>
                                                 @else
                                                 <div class="col-md-4 history-challenge text-center">{{$winner->ctlUser0->username}}</div>
                                                @endif
                                                <div class="col-md-2 history-stacks text-center">{{$winner->pot}}</div>
                                                <div class="col-md-3 history-date text-center">{{$winner->startDate}}</div>
                                                <div class="col-md-3 history-info text-center">More info</div>
                                            </div>
                                            @endforeach
                                            {{--                                            THIS IS A LINE INSIDE THE WIN TAB--}}

                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            {{--                                            THIS IS A LINE INSIDE THE LOST TAB--}}
                                            @foreach($r_loser as $loser)
                                            <div class="row lost-row">
                                                @if($loser->ctl_user_id_winner == $loser->ctl_user_id_challenger) {{-- si el id del GANADOR es igual al de EL RETADOR  poner el nombre del retador --}}
                                                <div class="col-md-4 history-challenge text-center">{{$loser->ctlUser1->username}}</div>
                                                @else
                                                    <div class="col-md-4 history-challenge text-center">{{$loser->ctlUser0->username}}</div>
                                                @endif
                                                <div class="col-md-2 history-stacks">{{$loser->pot}}</div>
                                                <div class="col-md-3 history-date">{{$loser->startDate}}</div>
                                                <div class="col-md-3 history-info">More info</div>
                                            </div>
                                            @endforeach
                                            {{--                                            THIS IS A LINE INSIDE THE LOST TAB--}}

                                         </div>
                                        <div id="menu2" class="tab-pane fade">
                                            {{--                                            THIS IS A LINE INSIDE THE WIN TAB--}}
                                            @foreach($r_witness as $witness)
                                            <div class="row win-row">
                                                <div class="col-md-4 history-challenge text-center">{{$witness->tittle}}</div>
                                                <div class="col-md-2 history-stacks text-center">{{$witness->pot}}</div>
                                                <div class="col-md-3 history-date text-center">{{$witness->startDate}}</div>
                                                <div class="col-md-3 history-info text-center">More info</div>
                                            </div>
                                                @endforeach


                                        </div>
                                        <div id="menu3" class="tab-pane fade">
                                            <h3>Menu 3</h3>
                                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
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
                            <form action="/saveduel" method="post" onsubmit="sub_butt.disabled = true; return true;">
                                @csrf
                                {{--                                Tittle--}}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="tittle" name="tittle" aria-describedby="tittle" required>
                                </div>
                                {{--                                DESCRIPTION--}}
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="descriptio" class="form-control" cols="30" rows="3" required></textarea>
                                </div>
                                {{--                                POT--}}
                                <label for="pot">Dewl</label>
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
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Schedule Dewl</label>
                                    <br>
{{--                                    <svg class="bi bi-calendar" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>--}}
{{--                                        <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>--}}
{{--                                    </svg>--}}
                                    <input name="startdate" type="text" id="datepicker">
                                    <script type="application/javascript">
                                        $('#datepicker').datepicker({ format: 'yyyy-mm-dd' });
                                    </script>

                                </div>
                                <div class="form-group">
                                    <div>
                                        <input type='checkbox' data-toggle='collapse' data-target='#collapsediv1'> Click to collapse/hide
                                        </input>
                                    </div>
                                    <div id='collapsediv1' class='collapse div1'>
                                        <div>
                                            <label for="formGroupExampleInput">Witness</label>
                                            <select class="form-control" name="witness" id="witness">
                                                @foreach($challengeds as $chall)
                                                    <option value="{{$chall->id}}" > {{ $chall->username }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

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

@extends('layouts.app')
@section('extra_links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>
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


                                    </div>
                                    <div class="col"></div>

                                </div>
                                <div class="container history-content">

                                    <div id="tabs">
                                        <ul>
                                            <li><a href="#tabs-1">Win</a></li>
                                            <li><a href="#tabs-2">Lost</a></li>
                                            <li><a href="#tabs-3">Witness</a></li>
                                        </ul>
                                        <div id="tabs-1">
                                            <div class="row">
                                                <div class="col-md-4"><strong>Challenge</strong></div>
                                                <div class="col-md-4"><strong>Stacks</strong></div>
                                                <div class="col-md-3"><strong>Date</strong></div>
                                            </div>
                                        </div>
                                        <div id="tabs-2">
                                            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                                        </div>
                                        <div id="tabs-3">
                                            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                                            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
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
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Date</label>
                                    <input id="datepicker" width="276" />

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

    <script type="application/javascript">
        $('#datepicker').datepicker();
    </script>
@endsection

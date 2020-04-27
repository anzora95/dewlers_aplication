@extends('layouts.app')
@section('extra_links')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    {{--    {{HTML::asset('images/icons/favicon.ico')}}--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer ></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@stop
@section('content')




    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-12">
                   {{--                AQUI EL MENU--}}
            <div class="container">
                <div  class="row">
                    <div class="col text-left">
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


            <div class="col-md-12 status-table">
                <div class="card">
                    <div class="card-header">Dewl Status </div>
                    <div class="card-body">
                        <table id="mytable" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Tittle</th>
                                <th>POT</th>
                                <th>Challenger</th>
                                <th>Challenged</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Winner</th>
                                <th hidden>id</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($duels as $du)

                                @if($du->ctl_user_id_challenged == Auth::user()->id)                                                     {{--// si el usuario retado es igual al logueado--}}

                                    @if($du->ctl_user_id_winner != Auth::user()->id and $du->ctl_user_id_winner!=null)                   {{--si el ganador es diferente al logueado (permitira el don)--}}

                                        @foreach($don_status as $don)                               {{--// recorre los duelos aptos para don--}}
                                        <p>{{$don->duel_id}} </p>

                                            @if($du->id==$don->duel_id)                             {{--// si el duelo actual coincide con uno apto para don--}}

                                                @if($don->status==0)                                {{--// si el status de don actual es 0 es decir ya efectuo el don--}}

                                                <tr id="acept{{$du->id}}">                          {{--// la fila no tiene ninguna clase--}}

                                                @endif

                                            @endif


                                        @endforeach

                                    <tr id="acept{{$du->id}}" class="fenix_duel" style="background-color: #2a9055" >  {{--//clase fenix_duel permite al logueado crear el doble o nada--}}

                                    @elseif($du->ctl_user_id_winner == Auth::user()->id and $du->duelstate!=5)                              {{--// si el ganador es igual al logueado pero no se ha solcitado el doble o nada--}}

                                        <tr id="acept{{$du->id}}">                                                                          {{--//coloca solo este id--}}

                                    @elseif($du->ctl_user_id_winner == Auth::user()->id and $du->duelstate==5)                              {{-- // si el ganador es el logueado (permitira aceptar el don)--}}

                                         <tr id="acept{{$du->id}}" class="don_challenged" style="background-color: #FFD04B" >               {{--// clase don challenged (permite aceptar el don)--}}

{{--                                    @elseif($du->)--}}

                                    @endif
                                @else

                                    @if($du->ctl_user_id_winner != Auth::user()->id and $du->ctl_user_id_winner!=null)
                                        @foreach($don_status as $don)                               {{--// recorre los duelos aptos para don--}}

                                                     <p>{{$don->duel_id}} </p>
                                            @if($du->id==$don->duel_id)                             {{--// si el duelo actual coincide con uno apto para don--}}

                                                @if($don->status==0)                                {{--// si el status de don actual es 0 es decir ya efectuo el don--}}

                                                    <tr id="acept{{$du->id}}">                          {{--// la fila no tiene ninguna clase--}}

                                                @endif

                                            @endif

                                        @endforeach

                                        <tr id="mv_jose_row " class="fenix_duel" style="background-color: #2a9055">

                                    @elseif($du->ctl_user_id_winner == Auth::user()->id and $du->duelstate!=5)
                                        <tr id="mv_jose_row">

                                    @elseif($du->ctl_user_id_winner == Auth::user()->id and $du->duelstate==5)                              {{-- // si el ganador es el logueado (permitira aceptar el don)--}}

                                    <tr id="acept{{$du->id}}" class="don_challenged" style="background-color: #FFD04B" >

                                    @endif
                                @endif
                                    <td>{{$du->tittle}}</td>
                                    <td>${{$du->pot}}.00</td>

                                    <td>{{$du->ctlUser0->username}}</td>
                                    <td>{{$du->ctlUser1->username}}</td>
                                    <td>{{$du->registerDate}}</td>
                                    <td>{{$du->duelstatus->description}}</td>
                                        @if($du->ctl_user_id_winner==null)
                                            <td>--</td>
                                        @else
                                            <td>{{$du->ctlUser3->username}}</td>
                                        @endif
                                    <td hidden>{{$du->id}}</td>


                                    </tr>



                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Tittle</th>
                                <th>POT</th>
                                <th>Challenger</th>
                                <th>Challenged</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Winner</th>
                                <th hidden>id</th>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>




            </div>
        </div>
    </div>

    <script type="application/javascript">
        $(document).ready(function() {
            $('#mytable').DataTable();
        } );
    </script>



{{--    @foreach($duels as $due)--}}
{{--        @if($due->ctl_user_id_challenged == Auth::user()->id)--}}
            <script type="application/javascript">

                $(document).ready(function() {

                    var table = $('#mytable').DataTable();


                    // CREAR DOBLE O NADA

                    $('#mytable').on('click', 'tr.fenix_duel', function() {

                        var data = table.row( this ).data();
                        console.log('Este es el valor de data que no se que es xd');
                        console.log(data[1]);
                        {{--console.log({{}});--}}
                        var delayInMilliseconds = 1000; //1 second
                        // alertify.confirm('Double or nothing', data[0], function(){ alertify.success('Ok');
                        //     }
                        //     , function(){ alertify.error('Cancel')});

                            alertify.confirm('Double or nothing', 'Come on, one more match, double or nothing!  You agree?', function(){alertify.success('Deleted');
                                    setTimeout(function() {
                                        window.location.replace("/double_or_nothing/"+data[7]+"/");
                                    })
                                }
                                , function(){ alertify.error('Cancel')});

                    } );


                //    ACEPTAR DOBLE O NADA

                    $('#mytable').on('click', 'tr.don_challenged', function() {

                        var data = table.row( this ).data();
                        console.log('Este es el valor de data que no se que es xd');
                        console.log(data[1]);
                            {{--console.log({{}});--}}
                        var delayInMilliseconds = 1000; //1 second
                        // alertify.confirm('Double or nothing', data[0], function(){ alertify.success('Ok');
                        //     }
                        //     , function(){ alertify.error('Cancel')});

                        alertify.confirm('Double or nothing','You have been challenged by your rival to a double or nothing You agree?', function(){alertify.success('Deleted');
                                setTimeout(function() {
                                    window.location.replace("/acepted_don/"+data[7]+"/");
                                })
                            }
                            , function(){ alertify.error("Cancel")});

                    } );
                } );

            </script>


{{--        @endif--}}
{{--    @endforeach--}}

{{--    <p>this is th  don status</p>--}}

{{--    @foreach($don_status as $don)--}}
{{--        <p>{{$don->duel_id}}</p>--}}
{{--    @endforeach--}}

@endsection



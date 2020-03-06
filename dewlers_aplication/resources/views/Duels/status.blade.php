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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($duels as $du)
                                @if($du->ctl_user_id_challenged == Auth::user()->id)
                                    <tr id="acept{{$du->id}}">
                                @else
                                    <tr id="mv_jose_row">
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



    @foreach($duels as $due)
        @if($due->ctl_user_id_challenged == Auth::user()->id)
            <script type="application/javascript">

                $(document).ready(function() {

                    var table = $('#mytable').DataTable();


                    $('#mytable').on('click', 'tr ', function() {

                        var data = table.row( this ).data();
                        console.log(data[1]);
                        console.log({{$due->id}})
                        var delayInMilliseconds = 1000; //1 second
                        alertify.confirm('Confirm Title', data[0], function(){ alertify.success('Ok');
                                {{--setTimeout(function() {--}}
                                {{--    window.location.replace('/acepted/'+'{{$due->id}}');--}}
                                {{--}, delayInMilliseconds)--}}
                            }
                            , function(){ alertify.error('Cancel')});

                    } );
                } );

            </script>


        @endif
    @endforeach



@endsection



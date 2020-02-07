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
                {{--                <a href="/save_duel"><div class="btn btn-primary">Save</div></a>--}}
                <div class="container status-space">
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

                <div class="container">
                    <table id="mytable" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Tittle</th>
                            <th>POT</th>
                            <th>Challenger</th>
                            <th>Challenged</th>
                            <th>Witness</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Winner</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($duels as $du)

                            <tr onclick="ocultar();">
                                <td>{{$du->tittle}}</td>
                                <td>${{$du->pot}}.00</td>

                                <td>{{$du->ctlUser0->username}}</td>
                                <td>{{$du->ctlUser1->username}}</td>
                                <td>{{$du->ctlUser2->username}}</td>
                                <td>{{$du->registerDate}}</td>
                                <td>{{$du->duelstate}}</td>
                                <td>-</td>

                            </tr>
                            <div class="collapse" id="collapse">
                                <div class="card card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                            </div>

                            <script type="application/javascript">
                                function ocultar(){

                                    $('.collapse').collapse();
                                }

                            </script>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tittle</th>
                            <th>POT</th>
                            <th>Challenger</th>
                            <th>Challenged</th>
                            <th>Witness</th>
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

    <script type="application/javascript">
        $(document).ready(function() {
            $('#mytable').DataTable();
        } );
    </script>

@endsection



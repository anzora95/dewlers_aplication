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
            <div  class="col-md-12">
                <div  class="row row-main-menu">
                    <div class="col-sm dewls">
                       <div   class="container centered">
                           <div class="row row-menu">
                               <div class="col">
                                   <svg class="bi bi-plus-circle-fill text-white-icon" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zM8.5 4a.5.5 0 00-1 0v3.5H4a.5.5 0 000 1h3.5V12a.5.5 0 001 0V8.5H12a.5.5 0 000-1H8.5V4z" clip-rule="evenodd"/>
                                   </svg>
                                 </div>
                               <div class="col"></div>
                               <div class="col"></div>
                               <div class="col"></div>
                               <div class="col"></div>
                           </div>
                          
                       </div>
                    </div>
                    <div class="col-sm witness-history">
                        <div class="div-history" >
                            <div class="container centered">HISTORY</div>
                        </div>
                        <div class="div-witness" >
                            <div class="container centered">WITNESS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="/assets/css/fullcalendar.min.css">        
    <link rel="stylesheet" href="/assets/css/fullcalendar.print.css">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">                
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">      
    
    <style>
    .fc-right button {display: block !important}
    .fc-left button {display: block !important}
    .gj-datepicker-bootstrap [role="right-icon"] button .gj-icon, .gj-datepicker-bootstrap [role="right-icon"] button .material-icons {
            top: 2px !important;
    }
    </style>       
    
@stop

@php   
    use App\Models\Lista;
    $lista = new Lista;    
@endphp

<!--YERSON ALBERTO CORTEZ CHICA
   * PAGINA DONDE SE ADMINISTRA EL CRONOGRAMA DE ACTIDADES QUE SE LLEVARAN A CANO DENTRO DEL PROYECTO DE APADRINAMIENTO CASA AMANECER
-->                                    

@section('breadcrumb')
<li class="breadcrumb-item active">Cronograma de Actividades</li>
@stop


@section('content')
    <section class="mb-5">
        <div class="row">
            <div class="col-lg-5">
                <div class="card card-cascade narrower mb-r">

                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                            
                        <a href="" class="white-text mx-3">Actividad</a>                            
                    </div>

                    <!--Card content-->
                    <div class="card-body pb-2">                        
                
                        <div class="table-responsive">    
                            <br>                    
                                <form>             
                                    <div class="col-md-12">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="md-form form-sm">
                                                    <input type="text" id="titulo" name="titulo" class="form-control form-control-sm">
                                                    <label for="titulo">Titulo:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form form-sm">                                                                             
                                                    {!! Form::select('grupo',$lista->getGrupos()  , null , [
                                                        'placeholder' => 'Grupo...',
                                                        'id' => 'grupo',
                                                        'required',
                                                        'data-parsley-required-message' => 'Ciudad es requirda',
                                                        'data-parsley-trigger'          => 'change focusout',
                                                        "class"=>"mdb-select colorful-select dropdown-primary"]
                                                    ) !!}
                                                    <label for="grupo">Grupo</label>                    
                                                </div>
                                            </div>                    
                                            
                                            <div class="col-md-6">
                                                <div class="md-form form-sm">
                                                    <input type="text" placeholder="Selected date" id="fecinicia" value="" name="fecinicia" class="form-control form-control-sm">
                                                    <label for="fecinicia">Inicia:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form form-sm">
                                                    <input type="text" placeholder="Selected date" id="fectermina" value="" name="fectermina" class="form-control form-control-sm">
                                                    <label for="fectermina">Termina:</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="md-form form-sm">                                                                             
                                                    {!! Form::select('tutor',$lista->getTutores()  , null , [
                                                        'placeholder' => 'Tutor...',
                                                        'id' => 'tutor',
                                                        'required',
                                                        'data-parsley-required-message' => 'Tutor es requirda',
                                                        'data-parsley-trigger'          => 'change focusout',
                                                        "class"=>"mdb-select colorful-select dropdown-primary"]
                                                    ) !!}
                                                    <label for="tutor">Tutor</label>                    
                                                </div>
                                            </div>
                                             
                                            <div class="col-md-6">
                                                <div class="md-form form-sm">
                                                    <input type="text" id="url" name="url" class="form-control form-control-sm">
                                                    <label for="url">Url:</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                            
                        </div>

                        <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="col-md-6 pull-right">
                                        <a onclick="leerCronograma();" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> cargar</a>
                                    </div>

                                </div>
                            </div>
                            <br>                            

                    </div>
                    <!--/.Card content-->

                </div>
            </div>        
            <div class="col-lg-7">
                <div class="card card-cascade narrower mb-r">

                    <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                        <a href="" class="white-text mx-3" id="fechaCronograma"></a>                        
                    </div>

                    <!--Card content-->
                    <div class="card-body pb-0" style="height: 500px;">                        
                        <div id='calendar' class='calendar-example'>
                    </div>
                    <!--/.Card content-->

                </div>

            </div>            
        </div>
    </section>
@stop

<!--YERSON ALBERTO CORTEZ CHICA
   * SECCION DE ARCHIVOS Y CODIGO JAVASCRIPTS
-->                                    

@push('scripts')
    <script src="/assets/js/moment.min.js"></script>    
    <script src="/assets/js/fullcalendar.min.js"></script>
    <script src="/assets/js/locale-all.js"></script>
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    

    <script>

        $(document).ready(function() {
            leerCronograma();
            
            
            $('select').addClass('mdb-select');
            $('.mdb-select').material_select();
            $('.mdb-select').removeClass('form-control form-control-sm');
            $('.dataTables_filter').find('label').remove();
            
            //
            $('#fecinicia').datepicker({
                uiLibrary: 'bootstrap4',                
                locale: 'es-es',
                format: 'yyyy-mm-dd hh:ii:ss',                
            });

            $('#fectermina').datepicker({
                uiLibrary: 'bootstrap4',                
                locale: 'es-es',
                format: 'yyyy-mm-dd hh:ii:ss',                
            });
            
        }); 


        function leerCronograma(){   
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('refetchEvents');         

            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',            
                header: {                
                    left: 'prevYear,prev,today,next,nextYear',                
                    center: '',
                    right: 'month,basicWeek,basicDay'
    
                },
                locale: 'es',
                defaultView: 'month',
                viewRender: function(view) {
                    var title = view.title;                
                    $("#fechaCronograma").html(title);
                },
                eventRender: function(event, element) {                    
                    if(event.id){
                        console.log(event);                                  
                    }
                },
                bootstrapFontAwesome: {
                    close: 'fa-times-circle',
                    prev: 'fa-caret-left',
                    next: 'fa-caret-right',
                    prevYear: 'fa-arrow-left',
                    nextYear: 'fa-arrow-right',
                    month: 'fa-calendar'
                },
                eventClick: function(calEvent, jsEvent, view) {

                /*alert('Event: ' + calEvent.title);
                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                alert('View: ' + view.name);*/
                
                // change the border color just for fun
                $(this).css('border-color', 'red');
                    if (event.url) {
                        window.open(event.url);
                        return false;
                    }
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                //weekNumbers: true,
                //eventLimit: true, // allow "more" link when too many events
                events: '/getCronograma'
            });

        }

        function demo(id){
            alert(id);
            return false;
        }
        </script>
@endpush


@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="/assets/css/fullcalendar.min.css">        

    
    <style>
    .fc-right button {display: block !important}
    .fc-left button {display: block !important}    
    </style>       
    
@stop

@section('breadcrumb')
<li class="breadcrumb-item active">Cronograma de Asistencia</li>
@stop


@section('content')
    <section class="mb-5">
        <div class="row">
                  
            <div class="col-lg-12">
                <div class="card card-cascade narrower mb-r">
                    
                        <div class="view gradient-card-header primary-color narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">                        
                            <a href="" class="white-text mx-3" id="fechaCronograma"></a>                        
                        </div>

                        <div class="card-body" >                        
                            <div id='calendar' class='calendar-example'>
                        </div>
                    
                </div>

            </div>            
        </div>
    </section>
@stop

@push('scripts')
    <script src="/assets/js/moment.min.js"></script>    
    <script src="/assets/js/fullcalendar.min.js"></script>
    <script src="/assets/js/locale-all.js"></script>

    
    <script>

        $(document).ready(function() {
            leerCronograma();
        }); 


        function leerCronograma(){   
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('refetchEvents');         


            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',                
                groupByResource: true,
                minTime: "07:00:00",
                maxTime: "23:00:00",
                contentHeight:"auto",
                handleWindowResize:true,
                header: {                
                    left: 'prevYear,prev,today,next,nextYear',                
                    center: '',
                    right: 'month,agendaWeek,agendaDay'                    
    
                },              
                views: {                    
                },
                locale: 'es',
                defaultView: 'month',
                viewRender: function(view) {
                    var title = view.title;                
                    $("#fechaCronograma").html(title);
                },
                eventRender: function(event, element) {                    
                    if(event.id){                                                
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
                    //asistencia(event.id);                    
                    openWindows('asistenciaCurso/'+calEvent.id);
                    //window.open('asistenciaCurso');
                    return false;
                },
                navLinks: true,
                editable: false,                
                events: '/getCronogramaCursos'
            });
        }
        
      
    </script>
@endpush


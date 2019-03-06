@extends('layouts.main')

@section('head')
    <link rel="stylesheet" href="/assets/css/fullcalendar.min.css">        
    <link rel="stylesheet" href="/assets/css/fullcalendar.print.css">
    
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
                    //element.find(".fc-title").html(function () { return $(this).html().replace("Rs", "<i class='fa fa-inr'></i>")});
                    if(event.id){                        
                        //element.find(".fc-title").prepend(`<i onclick='demo("${event.id}")' class='fa fa-pencil'></i>  `);
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


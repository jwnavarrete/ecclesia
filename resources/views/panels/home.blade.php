@extends('layouts.main')

@section('head')

@stop

<?php
    use App\Models\Lista;
    $lista = new Lista
?>


@section('content')





<section>

    @include('partials.cardView')

    
</section>



@stop
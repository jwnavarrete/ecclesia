@php
    use App\Models\Galeria;    
@endphp


<section id="galeria" class="section">
    <br>    
    <h2 class="teal-text font-up font-bold pt-5 mb-2 mt-3 wow fadeIn" data-wow-delay=".2s">Galeria</h2>       
    <hr class=" mb-5">
    <div class="row wow fadeIn" data-wow-delay=".4s">
        <div class="col-md-12">
            <div id="mdb-lightbox-ui"></div>
            <div class="mdb-lightbox">
                @foreach(Galeria::all() as $key => $galeria)   
                    <figure class="col-md-3">
                        <a href="{{$galeria->ruta}}{{$galeria->archivo}}" data-size="1600x1067">
                            <img src="{{$galeria->ruta}}{{$galeria->archivo}}@php echo "?".rand()@endphp" class="img-fluid z-depth-1-half">
                        </a>
                    </figure>
                @endforeach           
            </div>            
        </div>        
    </div>
</section>

<nav aria-label="pagination example">
    <ul class="pagination justify-content-center">
        <!--Previous button-->
        <li class="page-item">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>

        <!--Numbers-->
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>

        <!--Next button-->
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

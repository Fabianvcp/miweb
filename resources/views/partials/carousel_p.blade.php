<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" style="width: 100%">
    <div class="carousel-inner">
        @foreach($portfolio->fotos as $foto)
            <div class="carousel-item {{ $loop->first ? 'active' : ''}} ">
                <img src="/storage/{{ $foto->url }}" class="d-block img-thumbnail w-100" alt="..." style="height: 50vh;">
            </div>
        @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previo</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

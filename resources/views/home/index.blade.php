@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{ asset('images/wall1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{ asset('images/wall2.jpg') }}" alt="Second slide">
                    </div>
                    {{-- <div class="carousel-item">
                    <img class="d-block img-fluid" src="..." alt="Third slide">
                    </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>




        </div>
    </div>
    <br/>
    <br/>

    <div class="row">

            <div class="col-md-4 col-sm-4">
                <div class="thumbnail" >
                    <img class="img-fluid img-thumbnail"
                    src="{{ asset('images/w1.jpg') }}"
                    alt="women" >
                    <div class="caption text-center">
                        <a href="{{ route('caps.index') }}">
                            <h3>Women Beauties</h3>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="thumbnail" >
                    <img class="img-fluid img-thumbnail"
                    src="{{ asset('images/m1.jpg') }}"
                    alt="women" >
                    <div class="caption text-center">
                    <a href="{{ route('caps.index') }}">
                            <h3>Handsome Men</h3>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="thumbnail" >
                    <img class="img-fluid img-thumbnail"
                    src="{{ asset('images/k_caps.jpg') }}"
                    alt="women" >
                    <div class="caption text-center">
                        <a href="{{ route('caps.index') }}">
                            <h3>Cute Kids</h3>
                        </a>
                    </div>
                </div>
            </div>


            {{-- <br />

            <br />




                    <div class="col-md-4 col-sm-4">

                        <div class="thumbnail" >

                            <img class="popular_thumbnail img-thumbnail" src="~/images/w1.jpg" alt="women" >

                            <div class="caption">

                                <a asp-area="" asp-controller="Caps" asp-action="Index" asp-route-categoryString="Women">
                                    <h3>Women Beauties</h3>
                                </a>


                            </div>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-4">

                        <div class="thumbnail " >

                            <img class="popular_thumbnail img-thumbnail" src="~/images/k_caps.jpg" alt="cute kids" >

                            <div class="caption">

                                <a asp-area="" asp-controller="Caps" asp-action="Index" asp-route-categoryString="Children">
                                    <h3>Cute Kids</h3>
                                </a>



                            </div>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-4">

                        <div class="thumbnail " >

                            <img class="popular_thumbnail img-thumbnail" src="~/images/m1.jpg" alt="fancy man" >

                            <div class="caption">

                                <a asp-controller="Caps" asp-action="Index" asp-route-categoryString ="Men">

                                <h3>Fantastic Men's</h3>
                                </a>


                            </div>

                        </div>

                    </div>

                </div> --}}

    </div>
</div>
@endsection

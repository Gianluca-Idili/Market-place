<hr>
<!-- Footer -->
<footer class=" text-center ">
    <!-- Grid container -->
    <div class="container-fluid p-4">

        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                    class="bi bi-facebook"></i></a>

            <!-- Twitter -->
            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                    class="bi bi-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                role="button"><i class="bi bi-google"></i></a>

            <!-- Instagram -->
            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!"
                role="button"><i class="bi bi-instagram"></i></a>
        </section>
        <!-- Section: Social media -->




        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row  justify-content-center my-2 my-md-5">

                <div class="col-12 col-md-2 ">
                

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('revisor.form') }}" class="text-dark">{{__('ui.wWu')}}</a>
                        </li>
                        <li>
                            <a href="{{route('contact_us')}}" class="text-dark">{{__('ui.contactUs')}}</a>
                        </li>
                    </ul>
                </div>
            </div>    
                <div class="row justify-content-center bgFooter ">
                    <div class="col-2 col-md-2 mx-1 "><img class="fotoTeam hidden-left" src="{{asset('media\Gianluca.jpeg')}}" alt=""><p class="txtMain hidden-left mt-3 fs-2 fw-bold">Gianluca</p></div>
                    <div class="col-2 col-md-2 mx-1 "><img class="fotoTeam hidden-left" src="{{asset('media\Armando.PNG')}}" alt=""><p class="txtMain hidden-left mt-3 fs-2 fw-bold">Armando</p></div>
                    <div class="col-2 col-md-2 mx-1 "><img class="fotoTeam hidden" src="{{asset('media\Francesco.jpeg')}}" alt=""><p class="txtMain hidden mt-3 fs-2 fw-bold">Francesco</p></div>
                    <div class="col-2 col-md-2 mx-1 "><img class="fotoTeam hidden-right" src="{{asset('media\Eros.jpeg')}}" alt=""><p class="txtMain hidden-right mt-3 fs-2 fw-bold">Eros</p></div>
                    <div class="col-2 col-md-2 mx-1 "><img class="fotoTeam hidden-right " src="{{asset('media\Giambattista.jpeg')}}"alt=""><p class="txtMain hidden-right mt-3 fs-2 fw-bold">Giambattista</p></div>
                </div>
                
                    

        </section>
        <!-- Section: Links -->

  
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center">
        © 2023 Copyright: presto.it
        <a class="text-dark text-decoration-none">www.presto.it</a>
    </div>
    <!-- Copyright -->
  </div>
</footer>
<!-- Footer -->

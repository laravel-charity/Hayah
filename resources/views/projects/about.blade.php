@extends('layouts.master')

@section('title', 'About')
@section('content')
<section class="section-padding section-bg" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <img src="images/8.png.png"
                    class="custom-text-box-image img-fluid" alt="">
            </div>

            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">Our Story</h2>

                    <h5 class="mb-3">Hayat, Non-Profit Organization</h5>

                    <p class="mb-0">We are people who have gathered to help the poor and help the children by providing all the obligations they need and helping the people who do not have homes, so we wish to donate the simplest amount to help the needy people
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" >
                        <div class="custom-text-box mb-lg-0" >
                            <h5 class="mb-3">Our Mission</h5>

                            <p>help the poor people</p>

                            <ul class="custom-list mt-2">
                                <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    We help as many people as possible in need
                                </li>

                                <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    To make everyone happy
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                            <div class="counter-thumb">
                                <div class="d-flex">
                                    <span class="counter-number" data-from="1" data-to="2009"
                                        data-speed="1000"></span>
                                    <span class="counter-number-text"></span>
                                </div>

                                <span class="counter-text">Founded</span>
                            </div>

                            <div class="counter-thumb mt-4">
                                <div class="d-flex">
                                    <span class="counter-number" data-from="1" data-to="120"
                                        data-speed="1000"></span>
                                    <span class="counter-number-text">B</span>
                                </div>

                                <span class="counter-text">Donations</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



<br><br><br><br>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <div id="demo" class="carousel slide" data-ride="carousel">
  
 








 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="cards-wrapper">
        <div class="card">
          <div class="card-image">
            <a >
              <img src="images/Ahmad.png" alt="img.jpg" />
            </a>
          </div>
          <div class="card-description">
            <h3>Ahmad Salman</h3>
            <p>Full Stack Devolepr</p>
            
          </div>
        </div>       
      <div class=" d-none d-md-block">
        <div class="card">
          <div class="card-image">
            <a >
              <img src="images/Duaa.png" alt="img.jpg" />
            </a>
          </div>
          <div class="card-description">
            <h3>Duaa Nwaas</h3>
            <p>Full Stack Devolepr</p>
            
          </div>
        </div>    
      </div>
      


      <div class=" d-none d-md-block">
        <div class="card">
          <div class="card-image">
            <a >
              <img src="images/mohammed.png" alt="img.jpg" />
            </a>
          </div>
          <div class="card-description">
            <h3>Mohammed Khalel</h3>
            <p>Full Stack Devolepr</p>
            
          </div>
        </div>    
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="cards-wrapper">
        <div class="card">
          <div class="card-image">
            <a >
              <img src="images/sara.png" alt="img.jpg" />
            </a>
          </div>
          <div class="card-description">
            <h3>Sara Abed</h3>
            <p>Full Stack Devolepr</p>
            
          </div>
        </div>    
       
        <div class=" d-none d-md-block">
          
          <div class="card">
            <div class="card-image">
              <a >
                <img src="images/jafer.png" alt="img.jpg" />
              </a>
            </div>
            <div class="card-description">
              <h3>Jafar AL-Dakhily</h3>
              <p>Full Stack Devolepr</p>
              
            </div>
          </div>
        </div>


        <div class=" d-none d-md-block">
          <div class="card">
                    <div class="card-image">
                      <a >
                        <img src="images/ibrahem.png" alt="img.jpg" />
                      </a>
                    </div>
                    <div class="card-description">
                      <h3>Ibrahem jebreen</h3>
                      <p>Full Stack Devolepr</p>
                      
                    </div>
                  </div>     
          </div>

      </div>
    </div>
    <div class="carousel-item">
      <div class="cards-wrapper">
        <div class="card">
          <div class="card-image">
            <a >
              <img src="images/1.png.png" alt="img.jpg" />
            </a>
          </div>
          <div class="card-description">
            <h3>Osama Dasoky</h3>
            <p>Full Stack Devolepr</p>
            
          </div>
        </div>    
      
       
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev"  style="width: 40px">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next" style="width: 40px"> 
    <span class="carousel-control-next-icon"></span>
  </a>

</div>




<style>
  .cards-wrapper {
  display: flex;
  justify-content: center;
}
.card img {
  max-width: 100%;
  max-height: 100%;
}
.card {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  border-radius: 0;
}
.carousel-inner {
  padding: 1em;
}
.carousel-control-prev,
.carousel-control-next {

  width: 5vh;
  height: 5vh;
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
}
@media (min-width: 768px) {
  .card img {
    height: 11em;
  }
}
</style>

















</section>

@endsection


@section('ourself')

@endsection
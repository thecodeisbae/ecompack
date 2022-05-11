@extends('front.layout')

@section('banner')
    <section class="banner_main">
        <div class="container">
        <div class="banner_po">
            <div class="row">
                <div class="col-md-7">
                    <div class="text_box">
                    <span>Découvrez nos offres</span>
                    <h1> <strong>Packs alimentaires</strong> <br> </h1>
                    <a class="read_more" href="#about" role="button">Voir tout</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('content')

<div id="about" class="about">
    <div class="container">
       <div class="row">
          <div class="col-md-6 offset-md-3">
             <div class="titlepage">
                <h2>About Us</h2>
                <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptu </span>
             </div>
          </div>
          <div class="col-md-12">
             <div class="about_img">
                <figure><img src="images/about.png" alt="#"/></figure>
                <a class="read_more" href="Javascript:void(0)">Read More</a>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="products">
    <div class="container">
       <div class="row">
          <div class="col-md-7">
             <div class="titlepage">
                <h2>Our Products</h2>
                <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptu
                </span>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro1.png" alt="#"/></figure>
                </div>
                <h3>Mangoes For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro2.png" alt="#"/></figure>
                </div>
                <h3>Apple For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro3.png" alt="#"/></figure>
                </div>
                <h3>Orange For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
             <div id="ho_bo" class="our_products">
                <div class="product">
                   <figure><img src="images/pro4.png" alt="#"/></figure>
                </div>
                <h3>Pineapple For Juice</h3>
                <span>Nam libero tempore</span>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non </p>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="using">
    <div class="container-fluid">
       <div class="row d_flex">
          <div class="col-md-6">
             <div class="titlepage">
                <h2 >Lorem Ipsum using</h2>
                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise</p>
                <a class="read_more white_bg" href="Javascript:void(0)"> Read More</a>
             </div>
          </div>
          <div class="col-md-5 offset-md-1 padding_right0">
             <div class="frout_img">
                <figure><img src="images/frout.png" alt="#"/></figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Gallery</h2>
                <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </span>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-4 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery1.png" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery2.png" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery3.png" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery4.png" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery5.png" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-4 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery6.png" alt="#"/></figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact Us</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6  padding_right0">
             <div class="map_main">
                <div class="map-responsive">
                   <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="453" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
             </div>
          </div>
          <div class="col-md-6 padding_left0">
             <form id="request" class="main_form">
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="Name" type="type" name="Name"> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Phone" type="type" name="Phone"> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Email" type="type" name="Email">                          
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="type" Message="Message">Message</textarea>
                   </div>
                   <div class="col-md-12">
                      <button class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection
<!DOCTYPE html>
<html lang="en">
 <?php $title='Contact - Personal Portfolio Resume PHP Template'?>
 <?php include './partials/head.php'?>

  <body class="">
    <!-- Preloader Start -->
    <?php include './partials/preloader.php'?>
    <!-- Preloader End -->
    <!-- Header Area Start -->
    <?php include './partials/header.php'?>
    <!-- Header Area End -->
    <div id="smooth-wrapper">
      <div id="smooth-content">
        <!-- Page Title Start -->
        <section class="page-title-section">
          <div class="container">
            <div class="row">
              <div class="col-xl-12">
                <div class="breadcrumb-area">
                  <h2 class="page-title">Contact</h2>
                  <ul class="breadcrumbs-link">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Contact</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Page Title End -->
        <!-- Contact Section Start -->
        <section class="contact-section bg-no-repeat bg-cover pdt-110 pdb-110" data-background="images/bg/home1-bg1.png" data-overlay-dakr="9">
          <div class="container">
            <div class="row mrb-80">
              <div class="col-xl-12">
                <div class="row">
                  <div class="col-lg-6 col-xl-4">
                    <div class="contact_info_02 d-flex mrb-30">
                      <div class="contact-icon">
                        <i class="webexbase-icon-pin-1"></i>
                      </div>
                      <div class="contact-details mrl-30">
                        <h5 class="icon-box-title mrb-10">Australia Address</h5>
                        <p class="mrb-0">121 King Street, Melbourne</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4">
                    <div class="contact_info_02 d-flex mrb-30">
                      <div class="contact-icon">
                        <i class="webexbase-icon-145-envelope"></i>
                      </div>
                      <div class="contact-details mrl-30">
                        <h5 class="icon-box-title mrb-10">Email Us</h5>
                        <p class="mrb-0">example@gmail.com</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4">
                    <div class="contact_info_02 d-flex mrb-30">
                      <div class="contact-icon">
                        <i class="webexbase-icon-call"></i>
                      </div>
                      <div class="contact-details mrl-30">
                        <h5 class="icon-box-title mrb-10">Phone Number</h5>
                        <p class="mrb-0">+96 223-528-8542</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-5">
                <div class="title-box anim-heading animation-style1">
                  <h5 class="sub-title">( Get In Touch )</h5>
                  <h2 class="title faq-title mrb-30 anim-title">Have Any Questions?</h2>
                </div>
                <ul class="social-list list-lg list-primary-color mrb-lg-60 clearfix">
                  <li>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-google-plus"></i></a>
                  </li>
                </ul>
              </div>
              <div class="col-xl-7">
                <div class="contact-form">
                  <form method="post" action="php/send-mail.php">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group mrb-25">
                          <input type="text" name="name" placeholder="Name" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mrb-25">
                          <input type="text" name="phone" placeholder="Phone" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mrb-25">
                          <input type="subject" name="subject" placeholder="Subject" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mrb-25">
                          <input type="email" name="email" placeholder="Email" class="form-control" required />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mrb-25">
                          <textarea rows="4" name="message" placeholder="Messages" class="form-control" required></textarea>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <button type="submit" name="submit" class="cs-btn-one btn-circle mrb-lg-60" value="Send">Submit Now</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Contact Section End -->
        <!-- Google Map Section Start -->
        <section class="google-map-section">
          <!-- Google Map Start -->
          <div class="mapouter fixed-height">
            <div class="gmap_canvas">
              <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Graz&t=&z=11&ie=UTF8&iwloc=&output=embed"></iframe>
              <a href="https://www.whatismyip-address.com"></a>
            </div>
          </div>
          <!-- Google Map End -->
        </section>
        <!-- Google Map Section End -->
        <!-- Footer Area Start -->
        <?php include './partials/footer.php'?>
        <!-- Footer Area End -->
      </div>
    </div>
    <!-- Mobile Nav Sidebar Content Start -->
    <?php include './partials/mobile-menu.php'?>
    <!-- Mobile Nav Sidebar Content End -->
    <!-- Header Search Popup Start -->
    <?php include './partials/search-popup.php'?>
    <!-- Header Search Popup End -->
    <!-- Back to Top Start -->
    <?php include './partials/back-to-top.php'?>
    <!-- Back to Top end -->
    <!-- Integrated important scripts here -->
    <?php include './partials/script.php'?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
 <?php $title='404 - Personal Portfolio Resume PHP Template'?>
 <?php include './partials/head.php'?>

  <body class="">
    <!-- Preloader Start -->
    <?php include './partials/preloader.php'?>
    <!-- Preloader End -->
    <!-- Error Section Start -->
    <div class="error-area vh d-flex" data-background="images/bg/404.jpg" data-overlay-dark="9">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="error-inner text-center">
              <h1 class="error-title">4<span class="text-primary-color">0</span>4</h1>
              <h2 class="error-text">Sorry, something went wrong!</h2>
              <p>This page is temporarily unavailable due to maintenance. We will back very soon thanks for your patien</p>
              <div class="col-xl-12 d-flex justify-content-center">
                <div class="portivio-btn-block-2">
                  <a class="portivio-btn-2 portivio-btn-2-circle" href="index.php"><i class="webexbase-icon-v-align-bottom"></i></a>
                  <a class="portivio-btn-2 portivio-btn-2-primary" href="index.php">Back To Home</a>
                  <a class="portivio-btn-2 portivio-btn-2-circle" href="index.php"><i class="webexbase-icon-v-align-bottom"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Error Section End -->
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


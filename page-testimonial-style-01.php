<!DOCTYPE html>
<html lang="en">
<?php $title = 'Testimonial Style 01 - Personal Portfolio Resume PHP Template' ?>
<?php include './partials/head.php' ?>

<body class="">
  <!-- Preloader Start -->
  <?php include './partials/preloader.php' ?>
  <!-- Preloader End -->
  <!-- Header Area Start -->
  <?php include './partials/header.php' ?>
  <!-- Header Area End -->
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <!-- Page Title Start -->
      <section class="page-title-section">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="breadcrumb-area">
                <h2 class="page-title">Testimonial Style 01</h2>
                <ul class="breadcrumbs-link">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">Testimonial Style 01</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Title End -->
      <!-- Testimonials Section Start -->
      <section class="bg-silver pdt-120 pdb-120">
        <div class="section-content">
          <div class="container">
            <div class="row">
              <div class="col-xl-3">
                <div class="testimonial_01_quote_box mrb-xl-30">
                  <img src="images/testimonials/man.png" alt="" />
                  <h5 class="rate">4.5/5</h5>
                  <div class="ratings">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <p>Based on 200+ Reviews</p>
                </div>
              </div>
              <div class="col-xl-9 pos-rel">

                <div class="testimonial_01_carousel swiper">
                  <div class="swiper-wrapper">
                    <?php
                    require_once 'admin/config.php';
                    $sql = "SELECT r.*, c.name, c.company, c.image_url FROM reviews r JOIN clients c ON r.client_id = c.id ORDER BY r.created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="swiper-slide">
                          <div class="testimonial_01_item">
                            <div class="testimonial_thumbnail">
                              <img class="img-full" style="width: 337px; height: 440px; object-fit: cover;"
                                src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="" />
                            </div>
                            <div class="testimonial_content">
                              <p class="comments">
                                "<?php echo htmlspecialchars($row['comment']); ?>"
                              </p>
                              <div class="testimonial-bottom-part">
                                <h4 class="testimonial-title"><?php echo htmlspecialchars($row['name']); ?></h4>
                                <span class="testimonial-subtitle"><?php echo htmlspecialchars($row['company']); ?></span>
                                <div class="ratings mt-2">
                                  <?php for ($i = 0; $i < $row['rating']; $i++): ?>
                                    <i class="fas fa-star text-warning"></i>
                                  <?php endfor; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                    }
                    ?>
                  </div>
                </div>

                <!-- Navigation -->
                <div class="testimonial_01_nav">
                  <div class="testimonial_01_pagination"></div>
                  <div class="testimonial_01_button_prev"></div>
                  <div class="testimonial_01_button_next"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- Testimonials Section End -->
      <!-- Footer Area Start -->
      <?php include './partials/footer.php' ?>
      <!-- Footer Area End -->
    </div>
  </div>
  <!-- Mobile Nav Sidebar Content Start -->
  <?php include './partials/mobile-menu.php' ?>
  <!-- Mobile Nav Sidebar Content End -->
  <!-- Header Search Popup Start -->
  <?php include './partials/search-popup.php' ?>
  <!-- Header Search Popup End -->
  <!-- Back to Top Start -->
  <?php include './partials/back-to-top.php' ?>
  <!-- Back to Top end -->
  <!-- Integrated important scripts here -->
  <?php include './partials/script.php' ?>
</body>

</html>
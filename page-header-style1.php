<!DOCTYPE html>
<html lang="en">
<?php $title = 'Header Style 01 - Personal Portfolio Resume PHP Template' ?>
<?php include './partials/head.php' ?>
<?php require_once 'admin/config.php'; ?>
<?php
// Fetch Counts
$sql_partners_count = "SELECT COUNT(*) as count FROM partners";
$result_partners_count = $conn->query($sql_partners_count);
$partners_count = $result_partners_count->fetch_assoc()['count'];

$sql_projects_count = "SELECT COUNT(*) as count FROM projects";
$result_projects_count = $conn->query($sql_projects_count);
$projects_count = $result_projects_count->fetch_assoc()['count'];
?>

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
                <h2 class="page-title">Header Style 01</h2>
                <ul class="breadcrumbs-link">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">Header Style 01</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Title End -->
      <!-- About Us Section Start -->
      <section class="pdt-105 pdb-120">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-xl-10 col-xxl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
              <h2 class="big_title">Portivio About</h2>
            </div>
            <div class="col"></div>
          </div>
          <div class="row align-items-center justify-content-between">
            <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 wow fadeInLeft" data-wow-delay="0ms"
              data-wow-duration="1500ms">
              <img class="mrb-30 border-radius-10px parallax-img" src="images/about/h3-ab-img1.jpg" alt="" />
              <div>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                alteration in some form, by injected humour, or randomised words which don't look even slightly
                believable</div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center wow fadeInLeft" data-wow-delay="0ms"
              data-wow-duration="1500ms">
              <h2 class="h3_ab_vertical_text">US</h2>
              <div class="xotech_btn_block2 mouse-hover-parallax">
                <div class="circle_btn_item">
                  <a href="page-contact.php" class="circle-btn-style2">Hire Me <i
                      class="circle-btn-arrow webexbase-icon-black-arrow-1"></i> <br />For Freelance </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 text-center text-sm-end wow fadeInLeft"
              data-wow-delay="0ms" data-wow-duration="1500ms">
              <div class="counter_up_03 mrt-md-60 mrb-30">
                <div class="counter_up_value">
                  <h3 class="counter_up_number"><span class="counter"><?php echo $projects_count; ?></span></h3>
                </div>
                <div class="counter_up_title">Projects Completed</div>
              </div>
              <div class="parallax-img">
                <img class="border-radius-10px" src="images/about/h3-ab-img2.jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- About Us Section End -->
      <!-- Clients Section Start -->
      <section class="bg-silver">
        <div class="container">
          <div class="h3_clients_area">
            <div class="counter_up_04">
              <div class="counter_up_value">
                <h3 class="counter_up_number"><span class="counter"><?php echo $partners_count; ?></span><span
                    class="counter_up_postfix">+</span></h3>
              </div>
              <div class="counter_up_title">trusted Clients</div>
            </div>
            <div class="clients_02_carousel swiper">
              <div class="swiper-wrapper">
                <?php
                $sql_partners = "SELECT * FROM partners ORDER BY id DESC";
                $result_partners = $conn->query($sql_partners);
                if ($result_partners->num_rows > 0) {
                  while ($partner = $result_partners->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide">
                      <div class="client_style2_item">
                        <div class="client_thumb">
                          <img class="img-full" src="<?php echo htmlspecialchars($partner['logo_url']); ?>"
                            alt="<?php echo htmlspecialchars($partner['name']); ?>" />
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Clients Section End -->
      <!-- Service Section Start -->
      <section class="pdt-120 pdb-120">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="title-box">
                  <h5 class="sub-title">( OUR SERVICES )</h5>
                  <h2 class="title">Where Skill Meets Impact</h2>
                </div>
              </div>
              <div class="col-6"></div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="services_list_style3 wow fadeInUp" data-wow-delay="0.2s">
                  <div class="services_item">
                    <div class="services_wrap">
                      <div class="services_title_area">
                        <div class="services_icon">
                          <img src="images/service/h2-s2-icon1.png" alt="" />
                        </div>
                        <div class="services_content">
                          <h4 class="services_title">Marketing</h4>
                          <p class="services_description">We offer a wide range of services designed to help businesses,
                            organizations, and individuals thrive in the digital space.</p>
                          <ul class="services_type_list">
                            <li><i class="webexbase-icon-sparkle-1"></i>Custom Website Development</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Responsive Web Design</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Frontend Development</li>
                          </ul>
                        </div>
                      </div>
                      <div class="services_thumb">
                        <img class="parallax-img" src="images/service/h3-s3-img1.jpg" alt="" />
                      </div>
                      <a class="services_link" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
                <div class="services_list_style3 wow fadeInUp" data-wow-delay="0.4s">
                  <div class="services_item">
                    <div class="services_wrap">
                      <div class="services_title_area">
                        <div class="services_icon">
                          <img src="images/service/h2-s2-icon2.png" alt="" />
                        </div>
                        <div class="services_content">
                          <h4 class="services_title">Branding</h4>
                          <p class="services_description">We offer a wide range of services designed to help businesses,
                            organizations, and individuals thrive in the digital space.</p>
                          <ul class="services_type_list">
                            <li><i class="webexbase-icon-sparkle-1"></i>Custom Website Development</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Responsive Web Design</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Frontend Development</li>
                          </ul>
                        </div>
                      </div>
                      <div class="services_thumb">
                        <img class="parallax-img" src="images/service/h3-s3-img2.jpg" alt="" />
                      </div>
                      <a class="services_link" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
                <div class="services_list_style3 wow fadeInUp" data-wow-delay="0.6s">
                  <div class="services_item">
                    <div class="services_wrap">
                      <div class="services_title_area">
                        <div class="services_icon">
                          <img src="images/service/h2-s2-icon3.png" alt="" />
                        </div>
                        <div class="services_content">
                          <h4 class="services_title">Writing</h4>
                          <p class="services_description">We offer a wide range of services designed to help businesses,
                            organizations, and individuals thrive in the digital space.</p>
                          <ul class="services_type_list">
                            <li><i class="webexbase-icon-sparkle-1"></i>Custom Website Development</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Responsive Web Design</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Frontend Development</li>
                          </ul>
                        </div>
                      </div>
                      <div class="services_thumb">
                        <img class="parallax-img" src="images/service/h3-s3-img3.jpg" alt="" />
                      </div>
                      <a class="services_link" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
                <div class="services_list_style3 wow fadeInUp" data-wow-delay="0.8s">
                  <div class="services_item">
                    <div class="services_wrap">
                      <div class="services_title_area">
                        <div class="services_icon">
                          <img src="images/service/h2-s2-icon4.png" alt="" />
                        </div>
                        <div class="services_content">
                          <h4 class="services_title">Design</h4>
                          <p class="services_description">We offer a wide range of services designed to help businesses,
                            organizations, and individuals thrive in the digital space.</p>
                          <ul class="services_type_list">
                            <li><i class="webexbase-icon-sparkle-1"></i>Custom Website Development</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Responsive Web Design</li>
                            <li><i class="webexbase-icon-sparkle-1"></i>Frontend Development</li>
                          </ul>
                        </div>
                      </div>
                      <div class="services_thumb">
                        <img class="parallax-img" src="images/service/h3-s3-img4.jpg" alt="" />
                      </div>
                      <a class="services_link" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Service Section End -->
      <!-- Project Section Start -->
      <section class="pdb-120">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 mrb-md-30">
                <div class="title-box">
                  <h5 class="sub-title">( Latest PORTFOLIO )</h5>
                  <h2 class="title">My Successful Work</h2>
                </div>
              </div>
              <div
                class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-start justify-content-lg-end">
                <div class="portivio-btn-block primary-color3">
                  <a class="portivio-btn portivio-btn-circle" href="page-project-details.php"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                  <a class="portivio-btn portivio-btn-primary" href="page-project-details.php">ALL PORTFOLIO</a>
                  <a class="portivio-btn portivio-btn-circle" href="page-project-details.php"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="container">
            <div class="project_01_carousel swiper">
              <div class="swiper-wrapper">
                <?php
                $sql_projects = "SELECT * FROM projects ORDER BY id DESC";
                $result_projects = $conn->query($sql_projects);
                if ($result_projects->num_rows > 0) {
                  while ($project = $result_projects->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide">
                      <div class="project_style3_item">
                        <div class="project_thumb image-anime">
                          <img class="img-full" src="<?php echo htmlspecialchars($project['image_url']); ?>"
                            alt="<?php echo htmlspecialchars($project['title']); ?>"
                            style="height: 300px; object-fit: cover;" />
                        </div>
                        <div class="project_content">
                          <div class="project_title_area">
                            <div class="project_category">
                              <ul>
                                <li><a href="project.php"><?php echo htmlspecialchars($project['category']); ?></a></li>
                              </ul>
                            </div>
                            <h4 class="title"><a
                                href="page-project-details.php"><?php echo htmlspecialchars($project['title']); ?></a></h4>
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
            <!-- Dots -->
            <div class="project_01_dots">
              <div class="project_01_dot"></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Project Section End -->
      <!-- Awards Section Start -->
      <section class="award_section">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
          <div class="container">
            <div class="row">
              <div class="col"></div>
              <div class="col-md-12 col-lg-10 col-xl-6">
                <div class="title-box-center text-center">
                  <h5 class="sub-title">( OUR ACHIVMENT )</h5>
                  <h2 class="title">Our Achievement & Awards</h2>
                </div>
              </div>
              <div class="col"></div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php
                $sql_awards = "SELECT * FROM awards ORDER BY year DESC";
                $result_awards = $conn->query($sql_awards);
                $delay = 0.2;
                if ($result_awards->num_rows > 0) {
                  while ($award = $result_awards->fetch_assoc()) {
                    ?>
                    <div class="award_style1 wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                      <div class="award_item portivio-hover-reveal-item">
                        <div class="award_content">
                          <div class="award_name"><?php echo htmlspecialchars($award['organization']); ?></div>
                          <div class="award_title_area">
                            <div class="award_category"><?php echo htmlspecialchars($award['category']); ?></div>
                            <h4 class="award_title"><?php echo htmlspecialchars($award['title']); ?></h4>
                          </div>
                          <div class="award_year"><?php echo htmlspecialchars($award['year']); ?></div>
                          <div class="award_logo">
                            <img src="<?php echo htmlspecialchars($award['image_url']); ?>" alt="" />
                          </div>
                        </div>
                        <div class="portivio-hover-reveal-bg"
                          data-background="<?php echo htmlspecialchars($award['image_url']); ?>"></div>
                      </div>
                    </div>
                    <?php
                    $delay += 0.2;
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Awards Section End -->
      <!-- Testimonials Section Start -->
      <section class="bg-black pdt-120 pdb-110">
        <div class="section-content">
          <div class="container">
            <div class="row">
              <div class="col-xl-5 col-lg-8 mrb-lg-60">
                <div class="section-title">
                  <div class="title-box anim-heading animation-style1">
                    <h5 class="sub-title">( TESTIMONIALS )</h5>
                    <h2 class="title wt-split-text anim-title">What Our Clients Say About Me</h2>
                  </div>
                </div>
                <div class="rating_image_01">
                  <img src="images/testimonials/clutch.png" alt="" />
                  <img src="images/testimonials/google-review.png" alt="" />
                </div>
              </div>
              <div class="col"></div>
              <div class="col-xl-6">
                <div class="testimonial_02_carousel swiper">
                  <div class="swiper-wrapper">
                    <?php
                    $sql_reviews = "SELECT r.*, c.name, c.company, c.image_url FROM reviews r JOIN clients c ON r.client_id = c.id ORDER BY r.created_at DESC";
                    $result_reviews = $conn->query($sql_reviews);
                    if ($result_reviews->num_rows > 0) {
                      while ($review = $result_reviews->fetch_assoc()) {
                        ?>
                        <div class="swiper-slide">
                          <div class="testimonial_02_item">
                            <div class="testimonial_content">
                              <p class="comments">
                                "<?php echo htmlspecialchars($review['review_text']); ?>"
                              </p>
                            </div>
                            <div class="testimonial_thumbnail">
                              <img class="img-full" src="<?php echo htmlspecialchars($review['image_url']); ?>"
                                alt="<?php echo htmlspecialchars($review['name']); ?>"
                                style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;" />
                              <div class="testimonial-bottom-part">
                                <h4 class="testimonial-title"><?php echo htmlspecialchars($review['name']); ?></h4>
                                <span
                                  class="testimonial-subtitle"><?php echo htmlspecialchars($review['company']); ?></span>
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
                <!-- Dots -->
                <div class="testimonial_02_dots">
                  <div class="dot"></div>
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
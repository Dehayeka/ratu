<!DOCTYPE html>
<html lang="en">
<?php $title = 'Portfolio Style 01 - Personal Portfolio Resume PHP Template' ?>
<?php include './partials/head.php' ?>
<?php require_once 'admin/config.php'; ?>
<?php
// Fetch Projects
$sql = "SELECT * FROM projects ORDER BY id DESC";
$result = $conn->query($sql);
$projects = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
  }
}

// Split into two columns
$left_projects = [];
$right_projects = [];
foreach ($projects as $index => $project) {
  if ($index % 2 == 0) {
    $left_projects[] = $project;
  } else {
    $right_projects[] = $project;
  }
}

// Style configurations (Cyclic)
$left_styles = ['', 'mrt-200 mrt-md-30', 'mrt-150 mrt-md-30'];
$right_styles = ['mrt-150 mrt-md-30', 'mrt-150 mrt-md-30', 'mrt-500 mrt-md-30'];
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
                <h2 class="page-title">Portfolio Style 01</h2>
                <ul class="breadcrumbs-link">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">Portfolio Style 01</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Title End -->
      <!-- Project Section Start -->
      <section class="project_section_area pdt-120 pdb-120">
        <div class="section-content">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-md-6 col-lg-5 col-xl-5">
                <?php foreach ($left_projects as $index => $project):
                  $style_class = $left_styles[$index % count($left_styles)];
                  ?>
                  <div class="project_style1_item <?php echo $style_class; ?>">
                    <div class="project_thumb scale-img">
                      <img class="img-full" src="<?php echo htmlspecialchars($project['image_url']); ?>"
                        alt="<?php echo htmlspecialchars($project['title']); ?>" />
                    </div>
                    <div class="project_content">
                      <div class="project_title_area">
                        <div class="project_category">
                          <ul>
                            <li><a
                                href="page-projects-style-01.php"><?php echo htmlspecialchars($project['category']); ?></a>
                            </li>
                          </ul>
                        </div>
                        <h4 class="title"><a
                            href="page-project-details.php"><?php echo htmlspecialchars($project['title']); ?></a></h4>
                      </div>
                      <a class="project_link" href="page-project-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="col-md-6 col-lg-5 col-xl-5">
                <?php foreach ($right_projects as $index => $project):
                  $style_class = $right_styles[$index % count($right_styles)];
                  // Optional: dynamic image classes can be added here if needed, but 'scale-img' is standard.
                  $img_class = 'scale-img';
                  if ($index % 3 == 0)
                    $img_class .= ' square-size'; // Example logic to keep some variety
                  elseif ($index % 3 == 2)
                    $img_class .= ' thumb-size';
                  ?>
                  <div class="project_style1_item <?php echo $style_class; ?>">
                    <div class="project_thumb <?php echo $img_class; ?>">
                      <img class="img-full" src="<?php echo htmlspecialchars($project['image_url']); ?>"
                        alt="<?php echo htmlspecialchars($project['title']); ?>" />
                    </div>
                    <div class="project_content">
                      <div class="project_title_area">
                        <div class="project_category">
                          <ul>
                            <li><a
                                href="page-projects-style-01.php"><?php echo htmlspecialchars($project['category']); ?></a>
                            </li>
                          </ul>
                        </div>
                        <h4 class="title"><a
                            href="page-project-details.php"><?php echo htmlspecialchars($project['title']); ?></a></h4>
                      </div>
                      <a class="project_link" href="page-project-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Portfolio Section End -->
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
                    <div class="swiper-slide">
                      <div class="testimonial_02_item">
                        <div class="testimonial_content">
                          <p class="comments">
                            "The team provided exceptional financial guidance tailored to my needs.Their expert advice
                            helped grow my investments while ensuring financial security for the future. I highly
                            recommend their services for anyone seeking trusted, financial solutions!!"
                          </p>
                        </div>
                        <div class="testimonial_thumbnail">
                          <img class="img-full" src="images/testimonials/thumb1.jpg" alt="" />
                          <div class="testimonial-bottom-part">
                            <h4 class="testimonial-title">Arlene McCoy</h4>
                            <span class="testimonial-subtitle">Co. Founder</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial_02_item">
                        <div class="testimonial_content">
                          <p class="comments">
                            "The team provided exceptional financial guidance tailored to my needs.Their expert advice
                            helped grow my investments while ensuring financial security for the future. I highly
                            recommend their services for anyone seeking trusted, financial solutions!!"
                          </p>
                        </div>
                        <div class="testimonial_thumbnail">
                          <img class="img-full" src="images/testimonials/thumb2.jpg" alt="" />
                          <div class="testimonial-bottom-part">
                            <h4 class="testimonial-title">Maya White</h4>
                            <span class="testimonial-subtitle">Founder</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial_02_item">
                        <div class="testimonial_content">
                          <p class="comments">
                            "The team provided exceptional financial guidance tailored to my needs.Their expert advice
                            helped grow my investments while ensuring financial security for the future. I highly
                            recommend their services for anyone seeking trusted, financial solutions!!"
                          </p>
                        </div>
                        <div class="testimonial_thumbnail">
                          <img class="img-full" src="images/testimonials/thumb3.jpg" alt="" />
                          <div class="testimonial-bottom-part">
                            <h4 class="testimonial-title">Samuel Connolly</h4>
                            <span class="testimonial-subtitle">Admin</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <div class="testimonial_02_item">
                        <div class="testimonial_content">
                          <p class="comments">
                            "The team provided exceptional financial guidance tailored to my needs.Their expert advice
                            helped grow my investments while ensuring financial security for the future. I highly
                            recommend their services for anyone seeking trusted, financial solutions!!"
                          </p>
                        </div>
                        <div class="testimonial_thumbnail">
                          <img class="img-full" src="images/testimonials/thumb1.jpg" alt="" />
                          <div class="testimonial-bottom-part">
                            <h4 class="testimonial-title">Arlene McCoy</h4>
                            <span class="testimonial-subtitle">Co. Founder</span>
                          </div>
                        </div>
                      </div>
                    </div>
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
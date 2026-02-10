<!DOCTYPE html>
<html lang="en">
<?php
require_once 'admin/config.php';
$sql = "SELECT * FROM profile WHERE id = 1";
$result = $conn->query($sql);
$profile = $result->fetch_assoc();
$title = 'Ratu Lawyer Mataram - Portfolio';
?>
<?php include './partials/head.php' ?>

<body class="layout-dark-mood">
  <!-- Preloader Start -->
  <?php include './partials/preloader.php' ?>
  <!-- Preloader End -->
  <style>
    @media (max-width: 1199px) {
      .banner-thumb {
        position: relative !important;
        margin-top: 30px;
        margin-bottom: 30px;
        height: auto !important;
        right: auto !important;
        top: auto !important;
        transform: none !important;
        text-align: center;
      }

      .banner-thumb img {
        max-width: 80% !important;
        margin: 0 auto;
        display: block;
      }

      .h1-banner-title {
        text-align: center;
      }

      .banner-info {
        text-align: center;
      }

      .portivio-btn-block-2 {
        justify-content: center;
      }
    }
  </style>
  <!-- Header Area Start -->
  <?php include './partials/header.php' ?>
  <!-- Header Area End -->
  <div id="smooth-wrapper">
    <div id="smooth-content">
      <!-- Home Banner Start -->
      <section class="home_banner_01 pdt-200 pdb-lg-120 pdb-sm-0 bg-no-repeat bg-pos-cc"
        data-background="images/bg/home1-bg1.png">
        <div class="container">
          <div class="banner-item">
            <div class="row align-items-center">
              <div class="col-xl-12 anim-heading animation-style1 order-1">
                <h1 class="h1-banner-title text-white f-weight-400 mrb-sm-20 wow fadeInLeft">
                  <span class="h1-banner-emoji mrr-20"><img src="images/objects/h1-banner-art1.png" alt="" /></span>I’m
                  <?php echo htmlspecialchars($profile['name']); ?>
                </h1>
                <h1
                  class="h1-banner-title text-white f-weight-400 d-block d-xl-none d-lg-none d-md-none wow fadeInRight">
                  <?php echo htmlspecialchars($profile['title']); ?>
                </h1>
              </div>
              <div class="col-xl-12 anim-heading animation-style1">
                <h1
                  class="h1-banner-title text-white f-weight-400 d-none d-xl-block d-lg-block d-md-block mrb-xxl-30 anim-title">
                  <?php echo htmlspecialchars($profile['title']); ?>
                </h1>
              </div>
              <div class="col-xl-7 order-3 order-md-2">
                <div class="banner-info">
                  <div class="anim-heading animation-style1">

                  </div>
                  <p class="h1-banner-text">
                    <?php echo nl2br(htmlspecialchars($profile['description'])); ?>
                  </p>
                  <div class="portivio-btn-block-2">
                    <a class="portivio-btn-2 portivio-btn-2-circle" href="#"><i
                        class="webexbase-icon-v-align-bottom"></i></a>
                    <a class="portivio-btn-2 portivio-btn-2-primary"
                      href="<?php echo htmlspecialchars($profile['cv_link']); ?>">DOWNLOAD CV</a>
                    <a class="portivio-btn-2 portivio-btn-2-circle" href="#"><i
                        class="webexbase-icon-v-align-bottom"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-5 order-2 order-md-3">
                <div class="banner-thumb">
                  <img class="d-block w-100"
                    src="<?php echo htmlspecialchars(!empty($profile['image_url']) ? $profile['image_url'] : 'images/bg/ratu.png'); ?>"
                    alt="Thumb" />
                  <div class="story-box wow fadeInUp">
                    <div class="quote-icon"><i class="webexbase-icon-group-88301"></i></div>
                    <div class="story-description">
                      <h4 class="title">"Stories live in every line of design"</h4>
                      <span class="name"><?php echo htmlspecialchars($profile['name']); ?>, Lawyer</span>
                    </div>
                  </div>
                  <div class="h1-obj1 wow fadeInRight"><img src="images/objects/h1-banner-art2.png" alt="" /></div>
                  <div class="h1-obj2 wow zoomIn"><img src="images/objects/h1-banner-art3.png" alt="" /></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="h1-banner-social-list">
          <span class="title">Follow Us —</span>
          <ul>
            <li><a href="#">Fb.</a></li>
            <li><a href="#">Be.</a></li>
            <li><a href="#">Yt.</a></li>
          </ul>
        </div>
      </section>
      <!-- Home Banner End -->
      <!-- About Us Section Start -->
      <section class="pdt-120 pdb-120">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-xl-10 col-xxl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
              <div class="title-box mrb-sm-30">
                <h5 class="sub-title">( About )</h5>
              </div>
              <div class="h1-about-text-reveal pt-0 webex_text_reveal">
                <div class="h1-about-text-reveal-title">
                  Dedicated Advocate at Ratu


                </div>
                <div class="h1-about-text-reveal-title">
                  Office for Advocacy and Consultation, based in Lombok, Indonesia. I am


                </div>
                <div class="h1-about-text-reveal-title">

                  committed to providing precise legal counsel and effective representation for clients navigating the


                </div>
                <div class="h1-about-text-reveal-title">


                  complexities of the legal system. My focus is on delivering strategic advocacy that upholds justice


                </div>
                <div class="h1-about-text-reveal-title">

                  and protects client interests with integrity and professionalism.

                </div>

              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- About Us Section End -->
      <!-- Service Section Start -->
      <section class="pdb-120">
        <div class="section-title mrb-55 mrb-lg-60">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-12 mrb-md-30">
                <div class="title-box anim-heading animation-style1">
                  <h5 class="sub-title">( OUR SERVICES )</h5>
                  <h2 class="title wt-split-text anim-title">Where Skill Meets Impact</h2>
                </div>
              </div>
              <div
                class="col-xl-6 col-lg-6 col-md-12 d-flex justify-content-start justify-content-start justify-content-lg-end">
                <div class="portivio-btn-block">
                  <a class="portivio-btn portivio-btn-circle" href="page-services-style-01.php"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                  <a class="portivio-btn portivio-btn-primary" href="page-services-style-01.php">ALL SERVICES</a>
                  <a class="portivio-btn portivio-btn-circle" href="page-services-style-01.php"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="container">
            <div class="services_list_style1">
              <div class="service_item wow fade_In_Up" data-wow-delay="0.2s">
                <div class="service_head">
                  <span class="service_count">(01)</span>
                  <h2 class="service_title">Example</h2>
                </div>
                <div class="service_content">
                  <div class="service_content_left">
                    <img src="images/service/h1-s1-img1.jpg" alt="img" />
                  </div>
                  <div class="service_content_right">
                    <h3>a web application requires more than just good visuals</h3>
                    <div class="service_content_list">
                      <ul class="list1">
                        <li>UX Audit Report</li>
                        <li>User Flow Diagrams</li>
                        <li>Design System Creation</li>
                      </ul>
                      <ul class="list1">
                        <li>Competitive Analysis Report</li>
                        <li>Design System / UI Kit</li>
                        <li>High-fidelity UI mockups</li>
                      </ul>
                    </div>
                    <div class="portivio-btn-block">
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                      <a class="portivio-btn portivio-btn-primary" href="page-service-details.php">View Details</a>
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="service_item wow fade_In_Up" data-wow-delay="0.4s">
                <div class="service_head">
                  <span class="service_count">(02)</span>
                  <h2 class="service_title">Example</h2>
                </div>
                <div class="service_content">
                  <div class="service_content_left">
                    <img class="wow reveal-anim-left" src="images/service/h1-s1-img2.jpg" alt="img" />
                  </div>
                  <div class="service_content_right">
                    <h3>a web application requires more than just good visuals</h3>
                    <div class="service_content_list">
                      <ul class="list1">
                        <li>UX Audit Report</li>
                        <li>User Flow Diagrams</li>
                        <li>Design System Creation</li>
                      </ul>
                      <ul class="list1">
                        <li>Competitive Analysis Report</li>
                        <li>Design System / UI Kit</li>
                        <li>High-fidelity UI mockups</li>
                      </ul>
                    </div>
                    <div class="portivio-btn-block">
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                      <a class="portivio-btn portivio-btn-primary" href="page-service-details.php">View Details</a>
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="service_item wow fade_In_Up" data-wow-delay="0.6s">
                <div class="service_head">
                  <span class="service_count">(03)</span>
                  <h2 class="service_title">Example</h2>
                </div>
                <div class="service_content">
                  <div class="service_content_left">
                    <img src="images/service/h1-s1-img3.jpg" alt="img" />
                  </div>
                  <div class="service_content_right">
                    <h3>a web application requires more than just good visuals</h3>
                    <div class="service_content_list">
                      <ul class="list1">
                        <li>UX Audit Report</li>
                        <li>User Flow Diagrams</li>
                        <li>Design System Creation</li>
                      </ul>
                      <ul class="list1">
                        <li>Competitive Analysis Report</li>
                        <li>Design System / UI Kit</li>
                        <li>High-fidelity UI mockups</li>
                      </ul>
                    </div>
                    <div class="portivio-btn-block">
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                      <a class="portivio-btn portivio-btn-primary" href="page-service-details.php">View Details</a>
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="service_item wow fade_In_Up" data-wow-delay="0.8s">
                <div class="service_head">
                  <span class="service_count">(04)</span>
                  <h2 class="service_title">Example</h2>
                </div>
                <div class="service_content">
                  <div class="service_content_left">
                    <img src="images/service/h1-s1-img4.jpg" alt="img" />
                  </div>
                  <div class="service_content_right">
                    <h3>a web application requires more than just good visuals</h3>
                    <div class="service_content_list">
                      <ul class="list1">
                        <li>UX Audit Report</li>
                        <li>User Flow Diagrams</li>
                        <li>Design System Creation</li>
                      </ul>
                      <ul class="list1">
                        <li>Competitive Analysis Report</li>
                        <li>Design System / UI Kit</li>
                        <li>High-fidelity UI mockups</li>
                      </ul>
                    </div>
                    <div class="portivio-btn-block">
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                      <a class="portivio-btn portivio-btn-primary" href="page-service-details.php">View Details</a>
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="service_item wow fade_In_Up" data-wow-delay="1s">
                <div class="service_head">
                  <span class="service_count">(05)</span>
                  <h2 class="service_title">Example</h2>
                </div>
                <div class="service_content">
                  <div class="service_content_left">
                    <img src="images/service/h1-s1-img5.jpg" alt="img" />
                  </div>
                  <div class="service_content_right">
                    <h3>a web application requires more than just good visuals</h3>
                    <div class="service_content_list">
                      <ul class="list1">
                        <li>UX Audit Report</li>
                        <li>User Flow Diagrams</li>
                        <li>Design System Creation</li>
                      </ul>
                      <ul class="list1">
                        <li>Competitive Analysis Report</li>
                        <li>Design System / UI Kit</li>
                        <li>High-fidelity UI mockups</li>
                      </ul>
                    </div>
                    <div class="portivio-btn-block">
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
                          class="webexbase-icon-up-right-arrow-1"></i></a>
                      <a class="portivio-btn portivio-btn-primary" href="page-service-details.php">View Details</a>
                      <a class="portivio-btn portivio-btn-circle" href="page-service-details.php"><i
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
      <!-- Skill Section Start -->
      <!-- <section class="pdb-120">
        <div class="section-title">
          <div class="container">
            <div class="row">
              <div class="col"></div>
              <div class="col-md-12 col-lg-10 col-xl-6">
                <div class="title-box-center text-center anim-heading animation-style1">
                  <h5 class="sub-title">( MY SKILLS )</h5>
                  <h2 class="title anim-title">Why I’m Best you Solve your Design Problem</h2>
                </div>
              </div>
              <div class="col"></div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="container">
            <div class="row">
              <div
                class="col-md-6 col-lg-6 col-xl-3 d-flex justify-content-center justify-content-xl-start wow fadeInUp"
                data-wow-delay="0.5s">
                <div class="skill_style1 mrb-xl-30">
                  <div class="skill_item">
                    <div class="skill_icon">
                      <img src="images/award/figma.png" alt="img" />
                    </div>
                    <h3 class="skill_count">100%</h3>
                    <span class="skill_title">Figma Design</span>
                  </div>
                </div>
              </div>
              <div
                class="col-md-6 col-lg-6 col-xl-3 d-flex justify-content-center justify-content-xl-start wow fadeInUp"
                data-wow-delay="0.7s">
                <div class="skill_style1 mrb-xl-30">
                  <div class="skill_item lg-size">
                    <div class="skill_icon">
                      <img src="images/award/webflow.png" alt="img" />
                    </div>
                    <h3 class="skill_count">100%</h3>
                    <span class="skill_title">Figma Design</span>
                  </div>
                </div>
              </div>
              <div
                class="col-md-6 col-lg-6 col-xl-3 d-flex justify-content-center justify-content-xl-start wow fadeInUp"
                data-wow-delay="0.9s">
                <div class="skill_style1 mrb-sm-30">
                  <div class="skill_item md-size">
                    <div class="skill_icon">
                      <img src="images/award/xd.png" alt="img" />
                    </div>
                    <h3 class="skill_count">100%</h3>
                    <span class="skill_title">Figma Design</span>
                  </div>
                </div>
              </div>
              <div
                class="col-md-6 col-lg-6 col-xl-3 d-flex justify-content-center justify-content-xl-start wow fadeInUp"
                data-wow-delay="1.1s">
                <div class="skill_style1">
                  <div class="skill_item xl-size">
                    <div class="skill_icon">
                      <img src="images/award/framer.png" alt="img" />
                    </div>
                    <h3 class="skill_count">100%</h3>
                    <span class="skill_title">Figma Design</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- Skill Section End -->
      <!-- Expand Image Section Start -->
      <section class="pdb-120 portivio-extend-animation text-center">
        <div class="section-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
                <img class="h1_extend_img img-full" src="images/bg/expand-img.jpg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Expand Image Section End -->
      <!-- Project Section Start -->
      <section class="project_section_area pdb-120">
        <div class="section-title mrb-55 mrb-lg-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
          <div class="container">
            <div class="row">
              <div class="col"></div>
              <div class="col-md-12 col-lg-10 col-xl-6">
                <div class="title-box-center pined_title_part text-center">
                  <h5 class="sub-title">( Portfolio )</h5>
                  <h2 class="title">Providing Dedicated Legal Advocacy & Representation</h2>
                </div>
              </div>
              <div class="col"></div>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="container">
            <?php
            // Fetch Projects
            $sql_projects = "SELECT * FROM projects ORDER BY created_at ASC";
            $result_projects = $conn->query($sql_projects);
            $left_col = [];
            $right_col = [];
            $i = 0;
            if ($result_projects->num_rows > 0) {
              while ($row = $result_projects->fetch_assoc()) {
                if ($i % 2 == 0) {
                  $left_col[] = $row;
                } else {
                  $right_col[] = $row;
                }
                $i++;
              }
            }
            ?>
            <div class="row justify-content-between">
              <!-- Left Column -->
              <div class="col-md-6 col-lg-5 col-xl-5">
                <?php foreach ($left_col as $index => $project):
                  $margin_class = ($index == 0) ? '' : 'mrt-100 mrt-md-30';
                  ?>
                  <div class="project_style1_item <?php echo $margin_class; ?>">
                    <div class="project_thumb scale-img">
                      <img class="img-full" src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="img" />
                    </div>
                    <div class="project_content">
                      <div class="project_title_area">
                        <div class="project_category">
                          <ul>
                            <li><a href="#"><?php echo htmlspecialchars($project['category']); ?></a></li>
                          </ul>
                        </div>
                        <h4 class="title"><a href="#"><?php echo htmlspecialchars($project['title']); ?></a></h4>
                      </div>
                      <a class="project_link" href="#"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- Right Column -->
              <div class="col-md-6 col-lg-5 col-xl-5">
                <?php foreach ($right_col as $index => $project):
                  $margin_class = 'mrt-150 mrt-md-30'; // Default offset for right column items
                  if ($index > 0)
                    $margin_class = 'mrt-100 mrt-md-30';
                  ?>
                  <div class="project_style1_item <?php echo $margin_class; ?>">
                    <div class="project_thumb square-size scale-img">
                      <img class="img-full" src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="img" />
                    </div>
                    <div class="project_content">
                      <div class="project_title_area">
                        <div class="project_category">
                          <ul>
                            <li><a href="#"><?php echo htmlspecialchars($project['category']); ?></a></li>
                          </ul>
                        </div>
                        <h4 class="title"><a href="#"><?php echo htmlspecialchars($project['title']); ?></a></h4>
                      </div>
                      <a class="project_link" href="#"><i class="webexbase-icon-up-right-arrow-1"></i></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="row mrt-60">
              <div class="col d-flex align-items-center justify-content-center">
                <div class="portivio-btn-block">
                  <a class="portivio-btn portivio-btn-circle" href="#"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                  <a class="portivio-btn portivio-btn-primary" href="#">VIEW ALL CASES</a>
                  <a class="portivio-btn portivio-btn-circle" href="#"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Portfolio Section End -->
      <!-- Marquee Section Start -->
      <section class="bg-silver pdt-60 pdb-60">
        <div class="marquee_slider_01">
          <div class="marquee_slider_box">
            <div class="scrolling-content">
              <span><i class="webexbase-icon-sparkle-1"></i>Custom Branding</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Website Design</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Digital Marketing</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Strategy Consulting</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Analytics & Reporting</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Custom Branding</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Website Design</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Digital Marketing</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Strategy Consulting</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Analytics & Reporting</span>
            </div>
            <div class="scrolling-content">
              <span><i class="webexbase-icon-sparkle-1"></i>Custom Branding</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Website Design</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Digital Marketing</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Strategy Consulting</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Analytics & Reporting</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Custom Branding</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Website Design</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Digital Marketing</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Strategy Consulting</span>
              <span><i class="webexbase-icon-sparkle-1"></i>Analytics & Reporting</span>
            </div>
          </div>
        </div>
      </section>
      <!-- Marquee Section End -->
      <!-- Awards Section Start -->
      <section class="pdt-120 pdb-120">
        <div class="section-title mrb-55 mrb-lg-60">
          <div class="container">
            <div class="row">
              <div class="col"></div>
              <div class="col-md-12 col-lg-10 col-xl-6">
                <div class="title-box-center text-center anim-heading animation-style1">
                  <h5 class="sub-title">( Awards & ACHIVMENT )</h5>
                  <h2 class="title anim-title">My Achievement & Awards</h2>
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
                          <div class="award_name">
                            <?php echo htmlspecialchars($award['organization']); ?>
                          </div>
                          <div class="award_title_area">
                            <div class="award_category">
                              <?php echo htmlspecialchars($award['category']); ?>
                            </div>
                            <h4 class="award_title">
                              <?php echo htmlspecialchars($award['title']); ?>
                            </h4>
                          </div>
                          <div class="award_year">
                            <?php echo htmlspecialchars($award['year']); ?>
                          </div>
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
      <section class="bg-silver pdt-120 pdb-120">
        <div class="section-title mrb-55 mrb-lg-60">
          <div class="container">
            <div class="row">
              <div class="col-xl-5 col-lg-5 col-md-12 mrb-md-30">
                <div class="title-box anim-heading animation-style1">
                  <h5 class="sub-title">( TESTIMONIALS )</h5>
                  <h2 class="title wt-split-text anim-title">What Our Clients Say About Me</h2>
                </div>
              </div>
              <div
                class="col-xl-7 col-lg-7 col-md-12 d-flex justify-content-start justify-content-start justify-content-lg-end">
                <div class="portivio-btn-block">
                  <a class="portivio-btn portivio-btn-circle" href="page-testimonial-style-01.php"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                  <a class="portivio-btn portivio-btn-primary" href="page-testimonial-style-01.php">ALL TESTIMONIALS</a>
                  <a class="portivio-btn portivio-btn-circle" href="page-testimonial-style-01.php"><i
                      class="webexbase-icon-up-right-arrow-1"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                    // Using the connection from config.php included at the top
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
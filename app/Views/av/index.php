 <!-- Main Data -->
 <!-- ภาพแนวตั้ง -->
 <!--  Button 6 -->
 <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="tab-item header-font1 ">
             <h1>Dooporn8k</h1>
         </div>

     </div>
     <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
     <div class="col-lg-6 col-md-6 col-xs-6" >
         <a href="<?php echo base_url('av/genres/6/ชุดออฟฟิศ'); ?>" class="btn6 font-effect-neon">ชุดออฟฟิต</a>
         <a href="<?php echo base_url('av/genres/22/แตกใน'); ?>" class="btn6 font-effect-neon">แตกใน</a>
         <a href="<?php echo base_url('av/genres/43/ครอบครัว'); ?>" class="btn6 font-effect-neon">ครอบครัว</a>
     </div>
     <div class="col-lg-6 col-md-6 col-xs-6" >
         <a href="<?php echo base_url('av/genres/61/โดนรุม'); ?>" class="btn6 font-effect-neon">โดนรุม</a>
         <a href="<?php echo base_url('av/genres/47/ชุดพยาบาล'); ?>" class="btn6 font-effect-neon">ชุดพยาบาล</a>
         <a href="<?php echo base_url('av/genres/19/ซับไทย'); ?>" class="btn6 font-effect-neon">ซับไทย</a>
     </div>
     <!-- <span class="font-effect-fire-animation" style="font-size:50px; font-family:ribeye;">fire animation</span> -->
 </div>
 <!-- </div> -->


 <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>

 <style class="cp-pen-styles">
     img {
         height: 100%
     }

     .padding-l-r {
         position: relative;
         min-height: 1px;
         padding-right: 13px;
         padding-left: 10px;
     }
 </style>

 <body>
     <!-- Swiper -->
     <div class="swiper-container" style="padding-top: 2rem;">
         <div class="swiper-wrapper">
             <?php foreach ($list_video_slider as $value) {
                    $id = $value['movie_id'];
                    $urlname = urldecode(str_replace([" ", "\'"], ["-", ""], $value['movie_thname']));
                    $urlvideo = base_url('av/' . $id . '/'.$urlname);
                ?>

                 <div class="swiper-slide">

                     <div class="img_doonung  box-exclusive-slider movie-box-slider">

                         <a href="<?php echo  $urlvideo; ?>"><img src="<?php echo $value['movie_picture']; ?>" /> </a>

                         <p class="link-exclusive text-center">
                             <div class="movie-corner2 "><i style="color:#FFCC00" class="fas fa-star"></i> <?php echo $value['movie_ratescore'] / 10; ?></div>
                             <p class="link-exclusive text-center">
                                 <h2><a style="white-space: nowrap; font-size:16px; color:white;" href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname']; ?>"><?php echo iconv_substr($value['movie_thname'], 0, 27, "UTF-8") . '...' ?></a></h2>
                             </p>

                             <p class="text-right">

                                 <font color="#FFFFFF" size='2'> เข้าชม <i class="far fa-eye"></i> <?php if (empty($value['movie_view'])) {
                                                                                                        echo "0";
                                                                                                    } else {
                                                                                                        echo $value['movie_view'];
                                                                                                    }  ?> ครั้ง
                                 </font>
                             </p>
                     </div>
                 </div>


             <?php } ?>
         </div>
         <!-- Add Pagination -->
         <div class="swiper-pagination"></div>
     </div>

     <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
     <script>
         var swiper = new Swiper('.swiper-container', {
             pagination: '.swiper-pagination',
             effect: 'coverflow',
             grabCursor: true,
             centeredSlides: true,
             spaceBetween: 0,
             loop: true,
             autoplay: 2500,
             autoplayDisableOnInteraction: false,
             slidesPerView: 5,
             coverflow: {
                 rotate: 30,
                 stretch: 0,
                 depth: 100,
                 modifier: 1,
                 slideShadows: true
             }
         });

         //# sourceURL=pen.js
     </script>
 </body>

 </html>

 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="row">
                 <div class="col-sm-12 col-md-9 col-lg-9 box-title">
                     <div class="tab-item header-font1">
                         <h1>ดูหนังโป๊ออนไลน์ หนังXPorn หนัง AV</h1>
                     </div>

                 </div>
                
                 <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                     <div class="row">
                         <?php 
                         if(!empty($list_video)){
                         foreach ($list_video as $value) {
                                $id = $value['movie_id'];
                                $urlname = urldecode(str_replace([" ", "\'"], ["-", ""], $value['movie_thname']));
                                $urlvideo = base_url('av/' . $id . '/'.$urlname);
                            ?>
                           
                             <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 child">
                                 <div class="box-exclusive movie-box">
                                     <div class="row">

                                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <a href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname']; ?>">
                                                 <center><img src="<?php echo $value['movie_picture']; ?>" class="img_doonung img-responsive2 img-responsive" alt="<?php echo $value['movie_thname']; ?>" title="<?php echo $value['movie_thname']; ?>" border="0"></center>
                                             </a>
                                             <p class="link-exclusive text-center">
                                                 <div class="movie-corner2 "><i style="color:#FFCC00" class="fas fa-star"></i> <?php echo $value['movie_ratescore'] / 10; ?></div>
                                                 <p class="link-exclusive text-center">
                                                     <h2><a style="white-space: nowrap; font-size:16px; color:white;" href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname']; ?>"><?php echo iconv_substr($value['movie_thname'], 0, 27, "UTF-8") . '...' ?></a></h2>
                                                 </p>
                                                 <p class="text-right">
                                                     <font color="#FFFFFF" size='2'> เข้าชม <i class="far fa-eye"></i> <?php if (empty($value['movie_view'])) {
                                                                                                                            echo "0";
                                                                                                                        } else {
                                                                                                                            echo $value['movie_view'];
                                                                                                                        }  ?> ครั้ง
                                                     </font>
                                                 </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <?php } 
                         }else{
                            echo "<h2 style='float:left;color:#fff;width:100%;padding-top:3rem;'><center>ไม่พบคลิปที่ค้นหา</center></h2>";
                         }
                         ?>
                     </div>
                 </div>


                 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-sm padding-category">
                     <div class="tab-item header-font1">
                         <h3>หมวดหมู่ทั้งหมด</h3>
                     </div>

                     <div class="box-menu__menu color-menu">

                         <?php foreach ($category_id as $value) { ?>
                             <h3><a href="<?php $cateid = $value['category_id'];
                                        echo base_url('av/genres/' . $cateid . '/' . urlencode($value['category_name'])); ?>" class="box-menu-submenu category-size-menu"><?php echo $value['category_name']; ?></a></h3>
                         <?php } ?>
                     </div>
                 </div>

             </div>
         </div>
     </div>

 </div>

 <div class="pagination2">
     <?= pagination($paginate['page'], $paginate['total_page']); ?>
 </div>
 </div>

 <!-- / ภาพแนวตั้ง -->

 <div class="row">
     <div class="padding-l-r">
         <div class="clearfix"></div>
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               
                 <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                         <div class="progress-ghost">
                             <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                         </div>

                         
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Menu Right -->

 </div>
 <script type="text/javascript">
     var play = true;
     $(document).ready(function() {
         $(".playvid").hover(function(event) {
             var el = $(this).children("video")[0];
             el.currentTime = 0;
             el.play();
             play = event.target.id;
             rendertitle(el, play);
         }, function(event) {
             var el = $(this).children("video")[0];
             el.pause();
             play = '';
             el.currentTime = 0;
         });
     });

     function rendertitle(el, id) {
         setTimeout(function() {
             //el.currentTime = el.duration/5;
             checkCurrentTime(el, el.duration / 5, id);
         }, 1000);
         setTimeout(function() {
             checkCurrentTime(el, el.duration * 2 / 5, id);
         }, 2000);
         setTimeout(function() {
             checkCurrentTime(el, el.duration * 3 / 5, id);
         }, 3000);
         setTimeout(function() {
             checkCurrentTime(el, el.duration * 4 / 5, id);
         }, 4000);
         setTimeout(function() {
             checkCurrentTime(el, el.duration * 4.5 / 5, id);
         }, 5000);
         setTimeout(function() {
             checkCurrentTime(el, 0, id);
             el.pause();
         }, 6000);
     }

     function checkCurrentTime(el, time, id) {
         if (play == id) {
             el.currentTime = time;
         }
     }
 </script>
 <!-- Footer -->
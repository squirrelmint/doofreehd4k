 <!-- Main Data -->
 <!-- ภาพแนวตั้ง -->
 <!--  Button 6 -->

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
 </html>

 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="row">
                 <div class="col-sm-12 col-md-9 col-lg-9 box-title">
                     <div class="tab-item header-font1">
                         <h1>ดูคลิปโป๊ออนไลน์ </h1>
                     </div>

                 </div>
                
                 <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                     <div class="row">x
                         <?php foreach ($list_video as $value) {
                                $id = $value['movie_id'];
                                $urlname = urldecode(str_replace([" ", "\'"], ["-", ""], $value['movie_thname']));
                                $urlvideo = base_url('clip/' . $id . '/'.$urlname);
                            ?>
                           
                             <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 child">
                                 <div class="">
                                     <div class="row">

                                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <a href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname'] ?>" alt="<?php echo $value['movie_thname'] ?>">
                                                 <center><img src="<?php echo $value['movie_picture']; ?>" class="img_doonung img-responsive-clip img-responsive" alt="<?php echo $value['movie_thname'] ?>" title="<?php echo $value['movie_thname'] ?>" border="0"></center>
                                             </a>
                                             <p class="link-exclusive text-center">
                                               
                                                 <p class="link-exclusive text-center">
                                                     <a style="white-space: nowrap;" href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname']; ?>"><?php echo iconv_substr($value['movie_thname'], 0, 27, "UTF-8") . '...' ?></a>
                                                 </p>
                                                 
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                 </div>


                 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 hidden-sm padding-category">
                     <div class="tab-item header-font1">
                         <h3>หมวดหมู่ทั้งหมด</h3>
                     </div>

                     <div class="box-menu__menu color-menu">

                         <?php foreach ($category_id as $value) { ?>
                            <h3><a href="<?php $cateid = $value['category_id'];
                                        echo base_url('clip/genres/' . $cateid . '/' . urlencode($value['category_name'])); ?>" class="box-menu-submenu category-size-menu"><?php echo strtoupper($value['category_name']); ?></a></h3>
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
                     <div class="col-sm-12 col-md-12 col-lg-12 box-title">
                         <h3>หนังโป๊ หนัง X หนัง Jav</h3>
                     </div>
                 </div>
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
<div id="content">

    <div id="secondseo">
        <h2>ดูหนังฟรีได้แบบไม่เสียเงินหรือเลือกดูหนังออนไลน์อัพเดตใหม่ก่อนใคร</h2>
        <h2>เลือกหนังที่จะดูได้ตามหมวดหมู่หรือเลือกดูหนังออนไลน์ที่อัพใหม่ได้ที่หน้าแรก</h2>
        <h2>เลือกดูหนังตามปีที่ฉาย</h2>
    </div>

    <div class="content-left">

        <div class="sidebar">

            <div class="sidebar-header">

                <p style="font-size: 18px; text-align: center;">

                    ปีที่ฉาย

                </p>

            </div>

            <ul>
                <?php 
                    foreach ($listyear as $val) {
                        if ($val['movie_year'] > '1988') { 
                ?>
                    <div class="col-xs-6">
                        <li class="cat-item">
                            <a href="<?php echo base_url('/year/' . $val['movie_year']); ?>"><?php echo $val['movie_year']; ?></a>
                        </li>
                    </div>

                <?php 
                        }
                    } 
                ?>
            </ul>

        </div>
    </div>

    <div class="content-main">

        <div class="box">
            <div class="box-header">
                <ul>
                    <li class="menu-item current-menu-item">
                        <a href="<?= str_replace('/public','',base_url());?>" style="color: #f2d45f;"><?= $title ?></a>
                    </li>
                </ul>
            </div>


             <?php if(!empty($paginate['list'])){ ?>
              
                    <?php foreach ($paginate['list'] as $value) {
                        $id = $value['movie_id'];

                        $s_replace = [
                            ")", "(", " ", '%'
                        ];
                        $e_replace = [
                            "", "", "-", '%25'
                        ];
    
                        $url_name =  urldecode(trim(str_replace($s_replace, $e_replace,  $value['movie_thname'])));
                        if ($value['movie_type'] == 'se') {
    
                            $urlvideo = str_replace('%', '%25', urldecode(base_url('/series/' . $id . '/' . $url_name)));
                        } else {
    
                            $urlvideo = str_replace('%', '%25', urldecode(base_url('/video/' . $id . '/' . $url_name)));
                        }

                    ?>

                <div class="movie">
                    <div class="movie-box">
                        <div class="movie-title">
                            <h2>
                                <a href='<?php echo $urlvideo; ?>'>
                                    <span class="movie-title-color"><?php echo $value['movie_thname']; ?></span>
                                </a>
                            </h2>
                        </div>

                        <div class="movie-imdb">
                            <b><span><?php echo $value['movie_ratescore']; ?></span></b>
                        </div>

                        <div class="movie-view">
                            <b style="word-wrap: break-word;"><i class="fa fa-eye" aria-hidden="true"></i> <?php  if(empty($value['movie_view'])){ echo "0";}else{ echo $value['movie_view'];} ?> คน</b>
                        </div>

                        <?php

                        if ($value['movie_quality'] == "hd") {
                            $display = "red";
                        } else if ($value['movie_quality'] == "sd") {
                            $display = "green";
                        } else {
                            $display = "green";
                        }

                        ?>

                        <div class="movie-corner movie-HD" style=" background-color: <?php echo $display; ?>;"><?php echo strtoupper($value['movie_quality']); ?></div>

                        <div class="movie-image">

                            <a href='<?php echo $urlvideo; ?>'>

                                <img src="<?php echo $value['movie_picture']; ?>" alt="<?php echo $value['movie_thname']; ?>" title="<?php echo $value['movie_thname']; ?>">

                            </a>

                        </div>

                    </div>


                </div>

            <?php 
                 }
                }else{
                    echo "<h4 style='float:left;color:#fff;width:100%;'><center>ไม่พบหนังที่ค้นหา</center></h4>";
                }
            ?>



        </div>

        <!-- Pagination -->
       
        <div class="box">

            <div class="navigation">

                <ul>

                    <div class="topbar-filter">

                        <div class="pagination2">

                            <?= pagination($paginate['page'], $paginate['total_page']); ?>

                        </div>

                    </div>

                </ul>

            </div>

        </div>
       

        <!-- /Pagination -->

    </div>









    <div class="content-right">

        <div class="sidebar">

            <div class="sidebar-header">

                <p style="font-size: 18px; text-align: center;">

                    หมวดหมู่

                </p>

            </div>

            <ul>
                <?php foreach ($category_id as $value) { ?>
                    <li class="cat-item cat-left">
                        <h3 class="cate-name">
                            <a href="<?php echo base_url('/category/' . $value['category_id'] . '/' . urlencode(str_replace(' ','-',$value['category_name']))); ?>" title=<?= $value['category_name'] ?>>
                                <?= $value['category_name'] ?> 
                            </a>
                        </h3>
                    </li>
                <?php } ?>
            </ul>

        </div>


    </div>

    <div class="clearfix"></div>

     <!-- ADS ล่าง -->

    <div id="ads_fox_bottom">

        <div id="ads_fix_footer">

            <div style="text-align:center;">

                <div id="fix_footer">

                    <?php foreach ($path_imgads as $value) {

                        if (empty($value['ads_position'] == "4")) {

                        } else { ?>

                            <!-- ปุ่ม close ADS ล่าง -->

                            <a href="javascript:void(0)" onclick="document.getElementById('ads_fox_bottom').style.display = 'none';" style="position:absolute;color:black;text-decoration:none;font-size:13px; font-weight:bold;font-family:tahoma,verdana,arial,sans-serif;border:0px solid white;padding:0px;z-index:999;margin-top: -10px;" data-wpel-link="internal"><img alt="close" title="close" src="https://4.bp.blogspot.com/-GXvKu86ra2Q/XWpNe4fvZNI/AAAAAAAACTk/j68WkcK79nYHrlCq67wd2l2gKj4FA9ZKgCLcBGAs/s1600/close.gif"></a>

                    <?php }

                    } ?>

                </div>

            </div>

            <?php

            foreach ($path_imgads as $value) {

                if ($value['ads_position'] == "4") {

            ?>

                    <div style="clear:both;"></div>

                    <div id="fix_footer2" style="width:100%; display:block;  overflow:hidden; line-height:0px;">

                        <div style="display:inline-block; width:100%; text-align:center;">

                            <div class="textwidget custom-html-widget">

                                <center><a onclick="onClickAds(<?= $value['ads_id'] ?>, <?= $branch ?>)" href="<?= $value['ads_url'] ?>" target="_blank" rel="noopener"><img alt="<?= $value['ads_name'] ?>" title="<?= $value['ads_name'] ?>" src="<?php echo  $backURL . "ads/" . $value['ads_picture']; ?>" width="70%"></a></center>

                            </div>

                        </div>

                    </div>

                    <div style="clear:both;"></div>

            <?php

                }

            }

            ?>



        </div>

    </div>

    <!-- ADS ล่าง -->
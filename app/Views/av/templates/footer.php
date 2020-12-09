<style>
    p.content-footer {
        color: #ffffff;
        max-width: 70%;
        margin: auto;
        margin-bottom: 20px;
        text-align: center;
        color:aliceblue
    }
    strong{
        color:#ff005d;
    }
</style>
<div class="ghost">
    <br><br>
       <P class="content-footer" > <strong>ดูหนังโป๊ออนไลน์</strong> หยุดเชื่อเพื่อชาติ ช่วงโควิค-19 ไม่ออกไปรับเชื้อ แต่เรามาปล่อยน้ำเงี่ยนกันดีกว่า สายหื่น 18+พวกคุณจะไม่เหงาอีกต่อไป เพราะการดูหนังผู้ใหญ่ จะเพิ่มความสุขให้เรา เพียงแค่หยิบโทรศัทพ์ แล้วกดค้นหา แนวหนัง xxx ที่เราอยากดู ก็จะเด้งหน้าเว็บหนังโป๊ยอดนิยมของคนไทยมาให้เสพความเงียน 
       ดูได้ทั้ง Androi และ iOS ภาพคมชัดไม่สะดุด ระดับHD+ ดูหนังโป๊ คลิปต่าง ๆ  ดูหนังโป๊ใหม่ หนัง JAV ออนไลน์ดูฟรี ดูเพลิน เปิดให้บริการทุกวัน อย่าพลาด !! เข้ามา ดูหนังมาใหม่ หนังโป๊ครอบครัว, แนวรุม, ครูเราจัดมาให้ดูอย่างเต็มชุด
             สามารถรับชมฟรีได้ทุกที่ทุกเวลาตลอด 24 ชั่วโมงที่ <strong>doofreehd4k.com</strong>
    </P>
    
    <!-- Ads Banner Slide -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="banner-slide">
                <div id="BannerSlide" class="carousel slide" data-ride="carousel">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="footer text-center" style="background-color: #ff005d">
            <center>
                <a href="<?php echo base_url(); ?>" title="">
                    <img src="<?= $path_setting . $setting['setting_logo'] ?>" class="logo-size" border="0" title="" alt="" width="230">
                </a>
            </center>
        </div>
    </div>
    <div class="row text-center" style="background-color: #191919;">
        <p class="link-color"> 
            <a href="" title="">Copyright © 2020 askmebet.com. All rights reserved.</a> <a href="#" title="" target="_blank"></a>
        </p>
    </div>

    <!-- โฆษณา ข้าง ๆ  -->
    <div id="light" class="left_banner white_content2">
        <?php
        $i = 0;
        if (!empty($path_imgads)) {
            foreach ($path_imgads as $value) {
                if ($value['ads_position'] == "2") {
                    $i++;
        ?>
                    <p style="text-align: right;">
                        <a href="javascript:void(0)" onClick="document.getElementById('light').style.display='none'">
                            <p align="left">
                                <img src="<?php echo $docavURL . 'assets/images/close/close2.png'; ?>" width="24" height="24">
                                ปิดโฆษณานี้
                            </p>
                        </a>
                    </p>
                    <a onclick="onClickAds(<?= $value['ads_id']; ?>, <?= $branch ?>)" href="<?php echo $value['ads_url']; ?>" target="_blank">
                        <img alt="<?php echo $value['ads_url']; ?>" title="<?php echo $value['ads_url']; ?>" src="<?php echo $backURL . 'banner/' . $value['ads_picture']; ?>" class="hoverimg size-banner-2-3">
                    </a>
                    </p>
                    </a>
        <?php
                }
            }
        } else {
        }
        ?>
    </div>
    <div id="light2" class="left_banner white_content3">
        <?php
        $i = 0;
        if (!empty($path_imgads)) {
            foreach ($path_imgads as $value) {
                if ($value['ads_position'] == "3") {
                    $i++;
        ?>
                    <p style="text-align: right;"> <a href="javascript:void(0)" onClick="document.getElementById('light2').style.display='none'">
                            <p align="left">
                                <img src="<?php echo $docavURL . 'assets/images/close/close2.png'; ?>" width="24" height="24">
                                ปิดโฆษณานี้
                        </a>
                    </p>
                    <a onclick="onClickAds(<?= $value['ads_id']; ?>, <?= $branch ?>)" href="<?php echo $value['ads_url']; ?>" target="_blank">
                        <img alt="<?php echo $value['ads_url']; ?>" title="<?php echo $value['ads_url']; ?>" src="<?php echo $backURL . 'banner/' . $value['ads_picture']; ?>" class="hoverimg size-banner-2-3">
                    </a>
                    </p>
                    </a>
        <?php
                }
            }
        } else {
        }
        ?>
    </div>
    <!-- / โฆษณา ข้าง ๆ  -->
    <!-- โฆษณา ล่าง  -->
    <div class="col-lg-2 col-center-block">
        <div class="row">
            <!-- ADS ล่าง -->
            <div id="ads_fox_bottom">
                <div id="ads_fix_footer">
                    <div style="text-align:center;">
                        <div id="fix_footer">
                            <?php
                            foreach ($path_imgads as $value) {
                                if (empty($value['ads_position'] == "4")) {
                                } else {
                            ?>
                                    <!-- ปุ่ม close ADS ล่าง -->
                                    <a href="javascript:void(0)" onclick="document.getElementById('ads_fox_bottom').style.display = 'none';" style="position:absolute;color:black;text-decoration:none;font-size:13px; font-weight:bold;font-family:tahoma,verdana,arial,sans-serif;border:0px solid white;padding:0px;z-index:999;margin-top: -10px;" data-wpel-link="internal"><img alt="close" title="close" src="https://4.bp.blogspot.com/-GXvKu86ra2Q/XWpNe4fvZNI/AAAAAAAACTk/j68WkcK79nYHrlCq67wd2l2gKj4FA9ZKgCLcBGAs/s1600/close.gif"></a>
                            <?php
                                }
                            }
                            ?>
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
                                        <a onclick="onClickAds(<?= $value['ads_id']; ?>, <?= $branch ?>)" href="<?php echo $value['ads_url']; ?>" target="_blank">
                                            <img alt="<?php echo $value['ads_url']; ?>" title="<?php echo $value['ads_url']; ?>" width="60%" src="<?php echo $backURL . 'banner/' . $value['ads_picture']; ?>" class="hoverimg">
                                        </a>
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
        </div>
    </div>
    <!-- / โฆษณา ล่าง  -->
</div>
<!-- jQuery -->
<script src="//postkhai.com/-movie3/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="//postkhai.com/-movie3/js/bootstrap.min.js"></script>
</body>
<script>
    jQuery("#formsearch").submit(function(event) {
        if (jQuery("#search").val()) {
            var url = "<?= base_url('av/search') ?>" + '/' + jQuery("#search").val();
            window.location.href = url;
            event.preventDefault();
        }
    });
    jQuery("#formsearch-clip").submit(function(event) {
        if (jQuery("#search-clip").val()) {
            var url = "<?= base_url('clip/search') ?>" + '/' + jQuery("#search-clip").val();
            window.location.href = url;
            event.preventDefault();
        }
    });
    function goReport(id, branch) {
        var request = prompt('แจ้งหนังเสืย');
        if (request != null) {
            jQuery.ajax({
                url: "<?php echo base_url(); ?>av/savereport/branch/" + branch + "/id/" + id + "/reason/" + request,
                type: 'GET',
                crossDomain: true,
                cache: false,
                success: function(data) {
                    console.log(request);
                }
            });
            alert('เราจะดำเนินการให้เร็วที่สุด');
        } else {
        }
    };
    function onClickAds(adsid, branch) {
        var backurl = '<?= $backURL ?>';
        debugger;
        jQuery.ajax({
            url: backurl + "ads/sid/<?= session_id() ?>/adsid/" + adsid + "/branch/" + branch,
            async: true,
            success: function(response) {
                console.log(url); // server response
            }
        });
    }
    jQuery(document).ready(function($) {
        // Define a blank array for the effect positions. This will be populated based on width of the title.
        var bArray = [];
        // Define a size array, this will be used to vary bubble sizes
        var sArray = [4, 6, 8, 10];
        // Push the header width values to bArray
        for (var i = 0; i < $('.bubbles').width(); i++) {
            bArray.push(i);
        }
        // Function to select random array element
        // Used within the setInterval a few times
        function randomValue(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }
        // setInterval function used to create new bubble every 350 milliseconds
        setInterval(function() {
            // Get a random size, defined as variable so it can be used for both width and height
            var size = randomValue(sArray);
            // New bubble appeneded to div with it's size and left position being set inline
            // Left value is set through getting a random value from bArray
            $('.bubbles').append('<div class="individual-bubble" style="left: ' + randomValue(bArray) + 'px; width: ' + size + 'px; height:' + size + 'px;"></div>');
            // Animate each bubble to the top (bottom 100%) and reduce opacity as it moves
            // Callback function used to remove finsihed animations from the page
            $('.individual-bubble').animate({
                'bottom': '100%',
                'opacity': '-=0.7'
            }, 3000, function() {
                $(this).remove()
            });
        }, 350);
    });
</script>
</html>
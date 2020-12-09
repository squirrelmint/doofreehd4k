<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $setting['setting_title']; ?></title>
    <meta name="description" content="<?php echo $setting['setting_description']; ?>" />
    <meta name="keywords" content=" <?php echo $setting['setting_keyword']; ?>" />
    <meta name="author" content="FANTOM4000">
    <?php 
      if(("https://" . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'])!=('https://'.$_SERVER['HTTP_HOST'].'/'))
      {
         echo '<link rel="canonical" href="'.'https://'.$_SERVER['HTTP_HOST'].''.'" />'; 
      }
    ?>
    <meta name="robots" content="index,follow">

    <meta property="og:site_name" content="<?= $_SERVER['HTTP_HOST'] ?>" />

    <meta property="og:url" content="<?= base_url(uri_string()) ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo  $setting['setting_title']; ?>" />
    <meta property="og:description" content="<?php echo  $setting['setting_description']; ?>" />
    <meta property="og:image" content="<?php echo  $setting['setting_img']; ?>" />
    <meta property="og:image:alt" content="" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo  $setting['setting_title']; ?>" />
    <meta name="twitter:description" content="<?php echo  $setting['setting_description']; ?>" />
    <meta name="twitter:image" content="<?php echo  $setting['setting_img']; ?>" />
    <meta name="twitter:site" content="@ondemandacademy" />  

    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/bootstrap.css"; ?>'>
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/theme.css"; ?>'>
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/main.css"; ?>'>
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/pagination.css"; ?>'>
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/font-effect.css"; ?>'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kaushan+Script&effect=neon">
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/font-color-effect.css"; ?>'>
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/size-banner.css"; ?>'>
    
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/css/font-manual.css"; ?>'>
    <link rel="stylesheet" href='<?php echo $docavURL . "assets/fontawesome-free-5.14.0-web/css/all.css"; ?>'>

    <?php 
        if (!empty($setting['setting_header'])) {
            echo base64_decode($setting['setting_header']);
        }
    ?>
    

    <style type="text/css">
        body {
            background: black;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        @media only screen and (max-width: 768px) {
            body {
                margin-left: 21px;
                margin-right: -27px;
            }

            .fixvidthreetop {
                width: 100%;
                height: 9vw;
            }
        }

        @media only screen and (min-width: 769px) {
            body {
                margin-left: 28px;
                margin-right: 28px;
            }
        }

        .size-video {
            height: 235px;
        }

        .pagination2 {
            text-align: center;
        }
    </style>

</head>

<body>

    <!-- Header -->
    <!-- Navbar Header -->

    <nav class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navbar navbar-default-ghost navbar-fixed-top background-header">
        <div class="col-lg-3">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img alt="Brand" class="logo-size" src="<?= $path_setting . $setting['setting_logo'] ?>">
                </a>

            </div>

        </div>
        <div class="col-lg-9">
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i> หนัง</a></li>
                    <li><a href="<?php echo base_url('av'); ?>"><i class="fas fa-play"></i> หนังโป๊</a></li>
                    <li><a href="<?php echo base_url('clip'); ?>"><i class="fas fa-video"></i> คลิปโป๊</a></li>
                    <li> <a data-toggle="modal" data-target="#myModal"><i class="fas fa-phone-square-alt"></i> ติดต่อลงโฆษณา</a></li>

                    <form class="navbar-form navbar-left" role="search" method="get" id="formsearch">
                        <div class="form-group">
                            <input type="text" value="" id="search" class="form-control" placeholder="ค้นหาหนัง">
                        </div>
                        <button type="submit" id="searchsubmit" class="btn btn-default">ค้นหา</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- เมนูบาร์ ข้างบน -->
    </div>
    <marquee>
    </marquee>
  

    <body>
        <!-- Modal ติดต่อ | ขอหนัง -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ติดต่อลงโฆษณา</h4>
                    </div>

                    <div class="tab-content">
                        <div class="form-group"> </div>
                        <div id="menu1" class="tab-pane fade in active">
                            <form class="form-horizontal" action="<?php echo base_url('/contactdata/'); ?>" method="post" onsubmit="return checkcontact()">
                                <div class="form-group"> </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">ชื่อ สกุล *:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="namesurname" placeholder="Enter name" required name="namesurname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email *:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" required name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Line ID *:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="lindid" placeholder="Enter Line ID" required name="lineid">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">เบอร์โทรศัพท์ *:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="phone" placeholder="Enter Yourphone" required name="phone">
                                    </div>
                                </div>
                                <div class="form-group"> </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">ส่ง</button>
                                    <button type="close" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                </form>
            </div>

        </div>
        </div>
        <!-- /Modal ติดต่อ | ขอหนัง -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kenwheeler.github.io/slick/slick/slick.js"></script>

        <!-- โฆาณา 1 -->
        
		<div class="row">

			<div class="col-lg-12 col-md-12 col-xs-12 ads-head">
				<?php
				$style = "width: 100%;";
				$i = 0;
				if (!empty($ads)) {
					foreach ($ads as $value) {
						if ($value['ads_position'] == "1") {
							if ($i != 0) {
								$style = "width: 100%; margin-top: 5px;";
							}
							$i++;
				?>
							<a onclick="onClickAds(<?= $value['ads_id'] ?>, <?= $branch ?>)" href="<?php echo $value['ads_url'] ?>" target="_blank">
								<img src="<?php echo $path_ads . $value['ads_picture'] ?>" style="<?= $style ?>" class="hoverimg">
							</a>
				<?php
						}
					}
				} else {
				}
				?>
			</div>
		</div>

        <!-- / โฆาณา 1 -->


        

        <script>
            $(".responsive").slick({
                prevArrow: $(".prev"),
                nextArrow: $(".next"),
                infinite: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        </script>
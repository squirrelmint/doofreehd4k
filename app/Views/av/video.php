
<div class="container-ghost">



	<!-- Ads Banner Slide -->


	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- สไลด์ ภาพปกหนัง -->

		<div class="banner-slide">

			<div id="BannerSlide" class="carousel slide" data-ride="carousel">

			</div>

		</div>

		<!--/ สไลด์ ภาพปกหนัง -->

	</div>






	<!-- Body -->

	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-12 col-md-12 col-lg-12 box-title">
				<div class="tab-item header-font1 ">
					<h1>ดูหนังโป๊ออนไลน์ หนัง XPorn หนัง AV</h1>
				</div>
			</div>
		</div>

		<div class="row" style="background-color: #000000;">

			<div class="col-xs-12 col-sm-4 col-md-4 text-center" style="padding-left: 10rem;">
				<div class="box-exclusive movie-box-video">
					<p>

						<center><img class="img-video " src="<?php echo $video_data['movie_picture']; ?>" align="" title="" /></center>

						<p>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-8 text-left">
				<div class="bubbles">
					<h1>รหัสหนัง : <?php echo strtoupper(pathinfo($video_data['movie_ensub1'], PATHINFO_FILENAME)); ?></h1>
				</div>
				<p><span class="label label-info">นักแสดง <i class="fas fa-user"></i></span> <?php echo $video_data['actor']; ?></p>
				<p><span class="label label-primary">เรื่องย่อ <i class="far fa-comment-alt"></i></span> <strong style="color: #ff005d;"><?php echo $video_data['movie_thname']; ?></strong> <?php echo $video_data['movie_des']; ?></p>
				<p> <i class="far fa-clock"></i> เวลาในการรับชม : <?php echo $video_data['runtime']; ?> </p>



				<br><br>



				<div class="col-sm-12" style="display: flex;">

					<!-- style="margin-top: -2px; margin-left: 6px;" -->

					<a href="<?php echo  base_url(uri_string()); ?>" class="twitter-share-button" data-show-count="false">Tweet</a>

					<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>



					<div class="line-it-button" data-lang="th" data-type="share-a" data-ver="3" data-url="<?php echo  base_url(uri_string());  ?>" data-color="default" data-size="small" data-count="false" style="display: none;"></div>

					<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>



					<!-- Load Facebook SDK for JavaScript -->
					<div id="fb-root"></div>
					<script>
						(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s);
							js.id = id;
							js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));
					</script>
					<!-- Your share button code -->
					<div class="fb-share-button" style="margin-top: -3px;" data-href="<?php echo  base_url(uri_string());?>" data-layout="button_count"></div>

					<div class="col-sm-3">
						<button class="pull-right btn btn-default report-movie" onclick="goReport('<?= $video_data['movie_id'] ?>','<?= $video_data['branch_id'] ?>')">
							<span class="text-white ">แจ้งหนังเสีย</span>
						</button>
					</div>
				</div>

			</div>

		</div>

		<center>

			<br>

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;" align="center">

					หมวดหมู่ : หนัง JAV
					ประเภท :

					<?php foreach ($category_pagevideo as $value) { ?>
						<a style="color: #ff005d;" href="<?php $cateid = $value['category_id'];
															echo base_url('/genres/' . $cateid . '/' . urlencode($value['category_name'])); ?>"><?php echo  "&nbsp;" . $value['category_name']; ?></a>
					<?php } ?>

				</div>



			</div>

		</center>



		<div class="row">



			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-butom-iframe">
				<iframe src="<?php echo base_url('av/player/' . $video_data['movie_id'] . '/' . $feildplay); ?>" scrolling="no" frameborder="0" style="width:100%; height:100%; z-index:500;" allowfullscreen="yes"></iframe>
			</div>



		</div>





		<div class="row">



			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">

				<!--#################-- iframe  google drive   ####################################-->



				<script type="text/javascript">

				</script>

			</div>



		</div>



		<!-- คอมเม้นต์เฟซบุ๊๊ค -->
		<style>
			._56q9 {
				font-size: 14px;
				line-height: 1.358;
				word-break: break-word;
				word-wrap: break-word;
				color: #fff;
			}
		</style>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 5px;">
				<div id="fb-root"></div>
				<div class="fb-comments" data-href="<?php echo base_url(uri_string()); ?>" data-numposts="10" data-width="100%" data-colorscheme="dark"></div>
			</div>
		</div>
	</div>



	<div class="row">

		<!-- Main Data -->

		<div class="col-sm-12">

			<!-- Ads Banner -->



			<div class="clearfix"></div>

			<!-- Movie Update -->

			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">

					<div class="row">

						<div class="col-sm-12 col-md-12 col-lg-12 box-title">
							<div class="bubbles">
								<h1>หนังโป๊ที่น่าสนใจ</h1>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<div class="progress-ghost">

								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>

							</div>

						</div>



						<div class="row padding-chide">

							<!-- หนังโป๊ที่น่าสนใจ -->

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

								<?php foreach ($vdorandom as $value) {

									$id = $value['movie_id'];

									$urlvideo = base_url('/page/video/id/' . $id . '/main');

								?>

									<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 child">

										<div class="box-exclusive movie-box">

											<div class="row">

												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

													<a href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname']; ?>">

														<center><img src="<?php echo $value['movie_picture']; ?>" class="img-responsive2-video-random img-responsive" alt="<?php echo $value['movie_thname']; ?>" title="<?php echo $value['movie_thname']; ?>" border="0"></center>

													</a>

													<!-- <div class="movie-corner movie-SD">Sub</div> -->

													<p class="link-exclusive text-center">

														<!-- <div class="movie-corner2 "><i style="color:#FFCC00" class="fas fa-star"></i> <?php //echo $value['movie_ratescore'] / 10; 
																																			?></div> -->

														<p class="link-exclusive text-center">
															<h2><a style="white-space: nowrap; font-size:16px; color:white;" href="<?php echo $urlvideo; ?>" title="<?php echo $value['movie_thname']; ?>"><?php echo iconv_substr($value['movie_thname'], 0, 27, "UTF-8") . '...' ?></a></h2>
														</p>

														<p class="text-right">

															<font color="#FFFFFF" size='2'> เข้าชม <i class="far fa-eye"></i> <?php if (empty($value['movie_view'])) {
																																	echo "0";
																																} else {
																																	echo $value['movie_view'];
																																}  ?> ครั้ง </font>

														</p>

												</div>

											</div>

										</div>

									</div>

								<?php } ?>

							</div>

							<!-- /หนังโป๊ที่น่าสนใจ -->

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>



	<!--เมนูทางขวา -->


	






</div>

<!-- / Body -->




<script type="text/javascript">

	$( document ).ready(function() {
			var url = "<?php echo base_url(); ?>" +"/movie_view_add/movie_id/" + <?php echo $video_data['movie_id'];?> + "/branch/" + "<?php echo $video_data['branch_id'];?>";
			jQuery.ajax({
            url: url,
            async: true,
            success: function(response) {
           	console.log(url); // server response
            }

        });
    
});

</script>

</body>



</html>
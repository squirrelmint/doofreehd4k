<?php
namespace App\Controllers;
use App\Models\Av_Model;

class Av extends BaseController
{

	protected $base_backurl;
	public $img_backurl = "img_movies/";
	public $branch = '';
	public $backURL = "https://dooporn.aegistrex.com/";

	public function __construct()
	{

		$config = new \Config\App();
		$this->docavURL = $config->docavURL;
		
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->VideoModel = new Av_Model();

		$this->branch = 2;

		// Directory
		$this->path_ads = $this->backURL . 'banner/';
		$this->path_setting = $this->backURL . 'setting/';
		$this->path_fillmovies = "/assets/video/";


		helper(['url', 'avpagination']);
	}

	public function index()
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$list_video = $this->VideoModel->get_list_video($this->branch, '', $page);
		$list_video_slider = $this->VideoModel->get_list_video_slider($this->branch, '', $page);
		$path_imgads  = $this->VideoModel->get_path_imgads($this->branch);
		$list_movie_recommend = $this->VideoModel->get_movie_new_recommend($this->branch, '', $page);
		$category_id = $this->VideoModel->get_category($this->branch);
		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$listyear = $this->VideoModel->get_listyear($this->branch);
		$video_interest = $this->VideoModel->get_video_interest($this->branch);

	
		$data = [
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'img_backurl' => $this->img_backurl,
			'category_id' => $category_id,
			'list_video' => $list_video['list'],
			'cateRow' => array('category_name' => 'รายการหนัง'),
			'paginate' => $list_video,
			'setting' => $setting,
			'new_movie_recom' => $list_movie_recommend['list'],
			'listyear' => $listyear,
			'branch' => $this->branch,
			'keyword_string' => "",
			'video_interest' => $video_interest,
			'list_video_slider' => $list_video_slider['list']
		];


		echo view('av/templates/header.php', $data);
		echo view('av/index.php');
		echo view('av/templates/footer.php');
	}
	//--------------------------------------------------------------------

	public function video($id, $typeplay)
	{

		$keyword_string = "";
		$vdorandom = $this->VideoModel->get_id_video_random($this->branch);

		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$feildplay = "";
		$video_data = $this->VideoModel->get_id_video($id);
	 	$category_pagevideo= $this->VideoModel->showcategory_pagevideo($id);
		$category_id = $this->VideoModel->get_category($this->branch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->branch);
		$video_interest = $this->VideoModel->get_video_interest($this->branch);
		$list_video = $this->VideoModel->get_list_video($this->branch, '', $page);
		$listyear = $this->VideoModel->get_listyear($this->branch);

		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $video_data['movie_picture'];
		$seo = $this->VideoModel->get_seo($this->branch);

		if(!empty($seo)){
			if(!empty($seo['seo_title'])){
				$title = $seo['seo_title'];
				$name_videos = $video_data['movie_thname'];
				$title_name = $setting['setting_title'];
				$title_web = str_replace(
								"{movie_title} - {title_web}", 
								$name_videos . " - " . $title_name, 
								$title
							);
				$setting['setting_title'] = $title_web;
			}
			
			if(!empty($seo['seo_description'])){
				$description = $seo['seo_description'];
				$description_movie = $video_data['movie_des'];
				$setting['setting_description'] = str_replace("{movie_description}", $description_movie, $description);
			}
			
		}

		
		if ($video_data['movie_sound'] == "thai" || $video_data['movie_sound'] == "") {

			if ($typeplay == "main") {
				$feildplay = 'movie_thmain';
			} else if ($typeplay == "sub1") {
				$feildplay = 'movie_thsub1';
			} else if ($typeplay == "sub2") {
				$feildplay = 'movie_thsub2';
			}
		} else {

			if ($typeplay == "main") {
				$feildplay = 'movie_enmain';
			} else if ($typeplay == "sub1") {
				$feildplay = 'movie_ensub1';
			} else if ($typeplay == "sub2") {
				$feildplay = 'movie_ensub2';
			}
		}

		$data = [
			'branch' => $this->branch,
			'backURL' => $this->backURL,
			'docavURL' => $this->docavURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'setting' => $setting,
			'category_id' => $category_id,
			'listyear' => $listyear,
			'vdorandom' => $vdorandom,
			'video_data' => $video_data,
			'feildplay' => $feildplay,
			'base_backurl' => $this->base_backurl,
			'list_video' => $list_video['list'],
			'ads' => $path_imgads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string,
			'video_interest' => $video_interest,
			'category_pagevideo' => $category_pagevideo
		];

	
		echo view('av/templates/header.php',$data);
		echo view('av/video.php');
		echo view('av/templates/footer.php');

		// $this->CountModel->movie_view($id);
	}
	
	public function player($id, $filed = "")
	{
		$video_data = $this->VideoModel->get_id_video($id);

		$adsvideo_data = $this->VideoModel->get_adsvideolist($this->base_backurl);

		if ($filed == "") {
			$filed = 'movie_thmain';
		}

		$data = [
			'docavURL' => $this->docavURL,
			'video_data' => $video_data,
			'url_play'	=> $video_data['movie_ensub1'],
			'adsvideo'		=> $adsvideo_data,
			'base_backurl' => $this->base_backurl,
			'branch' => $this->branch
		];

		echo view('av/player', $data);
	}

	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}

	public function video_genres($id, $name)
	{

		$title = urldecode($name);
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$keyword_string = "";
		$category_id = $this->VideoModel->get_category($this->branch);
		$cateRow = $this->VideoModel->get_caterow($id);
		$listyear = $this->VideoModel->get_listyear($this->branch);
		$list_video_slider = $this->VideoModel->get_list_video_slider($this->branch, '', $page);
		$list_video = $this->VideoModel->get_id_video_bygenres($id, $this->branch, $page);
		$path_imgads = $this->VideoModel->get_path_imgads($this->branch);
		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);

		$head_data = [
			'branch' => $this->branch,  
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'category_id'=> $category_id, 
			'keyword_string' => $keyword_string, 
			'cate' => $category_id, 
			'path_imgads' => $path_imgads, 
			'setting' => $setting
		];

		$list_data_video = [
			'paginate' => $list_video,
			'category_id' => $category_id,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'cateRow' => $cateRow,
			'listyear' => $listyear,
			'title' => $title,
			'list_video_slider' => $list_video_slider['list']
		];

		echo view('av/templates/header', $head_data);
		echo view('av/list', $list_data_video);
		echo view('av/templates/footer');

	}

	public function video_search($keyword_string)
	{

		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$keyword_string = urldecode($keyword_string);
		$title = $keyword_string;
		$category_id = $this->VideoModel->get_category($this->branch);
		$listyear = $this->VideoModel->get_listyear($this->branch);
		$list_video_slider = $this->VideoModel->get_list_video_slider($this->branch, '', $page);

		$list_video = $this->VideoModel->get_list_video_search($keyword_string, $this->branch, $page);
		$path_imgads  = $this->VideoModel->get_path_imgads($this->branch);

		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);

		$head_data = [
			'branch' => $this->branch,  
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads ,
			'keyword_string' => $keyword_string, 
			'category_id' => $category_id,
			'setting' => $setting, 
		];
		echo view('av/templates/header', $head_data );

		$list_data_video = [
			'paginate' => $list_video,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'category_id' => $category_id,
			'listyear' => $listyear,
			'title' => $title,
			'list_video_slider' => $list_video_slider['list'],
			'path_imgads' => $path_imgads
			
		];

		echo view('av/list', $list_data_video);
		echo view('av/templates/footer');

	}


	// แจ้งหนังเสีย
	public function save_report($branch, $id, $reason)
	{
		$reason = urldecode($reason);
		$result = $this->VideoModel->save_reports($branch, $id, $reason);
		if ($result == true && is_bool($result)) {
			echo "OK";
		} else {
			echo "Error";
		}

	}


	//**************************************************************************** */
							//คลิปโป๊
	//**************************************************************************** */

	public function clip()
	{
		$page = 1;

		if (!empty($_GET['page'])) {

			$page = $_GET['page'];

		}
		$keyword_string = "";
		$list_video = $this->VideoModel->get_list_video_xvideo($this->branch, '', $page);
		$ads = $this->VideoModel->get_path_imgads($this->branch);
		$list_movie_recommend = $this->VideoModel->get_movie_new_recommend($this->branch, '', $page);
		$category_id = $this->VideoModel->get_category_xvideo($this->branch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->branch);

		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);

		$data = [
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'category_id' => $category_id,
			'list_video' => $list_video['list'],
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'cateRow' => array('category_name' => 'รายการหนัง'),
			'paginate' => $list_video,
			'backURL' => $this->backURL,
			'ads'  => $ads,
			'setting' => $setting,
			'new_movie_recom' => $list_movie_recommend['list'],
			'branch' => $this->branch,
			'path_imgads' => $path_imgads,
			'keyword_string' => ""
		];

		echo view('clip/templates/header', $data);
		echo view('clip/clip', $data);
		echo view('av/templates/footer');
	}

	public function video_clip($id, $typeplay)
	{
		$keyword_string = "";

	
		$cliprandom = $this->VideoModel->get_id_clip_random($this->branch);
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}
		$feildplay = "";
		$video_data = $this->VideoModel->get_id_video($id);
	 	$category_pagevideo= $this->VideoModel->showcategory_pagevideo($id);
		
		$category_id = $this->VideoModel->get_category_xvideo($this->branch);
		$path_livesteram = $this->VideoModel->get_path_livesteram();
		$path_imgads = $this->VideoModel->get_path_imgads($this->branch);
		$setting = $this->VideoModel->get_setting($this->branch);
		$listcontent = $this->VideoModel->get_listcontent($this->branch);
		// $video_interest = $this->VideoModel->get_video_interest($this->branch);
		
		$seo = $this->VideoModel->get_seo($this->branch);
		$name_video = $this->VideoModel->get_namevideo($id);
		$get_title = $this->VideoModel->get_title($this->branch);
		$get_img_og = $this->VideoModel->get_img_og($id);
		// $list_video = $this->VideoModel->get_list_video($this->branch, '', $page);
		// $listyear = $this->VideoModel->get_listyear($this->branch);

		$name_videos = $name_video['movie_thname'];
		$title_name = $get_title['setting_title'];
		$title = $seo['seo_title'];
		$description = $seo['seo_description'];
		$description_movie = $name_video['movie_des'];
		$discription_web = str_replace("{movie_description}", $description_movie, $description);
		$title_web = str_replace("{movie_title} - {title_web}", $name_videos . " - " . $title_name, $title);
		$vdorandom_clip = $this->VideoModel->get_id_video_random_clip($this->branch);
		if ($video_data['movie_sound'] == "thai" || $video_data['movie_sound'] == "") {

			if ($typeplay == "main") {
				$feildplay = 'movie_thmain';
			} else if ($typeplay == "sub1") {
				$feildplay = 'movie_thsub1';
			} else if ($typeplay == "sub2") {
				$feildplay = 'movie_thsub2';
			}
		} else {

			if ($typeplay == "main") {
				$feildplay = 'movie_enmain';
			} else if ($typeplay == "sub1") {
				$feildplay = 'movie_ensub1';
			} else if ($typeplay == "sub2") {
				$feildplay = 'movie_ensub2';
			}
		}
		$data = [
			'category_id' => $category_id,
			// 'listyear' => $listyear,
			'cliprandom' => $cliprandom,
			'video_data' => $video_data,
			'feildplay' => $feildplay,
			'base_backurl' => $this->base_backurl,
			// 'list_video' => $list_video['list'],
			'ads' => $path_imgads,
			'backURL' => $this->backURL,
			'setting' => $setting,
			'branch' => $this->branch,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string,
			'name_videos' => $name_videos,
			'title_name' => $title_name,
			'title' => $title,
			'description' => $description,
			'description_movie' => $description_movie,
			'discription_web' => $discription_web,
			'title_web' => $title_web,
			'get_img_og' => $get_img_og,
			// 'video_interest' => $video_interest,
			'category_pagevideo' => $category_pagevideo,
			'vdorandom_clip' => $vdorandom_clip
		];

	
		echo view('clip/templates/header-clip',$data);
		echo view('clip/video-clip',$data);
		echo view('av/templates/footer');

		// $this->CountModel->movie_view($id);
	}

	public function video_genres_clip($id, $name)
	{
		$title = urldecode($name);
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}
		$keyword_string = "";
		$category_id = $this->VideoModel->get_category_xvideo($this->branch);
		$list_video = $this->VideoModel->get_id_video_bygenres_clip($id, $this->branch, $page, $title);
		$path_imgads = $this->VideoModel->get_path_imgads($this->branch);
		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);

		$head_data = [
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'category_id'=> $category_id, 
			'branch' => $this->branch, 
			'keyword_string' => $keyword_string, 
			'cate' => $category_id, 
			'path_imgads' => $path_imgads, 
			'setting' => $setting
		];
		
		$list_data_video = [
			'paginate' => $list_video,
			'category_id' => $category_id,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'title' => $title,
		];

		echo view('clip/templates/header', $head_data);
		echo view('clip/list', $list_data_video);
		echo view('av/templates/footer');

	}


	public function clip_search($keyword_string)
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$keyword_string = urldecode($keyword_string);
		$title = $keyword_string;
		$category_id = $this->VideoModel->get_category_xvideo($this->branch);
		$list_video = $this->VideoModel->get_list_clip_search($keyword_string, $this->branch, $page);
		$path_imgads = $this->VideoModel->get_path_imgads($this->branch);
		$setting = $this->VideoModel->get_setting($this->branch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);

		$head_data = [
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'ads' => $path_imgads, 
			'branch' => $this->branch, 
			'keyword_string' => $keyword_string, 
			'category_id' => $category_id, 
			'path_imgads' => $path_imgads, 
			'setting' => $setting, 
		];

		echo view('clip/templates/header', $head_data);
		
		$list_data_video = [
			'paginate' => $list_video,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'category_id' => $category_id,
			'title' => $title,
			'ads' => $path_imgads
		];

		echo view('clip/list', $list_data_video);
		echo view('av/templates/footer', $list_data_video);

	}

	// Add movie view
	public function save_movie_view($movie_id, $branch)
	{
		$this->VideoModel->movie_view($movie_id,$branch);
	}

	
}

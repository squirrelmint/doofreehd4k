<?php namespace App\Controllers;
use App\Models\Av_Model;

class Av extends BaseController
{

	protected $base_backurl;
	public $img_backurl = "img_movies/";
	public $avavbranch = '';
	public $path_setting = '';
	public $backURL = "http://localhost:9999/";

	public function __construct()
	{

		$config = new \Config\App();
		$this->docavURL = $config->docavURL;
		$this->path_fillmovies = "/assets/video/";
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->VideoModel = new Av_Model();
	
		$this->avbranch = 2;

		// Directory
		$this->path_ads = $this->backURL . 'banner/';
		$this->path_setting = $this->backURL . 'setting/';

		helper(['url', 'avpagination']);
	}

	public function index()
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$list_video = $this->VideoModel->get_list_video($this->avbranch, '', $page);
		$list_movie_recommend = $this->VideoModel->get_movie_new_recommend($this->avbranch, '1');
		$category_id = $this->VideoModel->get_category($this->avbranch, 'av');
		// $path_imgads = $this->VideoModel->get_adstop($this->avbranch);
		$setting = $this->VideoModel->get_setting($this->avbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$listyear = $this->VideoModel->get_listyear($this->avbranch);
		$video_interest = $this->VideoModel->get_video_interest($this->avbranch);

		$data = [
			'docavURL' => $this->docavURL,
			'backURL' => $this->backURL,
			'img_backurl' => $this->img_backurl,
			'path_setting' => $this->path_setting,
			'category_id' => $category_id,
			'list_video' => $list_video['list'],
			'cateRow' => array('category_name' => 'รายการหนัง'),
			'paginate' => $list_video,
			'setting' => $setting,
			'new_movie_recom' => $list_movie_recommend['list'],
			'listyear' => $listyear,
			'branch' => $this->avbranch,
			'keyword_string' => "",
			'video_interest' => $video_interest
		];

		echo view('av/templates/header.php', $data);
		echo view('av/index.php');
		echo view('av/templates/footer.php');
	}
	//--------------------------------------------------------------------

	public function video($id, $typeplay)
	{
		$keyword_string = "";
		$vdorandom = $this->VideoModel->get_id_video_random($this->avbranch);

		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$feildplay = "";
		$video_data = $this->VideoModel->get_id_video($id);
		$category_id = $this->VideoModel->get_category($this->avbranch);
		$this->VideoModel->movie_view($id);
		$path_imgads = $this->VideoModel->get_path_imgads($this->avbranch);
		$list_video = $this->VideoModel->get_list_video($this->avbranch, '', $page);
		$listyear = $this->VideoModel->get_listyear($this->avbranch);
		$video_interest = $this->VideoModel->get_video_interest($this->avbranch);
		
		$setting = $this->VideoModel->get_setting($this->avbranch);
		$setting['setting_img'] = $video_data['movie_picture'];
		$seo = $this->VideoModel->get_seo($this->avbranch);

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
			'category_id' => $category_id,
			'listyear' => $listyear,
			'vdorandom' => $vdorandom,
			'video_data' => $video_data,
			'feildplay' => $feildplay,
			'base_backurl' => $this->base_backurl,
			'list_video' => $list_video['list'],
			'ads' => $path_imgads,
			'backURL' => $this->backURL,
			'setting' => $setting,
			'branch' => $this->avbranch,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string,
			'name_videos' => $name_videos,
			'video_interest' => $video_interest
		];

		


		echo view('av/templates/header.php',$data);
		echo view('av/video.php');
		echo view('av/templates/footer.php');
	}
	
	public function player($id, $filed = "")
	{
		$video_data = $this->VideoModel->get_id_video($id);

		$adsvideo_data = $this->VideoModel->get_adsvideolist($this->base_backurl);

		if ($filed == "") {
			$filed = 'movie_thmain';
		}

		$data = [
			'video_data' => $video_data,
			'url_play'	=> $video_data[$filed],
			'adsvideo'		=> $adsvideo_data,
			'base_backurl' => $this->base_backurl,
			'branch' => $this->avbranch
		];

		echo view('player', $data);
	}
}

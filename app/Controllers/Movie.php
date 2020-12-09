<?php
namespace App\Controllers;
use App\Models\Video_Model;

class Movie extends BaseController
{
	protected $base_backurl;
	public $path_setting = "";
	public $path_ads = "";
	public $img_backurl = "img_movies/";
	public $mvbranch = '';
	public $backURL = "http://localhost:9999/";

	public function __construct()
	{
		$config = new \Config\App();
		$this->docmvURL = $config->docmvURL;

		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->VideoModel = new Video_Model();
		$this->mvbranch = 1;


		// Directory
		$this->path_ads = $this->backURL . 'banner/';
		$this->path_setting = $this->backURL . 'setting/';

		helper(['url', 'pagination']);
	}

	public function index()
	{

		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);
		$keyword_string = "";

		$header_data = [
			'branch' => $this->mvbranch,
			'setting' => $setting,
			'docmvURL' => $this->docmvURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];
	
		$list_video = $this->VideoModel->get_list_video($this->mvbranch, '', $page);
		$ads = $this->VideoModel->get_path_imgads($this->mvbranch);
		$list_movie_recommend = $this->VideoModel->get_movie_new_recommend($this->mvbranch, '', $page);
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		
		$catereq = [6, 7, 28];
		foreach ($catereq as $val) {
			$video_interest[] = $this->VideoModel->get_list_video_bycate($this->mvbranch, $val);
		}

		$body_data = [
			'category_id' => $category_id,
			'list_video' => $list_video['list'],
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'cateRow' => array('category_name' => 'รายการหนัง'),
			'paginate' => $list_video,
			'ads'  => $ads,
			'new_movie_recom' => $list_movie_recommend['list'],
			'listyear' => $listyear,
			'video_interest' => $video_interest
		];

		echo view('movie/templates/header.php', $header_data);
		echo view('movie/index.php', $body_data);
		echo view('movie/templates/footer.php');
	}

	//--------------------------------------------------------------------
	public function zoom()
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$keyword_string = "";
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$listzoom = $this->VideoModel->get_list_video_zoom($this->mvbranch, $page);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);
		
		$header_data = [
			'branch' => $this->mvbranch,
			'docmvURL' => $this->docmvURL,
			'setting' => $setting,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];

		echo view('movie/templates/header', $header_data);

		$body_data = [
			'movie' => $listzoom,
			'category_id' => $category_id,
			'listyear' => $listyear,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl
		];

		echo view('zoom', $body_data);
		echo view('templates/footer');
	}

	public function video_bycate($id, $name)
	{
		$title = urldecode($name);
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);
		$keyword_string = "";
		$list_video = $this->VideoModel->get_id_video_bycategory($id, $this->mvbranch , $page);

		$header_data = [
			'branch' => $this->mvbranch,
			'docmvURL' => $this->docmvURL,
			'setting' => $setting,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string,
			
		];

		echo view('movie/templates/header', $header_data);

		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$cateRow = $this->VideoModel->get_caterow($id);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);
		
		$list_data_video = [
			'list_video' => $list_video['list'],
			'paginate' => $list_video,
			'category_id' => $category_id,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'cateRow' => $cateRow,
			'listyear' => $listyear,
			'title' => $title,
		];
		
		echo view('movie/list', $list_data_video);
		echo view('movie/templates/footer');
	}

	public function video_byyear($id)
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);
		$keyword_string = "";
		
		$header_data = [
			'branch' => $this->mvbranch,
			'setting' => $setting,
			'docmvURL' => $this->docmvURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];

		echo view('movie/templates/header', $header_data);
		
		$title = $id;
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$cateRow = ['category_name' => $id];
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		$list_video = $this->VideoModel->get_id_video_byyear($id, $this->mvbranch , $page);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);

		$body_data = [
			'paginate' => $list_video,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'cateRow' => $cateRow,
			'category_id' => $category_id,
			'listyear' => $listyear,
			'title' => $title,
		];

		echo view('movie/list', $body_data);
		echo view('movie/templates/footer');
	}

	public function DateThai($strDate)
	{
		$strYear = date("Y", strtotime($strDate)) + 543;
		$strMonth = date("n", strtotime($strDate));
		$strDay = date("j", strtotime($strDate));
		$strHour = date("H", strtotime($strDate));
		$strMinute = date("i", strtotime($strDate));
		$strSeconds = date("s", strtotime($strDate));
		$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
		$strMonthThai = $strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}

	public function series($id, $title)
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}
		$keyword_string = "";
		$series = $this->VideoModel->get_ep_series($id);
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $series['movie_picture'];
		$seo = $this->VideoModel->get_seo($this->mvbranch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);	
		if(!empty($seo)){
			if(!empty($seo['seo_title'])){
				$title = $seo['seo_title'];
				$name_videos = $series['movie_thname'];
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
				$description_movie = $series['movie_des'];
				$setting['setting_description'] = str_replace("{movie_description}", $description_movie, $description);
			}
			
		}

		$header_data = [
			'branch' => $this->mvbranch,
			'docmvURL' => $this->docmvURL,
			'setting' => $setting,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];

		echo view('movie/templates/header', $header_data);

		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		$vdorandom = $this->VideoModel->get_id_video_random($this->mvbranch);

		if ( !empty($video_data['movie_thmain']) ) {
			$feildplay = 'movie_thmain';
		} else if ( !empty($video_data['movie_thsub1']) ) {
			$feildplay = 'movie_thsub1';
		} else if ( !empty($video_data['movie_thsub2']) ) {
			$feildplay = 'movie_thsub2';
		} else if ( !empty($video_data['movie_enmain']) ) {
			$feildplay = 'movie_enmain';
		} else if ( !empty($video_data['movie_ensub1']) ) {
			$feildplay = 'movie_ensub1';
		} else if ( !empty($video_data['movie_ensub2']) ) {
			$feildplay = 'movie_ensub2';
		}else{
			$feildplay = '';
		}

		$body_data = [
			'category_id' => $category_id,
			'listyear' => $listyear,
			'vdorandom' => $vdorandom,
			'video_data' => $series,
			'feildplay' => $feildplay,
			'ads' => $path_imgads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];
		
		echo view('movie/series', $body_data);
		echo view('movie/templates/footer');
	}

	public function video_series($series_id, $title, $index, $ep_name)
	{

		$keyword_string = "";
		$series = $this->VideoModel->get_ep_series($series_id);
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $series['movie_picture'];
		$seo = $this->VideoModel->get_seo($this->mvbranch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);	

		if(!empty($seo)){
			if(!empty($seo['seo_title'])){
				$title = $seo['seo_title'];
				$name_videos = $series['movie_thname'];
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
				$description_movie = $series['movie_des'];
				$setting['setting_description'] = str_replace("{movie_description}", $description_movie, $description);
			}
			
		}
		// echo '<pre>'.print_r($series ,true).'</pre>';die;
		
		$header_data = [
			'branch' => $this->mvbranch,
			'docmvURL' => $this->docmvURL,
			'setting' => $setting,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];
		echo view('movie/templates/header', $header_data);
		
		$vdorandom = $this->VideoModel->get_id_video_random($this->mvbranch);
		$feildplay = "";
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		if ( !empty($video_data['movie_thsub1']) ) {
			$feildplay = 'movie_thsub1';
		} else if ( !empty($video_data['movie_thsub2']) ) {
			$feildplay = 'movie_thsub2';
		} else if ( !empty($video_data['movie_enmain']) ) {
			$feildplay = 'movie_enmain';
		} else if ( !empty($video_data['movie_ensub1']) ) {
			$feildplay = 'movie_ensub1';
		} else if ( !empty($video_data['movie_ensub2']) ) {
			$feildplay = 'movie_ensub2';
		}else{
			$feildplay = 'movie_thmain';
		}

		$body_data = [
			'index' => $index,
			'category_id' => $category_id,
			'listyear' => $listyear,
			'vdorandom' => $vdorandom,
			'video_data' => $series,
			'feildplay' => $feildplay,
			'ads' => $path_imgads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];
		
		echo view('movie/video', $body_data);
		echo view('movie/templates/footer');
		//add view
		$this->VideoModel->movie_view($series_id);
	}

	public function video($id, $typeplay)
	{

		$keyword_string = "";
		$video_data = $this->VideoModel->get_id_video($id);
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $video_data['movie_picture'];
		$seo = $this->VideoModel->get_seo($this->mvbranch);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);	

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

		$header_data = [
			'branch' => $this->mvbranch,
			'docmvURL' => $this->docmvURL,
			'setting' => $setting,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string,
			'index' => ""
		];

		echo view('movie/templates/header', $header_data);
		$feildplay = "";
		
		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		$vdorandom = $this->VideoModel->get_id_video_random($this->mvbranch);

		if ( !empty($video_data['movie_thmain']) ) {
			$feildplay = 'movie_thmain';
		} else if ( !empty($video_data['movie_thsub1']) ) {
			$feildplay = 'movie_thsub1';
		} else if ( !empty($video_data['movie_thsub2']) ) {
			$feildplay = 'movie_thsub2';
		} else if ( !empty($video_data['movie_enmain']) ) {
			$feildplay = 'movie_enmain';
		} else if ( !empty($video_data['movie_ensub1']) ) {
			$feildplay = 'movie_ensub1';
		} else if ( !empty($video_data['movie_ensub2']) ) {
			$feildplay = 'movie_ensub2';
		}

		$body_data = [
			'category_id' => $category_id,
			'listyear' => $listyear,
			'vdorandom' => $vdorandom,
			'video_data' => $video_data,
			'feildplay' => $feildplay,
			'ads' => $path_imgads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];

		echo view('movie/video', $body_data);
		echo view('movie/templates/footer');

		$this->VideoModel->movie_view($id);
	}
	
	
	public function player($id, $filed = "", $index = "")
	{	
		if ($filed == "") {
			$filed = 'movie_thmain';
		}

		if ($index != "") {
			$video_data = $this->VideoModel->get_ep_series($id);
			$urlplay =$video_data['ep_thmai'][$index] ;
		}else{
			$video_data = $this->VideoModel->get_id_video($id);
			$urlplay = $video_data[$filed];
		}
		$adsvideo_data = $this->VideoModel->get_adsvideolist($this->backURL);

		$data = [
			'video_data' 	=> $video_data,
			'docmvURL' => $this->docmvURL,
			'url_play'		=> $urlplay,
			'adsvideo'		=> $adsvideo_data,
			'backUrl'	=> $this->backURL,
			'branch' 		=> $this->mvbranch
		];

		echo view('movie/player', $data);
	}
	public function video_search($keyword_string)
	{
		$page = 1;
		if (!empty($_GET['page'])) {
			$page = $_GET['page'];
		}

		$keyword_string = urldecode($keyword_string);
		$title = $keyword_string;
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		$setting['setting_description'] = str_replace("{date}", $this->DateThai(gmdate('Y-m-d H:i:s')), $setting['setting_description']);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);

		$header_data = [
			'branch' => $this->mvbranch,
			'setting' => $setting,
			'docmvURL' => $this->docmvURL,
			'backURL' => $this->backURL,
			'path_setting' => $this->path_setting,
			'path_ads' => $this->path_ads,
			'path_imgads' => $path_imgads,
			'keyword_string' => $keyword_string
		];

		echo view('movie/templates/header', $header_data);

		$category_id = $this->VideoModel->get_category($this->mvbranch);
		$listyear = $this->VideoModel->get_listyear($this->mvbranch);
		$list_video = $this->VideoModel->get_list_video_search($keyword_string, $this->mvbranch , $page);
		$path_imgads = $this->VideoModel->get_path_imgads($this->mvbranch);

		$body_data = [
			'paginate' => $list_video,
			'base_backurl' => $this->base_backurl,
			'img_backurl' => $this->img_backurl,
			'category_id' => $category_id,
			'listyear' => $listyear,
			'title' => $title
		];

		echo view('movie/list', $body_data);
		echo view('movie/templates/footer');

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

	// ขอหนัง
	public function save_request($branch, $movie)
	{
		$movie = urldecode($movie);
		$result = $this->VideoModel->save_requests($branch, $movie);
		if ($result == true && is_bool($result)) {
			echo "OK";
		} else {
			echo "Error";
		}
	}

}

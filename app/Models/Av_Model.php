<?php namespace App\Models;
use CodeIgniter\Model;

class Av_Model extends Model
{

    protected $table_movie = 'av_movie';
    protected $table_category = 'av_category';
    protected $mo_moviecate = 'av_moviecate';
    protected $mo_moviegenres = 'av_moviegenres';
    protected $table_vdoads = 'av_adsvideo';
    protected $pathAdsVideo = 'movie/adsvdo';
    protected $ads = 'ads';
    protected $report_movie = 'movie_report';
    protected $setting = 'setting';
    protected $content = 'content';
    protected $mo_request = 'mo_request';
    protected $mo_adscontact = 'mo_adscontact';
    protected $mo_contact = 'mo_contact';
    protected $seo = 'seo';
    public $backURL = "http://localhost:999/";

    public function __construct()
    {

        parent::__construct();
        $db = \Config\Database::connect();







        $this->path_filelogo = "logo";
    }















    function get_adsvideolist($backurl)







    {















        $sql = "SELECT 







					$this->table_vdoads.adsvideo_id,







					$this->table_vdoads.adsvideo_name,







					$this->table_vdoads.adsvideo_status,







					$this->table_vdoads.adsvideo_url as url,







					$this->table_vdoads.branch_id,







                    (







                        CASE







                        WHEN $this->table_vdoads.adsvideo_video IS NOT NULL THEN







                            CONCAT(







                                '$backurl',







                                '$this->pathAdsVideo',







                                '/',







                                $this->table_vdoads.adsvideo_video







                            )







                        END







                    ) AS 'file'







				FROM







					$this->table_vdoads







				WHERE $this->table_vdoads.branch_id = '1' AND $this->table_vdoads.adsvideo_status = 1";















        //echo $sql;die;







        $query = $this->db->query($sql);















        return $query->getResultArray();
    }

    // เรียก Category ตาม Branch 
    public function get_category($branch_id) 
    {
        $sql = "SELECT
            *
            FROM
                $this->table_category
            INNER JOIN $this->mo_moviecate ON $this->mo_moviecate.category_id = $this->table_category.category_id
            INNER JOIN $this->table_movie ON $this->mo_moviecate.movie_id = $this->table_movie.movie_id
            WHERE
                `$this->table_category`.branch_id = '$branch_id' AND $this->table_movie.movie_active = '1' AND $this->table_movie.movie_type='av'
            GROUP BY $this->table_category.category_id";
            //print_r($sql);die;
        $query = $this->db->query($sql, [$branch_id]);
        return $query->getResultArray();
    }

    public function get_caterow($cate_id) // เรียก Category ตาม Branch 







    {















        $sql = "SELECT







            *







            FROM







            $this->table_category







            WHERE







            `$this->table_category`.category_id = ?";







        $query = $this->db->query($sql, [$cate_id]);







        return $query->getRowArray();
    }















    public function get_list_video($branchid, $keyword = "", $page = 1)







    {







        $sql_where = " ";















        if ($keyword != "") {







            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }















        $sql = "SELECT



                    *



                FROM



                    $this->table_movie



                WHERE



                    `$this->table_movie`.branch_id = '$branchid'



                    AND `$this->table_movie`.movie_type = 'av' 



                    AND $this->table_movie.movie_active = '1' " .



            $sql_where .



            "ORDER BY `$this->table_movie`.movie_id DESC";




        $query = $this->db->query($sql);







        $total = count($query->getResultArray());





        $perpage = 24;















        // return $query->getResultArray();







        return get_pagination($sql, $page, $perpage, $total);
    }


    public function get_list_video_slider($branchid, $keyword = "", $page = 1)
    {
        $sql_where = " ";
        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }
        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branchid'
                    AND `$this->table_movie`.movie_type = 'av' 
                    AND $this->table_movie.movie_active = '1' " .
                    $sql_where .
                    "ORDER BY RAND()";
        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 12;
        // return $query->getResultArray();
        return get_pagination($sql, $page, $perpage, $total);
    }











    public function get_list_new_movie($branchid, $keyword = "", $page = 1)







    {







        $sql_where = " ";















        if ($keyword != "") {







            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }















        $sql = "SELECT



                    *



                FROM



                    $this->table_movie



                WHERE



                    `$this->table_movie`.branch_id = '$branchid'



                    AND `$this->table_movie`.movie_type = 'mo' 



                    AND $this->table_movie.movie_active = '1' " .



            $sql_where .



            "ORDER BY `$this->table_movie`.movie_year DESC";















        // print_r($sql);die;







        $query = $this->db->query($sql);







        $total = count($query->getResultArray());







        $perpage = 12;















        // return $query->getResultArray();







        return get_pagination($sql, $page, $perpage, $total);
    }















    public function get_movie_new_recommend($branchid, $keyword = "", $page = 1)







    {



        $sql_where = " ";















        if ($keyword != "") {







            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }















        $sql = "SELECT



                    *



                FROM



                    $this->table_movie



                WHERE



                    `$this->table_movie`.branch_id = '$branchid'  



                    AND `$this->table_movie`.movie_active = '1' " .



            $sql_where;





        $query = $this->db->query($sql);







        $total = count($query->getResultArray());







        $perpage = 10;















        // return $query->getResultArray();







        return get_pagination($sql, $page, $perpage, $total);
    }















    //Get video 







    public function get_movie_page_video($branchid)







    {











        $sql = "SELECT



                    *



                FROM



                    $this->table_movie



                WHERE



                    `$this->table_movie`.branch_id = '$branchid' 



                    AND `$this->table_movie`.movie_active = '1' ";















        //print_r()







        $query = $this->db->query($sql);







        // $total = count($query->getResultArray());







        // $perpage = 10;















        return $query->getResultArray();







        //return get_pagination($sql, $perpage,$total) ;















    }















    // Get video_movie







    public function get_id_video($id)

    {

        $sql = "SELECT

                    *

                FROM

                    `$this->table_movie`

                WHERE

                    `$this->table_movie`.movie_id = ? 

                    AND `$this->table_movie`.movie_active = '1'";

        $query = $this->db->query($sql, [$id]);



        return $query->getRowArray();
    }







    // Get video_series







    public function get_id_series($id)







    {







        $sql = "SELECT







                    *







                FROM







                    `$this->table_scouce1`







                INNER JOIN `$this->table_movie` ON `$this->table_scouce1`.movie_id = `$this->table_movie`.movie_id







                WHERE







                `$this->table_scouce1`.movie_id = ? ";















        $query = $this->db->query($sql, [$id]);







        //echo $sql;die;







        return $query->getRowArray();
    }















































    public function get_path_imgads($branch_id)
    {
        $sql = "SELECT * FROM  `$this->ads` WHERE branch_id = '$branch_id'";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }















    //Get database livestream







    public function  get_path_livesteram()







    {







        $sql = "SELECT * FROM `$this->live_stream`";







        $query = $this->db->query($sql);







        // echo $sql;die;







        return $query->getResultArray();
    }















    //Get video livestream







    public function  get_video_livesteram($id)







    {







        $sql = "SELECT * FROM `$this->live_stream`







        WHERE







             `$this->live_stream`.livestream_id = ?";







        $query = $this->db->query($sql, [$id]);







        // echo $sql;die;







        return $query->getRowArray();
    }































    //Get setting show fontend 







    public function  get_setting($branch_id)







    {







        $sql = "SELECT * FROM `$this->setting` WHERE branch_id = '$branch_id' ";







        $query = $this->db->query($sql);







        return $query->getRowArray();
    }















    //Get Content







    public function  get_content($branch_id, $id)







    {







        $sql = "SELECT * FROM `$this->content` WHERE branch_id = '$branch_id' AND content_id  = '$id' ";







        $query = $this->db->query($sql);







        return $query->getRowArray();
    }















    //Get List Content







    public function  get_listcontent($branch_id)







    {







        $sql = "SELECT * FROM `$this->content` WHERE branch_id = '$branch_id'";







        $query = $this->db->query($sql);







        return $query->getResultArray();
    }















    //Get Seo







    public function  get_seo($branch_id)







    {







        $sql = "SELECT * FROM `$this->seo` WHERE branch_id = '$branch_id'";







        $query = $this->db->query($sql);







        return $query->getRowArray();
    }























    //Get Name video







    public function get_namevideo($id)







    {







        $sql = "SELECT movie_thname,movie_des FROM `$this->table_movie` WHERE movie_id = '$id'";







        $query = $this->db->query($sql);







        return $query->getRowArray();
    }























    //Get Name video







    public function get_title($branch)







    {







        $sql = "SELECT setting_title,setting_description FROM `$this->setting` WHERE branch_id = '$branch'";







        $query = $this->db->query($sql);







        return $query->getRowArray();
    }















    //Get Img_og







    public function get_img_og($id)







    {







        $sql = "SELECT movie_picture FROM `$this->table_movie` WHERE movie_id = '$id' ";







        $query = $this->db->query($sql);







        return $query->getRowArray();
    }















    public function  get_listyear($branch_id)



    {







        $sql = "SELECT 



                    movie_year 



                FROM `$this->table_movie` 



                WHERE branch_id = '$branch_id' AND `$this->table_movie`.movie_active = '1'



                GROUP BY movie_year



                ORDER BY movie_year DESC ";







        $query = $this->db->query($sql);























        return $query->getResultArray();
    }















    public function get_id_video_bycategory($id, $branch_id, $page = 1, $keyword = "")



    {



        $sql_where = "";



        if ($keyword != "") {



            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }



        $sql = "SELECT



                    *



                FROM



                    mo_moviecate



                INNER JOIN mo_movie ON mo_moviecate.movie_id = mo_movie.movie_id 



                WHERE 



                    mo_moviecate.category_id = '$id' 



                    AND mo_moviecate.branch_id = '$branch_id'



                    AND `$this->table_movie`.movie_active = '1' ";







        $query = $this->db->query($sql);



        $total = count($query->getResultArray());



        $perpage = 20;



        // return $query->getResultArray();







        return get_pagination($sql, $page, $perpage, $total);
    }


    public function get_id_video_bygenres($id, $branch_id, $page = 1)
    {

        $sql = "SELECT $this->table_movie.*
                FROM $this->table_movie 
                JOIN $this->mo_moviecate ON $this->table_movie.movie_id = $this->mo_moviecate.movie_id 
                WHERE 
                    $this->mo_moviecate.category_id = '$id'
                    AND $this->table_movie.movie_active = '1' 
                    AND $this->table_movie.branch_id = '$branch_id'
                ";

        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 24;

        return get_pagination($sql, $page, $perpage, $total);
    }


    public function showcategory_pagevideo($id)
    {
        $sql = " SELECT $this->table_category.category_id ,$this->table_category.category_name 
                    FROM $this->mo_moviecate
                    JOIN $this->table_category 
                    ON $this->table_category.category_id = $this->mo_moviecate.category_id 
                    WHERE $this->mo_moviecate.movie_id = '$id' LIMIT 4";
       $query = $this->db->query($sql);
       return $query->getResultArray();
    }

    public function get_id_video_byyear($id, $branch_id, $page = 1, $keyword = "")


    {







        // die;







        $sql_where = " ";















        if ($keyword != "") {







            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }







        $sql = "SELECT







          *







       FROM







           mo_movie







       







       WHERE movie_year = $id AND branch_id = '$branch_id' ";















        $sql .= " ORDER BY `$this->table_movie`.movie_year DESC ";























        //print_r()







        $query = $this->db->query($sql);







        $total = count($query->getResultArray());







        $perpage = 28;















        // return $query->getResultArray();







        return get_pagination($sql, $page, $perpage, $total);
    }







    public function get_id_video_random($branch_id)







    {







        $sql = "SELECT



                    *



                FROM



                    `$this->table_movie`



                WHERE



                    `$this->table_movie`.branch_id = '$branch_id'

                    AND `$this->table_movie`.movie_type = 'av'

                    AND `$this->table_movie`.movie_active = '1'



                ORDER BY RAND()  limit 8";































        $query = $this->db->query($sql);















        //   print_r()







        return $query->getResultArray();
    }







    //แจ้งหนังเสีย
    public function save_reports($branch, $id, $reason)
    {

        $bd =  $this->db->table($this->report_movie);

        $date =  date("Y-m-d");
        $this->db->transBegin();

        $data =  [
            'movie_id' =>  $id,
            'branch_id' => $branch,
            'reason' => $reason
        ];

        try {
            if ($bd->insert($data) == true) {
                $this->db->transCommit();
                return true;
            }
        } catch (\Exception $e) {
            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            return $e->getMessage();
        }
    }



    public function get_list_video_search($keyword = "", $branch_id, $page)
    {
        $sql_where = " ";
        if ($keyword != "") {
            $sql_where =" AND CONCAT(`$this->table_movie`.movie_thname,`$this->table_movie`.actor) LIKE '%$keyword%' ";
        }
        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branch_id' 
                    AND `$this->table_movie`.movie_type = 'av'
                    AND `$this->table_movie`.movie_active = '1' $sql_where ";

        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 18;
                    // return $query->getResultArray();
        return get_pagination($sql, $page, $perpage, $total);
    }






    //ขอหนัง 
    public function save_requests($branch, $movie)
    {
        $bd =  $this->db->table($this->mo_request);
        $this->db->transBegin();
        $data =  [
            'branch_id' => $branch,
            'mo_request' => $movie
        ];
        try {
            if ($bd->insert($data) == true) {
                $this->db->transCommit();
                return true;
            }
        } catch (\Exception $e) {
            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            return $e->getMessage();
        }
    }











    //ติดต่อลงโฆษณา 
    public function save_contact_data($namesurname, $email, $lineid, $phone, $branch_id)
    {
        $bd =  $this->db->table($this->mo_adscontact);
        $this->db->transBegin();
        $data =  [
            'mo_adscontact_namesurname' => $namesurname,
            'mo_adscontact_email' => $email,
            'mo_adscontact_lineid' => $lineid,
            'mo_adscontact_phone' => $phone,
            'mo_adscontact_branch_id' => $branch_id
        ];
        try {
            if ($bd->insert($data) == true) {
                $this->db->transCommit();
                return true;
            }
        } catch (\Exception $e) {
            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            return $e->getMessage();
        }
    }
    //ติดต่อ
    public function save_contact($contact, $branch_id)
    {
        $bd =  $this->db->table($this->mo_contact);
        $this->db->transBegin();
        $data =  [
            'mo_contact_data' => $contact,
            'mo_contact_branch_id' => $branch_id,
        ];
        try {
            if ($bd->insert($data) == true) {
                $this->db->transCommit();
                return true;
            }
        } catch (\Exception $e) {
            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            return $e->getMessage();
        }
    }
    // นับจำนวนผู้ชม

    public function movie_view($movie_id, $branch)
    {
        $sql = "SELECT
                    `$this->table_movie`.movie_id,`$this->table_movie`.movie_view
                FROM
                    $this->table_movie
                    WHERE`$this->table_movie`.movie_id = '$movie_id'
                ";

        $query = $this->db->query($sql);
        $data = $query->getResultArray();

        
        if ($data[0]['movie_view'] == 0) {
            $movie_view = 1;
        } else {
            $movie_view = $data[0]['movie_view'] + 1;
        }

        // print_r($movie_view);die;
     
        $this->db->transBegin();
        $builder = $this->db->table($this->table_movie);
        $builder->where('movie_id', $movie_id);
       
        $dataadd =  [
            'movie_view' =>  $movie_view
        ];

        try {
            if ($builder->update($dataadd) == true) {
                $this->db->transCommit();
                // return true;
            }
        } catch (\Exception $e) {
            // throw new Exception("Error Insert user", 1);
            $this->db->transRollback();
            // return $e->getMessage();
        }
        // return $movie_view;
    }
    //หนังที่น่สนใจ 2 
    public function get_video_interest($branch)

    {
        $this->db->simpleQuery('SET @@group_concat_max_len = 100000');
        $sql = "SELECT
            mo_category.category_id,
            mo_category.category_name,
            GROUP_CONCAT(
            mo.movie_id,
            '{-}',
            mo.movie_thname,
            '{-}',
            mo.movie_ratescore,
            '{-}',
            mo.movie_view,
            '{-}',
            mo.movie_year,
            '{-}',
            mo.movie_picture SEPARATOR '|'
            ) AS movie
            FROM
            mo_category
            LEFT JOIN (
            SELECT
            mo_movie.movie_id,
            mo_movie.movie_thname,
            mo_movie.movie_picture,
            mo_movie.movie_ratescore,
            mo_movie.movie_year,
            CASE
            WHEN mo_movie.movie_view IS NULL THEN
                '0'
            ELSE
                mo_movie.movie_view
            END AS movie_view,
            mo_moviecate.category_id
            FROM
            mo_movie
            INNER JOIN mo_moviecate ON mo_moviecate.movie_id = mo_movie.movie_id
            GROUP BY mo_movie.movie_id   
            ) mo ON mo.category_id = mo_category.category_id
            WHERE mo_category.branch_id = '$branch' AND mo.movie_id IS NOT NULL
            GROUP BY mo_category.category_id
            ORDER BY count(mo_category.category_id) DESC
            LIMIT 4 ";
        //echo $sql;die;
        $query = $this->db->query($sql);
        // $total = count($query->getResultArray());
        // $perpage = 5;
        return $query->getResultArray();
        //return get_pagination($sql, $page, $perpage, $total);
    }

    public function get_list_video_zoom($branchid, $page)
    {

        $sql = "SELECT 
                    * 
                FROM 
                    $this->table_movie 
                WHERE 
                    `$this->table_movie`.branch_id = '$branchid' 
                    AND LOWER(`$this->table_movie`.movie_quality) = 'zoom' 
                ORDER BY `mo_movie`.movie_id DESC";
        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 28;
        return get_pagination($sql, $page, $perpage, $total);
    }


 // ************************************************************************************************
                                                // คลิปโป๊
//************************************************************************************************ */

    public function get_list_video_xvideo($branchid, $keyword = "", $page = 1)
    {
        $sql_where = " ";
        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }
        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branchid'
                    AND `$this->table_movie`.movie_type = 'cl'
                    AND $this->table_movie.movie_active = '1' " .
            $sql_where .
            "ORDER BY `$this->table_movie`.movie_id DESC";
        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 54;
        // return $query->getResultArray();
        return get_pagination($sql, $page, $perpage, $total);
    }

    public function get_category_xvideo($branch_id) // เรียก Category ตาม Branch 
    {
        $sql = "SELECT
            *
            FROM
                $this->table_category
            INNER JOIN $this->mo_moviecate ON $this->mo_moviecate.category_id = $this->table_category.category_id
            INNER JOIN $this->table_movie ON $this->mo_moviecate.movie_id = $this->table_movie.movie_id
            WHERE
                `$this->table_category`.branch_id = ? AND $this->table_movie.movie_active = '1' AND  $this->table_category.category_type = 'cl'
            ORDER BY RAND()  limit 35
            ";
            $query = $this->db->query($sql, [$branch_id]);
            return $query->getResultArray();
    }

    //clip search
    public function get_list_clip_search($keyword = "", $branch_id, $page)
    {
        $sql_where = " ";
        if ($keyword != "") {
            $sql_where = " AND `$this->table_movie`.movie_thname LIKE '%$keyword%' ";
        }
        $sql = "SELECT
                    *
                FROM
                    $this->table_movie
                WHERE
                    `$this->table_movie`.branch_id = '$branch_id'
                     AND `$this->table_movie`.movie_active = '1' 
                    AND `$this->table_movie`.movie_type = 'cl'  $sql_where ";
        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 42;
        // return $query->getResultArray();
        return get_pagination($sql, $page, $perpage, $total);
    }


    // clip random
    public function get_id_clip_random($branch_id)

    {

        $sql = "SELECT

                `mo_movie`.*
                -- `mo_movie`.movie_id as mid
                FROM
                    `$this->table_movie`
               
                WHERE
                    `$this->table_movie`.branch_id = '$branch_id'
                    AND `$this->table_movie`.movie_active = '1' AND `$this->table_movie`.movie_type = 'cl'
                    ORDER BY RAND()  limit 4";

                    // print_r($sql);die;
                    $query = $this->db->query($sql);
                    // print_r($query->getResultArray());die;
                    return $query->getResultArray();
    }

    public function get_id_video_random_clip($branch_id)
    {
        $sql = "SELECT
                    *
                FROM
                    `$this->table_movie`
                WHERE

                    `$this->table_movie`.branch_id = '$branch_id'
                    AND `$this->table_movie`.movie_active = '1' AND `$this->table_movie`.movie_type = 'cl'
                ORDER BY RAND()  limit 12";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    // Genrate clip
    public function get_id_video_bygenres_clip($id, $branch_id, $page = 1, $keyword = "")
    {

        $sql = " SELECT $this->table_movie.*
                    FROM $this->table_movie 
                    JOIN $this->mo_moviecate 
                    ON $this->table_movie.movie_id = $this->mo_moviecate.movie_id 
                    WHERE 
                        $this->mo_moviecate.category_id = '$id'
                        AND $this->table_movie.movie_active = '1' 
                        AND $this->table_movie.branch_id = '$branch_id'
                        AND $this->table_movie.movie_type = 'cl'
                    ";
                    
        $query = $this->db->query($sql);
        $total = count($query->getResultArray());
        $perpage = 42;
        return get_pagination($sql, $page, $perpage, $total);
    }
}

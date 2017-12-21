<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //AWS access info start
        $this->load->library('S3');
        //AWS access info end
        include ('include.php');
    }

    //MAIN INDEX PAGE START   
    public function index($slug = '') {

        // blog category start
        $condition_array = array('status' => 'publish');
        $data = 'id,name';
        $this->data['blog_category'] = $this->common->select_data_by_condition('blog_category', $condition_array, $data, $short_by = '', $order_by = '', $limit = '', $offset = '', $join_str = array());
        // blog category end
        if ($slug != '') {

            $this->blog_check($slug);

            //FOR GETTING ALL DATA
            $condition_array = array('status' => 'publish');
            $this->data['blog_all'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit, $offset, $join_str = array());

            //FOR GETTING BLOG
            $condition_array = array('status' => 'publish', 'blog_slug' => $slug);
            $this->data['blog_detail'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit, $offset, $join_str = array());
            $blogid = $this->data['blog_detail'][0]['id'];
        $relatedid = explode(',',$this->data['blog_detail'][0]['blog_related_id']); 
       foreach($relatedid as $id){
            $condition_array = array('status' => 'publish', 'id' => $id);
            $blogs[] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit, $offset, $join_str = array());
           
       }
      $this->data['rand_blog'] = array_reduce($blogs, 'array_merge', array()); 
            //FOR GETTING 5 LAST DATA
            $condition_array = array('status' => 'publish');
            $this->data['blog_last'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());
            //random blog
            
            // random blog end 
            $this->load->view('blog/blogdetail', $this->data);
        } else {
            //THIS IF IS USED FOR WHILE SEARCH FOR RETRIEVE SAME PAGE START
            if ($this->input->get('q')) {

                $this->data['search_keyword'] = $search_keyword = trim($this->input->get('q'));


                $search_condition = "(title LIKE '%$search_keyword%' OR   description LIKE '%$search_keyword%')";
                $contition_array = array('status' => 'publish');
                $this->data['blog_detail'] = $this->common->select_data_by_search('blog', $search_condition, $contition_array, $data = '*', $sortby = 'id', $orderby = 'desc', $limit, $offset);
            }
            //THIS IF IS USED FOR WHILE SEARCH FOR RETRIEVE SAME PAGE END
            //FOR GETTING ALL DATA START
            else {
                $condition_array = array('status' => 'publish');
                $this->data['blog_detail'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());
                // echo "<pre>";print_r( $this->data['blog_detail']);die();
            }
            //FOR GETTING ALL DATA START
            //FOR GETTING 5 LAST DATA
            $condition_array = array('status' => 'publish');
            $this->data['blog_last'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());

            $this->load->view('blog/index', $this->data);
        }
    }

    //MAIN INDEX PAGE END   
    //READ MORE CLICK START
    public function popular() {

        $join_str[0]['table'] = 'blog';
        $join_str[0]['join_table_id'] = 'blog.id';
        $join_str[0]['from_table_id'] = 'blog_visit.blog_id';
        $join_str[0]['join_type'] = '';

        $condition_array = array('blog.status' => 'publish');
        $data = "blog.* ,count(blog_id) as count";
        $this->data['blog_detail'] = $this->common->select_data_by_condition('blog_visit', $condition_array, $data, $short_by = 'count', $order_by = 'desc', $limit, $offset, $join_str, $groupby = 'blog_visit.blog_id');

        //FOR GETTING 5 LAST DATA
        $condition_array = array('status' => 'publish');
        $this->data['blog_last'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());

        $this->load->view('blog/index', $this->data);
    }

    //READ MORE CLICK START
    public function read_more() {

        $id = $_POST['blog_id'];

        //FOR INSERT READ MORE BLOG START
        $data = array(
            'blog_id' => $id,
            'visiter_date' => date('Y-m-d H:i:s')
        );
        $insert_id = $this->common->insert_data_getid($data, 'blog_visit');

        //FOR INSERT READ MORE BLOG END

        if ($insert_id) {
            echo 1;
        } else {
            echo 0;
        }
    }

    //READ MORE CLICK END
    //BLOGDETAIL FOR PERICULAR ONE POST START
    public function blogdetail($slug = '') {
        //FOR GETTING ALL DATA
        $condition_array = array('status' => 'publish');
        $this->data['blog_all'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit, $offset, $join_str = array());

        //FOR GETTING BLOG
        $condition_array = array('status' => 'publish', 'blog_slug' => $slug);
        $this->data['blog_detail'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit, $offset, $join_str = array());

        //FOR GETTING 5 LAST DATA
        $condition_array = array('status' => 'publish');
        $this->data['blog_last'] = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());


        $this->load->view('blog/blogdetail', $this->data);
    }

    //BLOGDETAIL FOR PERICULAR ONE POST END
    //COMMENT INSERT BY USER START
    public function comment_insert() {
        $id = $_POST['blog_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        //FOR INSERT READ MORE BLOG START
        $data = array(
            'blog_id' => $id,
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'comment_date' => date('Y-m-d H:i:s'),
            'status' => 'pending'
        );

        $insert_id = $this->common->insert_data_getid($data, 'blog_comment');

        //FOR INSERT READ MORE BLOG END

        if ($insert_id) {
            echo 1;
        } else {
            echo 0;
        }
    }

    //COMMENT INSERT BY USER END
//SEARCH BY TAG START
//public function tagsearch($tag='')
//{
//        //FOR SEARCH DATA WITH TAG,DETAIL AND DESCRIPTION IN BLOG TABLE
//         $tag = str_replace("-"," ",$tag);
//      
//        $this->data['search_keyword']=$search_keyword = trim($tag);
//        $search_condition = "(title LIKE '%$search_keyword%' OR   description LIKE '%$search_keyword%' OR  tag LIKE '%$search_keyword%')";
//        $contition_array = array('status' => 'publish');
//        $this->data['blog_detail'] = $this->common->select_data_by_search('blog', $search_condition, $contition_array,$data='*', $sortby='id', $orderby='desc', $limit, $offset);
//
//         //FOR GETTING ALL DATA
//        $condition_array = array('status' => 'publish');
//        $this->data['blog_all']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());
//      
//          //FOR GETTING 5 LAST DATA
//          $condition_array = array('status' => 'publish');
//        $this->data['blog_last']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit=5, $offset, $join_str = array());
//
//          $this->load->view('blog/index',$this->data);
//}
//SEARCH BY TAG END
// blog available check start
    public function blog_check($slug = " ") {

        $condition_array = array('blog_slug' => $slug);
        $availblog = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = '', $order_by = '', $limit, $offset, $join_str = array(), $groupby = '');

        if (count($availblog) == NULL) {
            $this->load->view('blog/notavalible');
        }
    }

// blog available check start end
    // blog available check start
    public function blog_ajax() {

        // data start
        $perpage = 4;
        $page = 1;
        if (!empty($_GET["page"]) && $_GET["page"] != 'undefined') {
            $page = $_GET["page"];
        }
        // echo $page;
        $start = ($page - 1) * $perpage;
        if ($start < 0)
            $start = 0;

        $condition_array = array('status' => 'publish');
        $blog_detail = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = $perpage, $offset = $start, $join_str = array());
        $blog_detail1 = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = '', $offset = '', $join_str = array());

        if (empty($_GET["total_record"])) {
            $_GET["total_record"] = count($blog_detail1);
        }

        $blog_data = '';
        $blog_data .= '<input type = "hidden" class = "page_number" value = "' . $page . '" />';
        $blog_data .= '<input type = "hidden" class = "total_record" value = "' . $_GET["total_record"] . '" />';
        $blog_data .= '<input type = "hidden" class = "perpage_record" value = "' . $perpage . '" />';

        // data end

        foreach ($blog_detail as $blog) {

            $blog_data .= '<div class="blog_main_o">';
            //$blog_data .= $blog['id'];
            $blog_data .= '<div class="date_blog_left">
                                            <div class="blog-date-change">
                                                    <div class="blog-month blog-picker">
                                                        <span class="blog_monthd">';

            $date_time = new DateTime($blog['created_date']);
            $month = $date_time->format('M') . PHP_EOL;
            $blog_data .= $month;

            $blog_data .= '  </span>
                                                    </div>
                                                    <div>
                                                        <span class="blog_mdate">';

            $date = new DateTime($blog['created_date']);
            $blog_data .= $date->format('d') . PHP_EOL;

            $blog_data .= '</span>
                                                    </div>
                                                    <div class="blog-year blog-picker">
                                                        <span class="blog_moyear" >';

            $year = new DateTime($blog['created_date']);
            $blog_data .= $year->format('Y') . PHP_EOL;

            $blog_data .= '</span>
                                                    </div>
                                                </div>
                                                <div class="blog-left-comment">
                                                    <div class="blog-comment-count">
                                                        <a>';
            $condition_array = array('status' => 'approve', 'blog_id' => $blog['id']);
            $blog_comment = $this->common->select_data_by_condition('blog_comment', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());
            $blog_data .= count($blog_comment);

            $blog_data .= '</a>
                                                    </div>
                                                    <div class="blog-comment">
                                                        <a>Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="date_blog_right">
                                                <div class="blog_post_main">
                                                    <div class="blog_inside_post_main">
                                                        <div class="blog_main_post_first_part">
                                                            <div class="blog_main_post_img">';
            $blog_data .= '<a target="_blank" href="' .
                    base_url('blog/' . $blog['blog_slug']) . '"> <img src="' . base_url($this->config->item('blog_main_upload_path') . $blog['image']) . '" alt="' . $blog['image'] . '"></a>';
            $blog_data .= '</div>
                                                        </div>
                                                        <div class="blog_main_post_second_part">
                                                            <div class="blog_class_main_name">
                                                                <span>
                                                                    <a target="_blank" href="' . base_url('blog/' . $blog['blog_slug']) . '">
                                                                        <h1>' . $blog['title'] . '</h1>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <div class="blog_class_main_by">
                                                                <span>
                                                                </span>
                                                            </div>
                                                            <div class="blog_class_main_desc ">
                                                                <span class="dot_span_desc">';

            $num_words = 75;
            $words = array();
            $words = explode(" ", $blog['description'], $num_words);
            $shown_string = "";

            if (count($words) == 75) {
                $words[74] = " ...... ";
            }

            $shown_string = implode(" ", $words);
            $blog_data .= $shown_string;

            $blog_data .= '</span>
                                                            </div>
                                                            <div class="blog_class_main_social">
                                                                <div class="left_blog_icon fl">
                                                                    <ul class="social_icon_bloag fl">
                                                                        <li>';

            $title = urlencode('"' . $blog['title'] . '"');
            $url = urlencode(base_url('blog/' . $blog['blog_slug']));
            $summary = urlencode('"' . $blog['description'] . '"');
            $image = urlencode(base_url($this->config->item('blog_main_upload_path') . $blog['image']));

            $blog_data .= '<a class="fbk" id="facebook_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '" title="Facebook" summary="' . $summary . '" image="' . $image . '"> 
                                                                                <span  class="social_fb"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li>';


            $blog_data .= '<a href="javascript:void(0)" title="Google +" id="google_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '">
                                                                                <span  class="social_gp"></span>
                                                                            </a>';

            $blog_data .= '<a href="javascript:void(0)" title="linkedin" id="linked_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '">
                    <span  class="social_lk"></span></a>
                                                                        </li>
                                                                        <li>';
            $blog_data .= '<a href="javascript:void(0)"  title="twitter" id="twitter_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '">
                    <span  class="social_tw"></span></a>
                                                                        </li>';
            $blog_data .= '</ul>
                                                                </div>';
            $blog_data .= '<div class="fr blog_view_link">';
                $blog_data .= '<a title="Read more" id="read_more" blog_id="' . $blog['id'] . '" blog_slug="' . $blog['blog_slug'] . '", "' . $blog['blog_slug'] . '")"> Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
        }

        $record = $_GET["total_record"] / $perpage;

        if ($page > $record) {
            // $lod_message = '<button class="loadmore">No more blog available</button>';  
        } else {
            $lod_message = '<button class="loadmore">Load More ...</button>';
        }

        echo json_encode(array(
            'blog_data' => $blog_data,
            'load_msg' => $lod_message
        ));
    }

    // blog available check start
    public function cat_ajax() {

        // data start
        $perpage = 4;
        $page = 1;
        if (!empty($_GET["page"]) && $_GET["page"] != 'undefined') {
            $page = $_GET["page"];
        }
        $cateid = $_GET["cateid"];

        // echo $page;
        $start = ($page - 1) * $perpage;
        if ($start < 0)
            $start = 0;

        $condition_array = array('status' => 'publish', 'FIND_IN_SET("' . $cateid . '",blog_category_id)!=' => '0');
        $blog_detail = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = $perpage, $offset = $start, $join_str = array());
        $blog_detail1 = $this->common->select_data_by_condition('blog', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = '', $offset = '', $join_str = array());

        if (empty($_GET["total_record"])) {
            $_GET["total_record"] = count($blog_detail1);
        }

        $blog_data = '';
        $blog_data .= '<input type = "hidden" class = "page_number" value = "' . $page . '" />';
        $blog_data .= '<input type = "hidden" class = "catid" value = "' . $cateid . '" />';
        $blog_data .= '<input type = "hidden" class = "total_record" value = "' . $_GET["total_record"] . '" />';
        $blog_data .= '<input type = "hidden" class = "perpage_record" value = "' . $perpage . '" />';

        // data end

        foreach ($blog_detail as $blog) {

            $blog_data .= '<div class="blog_main_o">';
            $blog_data .= '<div class="date_blog_left">
                                            <div class="blog-date-change">
                                                    <div class="blog-month blog-picker">
                                                        <span class="blog_monthd">';

            $date_time = new DateTime($blog['created_date']);
            $month = $date_time->format('M') . PHP_EOL;
            $blog_data .= $month;

            $blog_data .= '  </span>
                                                    </div>
                                                    <div>
                                                        <span class="blog_mdate">';

            $date = new DateTime($blog['created_date']);
            $blog_data .= $date->format('d') . PHP_EOL;

            $blog_data .= '</span>
                                                    </div>
                                                    <div class="blog-year blog-picker">
                                                        <span class="blog_moyear" >';

            $year = new DateTime($blog['created_date']);
            $blog_data .= $year->format('Y') . PHP_EOL;

            $blog_data .= '</span>
                                                    </div>
                                                </div>
                                                <div class="blog-left-comment">
                                                    <div class="blog-comment-count">
                                                        <a>';
            $condition_array = array('status' => 'approve', 'blog_id' => $blog['id']);
            $blog_comment = $this->common->select_data_by_condition('blog_comment', $condition_array, $data = '*', $short_by = 'id', $order_by = 'desc', $limit = 5, $offset, $join_str = array());
            $blog_data .= count($blog_comment);

            $blog_data .= '</a>
                                                    </div>
                                                    <div class="blog-comment">
                                                        <a>Comments</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="date_blog_right">
                                                <div class="blog_post_main">
                                                    <div class="blog_inside_post_main">
                                                        <div class="blog_main_post_first_part">
                                                            <div class="blog_main_post_img">';
            $blog_data .= '<a target="_blank" href="' .
                    base_url('blog/' . $blog['blog_slug']) . '"> <img src="' . base_url($this->config->item('blog_main_upload_path') . $blog['image']) . '" alt="' . $blog['image'] . '" ></a>';
            $blog_data .= '</div>
                                                        </div>
                                                        <div class="blog_main_post_second_part">
                                                            <div class="blog_class_main_name">
                                                                <span>
                                                                    <a target="_blank" href="' . base_url('blog/' . $blog['blog_slug']) . '">
                                                                        <h1>' . $blog['title'] . '</h1>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <div class="blog_class_main_by">
                                                                <span>
                                                                </span>
                                                            </div>
                                                            <div class="blog_class_main_desc ">
                                                                <span class="dot_span_desc">';

            $num_words = 75;
            $words = array();
            $words = explode(" ", $blog['description'], $num_words);
            $shown_string = "";

            if (count($words) == 75) {
                $words[74] = " ...... ";
            }

            $shown_string = implode(" ", $words);
            $blog_data .= $shown_string;

            $blog_data .= '</span>
                                                            </div>
                                                            <div class="blog_class_main_social">
                                                                <div class="left_blog_icon fl">
                                                                    <ul class="social_icon_bloag fl">
                                                                        <li>';

            $title = urlencode('"' . $blog['title'] . '"');
            $url = urlencode(base_url('blog/' . $blog['blog_slug']));
            $summary = urlencode('"' . $blog['description'] . '"');
            $image = urlencode(base_url($this->config->item('blog_main_upload_path') . $blog['image']));


            $blog_data .= '<a class="fbk" id="facebook_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '" title="Facebook" summary="' . $summary . '" image="' . $image . '"> 
                                                                                <span  class="social_fb"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li>';


            $blog_data .= '<a href="javascript:void(0)" title="Google +" id="google_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '">
                                                                                <span  class="social_gp"></span>
                                                                            </a>';

            $blog_data .= '<a href="javascript:void(0)" title="linkedin" id="linked_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '">
                    <span  class="social_lk"></span></a>
                                                                        </li>
                                                                        <li>';
            $blog_data .= '<a href="javascript:void(0)"  title="twitter" id="twitter_link" url_encode="' . $url . '" url="' . base_url('blog/' . $blog['blog_slug']) . '">
                    <span  class="social_tw"></span></a>
                                                                        </li>';
            $blog_data .= '</ul>
                                                                </div>';

            $blog_data .= '<div class="fr blog_view_link">';
            $blog_data .= "<a title='Read more' onclick='read_more('" . $blog['id'] . "', '" . $blog['blog_slug'] . "')'> Read more <i class='fa fa-long-arrow-right' aria-hidden='true'></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
        }

        $record = $_GET["total_record"] / $perpage;

        if ($page > $record) {
            //   $lod_message = '<button class="loadcatbutton">No more blog available</button>';  
        } else {
            $lod_message = '<button class="catbutton">Load More ... </button>';
        }

        echo json_encode(array(
            'blog_data' => $blog_data,
            'load_msg' => $lod_message
        ));
    }

}

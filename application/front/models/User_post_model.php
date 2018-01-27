<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_post_model extends CI_Model {

    public function getContactSuggetion($user_id = '', $detailsdata = '') {
        if ($detailsdata == "student") {

            $this->db->select("u.user_id,u.first_name,u.last_name,ui.user_image,d.degree_name")->from("user u");
            $this->db->join('user_info ui', 'ui.user_id = u.user_id', 'left');
            $this->db->join('user_login ul', 'ul.user_id = u.user_id', 'left');
            $this->db->join('user_student us', 'us.user_id = u.user_id', 'left');
            $this->db->join('degree d', 'd.degree_id = us.current_study', 'left');
            $this->db->where('u.user_id !=', $user_id);
            $this->db->where('u.user_id NOT IN (select from_id from ailee_user_contact where to_id=' . $user_id . ')', NULL, FALSE);
            $this->db->where('u.user_id NOT IN (select to_id from ailee_user_contact where from_id=' . $user_id . ')', NULL, FALSE);
            $condition = 'us.current_study == (select us.current_study from ailee_user_student where user_id=' . $user_id . ') AND us.city == (select us.city from ailee_user_student where user_id=' . $user_id . ')';
            $this->db->where($condition);
            $this->db->order_by('u.user_id', 'DESC');
            $this->db->limit('30');
            $query = $this->db->get();
            $result_array = $query->result_array();
        } else {
            $this->db->select("u.user_id,u.first_name,u.last_name,ui.user_image,jt.name as title_name")->from("user u");
            $this->db->join('user_info ui', 'ui.user_id = u.user_id', 'left');
            $this->db->join('user_login ul', 'ul.user_id = u.user_id', 'left');
            $this->db->join('user_profession up', 'up.user_id = u.user_id', 'left');
            $this->db->join('job_title jt', 'jt.title_id = up.designation', 'left');
            $this->db->where('u.user_id !=', $user_id);
            $this->db->where('u.user_id NOT IN (select from_id from ailee_user_contact where to_id=' . $user_id . ')', NULL, FALSE);
            $this->db->where('u.user_id NOT IN (select to_id from ailee_user_contact where from_id=' . $user_id . ')', NULL, FALSE);
            $condition = 'up.designation = (select up.designation from ailee_user_profession where user_id=' . $user_id . ') AND up.city = (select up.city from ailee_user_profession where user_id=' . $user_id . ')';
            $this->db->where($condition);
            $this->db->order_by('u.user_id', 'DESC');
            $this->db->limit('30');
            $query = $this->db->get();
            $result_array = $query->result_array();
            return $result_array;
        }
    }

    public function getContactAllSuggetion($user_id = '') {
        $this->db->select("u.user_id,CONCAT(u.first_name,' ',u.last_name) as fullname,ui.user_image,jt.name as title_name,d.degree_name")->from("user u");
        $this->db->join('user_info ui', 'ui.user_id = u.user_id', 'left');
        $this->db->join('user_login ul', 'ul.user_id = u.user_id', 'left');
        $this->db->join('user_profession up', 'up.user_id = u.user_id', 'left');
        $this->db->join('job_title jt', 'jt.title_id = up.designation', 'left');
        $this->db->join('user_student us', 'us.user_id = u.user_id', 'left');
        $this->db->join('degree d', 'd.degree_id = us.current_study', 'left');
        $this->db->where('u.user_id !=', $user_id);
        $this->db->where('u.user_id NOT IN (select from_id from ailee_user_contact where to_id=' . $user_id . ')', NULL, FALSE);
        $this->db->where('u.user_id NOT IN (select to_id from ailee_user_contact where from_id=' . $user_id . ')', NULL, FALSE);
        $this->db->order_by('u.user_id', 'DESC');
        $this->db->limit('40');
        $query = $this->db->get();
        $result_array = $query->result_array();
        return $result_array;
    }

    public function checkContact($user_id = '', $to_user_id = '') {
        $this->db->select("count(*) as total,id,status")->from("user_contact uc");
        $this->db->where('(from_id =' . $user_id . ' and to_id =' . $to_user_id . ') OR ( to_id =' . $user_id . ' AND from_id =' . $to_user_id . ')');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array;
    }

//    public function get_jobtitle($search){
//        $this->db->select("name")->from("job_title jt");
//        $this->db->where('status','publish');
//        $this->db->like('name',$search);
//        $query = $this->db->get();
//        $result_array = $query->result_array();
//        return $result_array;
//    }
    public function get_jobtitle() {
        $this->db->select("name")->from("job_title jt");
        $this->db->where('status', 'publish');
        $query = $this->db->get();
        $result_array = $query->result_array();
        return $result_array;
    }

    public function get_location() {
        $this->db->select("city_name")->from("cities c");
        $this->db->where('status', '1');
        $query = $this->db->get();
        $result_array = $query->result_array();
        return $result_array;
    }

    public function get_category() {
        $this->db->select("name")->from("tags t");
        $this->db->where('status', 'publish');
        $this->db->where('is_delete', '0');
        $query = $this->db->get();
        $result_array = $query->result_array();
        return $result_array;
    }

    public function is_likepost($userid = '', $post_id = '') {
        $this->db->select("upl.id,upl.is_like")->from("user_post_like upl");
        $this->db->join('user_login ul', 'ul.user_id = upl.user_id', 'left');
        $this->db->where('upl.user_id', $userid);
        $this->db->where('upl.post_id', $post_id);
        $this->db->where('ul.status', '1');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array;
    }

    public function likepost_count($post_id = '') {
        $this->db->select("COUNT(*) as like_count")->from("user_post_like upl");
        $this->db->join('user_login ul', 'ul.user_id = upl.user_id', 'left');
        $this->db->where('upl.post_id', $post_id);
        $this->db->where('ul.status', '1');
        $this->db->where('is_like', '1');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['like_count'];
    }

    public function is_userlikePost($user_id = '', $post_id = '') {
        $this->db->select("COUNT(*) as like_count")->from("user_post_like upl");
        $this->db->join('user_login ul', 'ul.user_id = upl.user_id', 'left');
        $this->db->where('upl.post_id', $post_id);
        $this->db->where('upl.user_id', $user_id);
        $this->db->where('ul.status', '1');
        $this->db->where('is_like', '1');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['like_count'];
    }

    public function postLikeData($post_id = '') {
        $this->db->select("CONCAT(u.first_name,' ',u.last_name) as username")->from("user_post_like upl");
        $this->db->join('user u', 'u.user_id = upl.user_id', 'left');
        $this->db->join('user_login ul', 'ul.user_id = upl.user_id', 'left');
        $this->db->where('upl.post_id', $post_id);
        $this->db->where('upl.is_like', '1');
        $this->db->where('ul.status', '1');
        $this->db->order_by('upl.id', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $post_like_data = $query->row_array();
    }

    public function postCommentCount($post_id = '') {
        $this->db->select("COUNT(upc.id) as comment_count")->from("user_post_comment upc");
        $this->db->join('user_login ul', 'ul.user_id = upc.user_id', 'left');
        $this->db->where('upc.post_id', $post_id);
        $this->db->where('ul.status', '1');
        $this->db->where('upc.is_delete', '0');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['comment_count'];
    }

    public function postCommentData($post_id = '') {
        $this->db->select("u.user_slug,CONCAT(u.first_name,' ',u.last_name) as username, ui.user_image,upc.id as comment_id,upc.comment,UNIX_TIMESTAMP(STR_TO_DATE(upc.created_date, '%Y-%m-%d %H:%i:%s')) as created_date")->from("user_post_comment upc");
        $this->db->join('user u', 'u.user_id = upc.user_id', 'left');
        $this->db->join('user_login ul', 'ul.user_id = upc.user_id', 'left');
        $this->db->join('user_info ui', 'ui.user_id = upc.user_id', 'left');
        $this->db->where('upc.post_id', $post_id);
        $this->db->where('ul.status', '1');
        $this->db->where('upc.is_delete', '0');
        $this->db->order_by('upc.id', 'desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $post_comment_data = $query->result_array();
    }

    public function viewAllComment($post_id = '') {
        $this->db->select("u.user_slug,CONCAT(u.first_name,' ',u.last_name) as username, ui.user_image,upc.id as comment_id,upc.comment,UNIX_TIMESTAMP(STR_TO_DATE(upc.created_date, '%Y-%m-%d %H:%i:%s')) as created_date")->from("user_post_comment upc");
        $this->db->join('user u', 'u.user_id = upc.user_id', 'left');
        $this->db->join('user_login ul', 'ul.user_id = upc.user_id', 'left');
        $this->db->join('user_info ui', 'ui.user_id = upc.user_id', 'left');
        $this->db->where('upc.post_id', $post_id);
        $this->db->where('ul.status', '1');
        $this->db->where('upc.is_delete', '0');
        $this->db->order_by('upc.id', 'asc');
        $query = $this->db->get();
        return $post_comment_data = $query->result_array();
    }

    public function userlikePostCommentData($user_id = '', $comment_id = '') {
        $this->db->select("upcl.id,upcl.is_like")->from("user_post_comment_like upcl");
        $this->db->join('user_login ul', 'ul.user_id = upcl.user_id', 'left');
        $this->db->where('upcl.comment_id', $comment_id);
        $this->db->where('upcl.user_id', $user_id);
        $this->db->where('ul.status', '1');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array;
    }

    public function is_userlikePostComment($user_id = '', $comment_id = '') {
        $this->db->select("COUNT(upcl.id) as like_count")->from("user_post_comment_like upcl");
        $this->db->join('user_login ul', 'ul.user_id = upcl.user_id', 'left');
        $this->db->where('upcl.comment_id', $comment_id);
        $this->db->where('upcl.user_id', $user_id);
        $this->db->where('ul.status', '1');
        $this->db->where('is_like', '1');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['like_count'];
    }

    public function postCommentLikeCount($comment_id = '') {
        $this->db->select("COUNT(upcl.id) as like_count")->from("user_post_comment_like upcl");
        $this->db->join('user_login ul', 'ul.user_id = upcl.user_id', 'left');
        $this->db->where('upcl.comment_id', $comment_id);
        $this->db->where('ul.status', '1');
        $this->db->where('is_like', '1');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['like_count'];
    }

    public function userPostCount($user_id = '') {
        $getUserProfessionData = $this->user_model->getUserProfessionData($user_id, $select_data = 'field');
        $getUserStudentData = $this->user_model->getUserStudentData($user_id, $select_data = 'current_study');

        $getSameFieldProUser = $this->user_model->getSameFieldProUser($getUserProfessionData['field']);
        $getSameFieldStdUser = $this->user_model->getSameFieldStdUser($getUserStudentData['current_study']);

        $getDeleteUserPost = $this->deletePostUser($user_id);
        $this->db->select("COUNT(up.id) as post_count")->from("user_post up");
        if ($getUserProfessionData && $getSameFieldProUser) {
            $this->db->where('up.user_id IN (' . $getSameFieldProUser . ')');
        } elseif ($getUserStudentData && $getSameFieldStdUser) {
            $this->db->where('up.user_id IN (' . $getSameFieldStdUser . ')');
        }
        if ($getDeleteUserPost) {
            $this->db->where('up.id NOT IN (' . $getDeleteUserPost . ')');
        }
        $this->db->where('up.status', 'publish');
        $this->db->where('up.is_delete', '0');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['post_count'];
    }

    public function userPostCountBySlug($user_slug = '') {
        $user_id = $this->db->select('user_id')->get_where('user', array('user_slug' => $user_slug))->row('user_id');


        $getUserProfessionData = $this->user_model->getUserProfessionData($user_id, $select_data = 'field');
        $getUserStudentData = $this->user_model->getUserStudentData($user_id, $select_data = 'current_study');

        $getSameFieldProUser = $this->user_model->getSameFieldProUser($getUserProfessionData['field']);
        $getSameFieldStdUser = $this->user_model->getSameFieldStdUser($getUserStudentData['current_study']);

        $getDeleteUserPost = $this->deletePostUser($user_id);
        $this->db->select("COUNT(up.id) as post_count")->from("user_post up");
        if ($getUserProfessionData && $getSameFieldProUser) {
            $this->db->where('up.user_id IN (' . $getSameFieldProUser . ')');
        } elseif ($getUserStudentData && $getSameFieldStdUser) {
            $this->db->where('up.user_id IN (' . $getSameFieldStdUser . ')');
        }
        if ($getDeleteUserPost) {
            $this->db->where('up.id NOT IN (' . $getDeleteUserPost . ')');
        }
        $this->db->where('up.status', 'publish');
        $this->db->where('up.is_delete', '0');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['post_count'];
    }

    public function getPostUserId($post_id = '') {
        $this->db->select("user_id")->from("user_post up");
        $this->db->where('up.post_id', $post_id);
        $this->db->where('up.status', 'publish');
        $this->db->where('up.is_delete', '0');
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['user_id'];
    }

    public function deletePostUser($user_id = '') {
        $this->db->select("GROUP_CONCAT(CONCAT('''', `post_id`, '''' )) AS group_post")->from("user_post_delete upd");
        $this->db->where("upd.user_id", $user_id);
        $query = $this->db->get();
        $result_array = $query->row_array();
        return $result_array['group_post'];
    }

    public function userPost($user_id = '', $page = '') {
        $limit = '10';
        $start = ($page - 1) * $limit;
        if ($start < 0)
            $start = 0;

        $getUserProfessionData = $this->user_model->getUserProfessionData($user_id, $select_data = 'field');
        $getUserStudentData = $this->user_model->getUserStudentData($user_id, $select_data = 'current_study');

        $getSameFieldProUser = $this->user_model->getSameFieldProUser($getUserProfessionData['field']);
        $getSameFieldStdUser = $this->user_model->getSameFieldStdUser($getUserStudentData['current_study']);

        $getDeleteUserPost = $this->deletePostUser($user_id);

        $result_array = array();
        $this->db->select("up.id,up.user_id,up.post_for,UNIX_TIMESTAMP(STR_TO_DATE(up.created_date, '%Y-%m-%d %H:%i:%s')) as created_date,up.post_id")->from("user_post up");
        if ($getUserProfessionData && $getSameFieldProUser) {
            $this->db->where('up.user_id IN (' . $getSameFieldProUser . ')');
        } elseif ($getUserStudentData && $getSameFieldStdUser) {
            $this->db->where('up.user_id IN (' . $getSameFieldStdUser . ')');
        }
        if ($getDeleteUserPost) {
            $this->db->where('up.id NOT IN (' . $getDeleteUserPost . ')');
        }
        $this->db->where('up.status', 'publish');
        $this->db->where('up.is_delete', '0');
        $this->db->order_by('up.id', 'desc');
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        $user_post = $query->result_array();

        foreach ($user_post as $key => $value) {
            $result_array[$key]['post_data'] = $user_post[$key];

            $this->db->select("count(*) as file_count")->from("user_post_file upf");
            $this->db->where('upf.post_id', $value['id']);
            $query = $this->db->get();
            $total_post_files = $query->row_array('file_count');
            $result_array[$key]['post_data']['total_post_files'] = $total_post_files['file_count'];

            $this->db->select("u.user_id,u.user_slug,CONCAT(u.first_name,' ',u.last_name) as fullname,ui.user_image,jt.name as title_name,d.degree_name")->from("user u");
            $this->db->join('user_info ui', 'ui.user_id = u.user_id', 'left');
            $this->db->join('user_login ul', 'ul.user_id = u.user_id', 'left');
            $this->db->join('user_profession up', 'up.user_id = u.user_id', 'left');
            $this->db->join('job_title jt', 'jt.title_id = up.designation', 'left');
            $this->db->join('user_student us', 'us.user_id = u.user_id', 'left');
            $this->db->join('degree d', 'd.degree_id = us.current_study', 'left');
            $this->db->where('u.user_id', $value['user_id']);
            $query = $this->db->get();
            $user_data = $query->row_array();
            $result_array[$key]['user_data'] = $user_data;

            if ($value['post_for'] == 'opportunity') {
                $this->db->select("uo.post_id,GROUP_CONCAT(DISTINCT(jt.name)) as opportunity_for,GROUP_CONCAT(DISTINCT(c.city_name)) as location,uo.opportunity,it.industry_name as field")->from("user_opportunity uo, ailee_job_title jt, ailee_cities c");
                $this->db->join('industry_type it', 'it.industry_id = uo.field', 'left');
                $this->db->where('uo.id', $value['post_id']);
                $this->db->where('FIND_IN_SET(jt.title_id, uo.`opportunity_for`) !=', 0);
                $this->db->where('FIND_IN_SET(c.city_id, uo.`location`) !=', 0);
                $this->db->group_by('uo.opportunity_for', 'uo.location');
                $query = $this->db->get();
                $opportunity_data = $query->row_array();
                $result_array[$key]['opportunity_data'] = $opportunity_data;
            } elseif ($value['post_for'] == 'simple') {
                $this->db->select("usp.description")->from("user_simple_post usp");
                $this->db->where('usp.id', $value['post_id']);
                $query = $this->db->get();
                $simple_data = $query->row_array();
                $result_array[$key]['simple_data'] = $simple_data;
            } elseif ($value['post_for'] == 'question') {
                $this->db->select("uaq.*,GROUP_CONCAT(DISTINCT(t.name)) as category,it.industry_name as field")->from("user_ask_question uaq, ailee_tags t");
                $this->db->join('industry_type it', 'it.industry_id = uaq.field', 'left');
                $this->db->where('uaq.id', $value['post_id']);
                $this->db->where('FIND_IN_SET(t.id, uaq.`category`) !=', 0);
                $this->db->group_by('uaq.category');
                $query = $this->db->get();
                $question_data = $query->row_array();
                $result_array[$key]['question_data'] = $question_data;
            }
            $this->db->select("upf.file_type,upf.filename")->from("user_post_file upf");
            $this->db->where('upf.post_id', $value['id']);
            $query = $this->db->get();
            $post_file_data = $query->result_array();
            $result_array[$key]['post_file_data'] = $post_file_data;

            $post_like_data = $this->postLikeData($value['id']);
            $post_like_count = $this->likepost_count($value['id']);
            $result_array[$key]['post_like_count'] = $post_like_count;
            $result_array[$key]['is_userlikePost'] = $this->is_userlikePost($user_id, $value['id']);
            if ($post_like_count > 1) {
                $result_array[$key]['post_like_data'] = $post_like_data['username'] . ' and ' . ($post_like_count - 1) . ' other';
            } elseif ($post_like_count == 1) {
                $result_array[$key]['post_like_data'] = $post_like_data['username'];
            }
            $result_array[$key]['post_comment_count'] = $this->postCommentCount($value['id']);
            $result_array[$key]['post_comment_data'] = $postCommentData = $this->postCommentData($value['id']);

            foreach ($postCommentData as $key1 => $value1) {
                $result_array[$key]['post_comment_data'][$key1]['is_userlikePostComment'] = $this->is_userlikePostComment($user_id, $value1['comment_id']);
                $result_array[$key]['post_comment_data'][$key1]['postCommentLikeCount'] = $this->postCommentLikeCount($value1['comment_id']) == '0' ? '' : $this->postCommentLikeCount($value1['comment_id']);
            }

            $result_array[$key]['page_data']['page'] = $page;
            $result_array[$key]['page_data']['total_record'] = $this->userPostCount($user_id);
            //  $result_array[$key]['page_data']['perpage_record'] = $limit;
        }
//        echo '<pre>';
//        print_r($result_array);
//        exit;
        return $result_array;
    }

    public function userDashboardPost($user_id = '', $page = '') {
        $limit = '10';
        $start = ($page - 1) * $limit;
        if ($start < 0)
            $start = 0;

        $result_array = array();
        $this->db->select("up.id,up.user_id,up.post_for,UNIX_TIMESTAMP(STR_TO_DATE(up.created_date, '%Y-%m-%d %H:%i:%s')) as created_date,up.post_id")->from("user_post up");
        $this->db->where('user_id', $user_id);
        $this->db->where('up.status', 'publish');
        $this->db->where('up.is_delete', '0');
        $this->db->order_by('up.id', 'desc');
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        $user_post = $query->result_array();

        foreach ($user_post as $key => $value) {
            $result_array[$key]['post_data'] = $user_post[$key];

            $this->db->select("count(*) as file_count")->from("user_post_file upf");
            $this->db->where('upf.post_id', $value['id']);
            $query = $this->db->get();
            $total_post_files = $query->row_array('file_count');
            $result_array[$key]['post_data']['total_post_files'] = $total_post_files['file_count'];

            $this->db->select("u.user_id,u.user_slug,CONCAT(u.first_name,' ',u.last_name) as fullname,ui.user_image,jt.name as title_name,d.degree_name")->from("user u");
            $this->db->join('user_info ui', 'ui.user_id = u.user_id', 'left');
            $this->db->join('user_login ul', 'ul.user_id = u.user_id', 'left');
            $this->db->join('user_profession up', 'up.user_id = u.user_id', 'left');
            $this->db->join('job_title jt', 'jt.title_id = up.designation', 'left');
            $this->db->join('user_student us', 'us.user_id = u.user_id', 'left');
            $this->db->join('degree d', 'd.degree_id = us.current_study', 'left');
            $this->db->where('u.user_id', $value['user_id']);
            $query = $this->db->get();
            $user_data = $query->row_array();
            $result_array[$key]['user_data'] = $user_data;

            if ($value['post_for'] == 'opportunity') {
                $this->db->select("uo.post_id,GROUP_CONCAT(DISTINCT(jt.name)) as opportunity_for,GROUP_CONCAT(DISTINCT(c.city_name)) as location,uo.opportunity,it.industry_name as field")->from("user_opportunity uo, ailee_job_title jt, ailee_cities c");
                $this->db->join('industry_type it', 'it.industry_id = uo.field', 'left');
                $this->db->where('uo.id', $value['post_id']);
                $this->db->where('FIND_IN_SET(jt.title_id, uo.`opportunity_for`) !=', 0);
                $this->db->where('FIND_IN_SET(c.city_id, uo.`location`) !=', 0);
                $this->db->group_by('uo.opportunity_for', 'uo.location');
                $query = $this->db->get();
                $opportunity_data = $query->row_array();
                $result_array[$key]['opportunity_data'] = $opportunity_data;
            } elseif ($value['post_for'] == 'simple') {
                $this->db->select("usp.description")->from("user_simple_post usp");
                $this->db->where('usp.id', $value['post_id']);
                $query = $this->db->get();
                $simple_data = $query->row_array();
                $result_array[$key]['simple_data'] = $simple_data;
            } elseif ($value['post_for'] == 'question') {
                $this->db->select("uaq.*,GROUP_CONCAT(DISTINCT(t.name)) as category,it.industry_name as field")->from("user_ask_question uaq, ailee_tags t");
                $this->db->join('industry_type it', 'it.industry_id = uaq.field', 'left');
                $this->db->where('uaq.id', $value['post_id']);
                $this->db->where('FIND_IN_SET(t.id, uaq.`category`) !=', 0);
                $this->db->group_by('uaq.category');
                $query = $this->db->get();
                $question_data = $query->row_array();
                $result_array[$key]['question_data'] = $question_data;
            }
            $this->db->select("upf.file_type,upf.filename")->from("user_post_file upf");
            $this->db->where('upf.post_id', $value['id']);
            $query = $this->db->get();
            $post_file_data = $query->result_array();
            $result_array[$key]['post_file_data'] = $post_file_data;

            $post_like_data = $this->postLikeData($value['id']);
            $post_like_count = $this->likepost_count($value['id']);
            $result_array[$key]['post_like_count'] = $post_like_count;
            $result_array[$key]['is_userlikePost'] = $this->is_userlikePost($user_id, $value['id']);
            if ($post_like_count > 1) {
                $result_array[$key]['post_like_data'] = $post_like_data['username'] . ' and ' . ($post_like_count - 1) . ' other';
            } elseif ($post_like_count == 1) {
                $result_array[$key]['post_like_data'] = $post_like_data['username'];
            }
            $result_array[$key]['post_comment_count'] = $this->postCommentCount($value['id']);
            $result_array[$key]['post_comment_data'] = $postCommentData = $this->postCommentData($value['id']);

            foreach ($postCommentData as $key1 => $value1) {
                $result_array[$key]['post_comment_data'][$key1]['is_userlikePostComment'] = $this->is_userlikePostComment($user_id, $value1['comment_id']);
                $result_array[$key]['post_comment_data'][$key1]['postCommentLikeCount'] = $this->postCommentLikeCount($value1['comment_id']) == '0' ? '' : $this->postCommentLikeCount($value1['comment_id']);
            }

            $result_array[$key]['page_data']['page'] = $page;
            $result_array[$key]['page_data']['total_record'] = $this->userPostCount($user_id);
            $result_array[$key]['page_data']['perpage_record'] = $limit;
        }
//        echo '<pre>';
//        print_r($result_array);
//        exit;
        return $result_array;
    }

    public function userDashboardImage($user_id = '') {
        $this->db->select('filename')->from('user_post_file upf');
        $this->db->join('user_post up', 'up.id = upf.post_id', 'left');
        $this->db->where('file_type', 'image');
        $this->db->order_by('upf.id', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        $userDashboardImage = $query->result_array();
        $result_array['userDashboardImage'] = $userDashboardImage;
        return $result_array;
    }

    public function userDashboardVideo($user_id = '') {
        $this->db->select('filename')->from('user_post_file upf');
        $this->db->join('user_post up', 'up.id = upf.post_id', 'left');
        $this->db->where('file_type', 'video');
        $this->db->order_by('upf.id', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        $userDashboardVideo = $query->result_array();
        $result_array['userDashboardVideo'] = $userDashboardVideo;
        return $result_array;
    }

    public function userDashboardAudio($user_id = '') {
        $this->db->select('filename')->from('user_post_file upf');
        $this->db->join('user_post up', 'up.id = upf.post_id', 'left');
        $this->db->where('file_type', 'audio');
        $this->db->order_by('upf.id', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        $userDashboardAudio = $query->result_array();
        $result_array['userDashboardAudio'] = $userDashboardAudio;
        return $result_array;
    }

    public function userDashboardPdf($user_id = '') {
        $this->db->select('filename')->from('user_post_file upf');
        $this->db->join('user_post up', 'up.id = upf.post_id', 'left');
        $this->db->where('file_type', 'pdf');
        $this->db->order_by('upf.id', 'desc');
        $this->db->limit('6');
        $query = $this->db->get();
        $userDashboardPdf = $query->result_array();
        $result_array['userDashboardPdf'] = $userDashboardPdf;
        return $result_array;
    }

    public function simplePost($post_id = '') {
        $this->db->select('description')->from('user_simple_post usp');
        $this->db->where('usp.post_id', $post_id);
        $query = $this->db->get();
        $userSimplePost = $query->row_array();
        return $userSimplePost;
    }

    public function opportunityPost($post_id = '') {
        $this->db->select("uo.post_id,field,GROUP_CONCAT(DISTINCT(jt.name)) as opportunity_for,GROUP_CONCAT(DISTINCT(c.city_name)) as location,uo.opportunity")->from("user_opportunity uo, ailee_job_title jt, ailee_cities c");
        $this->db->where('uo.post_id', $post_id);
        $this->db->where('FIND_IN_SET(jt.title_id, uo.`opportunity_for`) !=', 0);
        $this->db->where('FIND_IN_SET(c.city_id, uo.`location`) !=', 0);
        $this->db->group_by('uo.opportunity_for', 'uo.location');
        $query = $this->db->get();
        $opportunity_data = $query->row_array();
        return $opportunity_data;
    }

    public function askQuestionPost($post_id = '') {
        $this->db->select("question,description,category,field,GROUP_CONCAT(DISTINCT(tg.name)) as tag_name")->from("user_ask_question uaq, ailee_tags tg");
        $this->db->where('uaq.post_id', $post_id);
        $this->db->where('FIND_IN_SET(tg.id, uaq.`category`) !=', 0);
        $this->db->group_by('uaq.category');
        $query = $this->db->get();
        $userAskPost = $query->row_array();
        return $userAskPost;
    }

    public function GetQuestionCategoryName($categoryId = '') {
        $this->db->select("GROUP_CONCAT(DISTINCT(t.name)) as category")->from("ailee_tags t");
        $this->db->where('FIND_IN_SET(t.id,"' . $categoryId . '") !=', 0);
        $query = $this->db->get();
        $category = $query->row_array();
        return $category;
    }

    public function GetLocationName($city_id = '') {
        $this->db->select("GROUP_CONCAT(DISTINCT(c.city_name)) as location")->from("ailee_cities c");
        $this->db->where('FIND_IN_SET(c.city_id,"' . $city_id . '") !=', 0);
        $query = $this->db->get();
        $location = $query->row_array();
        return $location;
    }

    public function GetJobTitleName($job_title_id = '') {
        $this->db->select("GROUP_CONCAT(DISTINCT(jt.name)) as opportunity_for")->from("ailee_job_title jt");
        $this->db->where('FIND_IN_SET(jt.title_id,"' . $job_title_id . '") !=', 0);
        $query = $this->db->get();
        $title = $query->row_array();
        return $title;
    }

    public function GetIndustryFieldName($ask_field = '') {
        $this->db->select("it.industry_name as field")->from("industry_type it");
        $this->db->where('it.industry_id', $ask_field);
        $query = $this->db->get();
        $field = $query->row_array();
        return $field;
    }

}

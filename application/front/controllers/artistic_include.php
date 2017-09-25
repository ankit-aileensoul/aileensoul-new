<?php
// user detail
$userid = $this->session->userdata('aileenuser');
$contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
$this->data['userdata'] = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
// artistics detail
$contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
$this->data['artdata'] = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//for message notification start
$contition_array = array('notification.not_type' => 8, 'notification.not_from' => 3, 'notification.not_to_id' => $userid, 'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'follow',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'follow.follow_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*', ' follow.*', ' user.user_id', 'user.first_name', 'user.user_image', 'user.last_name');
$this->data['artfollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
$contition_array = array('notification.not_type' => 6, 'notification.not_from' => 3, 'notification.not_to_id' => $userid, 'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'artistic_post_comment',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'artistic_post_comment.artistic_post_comment_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*', ' artistic_post_comment.*', ' user.user_id', 'user.first_name', 'user.user_image', 'user.last_name');
$this->data['artcommnet'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'artistic_post_comment_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
$contition_array = array('notification.not_type' => 5, 'notification.not_from' => 3, 'notification.not_to_id' => $userid, 'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'art_post',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'art_post.art_post_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*', 'art_post.*', ' user.user_id', 'user.first_name', 'user.user_image', 'user.last_name');
$this->data['artlike'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'art_post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
$contition_array = array('notification.not_type' => 8, 'notification.not_from' => 6, 'notification.not_to_id' => $userid, 'created_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW()');
$join_str = array(array(
        'join_type' => '',
        'table' => 'follow',
        'join_table_id' => 'notification.not_product_id',
        'from_table_id' => 'follow.follow_id'),
    array(
        'join_type' => '',
        'table' => 'user',
        'join_table_id' => 'notification.not_from_id',
        'from_table_id' => 'user.user_id')
);
$data = array('notification.*', 'follow.*', 'user.user_id', 'user.first_name', 'user.user_image', 'user.last_name');
$this->data['busifollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');
$this->data['head'] = $this->load->view('head', $this->data, true);
$this->data['header'] = $this->load->view('header', $this->data, true);
$this->data['footer'] = $this->load->view('footer', $this->data, true);
$this->data['artistic_search'] = $this->load->view('artistic/artistic_search', $this->data, true);
$artregid = $this->data['artdata'][0]['art_id'];
$contition_array = array('follow_to' => $artregid, 'follow_status' => '1', 'follow_type' => '1');
$followerdata = $this->data['followerdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
foreach ($followerdata as $followkey) {
    $contition_array = array('art_id' => $followkey['follow_from'], 'status' => '1');
    $artaval = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
    if ($artaval) {

        $countlu[] = $artaval;
    }
}
$this->data['flucount'] = $flucount = count($countlu);
$contition_array = array('follow_from' => $artregid, 'follow_status' => '1', 'follow_type' => '1');
$followingdata = $this->data['followingdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

foreach ($followingdata as $followkey) {

    $contition_array = array('art_id' => $followkey['follow_to'], 'status' => '1');
    $artaval = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
    if ($artaval) {

        $countlfu[] = $artaval;
    }
}
$this->data['countfr'] = $countfr = count($countlfu);
$this->data['art_header2_border'] = $this->load->view('artistic/art_header2_border', $this->data, true);

?>

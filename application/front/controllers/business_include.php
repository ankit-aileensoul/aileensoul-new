<?php// user detail// USERDATA USE FOR HEADER NAME AND IMAGE START$contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');$data = 'user_image,first_name';$this->data['userdata'] = $this->common->select_data_by_condition('user', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');// USERDATA USE FOR HEADER NAME AND IMAGE END// business profile detail$contition_array = array('user_id' => $userid, 'is_deleted' => '0', 'status' => '1');$this->data['businessdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');$this->data['head'] = $this->load->view('head', $this->data, true);$this->data['header'] = $this->load->view('header', $this->data, true);$this->data['footer'] = $this->load->view('footer', $this->data, true);$this->data['business_search'] = $this->load->view('business_profile/business_search', $this->data, true);$businessregid = $this->data['businessdata'][0]['business_profile_id'];$contition_array = array('follow_to' => $businessregid, 'follow_status' => '1', 'follow_type' => '2', 'business_profile.status' => 1);$join_str_follower[0]['table'] = 'follow';$join_str_follower[0]['join_table_id'] = 'follow.follow_from';$join_str_follower[0]['from_table_id'] = 'business_profile.business_profile_id';$join_str_follower[0]['join_type'] = '';$businessfollowerdata = $this->data['businessfollowerdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str_follower, $groupby = '');$contition_array = array('follow_from' => $businessregid, 'follow_status' => '1', 'follow_type' => '2', 'business_profile.status' => 1);$join_str_following[0]['table'] = 'follow';$join_str_following[0]['join_table_id'] = 'follow.follow_to';$join_str_following[0]['from_table_id'] = 'business_profile.business_profile_id';$join_str_following[0]['join_type'] = '';$businessfollowingdata = $this->data['businessfollowingdata'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str_following, $groupby = '');$this->data['business_header2_border'] = $this->load->view('business_profile/business_header2_border', $this->data, true);$id = $this->uri->segment(3);$contition_array = array('user_id' => $userid, 'status' => '1');$this->data['slug_data'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = 'business_slug', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');$slug_id = $this->data['slug_data'][0]['business_slug'];if ($id == $this->data['slug_data'][0]['business_slug'] || $id == '') {    $contition_array = array('business_slug' => $slug_id, 'status' => '1', 'business_step' => 4);    $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');    $contition_array = array('user_id' => $userid, 'is_delete' => '0');    $this->data['busimagedata'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');} else {    $contition_array = array('business_slug' => $id, 'status' => '1', 'business_step' => 4);    $businessdata1 = $this->data['businessdata1'] = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');    $contition_array = array('user_id' => $businessdata1[0]['user_id'], 'is_delete' => '0');    $this->data['busimagedata'] = $this->common->select_data_by_condition('bus_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');}$this->data['business_common'] = $this->load->view('business_profile/business_common', $this->data, true);$contition_array = array('contact_type' => 2, 'contact_person.status' => 'confirm', 'business_profile.status'=>1);$search_condition = "((contact_from_id = ' $userid') OR (contact_to_id = '$userid'))";$join_str_contact[0]['table'] = 'business_profile';$join_str_contact[0]['join_table_id'] = 'business_profile.user_id';$join_str_contact[0]['from_table_id'] = 'contact_person.contact_from_id';$join_str_contact[0]['join_type'] = '';$this->data['businesscontacts'] = $businesscontacts = $this->common->select_data_by_search('contact_person', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str_contact, $groupby = '');?>
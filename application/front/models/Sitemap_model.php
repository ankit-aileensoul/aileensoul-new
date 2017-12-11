<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sitemap_model extends CI_Model {

    function getJobDataByLocation(){
        $this->db->select('rp.city,rp.post_name,rp.post_id,rp.user_id,c.city_name,r.re_comp_name')->from('rec_post rp');
        $this->db->join('cities c', 'rp.city = c.city_id');
        $this->db->join('recruiter r', 'rp.user_id = r.user_id');
        $this->db->where(array('rp.status' => '1', 'rp.is_delete' => '0'));
        $query = $this->db->get();
        $result = $query->result_array();
       
        $newArray = array();
        foreach ($result as $key => $value) { 
            $newArray[$value['city_name']][$key] = $value; // sort as per category name
            if(is_numeric($value['post_name'])){ 
                $newArray[$value['city_name']][$key]['post_name'] = $this->db->select('name')->get_where('job_title',array('title_id'=>$value['post_name']))->row('name');
            }
        }
        return $newArray;
    }
    
    function getFreepostDataByCategory(){
        $this->db->select('fp.post_id,fp.post_name,fp.user_id,fh.username,fh.fullname,ci.city_name,c.category_name')->from('freelancer_post fp');
        $this->db->join('category c', 'fp.post_field_req = c.category_id');
        $this->db->join('freelancer_hire_reg fh', 'fp.user_id = fh.user_id');
        $this->db->join('cities ci', 'fp.city = ci.city_id');
        $this->db->where(array('fp.status' => '1', 'fp.is_delete' => '0'));
        $query = $this->db->get();
        $result = $query->result_array();
        $newArray = array();
        foreach ($result as $key => $value) { 
            $newArray[$value['category_name']][] = $value; // sort as per category name
        }
        return $newArray;
    }

    function getBusinessDataByCategory() {
        $this->db->select('bc.industry_name,b.company_name,b.business_slug,b.other_industrial')->from('industry_type bc');
        $this->db->join('business_profile b', 'b.industriyal = bc.industry_id');
        $this->db->where(array('bc.status' => '1', 'bc.is_delete' => '0', 'b.status' => '1', 'b.is_deleted' => '0', 'b.business_step' => '4'));
        $query = $this->db->get();
        $result = $query->result_array();

        $this->db->select('b.company_name,b.business_slug,b.other_industrial')->from('business_profile b');
        $this->db->where(array('b.status' => '1', 'b.is_deleted' => '0', 'b.business_step' => '4', 'b.industriyal' => '0'));
        $query1 = $this->db->get();
        $result1 = $query1->result_array();
        
        $newArray = array();
        foreach ($result as $key => $value) {
            $newArray[$value['industry_name']][] = $value; // sort as per category name
        }
        $newArray['Other'] = $result1;
        
        return $newArray;
    }

    function getArtistDataByCategory() {
        $this->db->select('a.art_name,a.art_lastname,a.art_skill,a.other_skill,a.user_id')->from('art_reg a');
        $this->db->where(array('a.status' => '1', 'a.is_delete' => '0', 'a.art_step' => '4'));
        $query = $this->db->get();
        $result = $query->result_array();

        foreach ($result as $key => $value) {
            $art_skill = $value['art_skill'];
            $other_skill = $value['other_skill'];
            if ($art_skill) {
                $art_skill = explode(',', $art_skill);
                $category_name = '';
                foreach ($art_skill as $key1 => $skill) {
                    $category_name .= $this->db->select('art_category')->get_where('art_category', array('category_id' => $skill))->row('art_category');
                    $category_name .= ', ';
                }
                $category_name = trim($category_name, ', ');
                $result[$key]['art_skill'] = $category_name;
            }
            if ($other_skill) {
                $other_name ='';
                $other_name .= $this->db->select('other_category')->get_where('art_other_category', array('other_category_id' => $other_skill))->row('other_category');
                $other_name = trim($other_name, ',');
                $result[$key]['other_skill'] = $other_name;
            }
            //GET LINK 
            $user_id = $value['user_id'];

            $this->db->select('art_id,art_city,art_skill,other_skill,slug')->from('art_reg');
            $this->db->where(array('user_id' => $user_id, 'status' => '1'));
            $query = $this->db->get();
            $arturl = $query->result_array();

            $city_url = $this->db->select('city_name')->get_where('cities', array('city_id' => $arturl[0]['art_city'], 'status' => '1'))->row()->city_name;
            $art_othercategory = $this->db->select('other_category')->get_where('art_other_category', array('other_category_id' => $arturl[0]['other_skill']))->row()->other_category;
            $category = $arturl[0]['art_skill'];
            $category = explode(',', $category);

            foreach ($category as $catkey => $catval) {
                $art_category = $this->db->select('art_category')->get_where('art_category', array('category_id' => $catval))->row()->art_category;
                $categorylist[] = $art_category;
            }

            $listfinal1 = array_diff($categorylist, array('other'));
            $listFinal = implode('-', $listfinal1);

            if (!in_array(26, $category)) {
                $category_url = $this->common->clean($listFinal);
            } else if ($arturl[0]['art_skill'] && $arturl[0]['other_skill']) {

                $trimdata = $this->common->clean($listFinal) . '-' . $this->common->clean($art_othercategory);
                $category_url = trim($trimdata, '-');
            } else {
                $category_url = $this->common->clean($art_othercategory);
            }

            $city_get = $this->common->clean($city_url);
            $url = $arturl[0]['slug'] . '-' . $category_url . '-' . $city_get . '-' . $arturl[0]['art_id'];
            $result[$key]['get_url'] = $url;
        }

        return $result;
    }

}

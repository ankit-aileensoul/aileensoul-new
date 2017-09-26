<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $segment2 = $this->uri->segment(2);
        $segment2_names = array('search', 'dashboard', 'details', 'execute_search', 'ajax_user_search', 'ajax_job_search', 'ajax_freelancer_hire_search', 'ajax_freelancer_post_search', 'recruiter_search_candidate', 'business_search', 'ajax_business_user_login_search');

        $segment1 = $this->uri->segment(1);
        $segment1_names = array('job', 'business-profile', 'freelancer-hire', 'artistic', 'search', 'freelancer-work', 'recruiter', 'business_userprofile');

        if ((!in_array($segment2, $segment2_names)) || (!in_array($segment1, $segment1_names))) {
            if (!$this->session->userdata('aileenuser')) {
                redirect('login', 'refresh');
            } else {
                $this->data['userid'] = $this->session->userdata('aileenuser');
            }
        }
                    
         if (!$this->session->userdata('aileenuser')) {
                redirect('login', 'refresh');
            } else {
                $this->data['userid'] = $this->session->userdata('aileenuser');
            }
        ini_set('gd.jpeg_ignore_warning', 1);

        $user_id = $this->data['userid'];
        $condition_array = array('status' => '1');
        $this->data['loged_in_user'] = $this->common->select_data_by_id('user', 'user_id', $user_id, 'user_name,user_image', $condition_array);
        date_default_timezone_set('Asia/Calcutta');
    }

    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'y<span class="year_mobile">ear</span>',
            'm' => 'm<span class="month_mobile">onth</span>',
            'w' => 'w<span class="week_mobile">eek</span>',
            'd' => 'd<span class="day_mobile">ay</span>',
            'h' => 'h<span class="hour_mobile">our</span>',
            'i' => 'm<span class="minute_mobile">inute</span>',
            's' => 's<span class="second_mobile">econd</span>',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function random_string($length = 5, $allowed_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') {
        $allowed_chars_len = strlen($allowed_chars);

        if ($allowed_chars_len == 1) {
            return str_pad('', $length, $allowed_chars);
        } else {
            $result = '';

            while (strlen($result) < $length) {
                $result .= substr($allowed_chars, rand(0, $allowed_chars_len), 1);
            } // while

            return $result;
        }
    }

    public function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = '') {
        //folder path setup
        $target_path = $target_folder;
        $thumb_path = $thumb_folder;

        //file name setup
        $filename_err = explode(".", $_FILES[$field_name]['name']);
        $filename_err_count = count($filename_err);
        $file_ext = $filename_err[$filename_err_count - 1];
        if ($file_name != '') {
            $fileName = $file_name . '.' . $file_ext;
        } else {
            $fileName = $_FILES[$field_name]['name'];
        }

        //upload image path
        $upload_image = $target_path . basename($fileName);

        //upload image
        if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_image)) {
            //thumbnail creation
            if ($thumb == TRUE) {
                $thumbnail = $thumb_path . $fileName;
                list($width, $height) = getimagesize($upload_image);
                $thumb_create = imagecreatetruecolor($thumb_width, $thumb_height);
                switch ($file_ext) {
                    case 'jpg':
                        $source = imagecreatefromjpeg($upload_image);
                        break;
                    case 'jpeg':
                        $source = imagecreatefromjpeg($upload_image);
                        break;
                    case 'png':
                        $source = imagecreatefrompng($upload_image);
                        break;
                    case 'gif':
                        $source = imagecreatefromgif($upload_image);
                        break;
                    default:
                        $source = imagecreatefromjpeg($upload_image);
                }
                imagecopyresized($thumb_create, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
                switch ($file_ext) {
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create, $thumbnail, 100);
                        break;
                    case 'png':
                        imagepng($thumb_create, $thumbnail, 100);
                        break;
                    case 'gif':
                        imagegif($thumb_create, $thumbnail, 100);
                        break;
                    default:
                        imagejpeg($thumb_create, $thumbnail, 100);
                }
            }

            return $fileName;
        } else {
            return false;
        }
    }

    public function thumb_img_uplode($upload_image = '', $file_name = '', $thumb_folder = '', $thumb_width = '', $thumb_height = '') {

        $thumbnail = $thumb_folder . $file_name;
        list($width, $height) = getimagesize($upload_image);
        $thumb_create = imagecreatetruecolor($thumb_width, $thumb_height);
        $file_ext = 'png';

        switch ($file_ext) {
            case 'jpg':
                $source = imagecreatefromjpeg($upload_image);
                break;
            case 'jpeg':
                $source = imagecreatefromjpeg($upload_image);
                break;
            case 'png':
                $source = imagecreatefrompng($upload_image);
                break;
            case 'gif':
                $source = imagecreatefromgif($upload_image);
                break;
            default:
                $source = imagecreatefromjpeg($upload_image);
        }


        imagecopyresized($thumb_create, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
        switch ($file_ext) {
            case 'jpg' || 'jpeg':
                imagejpeg($thumb_create, $thumbnail, 100);
                break;
            case 'png':
                imagepng($thumb_create, $thumbnail, 100);
                break;
            case 'gif':
                imagegif($thumb_create, $thumbnail, 100);
                break;
            default:
                imagejpeg($thumb_create, $thumbnail, 100);
        }
    }

}

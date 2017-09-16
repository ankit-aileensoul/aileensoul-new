<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    define('BASEURL', 'http://localhost/aileensoul-new/');
    error_reporting(0);
} else {
    define('BASEURL', 'https://www.aileensoul.com/');
    error_reporting(0);
}


define('SITEPATH', $_SERVER['DOCUMENT_ROOT'] . '/aileensoul-new/');
define('TITLEPOSTFIX', ' - Aileensoul.com');

define('NOIMAGE', 'uploads/avatar.png');
define('NOBUSIMAGE', 'uploads/nobusimage.jpg?ver=' . time());
define('WHITEIMAGE', 'uploads/white.png?ver=' . time());
define('PROFILENA', '--');
define('FNOIMAGE', 'uploads/Email_Verification_female.png');
define('MNOIMAGE', 'uploads/Email_Verification_male.png');

define('IMAGEPATHFROM', 's3bucket'); //upload,s3bucket 
//define('IMAGEPATHFROM', 'upload'); //upload,s3bucket 
// S3BUCKET START
// Bucket Name
define('bucket', 'aileensoulimages');

//AWS access info 
define('awsAccessKey', 'AKIAI2ZIGZWVAZWQJOPA');
define('awsSecretKey', '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');

define('BUCKETLINK', 'https://' . bucket . '.s3.amazonaws.com/');

// S3BUCKET END

if (IMAGEPATHFROM == 's3bucket') {
    //USER PHOTO 
    define('USER_WEB_IMAGE', BUCKETLINK . 'admin/../uploads/users/main/');
    define('USER_IMAGE', BUCKETLINK . '../uploads/users/main/');
    define('USERS_IMAGE', BUCKETLINK . 'uploads/users/main/');

    //CATEGORY PHOTO 
    define('CATEGORY_IMAGE', BUCKETLINK . 'uploads/category/main/');
    define('CATEGORY_IMAGE_THUMB', BUCKETLINK . 'uploads/category/thumb/');
    define('CATEGORY_WEB_IMAGE', BUCKETLINK . 'admin/../uploads/category/main/');
    define('CATEGORY_WEB_IMAGE_THUMB', BUCKETLINK . 'admin/../uploads/category/thumb/');

// USER BACKGROUND IMAGE
    define('USER_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/user_bg/main/');

// USER BACKGROUND THUMB IMAGE 
    define('USER_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/user_bg/thumbs/');

// USER BACKGROUND ORIGINAL IMAGE 
    define('USER_BG_ORIGINAL_UPLOAD_URL', BUCKETLINK . 'uploads/user_bg/original/');

// USER PROFILE IMAGE
    define('USER_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/user_profile/main/');

// USER PROFILE THUMB IMAGE
    define('USER_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/user_profile/thumbs/');

// JOB PROFILE IMAGE 
    define('JOB_PROFILE_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/job_profile/main/');

// JOB PROFILE THUMB IMAGE
    define('JOB_PROFILE_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/job_profile/thumbs/');

// JOB BACKGROUND IMAGE 
    define('JOB_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/job_bg/main/');

// JOB BACKGROUND THUMB IMAGE
    define('JOB_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/job_bg/thumbs/');

// JOB BACKGROUND ORIGINAL IMAGE
    define('JOB_BG_ORIGINAL_UPLOAD_URL', BUCKETLINK . 'uploads/job_bg/original/');

// JOB EDUCATION CERTIFICATE
    define('JOB_EDU_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/job_education/main/');

// JOB EDUCATION THUMB CERTIFICATE
    define('JOB_EDU_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/job_education/thumbs/');

// JOB WORK EXPERIENCE CERTIFICATE
    define('JOB_WORK_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/job_work/main/');

//  JOB WORK EXPERIENCE THUMB CERTIFICATE
    define('JOB_WORK_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/job_work/thumbs/');

// RECRUITER PROFILE IMAGE 
    define('REC_PROFILE_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/recruiter_profile/main/');

// RECRUITER PROFILE THUMB IMAGE
    define('REC_PROFILE_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/recruiter_profile/thumbs/');

// RECRUITER BACKGROUND IMAGE 
    define('REC_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/recruiter_bg/main/');

// RECRUITER BACKGROUND THUMB IMAGE
    define('REC_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/recruiter_bg/thumbs/');

// RECRUITER BACKGROUND ORIGINAL IMAGE
    define('REC_BG_ORIGINAL_UPLOAD_URL', BUCKETLINK . 'uploads/recruiter_bg/original/');

// FREELANCER PORTFOLIO ATTACHMENT 
    define('FREE_PORTFOLIO_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_portfolio/main/');

// FREELANCER PORTFOLIO ATTACHMENT THUMBS
    define('FREE_PORTFOLIO_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_portfolio/thumbs/');

// FREELANCER HIRE PROFILE 
    define('FREE_HIRE_PROFILE_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_hire_profile/main/');

// FREELANCER HIRE PROFILE THUMBS
    define('FREE_HIRE_PROFILE_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_hire_profile/thumbs/');

// FREELANCER HIRE BACKGROUND
    define('FREE_HIRE_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_hire_bg/main/');

// FREELANCER HIRE BACKGROUND THUMB
    define('FREE_HIRE_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_hire_bg/thumbs/');

// FREELANCER HIRE BACKGROUND ORIGINAL
    define('FREE_HIRE_BG_ORIGINAL_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_hire_bg/original/');

// FREELANCER POST PROFILE
    define('FREE_POST_PROFILE_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_profile/main/');

// FREELANCER POST PROFILE THUMBS
    define('FREE_POST_PROFILE_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_profile/thumbs/');

// FREELANCER POST PROFILE BACKGROUND
    define('FREE_POST_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_bg/main/');

// FREELANCER POST PROFILE BACKGROUND THUMBS
    define('FREE_POST_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_bg/thumbs/');

// FREELANCER POST PROFILE BACKGROUND ORIGINAL
    define('FREE_POST_BG_ORIGINAL_UPLOAD_URL', BUCKETLINK . 'uploads/freelancer_post_bg/original/');

// BUSINESS PROFILE IMAGE
    define('BUS_PROFILE_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/business_profile/main/');

// BUSINESS PROFILE IMAGE THUMBS
    define('BUS_PROFILE_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/business_profile/thumbs/');

// BUSINESS DETAILS IMAGE
    define('BUS_DETAIL_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/business_profile/main/');

// BUSINESS DETAILS IMAGE THUMBS
    define('BUS_DETAIL_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/business_profile/thumbs/');

// BUSINESS PROFILE BACKGROUND
    define('BUS_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/business_bg/main/');

// BUSINESS PROFILE BACKGROUND THUMBS
    define('BUS_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/business_bg/thumbs/');

// BUSINESS PROFILE BACKGROUND ORIGINAL
    define('BUS_BG_ORIGINAL_UPLOAD_URL', BUCKETLINK . 'uploads/business_bg/original/');

// BUSINESS POST 
    define('BUS_POST_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/main/');

// BUSINESS POST RESIZED
    define('BUS_POST_RESIZE_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/resize/');

// BUSINESS POST THUMBS
    define('BUS_POST_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/thumbs/');

// BUSINESS POST 335 X 320
    define('BUS_POST_RESIZE1_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/resize1/');

// BUSINESS POST 335 X 245
    define('BUS_POST_RESIZE2_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/resize2/');

// BUSINESS POST 210 X 210
    define('BUS_POST_RESIZE3_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/resize3/');

// BUSINESS POST 550 X 220
    define('BUS_POST_RESIZE4_UPLOAD_URL', BUCKETLINK . 'uploads/business_post/resize4/');


// ARTISTIC PROFILE IMAGE
    define('ART_PROFILE_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_profile/main/');

// ARTISTIC PROFILE IMAGE THUMBS
    define('ART_PROFILE_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_profile/thumbs/');

// ARTISTIC PROFILE BACKGROUND
    define('ART_BG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_bg/main/');

// ARTISTIC PROFILE BACKGROUND THUMBS
    define('ART_BG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_bg/thumbs/');

// ARTISTIC PROFILE BACKGROUND ORIGINAL
    define('ART_BG_original_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_bg/original/');

// ARTISTIC PORTFOLIO
    define('ART_PORTFOLIO_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_portfolio/main/');

// ARTISTIC PORTFOLIO THUMBS
    define('ART_PORTFOLIO_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_portfolio/thumbs/');

// ARTISTIC POST 
    define('ART_POST_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_post/main/');

// ARTISTIC POST THUMBS
    define('ART_POST_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_post/thumbs/');

// ARTISTIC POST 335 X 320
    define('ART_POST_RESIZE1_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_post/resize1/');

// ARTISTIC POST 335 X 245
    define('ART_POST_RESIZE2_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_post/resize2/');

// ARTISTIC POST 210 X 210
    define('ART_POST_RESIZE3_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_post/resize3/');
// ARTISTIC POST 550 X 220
    define('ART_POST_RESIZE4_UPLOAD_URL', BUCKETLINK . 'uploads/artistic_post/resize4/');

// BLOG MAIN IMAGE
    define('BLOG_MAIN_UPLOAD_URL', BUCKETLINK . 'uploads/blog/main/');

// BLOG THUMB THUMB
    define('BLOG_THUMB_UPLOAD_URL', BUCKETLINK . 'uploads/blog/thumbs/');
} else {
    //USER PHOTO 
    define('USER_WEB_IMAGE_URL', BASEURL . 'admin/../uploads/users/main/');
    define('USER_IMAGE_URL', BASEURL . '../uploads/users/main/');
    define('USERS_IMAGE_URL', BASEURL . 'uploads/users/main/');

    //CATEGORY PHOTO 
    define('CATEGORY_IMAGE_URL', BASEURL . 'uploads/category/main/');
    define('CATEGORY_IMAGE_THUMB_URL', BASEURL . 'uploads/category/thumb/');
    define('CATEGORY_WEB_IMAGE_URL', BASEURL . 'admin/../uploads/category/main/');
    define('CATEGORY_WEB_IMAGE_THUMB_URL', BASEURL . 'admin/../uploads/category/thumb/');

// USER BACKGROUND IMAGE
    define('USER_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/user_bg/main/');

// USER BACKGROUND THUMB IMAGE 
    define('USER_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/user_bg/thumbs/');

// USER BACKGROUND ORIGINAL IMAGE 
    define('USER_BG_ORIGINAL_UPLOAD_URL', BASEURL . 'uploads/user_bg/original/');

// USER PROFILE IMAGE
    define('USER_MAIN_UPLOAD_URL', BASEURL . 'uploads/user_profile/main/');

// USER PROFILE THUMB IMAGE
    define('USER_THUMB_UPLOAD_URL', BASEURL . 'uploads/user_profile/thumbs/');

// JOB PROFILE IMAGE 
    define('JOB_PROFILE_MAIN_UPLOAD_URL', BASEURL . 'uploads/job_profile/main/');

// JOB PROFILE THUMB IMAGE
    define('JOB_PROFILE_THUMB_UPLOAD_URL', BASEURL . 'uploads/job_profile/thumbs/');

// JOB BACKGROUND IMAGE 
    define('JOB_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/job_bg/main/');

// JOB BACKGROUND THUMB IMAGE
    define('JOB_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/job_bg/thumbs/');

// JOB BACKGROUND ORIGINAL IMAGE
    define('JOB_BG_ORIGINAL_UPLOAD_URL', BASEURL . 'uploads/job_bg/original/');

// JOB EDUCATION CERTIFICATE
    define('JOB_EDU_MAIN_UPLOAD_URL', BASEURL . 'uploads/job_education/main/');

// JOB EDUCATION THUMB CERTIFICATE
    define('JOB_EDU_THUMB_UPLOAD_URL', BASEURL . 'uploads/job_education/thumbs/');

// JOB WORK EXPERIENCE CERTIFICATE
    define('JOB_WORK_MAIN_UPLOAD_URL', BASEURL . 'uploads/job_work/main/');

//  JOB WORK EXPERIENCE THUMB CERTIFICATE
    define('JOB_WORK_THUMB_UPLOAD_URL', BASEURL . 'uploads/job_work/thumbs/');

// RECRUITER PROFILE IMAGE 
    define('REC_PROFILE_MAIN_UPLOAD_URL', BASEURL . 'uploads/recruiter_profile/main/');

// RECRUITER PROFILE THUMB IMAGE
    define('REC_PROFILE_THUMB_UPLOAD_URL', BASEURL . 'uploads/recruiter_profile/thumbs/');

// RECRUITER BACKGROUND IMAGE 
    define('REC_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/recruiter_bg/main/');

// RECRUITER BACKGROUND THUMB IMAGE
    define('REC_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/recruiter_bg/thumbs/');

// RECRUITER BACKGROUND ORIGINAL IMAGE
    define('REC_BG_ORIGINAL_UPLOAD_URL', BASEURL . 'uploads/recruiter_bg/original/');

// FREELANCER PORTFOLIO ATTACHMENT 
    define('FREE_PORTFOLIO_MAIN_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_portfolio/main/');

// FREELANCER PORTFOLIO ATTACHMENT THUMBS
    define('FREE_PORTFOLIO_THUMB_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_portfolio/thumbs/');

// FREELANCER HIRE PROFILE 
    define('FREE_HIRE_PROFILE_MAIN_UPLOAD_URL', BASEURL . 'uploads/freelancer_hire_profile/main/');

// FREELANCER HIRE PROFILE THUMBS
    define('FREE_HIRE_PROFILE_THUMB_UPLOAD_URL', BASEURL . 'uploads/freelancer_hire_profile/thumbs/');

// FREELANCER HIRE BACKGROUND
    define('FREE_HIRE_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/freelancer_hire_bg/main/');

// FREELANCER HIRE BACKGROUND THUMB
    define('FREE_HIRE_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/freelancer_hire_bg/thumbs/');

// FREELANCER HIRE BACKGROUND ORIGINAL
    define('FREE_HIRE_BG_ORIGINAL_UPLOAD_URL', BASEURL . 'uploads/freelancer_hire_bg/original/');

// FREELANCER POST PROFILE
    define('FREE_POST_PROFILE_MAIN_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_profile/main/');

// FREELANCER POST PROFILE THUMBS
    define('FREE_POST_PROFILE_THUMB_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_profile/thumbs/');

// FREELANCER POST PROFILE BACKGROUND
    define('FREE_POST_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_bg/main/');

// FREELANCER POST PROFILE BACKGROUND THUMBS
    define('FREE_POST_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_bg/thumbs/');

// FREELANCER POST PROFILE BACKGROUND ORIGINAL
    define('FREE_POST_BG_ORIGINAL_UPLOAD_URL', BASEURL . 'uploads/freelancer_post_bg/original/');

// BUSINESS PROFILE IMAGE
    define('BUS_PROFILE_MAIN_UPLOAD_URL', BASEURL . 'uploads/business_profile/main/');

// BUSINESS PROFILE IMAGE THUMBS
    define('BUS_PROFILE_THUMB_UPLOAD_URL', BASEURL . 'uploads/business_profile/thumbs/');

// BUSINESS DETAILS IMAGE
    define('BUS_DETAIL_MAIN_UPLOAD_URL', BASEURL . 'uploads/business_profile/main/');

// BUSINESS DETAILS IMAGE THUMBS
    define('BUS_DETAIL_THUMB_UPLOAD_URL', BASEURL . 'uploads/business_profile/thumbs/');

// BUSINESS PROFILE BACKGROUND
    define('BUS_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/business_bg/main/');

// BUSINESS PROFILE BACKGROUND THUMBS
    define('BUS_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/business_bg/thumbs/');

// BUSINESS PROFILE BACKGROUND ORIGINAL
    define('BUS_BG_ORIGINAL_UPLOAD_URL', BASEURL . 'uploads/business_bg/original/');

// BUSINESS POST 
    define('BUS_POST_MAIN_UPLOAD_URL', BASEURL . 'uploads/business_post/main/');

// BUSINESS POST RESIZED
    define('BUS_POST_RESIZE_UPLOAD_URL', BASEURL . 'uploads/business_post/resize/');

// BUSINESS POST THUMBS
    define('BUS_POST_THUMB_UPLOAD_URL', BASEURL . 'uploads/business_post/thumbs/');

// BUSINESS POST 335 X 320
    define('BUS_POST_RESIZE1_UPLOAD_URL', BASEURL . 'uploads/business_post/resize1/');

// BUSINESS POST 335 X 245
    define('BUS_POST_RESIZE2_UPLOAD_URL', BASEURL . 'uploads/business_post/resize2/');

// BUSINESS POST 210 X 210
    define('BUS_POST_RESIZE3_UPLOAD_URL', BASEURL . 'uploads/business_post/resize3/');

// BUSINESS POST 550 X 220
    define('BUS_POST_RESIZE4_UPLOAD_URL', BASEURL . 'uploads/business_post/resize4/');

// ARTISTIC PROFILE IMAGE
    define('ART_PROFILE_MAIN_UPLOAD_URL', BASEURL . 'uploads/artistic_profile/main/');

// ARTISTIC PROFILE IMAGE THUMBS
    define('ART_PROFILE_THUMB_UPLOAD_URL', BASEURL . 'uploads/artistic_profile/thumbs/');

    // ARTISTIC POST 335 X 320
    define('ART_POST_RESIZE1_UPLOAD_URL', BASEURL . 'uploads/artistic_post/resize1/');

// ARTISTIC POST 335 X 245
    define('ART_POST_RESIZE2_UPLOAD_URL', BASEURL . 'uploads/artistic_post/resize2/');

// ARTISTIC POST 210 X 210
    define('ART_POST_RESIZE3_UPLOAD_URL', BASEURL . 'uploads/artistic_post/resize3/');

// ARTISTIC POST 550 X 220
    define('ART_POST_RESIZE4_UPLOAD_URL', BASEURL . 'uploads/artistic_post/resize4/');
// ARTISTIC PROFILE BACKGROUND
    define('ART_BG_MAIN_UPLOAD_URL', BASEURL . 'uploads/artistic_bg/main/');

// ARTISTIC PROFILE BACKGROUND THUMBS
    define('ART_BG_THUMB_UPLOAD_URL', BASEURL . 'uploads/artistic_bg/thumbs/');

// ARTISTIC PROFILE BACKGROUND ORIGINAL
    define('ART_BG_original_UPLOAD_URL', BASEURL . 'uploads/artistic_bg/original/');

// ARTISTIC PORTFOLIO
    define('ART_PORTFOLIO_MAIN_UPLOAD_URL', BASEURL . 'uploads/artistic_portfolio/main/');

// ARTISTIC PORTFOLIO THUMBS
    define('ART_PORTFOLIO_THUMB_UPLOAD_URL', BASEURL . 'uploads/artistic_portfolio/thumbs/');

// ARTISTIC POST 
    define('ART_POST_MAIN_UPLOAD_URL', BASEURL . 'uploads/artistic_post/main/');

// ARTISTIC POST THUMBS
    define('ART_POST_THUMB_UPLOAD_URL', BASEURL . 'uploads/artistic_post/thumbs/');

// BLOG MAIN IMAGE
    define('BLOG_MAIN_UPLOAD_URL', BASEURL . 'uploads/blog/main/');

// BLOG THUMB THUMB
    define('BLOG_THUMB_UPLOAD_URL', BASEURL . 'uploads/blog/thumbs/');
}

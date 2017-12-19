<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
         $this->load->library('form_validation');
//        if (!$this->session->userdata('user_id')) {
//            redirect('login', 'refresh');
//        }
         $this->load->model('email_model');
        //AWS access info start
        $this->load->library('S3');
        //AWS access info end
        include ('include.php');
    }

    public function index() { 

      $userid =  $this->session->userdata('aileenuser');
      $this->data['userdata'] =  $this->common->select_data_by_id('user', 'user_id', $userid, $data = '*', $join_str = array());

      
      $this->data['usry'] = date('Y',strtotime($this->data['userdata'][0][user_dob]));
      $this->data['usrm'] = date('m',strtotime($this->data['userdata'][0][user_dob]));
      $this->data['usrd'] = date('d',strtotime($this->data['userdata'][0][user_dob]));
  
        $this->load->view('profile/profile', $this->data);
    }

    public function edit_profile() { 
      //  echo '<pre>'; echo $id; print_r($_POST); die();

       // echo $_FILES['profileimg']['name']; die();
    $id = $this->session->userdata('aileenuser');
      
         
         $contition_array = array( 'user_id' => $id);
      $this->data['userdata'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
    
      

      $this->form_validation->set_rules('first_name', 'first Name', 'required');
        $this->form_validation->set_rules('last_name', 'last Name', 'required');
        $this->form_validation->set_rules('email', ' EmailId', 'required|valid_email');
       //  $this->form_validation->set_rules('datepicker', ' datepicker', 'required');
     
      $this->form_validation->set_rules('gender', ' gender', 'required');
     


       // if (empty($_FILES['profileimg']['name']))
       //       { //echo"hello"; die();
       //           //echo "falgunifgf"; die();
       //           $this->form_validation->set_rules('profileimg', 'Upload profilepic', 'required');
       //      //$picture = '';
       //      }
            // else
            // { //echo "hii";die();
            //     $config['upload_path'] = 'uploads/user_image/';
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';
            //    // $config['file_name'] = $_FILES['picture']['name'];
            //     $config['file_name'] = $_FILES['profilepic']['name'];
            //     //$config['max_size'] = '1000000000000000';
            //     //Load upload library and initialize configuration
            //     $this->load->library('upload',$config);
            //     $this->upload->initialize($config);
                
            //     if($this->upload->do_upload('profileimg'))
            //     {
            //         $uploadData = $this->upload->data();
            //         //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
            //         $picture = $uploadData['file_name'];
            //     }
            //     else
            //     {
            //         $picture = '';
            //     }

            $post_data = $this->input->post();
           // echo "<pre>"; print_r($post_data);
           // $dob = str_replace('/', '-', $post_data['datepicker']);
           // echo $dob;die();
      $date = $this->input->post('selday');
      $month = $this->input->post('selmonth');
      $year = $this->input->post('selyear');
            
      $dob = $year . '-' . $month . '-' . $date;
            
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'user_dob' => date('Y-m-d',strtotime($dob)),
                'user_email' => $this->input->post('email'),
                'user_gender' => $this->input->post('gender')
                //'user_image' => $picture
             );

            
    $updatdata =   $this->common->update_data($data,'user','user_id',$id);

   if($updatdata ){ //echo"falguni"; die();
           
              $this->session->set_flashdata('success', 'Profile information updated successfully');
             redirect('profiles/' . $this->session->userdata('aileenuser_slug'), 'refresh');
       }else{
                
                $this->session->flashdata('error','Sorry!! Your data not updated');
               redirect('profile', 'refresh');
       }
       
     }

//User email already exist checking controller start

    public function check_email() {

        $email = $this->input->post('email');

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $email1 = $userdata[0]['user_email'];


        if ($email1) {
            $condition_array = array('is_delete' => '0', 'user_id !=' => $userid, 'status' => '1');

            $check_result = $this->common->check_unique_avalibility('user', 'user_email', $email, '', '', $condition_array);
        } else {

            $condition_array = array('is_delete' => '0', 'status' => '1');

            $check_result = $this->common->check_unique_avalibility('user', 'user_email', $email, '', '', $condition_array);
        }

        if ($check_result) {
            echo 'true';
            die();
        } else {
            echo 'false';
            die();
        }
    }

//User email already exist checking controller End
    

     public function forgot_password() { 
      $forgot_email = $this->input->post('forgot_email'); 


        if ($forgot_email != '') {

            $forgot_email_check = $this->common->select_data_by_id('user', 'user_email', $forgot_email, '*', '');

          //echo '<pre>'; print_r($forgot_email_check); die();
              
            if (count($forgot_email_check) > 0) {
                
           // $rand_password = rand(100000, 999999);
           
           $rand_password = $this->random_string(6);


         $email= $forgot_email_check[0]['user_email'];
         $username= $forgot_email_check[0]['user_name'];
         $firstname= $forgot_email_check[0]['first_name'];
         $lastname= $forgot_email_check[0]['last_name'];
            
            $toemail= $forgot_email; 

            
            
           // $msg .= "Hey !" . $username ."<br/>"; 
           // $msg .=  " " . $firstname . " " . $lastname . ",";
           // $msg .= "This is your code.";
           // $msg .= "<br>"; 
           // $msg .= " " . $rand_password . " "; 
           // $msg .= "<a href=" .  base_url('profile/change_password/' . $forgot_email_check[0]['user_id']) . ">Change password</a>"; 


                 
        $msg .= '<tr>
              <td style="text-align:center; padding:10px 0 30px; font-size:15px;">';
        $msg .= '<p style="margin:0; font-family:arial;">Hi,' . ucwords($firstname) .' '.ucwords($lastname) . '</p>
                <p style="padding:25px 0 ; font-family:arial; margin:0;">This is your code: '.$rand_password .'</p>
                <p><a style="background: -moz-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3bb0ac), color-stop(56%, #1b8ab9), color-stop(100%, #1b8ab9));
        background: -webkit-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: -o-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: -ms-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: linear-gradient(354deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#3bb0ac", endColorstr="#1b8ab9",GradientType=0 );
        font-size:16px;
           color:#fff;
      padding: 7px 12px;
    text-decoration: none;
    font-family: arial;
    letter-spacing: 1px;" class="btn" href="' . base_url() . 'profile/changepassword/' . $forgot_email_check[0]['user_id'] . '">Reset password</a></p>
              </td>
            </tr>';


          
           //echo $msg; die();
            $subject = "Forgot password";


   //$mail = $this->email_model->do_email($msg, $subject,$toemail,'');
   $mail = $this->email_model->sendEmail($app_name = '', $app_email = '', $toemail , $subject, $msg);
//die();
   $data = array(
                'password_code' => $rand_password
                 );

     
    $updatdata =   $this->common->update_data($data,'user','user_id',$forgot_email_check[0]['user_id']);
             
   
            $this->session->set_flashdata('success', '<div class="alert alert-success">We have successfully sent a code in provided email address.</div>');
                redirect('login', 'refresh');
            } else {
             //  echo "2222"; die();
                $this->session->set_flashdata('error', '<div class="alert alert-danger">Code for new password successfully not send in your email id.</div>');
                redirect('login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Please enter email id.</div>');
            redirect('login', 'refresh');
        }
    }

 public function changepassword($abc){ 

      $this->data['user_changeid'] = $abc;
            $this->data['emailid'] = $this->common->select_data_by_id('user', 'user_id', $abc, '*', '');

        $this->data['forgetpassword_header'] = $this->load->view('forgetpassword_header', $this->data,TRUE);
      

      $this->load->view('profile/change_password', $this->data);

  }
  public function code_check($abc){
//echo $abc; die();
     $code = $this->input->post('code');
     $this->data['userid'] = $userid = $this->input->post('userid');


        $this->data['forgetpassword_header'] = $this->load->view('forgetpassword_header', $this->data,TRUE);

      $checkdata = $this->common->select_data_by_id('user', 'user_id', $abc, '*', '');

     
      if ($checkdata[0]['password_code'] == $code) {
        echo 'true';
        die();
        } else {
        echo 'false';
        die();
        }

  }

  public function checkredirect($abc){

    $this->data['userid'] = $abc;

    $this->load->view('profile/change_password_view', $this->data);


  }
  public function new_forgetpassword($abc){

   //$code_userid = $this->input->post('usercon');
    $new_password = $this->input->post('new_password');

     $data = array(
                'user_password' => md5($new_password),
                'password_code' => ''
                 );

     
    $updatdata =   $this->common->update_data($data,'user','user_id',$abc);
    $this->session->set_userdata('aileenuser', $abc);
    redirect('profiles/' . $this->session->userdata('aileenuser_slug'), refresh); 
  }

     public function sendEmail($app_name = '', $app_email = '', $to_email = '', $subject = '', $mail_body = '') {
//echo $to_email; die(); 
     //echo "hii"; die();
        //Loading E-mail Class
        $this->load->library('email');

        $emailsetting = $this->common->select_data_by_condition('email_settings', array(), '*');

        $mail_html = '<table width="100%" cellspacing="10" cellpadding="10" style="background:#f1f1f1;" style="border:2px solid #ccc;" >
    <tr>
     <td valign="center"><img src="' . base_url('assets/img/logo.png') . '" alt="' . $this->data['main_site_name'] . '" style="margin:0px auto;display:block;width:150px;"/></td> 
  </tr> 
<tr>
  <td>
     
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <p>
                            "' . $mail_body . '"
                        </p>
    </table>
  </td>
</tr>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
     
      <tr>
      <td style="font-family:Ubuntu, sans-serif;font-size:11px; padding-bottom:15px; padding-top:15px; border-top:1px solid #ccc;text-align:center;background:#eee;"> &copy; ' . date("Y") . ' <a href="' . $this->data['main_site_url'] . '" style="color:#268bb9;text-decoration:none;"> ' . $this->data['main_site_name'] . '</a></td>
      </tr>
</table> 
</table>';

        //Loading E-mail Class
        $config['protocol'] = "smtp";
        $config['smtp_host'] = $emailsetting[0]['host_name'];
        $config['smtp_port'] = $emailsetting[0]['out_going_port'];
        $config['smtp_user'] = $emailsetting[0]['user_name'];
        $config['smtp_pass'] = $emailsetting[0]['password'];
        $config['smtp_rec_email'] = $emailsetting[0]['receiver_email'];
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
// echo '<pre>'; print_r($config); die();
        $this->email->initialize($config);
        $this->email->from($config['smtp_user'], $app_name);
        $this->email->to($to_email);

        //    $this->email->cc($cc);

        $this->email->subject($subject);
        $this->email->message(html_entity_decode($mail_body));

        if ($this->email->send()) {
            return true; 
        } else {
            return FALSE; 
        }
    }


     public function login() {
      

        $this->load->view('profile/rec_forgott_password', $this->data);
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


public function check_emailforget() { //echo "hello"; die();
        // if ($this->input->is_ajax_request() && $this->input->post('email')) {

        $email_reg = $this->input->post('email_reg');

        // $userid = $this->session->userdata('aileenuser');

            $contition_array = array( 'is_delete' => '0' , 'status' => '1');
           $userdata = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

  
          $condition_array = array('is_delete' => '0' , 'status' => '1');
        
        $check_result = $this->common->check_unique_avalibility('user', 'user_email', $email_reg, '', '', $condition_array);

        if ($check_result) {
        echo 'false';
        die();
        } else {
        echo 'true';
        die();
        }
        }
        
        public function forgot_live() { 
      $forgot_email = $this->input->post('forgot_email'); 


        if ($forgot_email != '') {

            $forgot_email_check = $this->common->select_data_by_id('user', 'user_email', $forgot_email, '*', '');

          //echo '<pre>'; print_r($forgot_email_check); die();
              
            if (count($forgot_email_check) > 0) {
                
           // $rand_password = rand(100000, 999999);
           
           $rand_password = $this->random_string(6);


         $email= $forgot_email_check[0]['user_email'];
         $username= $forgot_email_check[0]['user_name'];
         $firstname= $forgot_email_check[0]['first_name'];
         $lastname= $forgot_email_check[0]['last_name'];
            
            $toemail= $forgot_email; 

            
            
           // $msg .= "Hey !" . $username ."<br/>"; 
           // $msg .=  " " . $firstname . " " . $lastname . ",";
           // $msg .= "This is your code.";
           // $msg .= "<br>"; 
           // $msg .= " " . $rand_password . " "; 
           // $msg .= "<a href=" .  base_url('profile/change_password/' . $forgot_email_check[0]['user_id']) . ">Change password</a>"; 


                 
        $msg .= '<tr>
              <td style="text-align:center; padding:10px 0 30px; font-size:15px;">';
        $msg .= '<p style="margin:0; font-family:arial;">Hi,' . ucwords($firstname) .' '.ucwords($lastname) . '</p>
                <p style="padding:25px 0 ; font-family:arial; margin:0;">This is your code: '.$rand_password .'</p>
                <p><a style="background: -moz-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3bb0ac), color-stop(56%, #1b8ab9), color-stop(100%, #1b8ab9));
        background: -webkit-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: -o-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: -ms-linear-gradient(96deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        background: linear-gradient(354deg, #1b8ab9 0%, #1b8ab9 44%, #3bb0ac 100%); 
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#3bb0ac", endColorstr="#1b8ab9",GradientType=0 );
        font-size:16px;
           color:#fff;
      padding: 7px 12px;
    text-decoration: none;
    font-family: arial;
    letter-spacing: 1px;" class="btn" href="' . base_url() . 'profile/changepassword/' . $forgot_email_check[0]['user_id'] . '">Reset password</a></p>
              </td>
            </tr>';


          
           //echo $msg; die();
            $subject = "Forgot password";


   //$mail = $this->email_model->do_email($msg, $subject,$toemail,'');
   $mail = $this->email_model->sendEmail($app_name = '', $app_email = '', $toemail , $subject, $msg);
//die();
   $data = array(
                'password_code' => $rand_password
                 );

     
    $updatdata =   $this->common->update_data($data,'user','user_id',$forgot_email_check[0]['user_id']);
             
              
                        echo json_encode(
                            array(
                                "data" => 'success',
                                "message" => '<div class="alert alert-success">We have successfully sent a code in provided email address.</div>',
                    ));
           // $this->session->set_flashdata('success', '<div class="alert alert-success">We have successfully sent a code in provided email address.</div>');
                //redirect('login', 'refresh');
            } else {
                
                 echo json_encode(
                            array(
                                "data" => 'error',
                                "message" => '<div class="alert alert-danger">Code for new password successfully not send in your email id.</div>',
                    ));
             //  echo "2222"; die();
                //$this->session->set_flashdata('error', '<div class="alert alert-danger">Code for new password successfully not send in your email id.</div>');
               // redirect('login', 'refresh');
            }
        } else {
            
            echo json_encode(
                            array(
                                "data" => 'error',
                                "message" => '<div class="alert alert-danger">Please enter email id.</div>',
                    ));
//            $this->session->set_flashdata('error', '<div class="alert alert-danger">Please enter email id.</div>');
//            redirect('login', 'refresh');
        }
    }


}
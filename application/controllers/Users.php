<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('super_model');
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/welcome
     *  - or -
     *      http://example.com/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

      function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }
    }

    public function index(){
        $this->load->view('users/login');
    }

    public function dashboard(){
        $this->load->view('user_template/header');
        $this->load->view('user_template/navbar');
        $this->load->view('users/dashboard');
        $this->load->view('user_template/footer');
    }


public function login(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $count=$this->super_model->login_register($email,$password);
        if($count>0){   
            $password1 =md5($this->input->post('password'));
            $fetch=$this->super_model->select_custom_where("registration", "email = '$email' AND (password = '$password' OR password = '$password1')");
            foreach($fetch AS $d){
                $complete_name = $d->fname." ".$d->mname." ".$d->lname; 
                $register_id = $d->register_id;
                $email = $d->email;
                $fullname = $complete_name;
            }
            $newdata = array(
               'user_id'=> $register_id,
               'email'=> $email,
               'fullname'=> $fullname,
               'logged_in'=> TRUE,
            );
            $this->session->set_userdata($newdata);
            redirect(base_url().'users/dashboard/');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Email And Password Do not Exist!');
            $this->load->view('users/login');
        }
    }

    public function reset(){
        $email = $this->input->post('email');
        $count=$this->super_model->count_rows_where("registration","email",$email);
        if ($count > 0){
            $string="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $code="";
            $limit=5;
            $i=0;
            while($i<=$limit){
                $rand=rand(0,61);
                $code.=$string[$rand];
                $i++;
            }
            $data=array(
                "password"=>$code
            );
            $this->super_model->update_where("registration", $data, "email", $email);
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $to = $email;
            $subject = "Email Verification";
            $message = "
            <html>
            <head>
            <title>Change the password for your username</title>
            </head>
            <body>
            <p>Here is the new password for you account ".$email."</p>
            <table>
            <tr>
            <th>Email</th>
            <th>New Password</th>
            </tr>
            <tr>
            <td>".$code."</td>
            <td></td>
            </tr>
            </table>
            </body>
            </html>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";
            var_dump(mail($to,$subject,$message,$headers));
            echo "<script>alert('Successfully Changed!'); 
            window.location ='".base_url()."users/index'; </script>";      
        }else{
            echo "<script>alert('Email Address not found!'); 
            window.location ='".base_url()."users/index'; </script>";
       }
    }

    public function register(){
        $this->load->view('users/register');
    }

    public function insert_registration(){
        $fname = trim($this->input->post('fname')," ");
        $lname = trim($this->input->post('lname')," ");
        $mname = trim($this->input->post('mname')," ");
        $contact_no = trim($this->input->post('contact_no')," ");
        $email = trim($this->input->post('email')," ");
        $password = trim($this->input->post('password')," ");
        $data = array(
            'fname'=>$fname,
            'mname'=>$mname,
            'lname'=>$lname,
            'contact_no'=>$contact_no,
            'email'=>$email,
            'password'=>$password,
        );
        if($this->super_model->insert_into("registration", $data)){
           echo "<script>alert('Successfully Registered!'); 
                window.location ='".base_url()."users/index'; </script>";
        }
    }

    public function user_logout(){
        $this->session->sess_destroy();
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."users/index'; </script>";
    }



}
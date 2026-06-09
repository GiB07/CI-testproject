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

         $type = $this->input->get('type');

        if($type){
            $data['products'] = $this->super_model
                ->select_custom_where('products', "type = '$type'");
        } else {
            $data['products'] = $this->super_model
                ->select_all_order_by('products', 'product_id', 'ASC');
        }

        $this->load->view('user_template/header');
        $this->load->view('user_template/navbar');
        $this->load->view('users/dashboard', $data);
        $this->load->view('user_template/footer');
    }

    public function upload(){
        $this->load->view('user_template/header');
        $this->load->view('user_template/navbar');
        $this->load->view('users/upload');
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
            redirect(base_url().'users/dashboard');
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

    public function save_product()
    {
        $path = './uploads/products/';

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048; // 2MB
        $config['max_width']  = 3000;
        $config['max_height'] = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {

            echo json_encode([
                'status' => 'error',
                'message' => $this->upload->display_errors('', '')
            ]);
            return;
        }

        $file = $this->upload->data();

        $this->db->insert('products', [
            'product_name' => $this->input->post('product_name'),
            'description'  => $this->input->post('description'),
            'price'        => $this->input->post('price'),
            'type'      => $this->input->post('type'),
            'image'        => $file['file_name']
        ]);

        echo json_encode([
            'status' => 'success',
            'message' => 'Product uploaded successfully'
        ]);
    }

    public function add_to_cart(){

        $id = $this->input->post('product_id');
        $qty = $this->input->post('qty');

        $product = $this->super_model->select_custom_where('products', "product_id = '$id'");

        if(!$product)
        {
            echo json_encode(['status'=>'error','message'=>'Product not found']);
            return;
        }

        $p = $product[0];

        $cart = $this->session->userdata('cart');

        if(isset($cart[$id]))
        {
            $cart[$id]['qty'] += $qty;
        }
        else
        {
            $cart[$id] = [
                'name'  => $p->product_name,
                'price' => $p->price,
                'qty'   => $qty,
                'image' => $p->image
            ];
        }

        $this->session->set_userdata('cart', $cart);

        echo json_encode([
            'status' => 'success',
            'message' => 'Added to cart'
        ]);
    }

    public function cart_count(){
            
        $cart = $this->session->userdata('cart');

        $count = 0;

        if($cart)
        {
            foreach($cart as $item)
            {
                $count += $item['qty'];
            }
        }

        echo $count;
    }

    public function checkout(){

        $cart = $this->session->userdata('cart');
        $user_id = $this->session->userdata('user_id');

        if(!$cart || count($cart) == 0)
        {
            echo json_encode(['status'=>'error','message'=>'Cart is empty']);
            return;
        }

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['qty'];
        }

        // 1. save order
        $this->db->insert('orders', [
            'user_id' => $user_id,
            'total_amount' => $total,
            'status' => 'pending'
        ]);
        var_dump($user_id);

        $order_id = $this->db->insert_id();

        // 2. save items
        foreach($cart as $id => $item){

            $this->db->insert('order_items', [
                'order_id' => $order_id,
                'product_id' => $id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['price'] * $item['qty']
            ]);
        }

        // 3. clear session cart
        $this->session->unset_userdata('cart');

        echo json_encode([
            'status' => 'success',
            'message' => 'Order placed successfully'
        ]);
    }



}
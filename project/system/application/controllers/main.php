<?php
class Main extends Controller {
	function index() {
	
	$this->load->model('m_product', 'pro');
	$this->load->model('m_pro_type', 'ptype');
	$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
	$data['body']=$this->load->view('form/home/v_flashbody','',TRUE);
	$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
	$this->load->view('form/output/v_output_main',$data);
	}
	
	function login() 
	{
	//---captcha-------------------------------------------------
    $this->load->helper(array('form', 'url'));
    session_start();
	$captcha_result = '';
	$data['cap_img'] = $this -> _make_captcha();
	//---captcha-------------------------------------------------
	$this->load->model('m_cust_income', 'cust_inc');
	$this->load->model('m_cust_province', 'cust_prv');	
	$this->load->model('m_cust_job', 'cust_job');
	$this->load->model('m_cust_education', 'cust_edu');
	$this->load->model('m_cust_status', 'cust_status');
	$this->load->model('m_cust_sta_mar', 'cust_sta_mar');
	$this->load->model('m_cust_question', 'cust_quest');
	$data['error']="";
	$data['cust_inc'] = $this->cust_inc->get_options_income();
	$data['cust_prv'] = $this->cust_prv->get_options_province();	
	$data['cust_job'] = $this->cust_job->get_options_job();
	$data['cust_edu'] = $this->cust_edu->get_options_education();
	$data['cust_status'] = $this->cust_status->get_options_status();
	$data['cust_sta_mar'] = $this->cust_sta_mar->get_options_sta_mar();
	$data['cust_quest'] = $this->cust_quest->get_options_question();
	$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
	$data['subHeader']=$this->load->view('form/home/v_subHeader','',TRUE);
	$data['body']=$this->load->view('form/home/v_login',$data,TRUE);
	$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
	$this->load->view('form/output/v_output',$data);
	}

   function _make_captcha()
  {
    $this -> load -> plugin( 'captcha' );
    $vals = array(
      'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
      'img_url' => ''.base_url().'/captcha/', // URL for captcha img
      'img_width' => 200, // width
      'img_height' => 60, // height
      'font_path'     => '../system/fonts/PSL-58.ttf',
      'expiration' =>7200 ,  //ที่ให้ลบ captcha
      ); 
    // Create captcha
    $cap = create_captcha( $vals );   //สร้าง captcah เก็บไว้ใน cap
    // Write to DB
    if ( $cap ) {
      $data = array(
        'captcha_id' => '',
        'captcha_time' => $cap['time'],
        'ip_address' => $this -> input -> ip_address(),
        'word' => $cap['word'] , //คำ random
        );
      $query = $this -> db -> insert_string( 'captcha', $data ); //insert เข้าฐานข้อมูล captcha
      $this -> db -> query( $query );
    }else {
      return "Umm captcha not work" ; //ถ้า cap ไม่มีค่า
    }
    return $cap['image'] ;
  }
	
	function logOut() {
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('cust_id');
		$this->session->unset_userdata('cust_addr_pay_id');
		$this->session->unset_userdata('cust_addr_shipp_id');
		$this->session->unset_userdata('cust_email');
		$this->session->unset_userdata('payment_method'); //เก็บวีธีจ่ายเงิน
		$this->session->unset_userdata('shipping_method'); //เก็บวิธีจัดส่ง
		$this->session->unset_userdata('total');
	    $this->session->unset_userdata('history');
		$this->load->library('cart');
		$this->cart->destroy();
		//$this->session->sess_destroy();
		redirect('main', 'refresh');
				
	}
	
	function resentPass() {
		$this->load->model('m_cust_question', 'cust_quest');
		$data['cust_quest'] = $this->cust_quest->get_options_question();
		$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
		$data['subHeader']="";
		$data['error']="";
		$data['body']=$this->load->view('form/home/v_resentPass',$data,TRUE);
		$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
		$this->load->view('form/output/v_output',$data);
	}
}
?>

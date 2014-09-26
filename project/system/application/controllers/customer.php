<?php
class Customer extends Controller {

	function checkLogCust() {
		
		$this->form_validation->set_error_delimiters('<FONT COLOR=#FF0000>', '</FONT>');
		$this->form_validation->set_rules('cust_login1', 'username', 'trim|required');
		$this->form_validation->set_rules('cust_password1', 'password', 'trim|required');
		
			if ($this->form_validation->run() == FALSE)  {
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
			else 
			{
				//---captcha-------------------------------------------------
				$this->load->helper(array('form', 'url'));
				session_start();
				$captcha_result = '';
				$data['cap_img'] = $this -> _make_captcha();
				//---captcha-------------------------------------------------
				$this->load->model('m_customer', 'cust');
				$this->cust->CustLogin = $_POST['cust_login1'];
				$this->cust->CustPassword = $_POST['cust_password1'];		
				$query = $this->cust->checkLoginCust();
				$row = $query->row();
				
					if ($query->num_rows()>0) {
					
						$this->session->set_userdata('login', $_POST['cust_login1']);
						$this->session->set_userdata('cust_id', $row->cust_id);
						$this->session->set_userdata('cust_email', $row->cust_email);
						$this->session->set_userdata('status', $row->cust_sta_id);
						//-----------------------------------------------login แล้วกลับหน้าเดิม---------------------------------------------------------------------
						$page = $this->session->userdata('page'); //มาจาก compare.php
						if($page==""){ 
						redirect('main', 'refresh'); //login ครั้งแรกจะเป็นค่าว่าง
					}
					else
					{
						$NewPage=$page;
						$this->session->set_userdata('page', ""); //ทำลาย page เพื่อ page ครั้งแรกจะได้ไม่มีค่า
						redirect($NewPage , 'refresh');
					}	
				} 
				else 
				{ //login ไม่ถูกหรือไม่ได้ login					
				$this->session->set_userdata('username', 'Username หรือ Password ไม่ถูกต้องหรือไม่ได้ยืนยันการสมัครสมาชิก กรุณาลองใหม่อีกครั้ง่!');
				redirect('main/login', 'refresh');
				}
			}
	}
	
	function showall() {
	
		$this->load->model('m_customer', 'cust');
		$data['qry'] = $this->cust->getAllCust();
		$this->load->view('customer/v_customers', $data);
		
	}

	function dodelete($cid) {
	
		$this->load->model('m_customer', 'cust');
		$this->cust->delCust($cid);	
		redirect('customer/showall', 'refresh');
		
	}
	
	function doaddCust() {
	
		$this->load->model('m_customer', 'cust');
		$this->form_validation->set_error_delimiters('<FONT COLOR=#FF0000>', '</FONT>');
		$this->form_validation->set_rules('cust_login', 'username', 'trim|required');
		$this->form_validation->set_rules('cust_password', 'password', 'trim|required|matches[cust_password2]');
		$this->form_validation->set_rules('cust_password2', 'confirm password', 'trim|required');
		$this->form_validation->set_rules('cust_name', 'ชื่อ', 'trim|required');
		$this->form_validation->set_rules('cust_lname', 'นามสกุล', 'trim|required');
		$this->form_validation->set_rules('cust_sex', 'เพศ', 'trim|required');
		$this->form_validation->set_rules('cust_address', 'บ้านเลขที่', 'trim|required');
		$this->form_validation->set_rules('cust_district', 'ตำบล', 'trim|required');
		$this->form_validation->set_rules('cust_canton', 'อำเภอ', 'trim|required');
		$this->form_validation->set_rules('cust_prv_id', 'จังหวัด', 'required');
		$this->form_validation->set_rules('cust_postcode', 'รหัสไปรษณีย์', 'trim|required|numeric');
		$this->form_validation->set_rules('cust_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('cust_tel', 'เบอร์โทรศัพท์บ้าน', 'trim|xss_clean|numeric|min_length[9]');
		$this->form_validation->set_rules('cust_phone', 'เบอร์โทรศัพท์มือถือ', 'trim|required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('cust_inc_id', 'รายได้์', 'required');
		$this->form_validation->set_rules('cust_job_id', 'อาชีพ', 'required');
		$this->form_validation->set_rules('cust_edu_id', 'การศึกษา', 'required');
		$this->form_validation->set_rules('cust_sta_mar_id', 'สภาพการสมรส', 'required');
		$this->form_validation->set_rules('cust_quest_id', 'คำถาม', 'required');
		$this->form_validation->set_rules('cust_answer', 'คำตอบ', 'required');
		$data['error']="";
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required');
		//$checkcapthca=$this->_check_capthca();
		$ckEmail=$this->cust->checkEmailCust(); //เช็คอีเมล
		$cklogin=$this->cust->checkLoginNumCust();  //เช็ด username ซ้ำหรือไม่
		$ckeckerror=0;
		
			if($cklogin!="0") {
			
				$ckeckerror="1";
				
			}
			else if ($ckEmail!="0")
			{
			
				$ckeckerror="1";
				
			}
			/*else if(!$checkcapthca)  
			{
			
				$ckeckerror="1";
				
			} */

			 if ($this->form_validation->run() == FALSE   &&  $ckeckerror="1") {
				
				if($cklogin!="0"){
					$this->session->set_userdata('subscribe_msg', 'username นี้ถูกใช้งานแล้ว กรุณากรอกใหม่!');
				}
				else if($ckEmail!="0")
				{
					$this->session->set_userdata('subscribe_msg', 'Email นี้ถูกใช้งานแล้ว กรุณากรอกใหม่!');
				}
				/*else if(!$checkcapthca) 
				{
					$this->session->set_userdata('subscribe_msg', 'Captcha ไม่ถูกต้องหรือไม่ได้กรอก . กรุณากรอกใหม่!');
				}*/
	
				
				//-------------------------------------สร้าง captcah ใหม่เพื่อเปลี่ยนรูปเมื่อเข้า false -------------------------------				
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				session_start();
				$captcha_result = '';
				$data['cap_img'] = $this -> _make_captcha();
				//------------------------------------------------------------------------------------------------------------------------		
														
				$this->load->model('m_cust_income', 'cust_inc');
				$this->load->model('m_cust_province', 'cust_prv');	
				$this->load->model('m_cust_job', 'cust_job');
				$this->load->model('m_cust_education', 'cust_edu');
				$this->load->model('m_cust_status', 'cust_status');
				$this->load->model('m_cust_sta_mar', 'cust_sta_mar');
				$this->load->model('m_cust_question', 'cust_quest');
				$data['error']="*กรุณากรอกข้อมูลให้ถูกต้องครบถูกต้อง";
				$data['cust_inc'] = $this->cust_inc->get_options_income();
				$data['cust_prv'] = $this->cust_prv->get_options_province();	
				$data['cust_job'] = $this->cust_job->get_options_job();
				$data['cust_edu'] = $this->cust_edu->get_options_education();
				$data['cust_status'] = $this->cust_status->get_options_status();
				$data['cust_sta_mar'] = $this->cust_sta_mar->get_options_sta_mar();
				$data['cust_quest'] = $this->cust_quest->get_options_question();
				$this->session->set_flashdata('subscribe_msg', 'All fields are required . Please try again!');
				$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
				$data['subHeader']=$this->load->view('form/home/v_subHeader','',TRUE);
				$data['body']=$this->load->view('form/home/v_login',$data,TRUE);
				$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
				$this->load->view('form/output/v_output',$data);
				
			}
			else  //	if ($this->form_validation->run() == FALSE) {
			{	

				$this->session->set_flashdata('subscribe_msg', 'Thanks for subscribing!');
				$this->load->model('m_customer', 'cust');
				$this->load->model('m_cust_address_pay', 'CustPay');
				$this->cust->CustID = $_POST['cust_id'];
				$this->cust->CustLogin = $_POST['cust_login'];
				$this->cust->CustPassword = $_POST['cust_password'];
				$this->cust->CustName = $_POST['cust_name'];
				$this->cust->CustSex = $_POST['cust_sex'];
				$this->cust->CustLname = $_POST['cust_lname'];
				$this->cust->Email= $_POST['cust_email'];
				$this->cust->CustTel = $_POST['cust_tel'];
				$this->cust->CustPhone = $_POST['cust_phone'];
				$this->cust->CustIncome = $_POST['cust_inc_id'];
				$this->cust->CustJob = $_POST['cust_job_id'];
				$this->cust->CustEducation = $_POST['cust_edu_id'];
				$this->cust->CustSta_mar = $_POST['cust_sta_mar_id'];
				$this->cust->CustQuestion = $_POST['cust_quest_id'];
				$this->cust->CustAnswer = $_POST['cust_answer'];
				$this->cust->ActivateCode = md5(Date('YmdHis'));
				$this->CustPay->CustName = $_POST['cust_name'];
				$this->CustPay->CustLname = $_POST['cust_lname'];
				$this->CustPay->CustAddress = $_POST['cust_address'];
				$this->CustPay->CustTumbol = $_POST['cust_district'];
				$this->CustPay->CustAmphor = $_POST['cust_canton'];
				$this->CustPay->CustProvince = $_POST['cust_prv_id'];
				$this->CustPay->CustPostcode = $_POST['cust_postcode'];
				if($this->input->post('cust_id')==''){
				
					$qry=$this->cust->insertCust();
					$row = $qry->row();
					$cust_id1=$row->cust_id;
					$this->CustPay->CustID = $cust_id1;
					$qry1=$this->CustPay->insertAddressPayCust();
					$row1 = $qry1->row();
					$cust_addr_pay_id=$row1->cust_addr_pay_id;
					$cust_addr_shipp_id=$row1->cust_addr_pay_id;
					$this->cust->updateAddCust($cust_id1,$cust_addr_pay_id,$cust_addr_shipp_id);
					//_____________________ส่งเมล์_______________________________
					$this->load->plugin('phpmailer');
					$mail = new phpmailer();
					
					$link = "".base_url()."index.php/customer/activate/".$this->cust->ActivateCode;
					$body = "ยืนยันการสมัครโดยคลิกที่ลิ้งนี้  <a href='".$link."' target='_blank'>".$link."</a>";
					$body= eregi_replace("[\]",'',$body);
					
					// เพิ่มบรรทัดนี้
					
					$mail->CharSet = "utf-8";
					
					$mail->IsSMTP(); // telling the class to use SMTP
					$mail->Host       = "mail.yourdomain.com"; // SMTP server
					$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
					// 1 = errors and messages
					// 2 = messages only
					$mail->SMTPAuth   = true;                 	// enable SMTP authentication
					$mail->SMTPSecure = "ssl";                 	// sets the prefix to the servier
					$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
					$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
					$mail->Username   = "piyananko@gmail.com";  // GMAIL username
					$mail->Password   = "piyananko30";            // GMAIL password
					
					$mail->SetFrom('piyanan-k@localhost.home', 'PJ.Furniture');
					$mail->AddReplyTo('piyanan-k@localhost.home', 'PJ.Furniture');
					
					$mail->Subject    = "ยืนยันการสมัครสมาชิก";
					
					$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
					
					$mail->MsgHTML($body);
					
					$mail->AddAddress($this->input->post('cust_email'), $this->input->post('cust_login'));
					
					//$mail->AddAttachment("images/phpmailer.gif");      // attachment
					//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
					
						if(!$mail->Send()) 
						{
							//echo "Mailer Error: " . $mail->ErrorInfo;
						}
						else //if(!$mail->Send()) 
						{
							//echo "Message sent!";
						}						
				}
				else 
				{ 
					//$this->cust->update();
				}
				
				redirect('main', 'refresh');
			}
	}
	
	 function _make_captcha() {
	 
		$this -> load -> plugin( 'captcha' );
		$vals = array(
			'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
			'img_url' => ''.base_url().'/captcha/', // URL for captcha img
			'img_width' => 200, // width
			'img_height' => 60, // height
			 'font_path'     => '../system/fonts/PSL-58.ttf',
			'expiration' => 7200 , 
		); 
	
		// Create captcha
	
		$cap = create_captcha( $vals );   //สร้าง captcah เก็บไว้ใน cap
		// Write to DB
	
		if ( $cap ) {
		
			$data = array(
				'captcha_id' => '',
				'captcha_time' => $cap['time'],
				'ip_address' => $this -> input -> ip_address(),
				'word' => $cap['word'] , 
			);
			
			$query = $this -> db -> insert_string( 'captcha', $data );
			$this -> db -> query( $query );
		}
		else 
		{
			return "Umm captcha not work" ; //ถ้า cap ไม่มีค่า
		}
		return $cap['image'] ;
	}
  
	function _check_capthca() { 
	
		// Delete old data ( 2hours)
		 $expiration = time()-7200;
		$sql = " DELETE FROM captcha WHERE captcha_time < ? ";
		 $binds = array($expiration); //expiration เวลา
		$query = $this->db->query($sql, $binds);
		
		//checking input
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
	
	  if ( $row -> count > 0 )
		{
		  return true;
		}
		return false;

  	}
  	
	function activate($code) {
	
		$this->load->model('m_customer', 'cust');
		$this->cust->activateCust($code);
		redirect('main/login', 'refresh');
		
	}
	
}
?>

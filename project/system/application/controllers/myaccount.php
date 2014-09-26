<?php
class Myaccount extends Controller {

	function __construct() {
	
		parent::Controller();
	}

	function MyAccount() {
	
	$cust_id = $this->session->userdata('cust_id');
		if(!empty($cust_id)) {
			
			$this->load->model('m_product', 'pro');
			$this->load->model('m_pro_type', 'ptype');
			$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
			$data['body']=$this->load->view('form/home/v_flashbody','',TRUE);
			$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
			$this->load->view('form/output/v_output_main',$data);
		
			}
		else
		{
				$this->session->set_userdata('page',"myaccount/MyAccount"); //ไม่ได้ login
				redirect('main/login', 'refresh');	
		}
	}
	
	function invoice($orders_id){

		$cust_id = $this->session->userdata('cust_id');
			if(!empty($cust_id)) {
			
				$this->load->model('m_customer', 'cust');
				$this->load->model('m_orders','orders');
				$this->load->model('m_cust_address_shipp', 'CustShipp');
				$this->load->model('m_orders_product', 'OrdersProduct');
				$this->load->model('m_orders_total', 'OrdersTotal');
				$data['qry']=$this->OrdersProduct->ShowOrdersPro($orders_id);	
				$data['qry1']=$this->OrdersTotal->ShowOrdersTotal($orders_id);
				$data['qry2']=$this->orders->showAllIDOrders($orders_id);
				$query1=$this->cust->addoneCust($cust_id);
				$row1=$query1->row();
				$data['qry6']=$this->CustShipp->ShowAddressShipp($row1->cust_addr_shipp_id);
				$this->load->view('form/MyAccount/v_invoice',$data);
			
			}
			else
			{
			
				redirect('main/login', 'refresh');
					
			}

}

	function ChangeCust(){
	
		$cust_id = $this->session->userdata('cust_id');
		
			if(!empty($cust_id)) {
			
				$this->load->model('m_customer', 'cust');
				$data['qry'] = $this->cust->getOneCust($cust_id);
				$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
				$data['subHeader'] ="";
				$data['subdetail']="";
				$data['subHeaders'] ="";
				$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
				$data['bodys']=$this->load->view('form/MyAccount/v_changeInformation',$data,TRUE);
				$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
				$this->load->view('form/output/v_outputproduct1',$data);
				
			}
			else
			{
			
					redirect('main/login', 'refresh');	
					
			}
	}
	
	function SaveChangeCust(){
	
		$cust_id = $this->session->userdata('cust_id');
		
			if(!empty($cust_id)){
			
				$this->form_validation->set_error_delimiters('<FONT COLOR=#FF0000>', '</FONT>');
				$this->form_validation->set_rules('cust_name', 'ชื่อ', 'trim|required');
				$this->form_validation->set_rules('cust_lname', 'นามสกุล', 'trim|required');
				$this->form_validation->set_rules('cust_email', 'อีเมล์', 'trim|required|valid_email');
				$this->form_validation->set_rules('cust_tel', 'เบอร์โทรศัพท์บ้าน', 'trim|required|numeric|min_length[9]');
				$this->form_validation->set_rules('cust_phone', 'เบอร์โทรศัพท์มือถือ', 'trim|required|numeric|min_length[10]|max_length[10]');
				
					if ($this->form_validation->run() == FALSE) {
					
						$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
						$data['subHeader'] ="";
						$data['subdetail']="";
						$data['subHeaders'] ="";
						$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
						$data['bodys']=$this->load->view('form/MyAccount/v_changeInformation',$data,TRUE);
						$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
						$this->load->view('form/output/v_outputproduct1',$data);
						
					}
					else
					{
					
						$this->load->model('m_customer', 'cust');
						$this->load->model('m_orders', 'orders');
						$this->cust->CustName = $_POST['cust_name'];
						$this->cust->CustLname = $_POST['cust_lname'];		
						$this->cust->CustEmail = $_POST['cust_email'];		
						$this->cust->CustName = $_POST['cust_name'];
						$this->cust->CustTel = $_POST['cust_tel'];		
						$this->cust->CustPhone = $_POST['cust_phone'];
						$this->cust->CustID = $_POST['cust_id'];
						$this->cust->updateAccountCust();
						$data['qry']=$this->orders->showOrders($cust_id);
						$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
						$data['subHeader'] ="";
						$data['subdetail']="";
						$data['subHeaders'] ="";
						$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
						$data['bodys']=$this->load->view('form/MyAccount/v_myaccount',$data,TRUE);
						$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
						$this->load->view('form/output/v_outputproduct1',$data);
						
					}
			}
			else
			{
			
				redirect('main/login', 'refresh');	
				
			}
			
	}
	
	function addressBook() {
	
		$cust_id = $this->session->userdata('cust_id');
		
			if(!empty($cust_id)){
			
				$this->load->model('m_customer', 'cust');
				$this->load->model('m_cust_address_pay', 'pay');
				$query = $this->cust->getOneCust($cust_id);
				$row=$query->row();
				$data['qry'] = $this->pay->checkidAddCust($cust_id,$row->cust_addr_pay_id);
				$data['qry1'] = $this->pay->getAddressCust($cust_id);
				$this->load->model('m_cust_province', 'cust_prv');	
				$data['cust_prv'] = $this->cust_prv->get_options_province();	
				$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
				$data['subHeader'] ="";
				$data['subdetile']="";
				$data['subHeaders'] ="";
				$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
				$data['bodys']=$this->load->view('form/MyAccount/v_AddressBook',$data,TRUE);
				$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
				$this->load->view('form/output/v_outputproduct1',$data);
				
			}
			else
			{
			
				redirect('main/login', 'refresh');	
			
			}
	}
	
	function editAddress($cust_addr_pay_id) {
	
		$cust_id = $this->session->userdata('cust_id');
		
		if(!empty($cust_id)){
		
			$this->load->model('m_cust_province', 'cust_prv');
			$this->load->model('m_cust_address_pay', 'pay');		
			$data['qry'] = $this->pay->checkidAddCust($cust_id,$cust_addr_pay_id);
			$data['cust_prv'] = $this->cust_prv->get_options_province();	
			$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
			$data['subHeader'] ="";
			$data['subdetile']="";
			$data['subHeaders'] ="";
			$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
			$data['bodys']=$this->load->view('form/MyAccount/v_edit_address',$data,TRUE);
			$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
			$this->load->view('form/output/v_outputproduct1',$data);
			
		}
		else
		{
		
			redirect('main/login', 'refresh');	
			
		}
		
	}
	function SaveditAddress(){
	
		$cust_id = $this->session->userdata('cust_id');
		
			if(!empty($cust_id)) {
			
				$this->form_validation->set_error_delimiters('<FONT COLOR=#FF0000>', '</FONT>');
				$this->form_validation->set_rules('cust_addr_pay_id', 'ชื่อ', 'trim|required');
				$this->form_validation->set_rules('cust_pay_name', 'ชื่อ', 'trim|required');
				$this->form_validation->set_rules('cust_pay_lname', 'นามสกุล', 'trim|required');
				$this->form_validation->set_rules('cust_pay_address', 'บ้านเลขที่', 'trim|required');
				$this->form_validation->set_rules('cust_pay_district', 'ตำบล', 'trim|required');
				$this->form_validation->set_rules('cust_pay_canton', 'อำเภอ', 'trim|required');
				$this->form_validation->set_rules('cust_prv_id', 'จังหวัด', 'trim|required');
				$this->form_validation->set_rules('cust_pay_postcode', 'รหัสไปรษณีย', 'trim|required|numeric');
				
				if ($this->form_validation->run() == FALSE) {
				
					$this->load->model('m_cust_province', 'cust_prv');	
					$data['cust_prv'] = $this->cust_prv->get_options_province();	
					$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
					$data['subHeader'] ="";
					$data['subdetile']="";
					$data['subHeaders'] ="";
					$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
					$data['bodys']=$this->load->view('form/MyAccount/v_edit_address',$data,TRUE);
					$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
					$this->load->view('form/output/v_outputproduct1',$data);
					
				}
				else
				{
				
					$this->load->model('m_customer', 'cust');
					$this->load->model('m_cust_address_pay', 'pay');
					$this->pay->CustAddrPayID = $_POST['cust_addr_pay_id'];
					$this->pay->CustName = $_POST['cust_pay_name'];
					$this->pay->CustLname = $_POST['cust_pay_lname'];
					$this->pay->CustAddress = $_POST['cust_pay_address'];
					$this->pay->CustTumbol = $_POST['cust_pay_district'];
					$this->pay->CustAmphor = $_POST['cust_pay_canton'];
					$this->pay->CustProvince = $_POST['cust_prv_id'];
					$this->pay->CustPostcode = $_POST['cust_pay_postcode'];
					$this->pay->CustID = $cust_id;
					$this->pay->updateAddressPay();
					$query = $this->cust->getOneCust($cust_id);
					$row=$query->row();
					$data['qry'] = $this->pay->checkidAddCust($cust_id,$row->cust_addr_pay_id);
					$data['qry1'] = $this->pay->getAddressCust($cust_id);
					$this->load->model('m_cust_province', 'cust_prv');	
					$data['cust_prv'] = $this->cust_prv->get_options_province();	
					$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
					$data['subHeader'] ="";
					$data['subdetile']="";
					$data['subHeaders'] ="";
					$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
					$data['bodys']=$this->load->view('form/MyAccount/v_AddressBook',$data,TRUE);
					$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
					$this->load->view('form/output/v_outputproduct1',$data);
					
				}
				
		}
		else
		{
		
			redirect('main/login', 'refresh');	
			
		}
		
	}

	function ChangePassword() {
		$cust_id = $this->session->userdata('cust_id');
		if(!empty($cust_id)){
		
			$this->load->model('m_customer', 'cust');
			$data['qry'] = $this->cust->getOneCust($cust_id);
			$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
			$data['msg']="";	
			$data['subHeader'] ="";
			$data['subdetile']="";
			$data['subHeaders'] ="";
			$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
			$data['bodys']=$this->load->view('form/MyAccount/v_ChangePassword',$data,TRUE);
			$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
			$this->load->view('form/output/v_outputproduct1',$data);
			
		}
		else
		{
		
			redirect('main/login', 'refresh');	
			
		}
		
	}
	
	function SaveChangePassword(){
	
		$cust_id = $this->session->userdata('cust_id');
		
			if(!empty($cust_id)){
			
			$this->form_validation->set_error_delimiters('<FONT COLOR=#FF0000>', '</FONT>');
			$this->form_validation->set_rules('CurrentPass', 'รหัสผ่านเดิม', 'trim|required');
			$this->form_validation->set_rules('NewPass', 'รหัสผ่านใหม่', 'trim|required|matches[ConfirmPass]');
			$this->form_validation->set_rules('ConfirmPass', 'ยืนยันรหัสผ่านใหม่', 'trim|required');
			
				if ($this->form_validation->run() == FALSE) {
				
					$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
					$data['msg']="";	
					$data['subHeader'] ="";
					$data['subdetile']="";
					$data['subHeaders'] ="";
					$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
					$data['bodys']=$this->load->view('form/MyAccount/v_ChangePassword',$data,TRUE);
					$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
					$this->load->view('form/output/v_outputproduct1',$data);
					
				}
				else
				{
				
					$this->load->model('m_customer', 'cust');
					$this->cust->CurrentPass = $_POST['CurrentPass'];
					$query = $this->cust->checkPasswordCust();
					$row = $query->row();
					
						if ($query->num_rows()>0) {
						
							$this->cust->NewPass = $_POST['NewPass'];
							$this->cust->CustID = $cust_id;
							$this->cust->updatePasswordCust();
							$this->load->model('m_orders', 'orders');
							$data['qry']=$this->orders->showOrders($cust_id);
							$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
							$data['msg']="";	
							$data['subHeader'] ="";
							$data['subdetail']="";
							$data['subHeaders'] ="";
							$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
							$data['bodys']=$this->load->view('form/MyAccount/v_myaccount',$data,TRUE);
							$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
							$this->load->view('form/output/v_outputproduct1',$data);
							
						}
						else
						{
						
							$data['msg']="<script>alert('กรอกรหัสผ่านเดิมไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง')</script>";		
							$cust_id = $this->session->userdata('cust_id');
								if(!empty($cust_id)) {
								
									$this->load->model('m_customer', 'customer');
									$data['qry'] = $this->cust->getOneCust($cust_id);
									$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
									$data['subHeader'] ="";
									$data['subdetile']="";
									$data['subHeaders'] ="";
									$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
									$data['bodys']=$this->load->view('form/MyAccount/v_ChangePassword',$data,TRUE);
									$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
									$this->load->view('form/output/v_outputproduct1',$data);
									
								}
								else
								{
								
									redirect('main/login', 'refresh');	
									
								}
								
						}
						
				}
				
			}
			else
			{
			
				redirect('main/login', 'refresh');
					
			}
			
	}
	
	function updateStaCancel($orders_id) {
		$cust_id = $this->session->userdata('cust_id');
			if(!empty($cust_id)){
	
			$this->load->model('m_orders', 'orders');
			$this->orders->orders_id=$orders_id;
			$this->orders->orders_sta_id=7;
			$this->orders->updateOrdersStatus();
			redirect('myaccount/MyAccount', 'refresh');	
			}
			else
			{
			
				redirect('main/login', 'refresh');	
				
			}
	}

	
	function ViewOrders($orders_id1) {
	
		$cust_id = $this->session->userdata('cust_id');
			if(!empty($cust_id)){
			
				$this->load->model('m_customer', 'cust');
				$this->load->model('m_orders','orders');
				$this->load->model('m_orders_product', 'OrdersProduct');
				$this->load->model('m_orders_total', 'OrdersTotal');
				$data['qry']=$this->OrdersProduct->ShowOrdersPro($orders_id1);	
				$data['qry1']=$this->OrdersTotal->ShowOrdersTotal($orders_id1);
				$data['qry2']=$this->orders->showAllIDOrders($orders_id1);
				$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
				$data['subHeader'] ="";
				$data['subdetail']="";
				$data['subHeaders'] ="";
				$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
				$data['bodys']=$this->load->view('form/MyAccount/v_OrderInformation',$data,TRUE);
				$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
				$this->load->view('form/output/v_outputproduct1',$data);
				
			}
			else
			{
			
				redirect('main/login', 'refresh');	
				
			}
			
	}
	
	function updatePay($orders_id2) {
		$cust_id = $this->session->userdata('cust_id');
			if(!empty($cust_id)){
			
				$this->load->model('m_orders', 'orders');
				$this->orders->orders_id=$orders_id2;
				$this->orders->payment_method=$_POST['pay'];
				$this->orders->updateOrdersPayment();
				redirect('myaccount/ViewOrders/'.$orders_id2, 'refresh');	
				
			}
			else
			{
			
				redirect('main/login', 'refresh');	
				
			}
	
	
	
	}

	function deleteAddress($id) {
	
		$this->load->model('m_cust_address_shipp', 'shipp');
		$this->load->model('m_cust_address_pay', 'pay');
		$this->pay->deletePay($id);	
		$this->shipp->deleteShipp($id);
		$cust_id = $this->session->userdata('cust_id');
		
			if(!empty($cust_id)){
			
				$this->load->model('m_customer', 'cust');
				$this->load->model('m_cust_address_pay', 'pay');
				$query = $this->cust->getOneCust($cust_id);
				$row=$query->row();
				$data['qry'] = $this->pay->checkidAddCust($cust_id,$row->cust_addr_pay_id);
				$data['qry1'] = $this->pay->getAddressCust($cust_id);
				$this->load->model('m_cust_province', 'cust_prv');	
				$data['cust_prv'] = $this->cust_prv->get_options_province();	
				$data['head']=$this->load->view('form/home/v_flashhead','',TRUE);
				$data['subHeader'] ="";
				$data['subdetile']="";
				$data['subHeaders'] ="";
				$data['body']=$this->load->view('form/product/v_showdetail',$data,TRUE);
				$data['bodys']=$this->load->view('form/MyAccount/v_AddressBook',$data,TRUE);
				$data['menu']=$this->load->view('form/home/v_menu','',TRUE);
				$this->load->view('form/output/v_outputproduct1',$data);
				
			}
			else
			{
			
				redirect('main/login', 'refresh');	
			
			}
	}
	}
?>

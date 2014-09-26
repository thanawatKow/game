<?php
class Sendmail extends Controller {

	function __construct() {
		parent::Controller();
	}

	function index() {
		$config['useragent'] = 'test'; // The "user agent".
		$config['protocol'] = 'smtp'; // mail, sendmail, or smtp    The mail sending protocol.
		$config['mailpath'] = ''; // The server path to Sendmail.
		$config['smtp_host'] = 'smtp.gmail.com'; // SMTP Server Address.
		$config['smtp_user'] = 'pwittawas@gmail.com'; // SMTP Username.
		$config['smtp_pass'] = '1qazse432w'; // SMTP Password.
		$config['smtp_port'] = '465'; // SMTP Port.
		$config['smtp_timeout'] = '5'; // SMTP Timeout (in seconds).
		$config['wordwrap'] = TRUE; // TRUE or FALSE (boolean)    Enable word-wrap.
		$config['wrapchars'] = 76; // Character count to wrap at.
		$config['mailtype'] = 'html'; // text or html Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
		$config['charset'] = 'utf-8'; // Character set (utf-8, iso-8859-1, etc.).
		$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
		$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
		$config['crlf'] = '\r\n'; // "\r\n" or "\n" or "\r" Newline character. (Use "\r\n" to comply with RFC 822).
		$config['newline'] = '\r\n'; // "\r\n" or "\n" or "\r"    Newline character. (Use "\r\n" to comply with RFC 822).
		$config['bcc_batch_mode'] = FALSE; // TRUE or FALSE (boolean)    Enable BCC Batch Mode.
		$config['bcc_batch_size'] = 200; // Number of emails in each BCC batch.

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
	
		$this->email->from('wittawas@buu.ac.th', 'Wittawas');
//		$this->email->to('someone@example.com'); 
		$list = array('wittawas@buu.ac.th', 'pwittawas@gmail.com', 'pwittawas@hotmail.com');
		$this->email->to($list);
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Test from localhostttttttttttttttttttttttt');
		$this->email->message('Testing the email classsssssssssssssss.'); 

		$this->email->send();

		echo $this->email->print_debugger();
	}
	
	function gmail(){
		$this->load->plugin('phpmailer');
		$mail = new phpmailer();

		$body             = file_get_contents('contents.html');
		$body             = eregi_replace("[\]",'',$body);

		// เพิ่มบรรทัดนี้
		$mail->CharSet = "utf-8";

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.yourdomain.com"; // SMTP server
		$mail->SMTPDebug  = 2;                     					// enables SMTP debug information (for testing)
																											// 1 = errors and messages
																											// 2 = messages only
		$mail->SMTPAuth   = true;                 						// enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 					// sets the prefix to the servier
		$mail->Host       ='ssl://smtp.gmail.com';      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "pwittawas@gmail.com";  // GMAIL username
		$mail->Password   = "1qazse432w";            // GMAIL password

		$mail->SetFrom('wittawas@localhost.home', 'wittawas puntumchinda');

		$mail->AddReplyTo('wittawas@localhost.home', 'wittawas puntumchinda');

		$mail->Subject    = "ทดสอบ CodeIgniter PHPMailer Test Subject via smtp (Gmail), basic-3";

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);

		$mail->AddAddress("pwittawas@hotmail.com", "pwittawas-hotmail");
		$mail->AddAddress("pwittawas@gmail.com", "pwittawas-gmail");
		$mail->AddAddress("wittawas@buu.ac.th", "wittawas-buu");

		$mail->AddAttachment("images/phpmailer.gif");      // attachment
		$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  echo "Message sent!";
		}
	}

}


?>

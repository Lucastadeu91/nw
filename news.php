
								<?php 
										include './PHPMailerAutoload.php';
										/* ==========================  Define variables ========================== */

								#Your e-mail address
										define("__TO__", "ph.duarte@nwb.agency");

								#Message subject
										define("__SUBJECT__", "");

								#Success message
										define('__SUCCESS_MESSAGE__', "Sua Mensagem foi enviada. Obrigado!");

								#Error message 
										define('__ERROR_MESSAGE__', "Erro, sua Mensagem não foi enviada, tente novamente!");

								#Messege when one or more fields are empty
										define('__MESSAGE_EMPTY_FILDS__', "Por favor, preencha os campos");

										/* ========================  End Define variables ======================== */

								//Send mail function
								function send_mail($to,$subject,$name,$resp){ 
											$mail = new PHPMailer();
											$mail->IsSMTP();
											$mail->SMTPSecure = false;

									//or more succinctly:
											$mail->Host = 'smtpout.secureserver.net:80';
							       // $mail->Host       = "smtpi.kinghost.net"; // SMTP server example
											$mail->SMTPAuth   = true;
							        //$mail->SMTPSecure = false;                  // enable SMTP authentication
							        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
							        $mail->Username   = "ph.duarte@nwb.agency"; // SMTP account username example
							        $mail->Password   = "newblack123!";  
							        $mail->From   = "ph.duarte@nwb.agency";
							        $mail->AddReplyTo($name, $name);
							        //$mail->SMTPDebug = 2;
							       	//$mail->ReplyTo = "ti@agenciamolla.com.br";
							        $mail->isHTML(true);    
							        $mail->addAddress($to);
							        $mail->Subject  = utf8_decode($subject);
							        $mail->Body  = utf8_decode($name);      
							        if($mail->Send()){//mail($to,$subject,$message,$headers)){
							        	//echo json_encode(__SUCCESS_MESSAGE__);
							        	//test_function(__SUCCESS_MESSAGE__);
										switch($resp) {
							        		case 'valido': test_function( __SUCCESS_MESSAGE__);break;
							        	}
							        	

							        } else {
							        	echo json_encode( $name->ErrorInfo);
							        }
							    }

								/*//Check e-mail validation
							    function check_email($email){
							            //if(!@eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
							    	if(filter_var($name, FILTER_VALIDATE_EMAIL)){
							    		return true;
							    	} else {
							    		return false;
							    	}
							    }*/

								//Get post data
							    function test_function($mess){
							    	$return = $_POST;

							    	$return["Mensagem"] = $mess;
							    	$return["resposta"] = true;

  									//$return["json"] = json_encode($return);
							    	echo json_encode($return);
							    	return;
							    }
							    
							    function is_ajax() {
							    	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
							    }
							    if(isset($_POST['news']) and isset($_POST['resp'])){
							    	$name 	 = $_POST['news'];
							    	$resp 	 = $_POST['resp'];
							    	
						        	

							    	if($name == '') {
							    		echo json_encode(array('info' => 'error', 'msg' => "Por Favor, Preencha o campo com seu Email."));
							    		//exit();
							    	} 
							    	else {
										//Send Mail
							    		$to = __TO__;
							    		$subject = __SUBJECT__ . 'New Black News' . $name;
							    		$message = '
							    		<html>
							    		<head>
							    		<title>E-mail news '. $name .'</title>
							    		</head>
							    		<body>
							    		<table class="table">

							    		<tr>
							    		<td align="right">Nome:</td>
							    		<td align="left">'. $name .'</td>
							    		</tr>

							    		</table>
							    		</body>
							    		</html>
							    		';

							    		$headers  = 'MIME-Version: 1.0' . "\r\n";
							    		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
							    		$headers .= 'From: ' . $name . "\r\n";

							    		send_mail($to,$subject,$name,$resp);

							    	}
							    } else {
							    	//echo json_encode( __MESSAGE_EMPTY_FILDS__);
							    }
							    ?>
						

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<!-- Orange -->
<html > 
<head>
	<meta charset="utf-8">
	<?php include 'include/head.php'; ?>


</head>
<body>
	<div class="body">
		<?php include 'include/header.php'; ?>


		<div role="main" class="main">
			<div class="container">
				<!-- <div class="row">
					<div class="col-md-12 m-xlg txtcenter">
						<h2><strong>GOSTARIA DE CONHECER NOSSOS SERVIÇOS?<br></strong><span class="text-color-primary txtnormal">SOLICITE UMA VISITA.</span></h2>
					</div>
					<div class="col-md-10 col-md-offset-1 txtcenter">
						<p class="lead">Preencha os campos abaixo e em breve entraremos em contato.</p>
				
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-12 mt-md">
						
						<div class="alert alert-info txtcenter ">
							<h4>
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
								function send_mail($to,$subject,$message,$headers,$mailTO){ 
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
							        $mail->AddReplyTo($mailTO, $mailTO);
							        //$mail->SMTPDebug = 2;
							       	//$mail->ReplyTo = "ti@agenciamolla.com.br";
							        $mail->isHTML(true);    
							        $mail->addAddress($to);
							        $mail->Subject  = utf8_decode($subject);
							        $mail->Body  = utf8_decode($message);      
							        if($mail->Send()){//mail($to,$subject,$message,$headers)){
							        	echo json_encode( __SUCCESS_MESSAGE__);
							        } else {
							        	echo json_encode( $mail->ErrorInfo);
							        }
							    }

								//Check e-mail validation
							    function check_email($email){
							            //if(!@eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
							    	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
							    		return true;
							    	} else {
							    		return false;
							    	}
							    }

								//Get post data
							    if(isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['telefone'])){
							    	$name 	 = $_POST['nome'];
							    	$mail 	 = $_POST['email'];
							    	$website  = $_POST['telefone'];
							    	$empresa = $_POST['empresa'];
							    	$mensagem = $_POST['mensagem'];

							    	if($name == '') {
							    		echo json_encode(array('info' => 'error', 'msg' => "Por Favor, Preencha o campo com seu Nome."));
							    		exit();
							    	} else if($mail == '' or !check_email($mail)){
							    		echo json_encode(array('info' => 'error', 'msg' => "Por Favor, Preencha o campo com seu E-mail."));
							    		exit();
							    	} else if($empresa == ''){
							    		echo json_encode(array('info' => 'error', 'msg' => "Por Favor, Preencha o campo com sua Mensagem."));
							    		exit();
							    	} else {
										//Send Mail
							    		$to = __TO__;
							    		$subject = __SUBJECT__ . 'New Black ' . $mail;
							    		$message = '
							    		<html>
							    		<head>
							    		<title>E-mail de '. $name .'</title>
							    		</head>
							    		<body>
							    		<table class="table">
							    		<tr>
							    		<td align="right">Comment:</td>
							    		<td align="left">'. $empresa .'</td>
							    		</tr>
							    		<tr>
							    		<td align="right">Nome:</td>
							    		<td align="left">'. $name .'</td>
							    		</tr>
							    		<tr>
							    		<td align="right">E-mail:</td>
							    		<td align="left">'. $mail .'</td>
							    		</tr>
							    		<tr>
							    		<td align="right">Assunto:</td>
							    		<td align="left">'. $subject .'</td>
							    		</tr>
							    		<td align="right">Mensagem:</td>
							    		<td align="left">'. $mensagem .'</td>
							    		</tr>

							    		</table>
							    		</body>
							    		</html>
							    		';

							    		$headers  = 'MIME-Version: 1.0' . "\r\n";
							    		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
							    		$headers .= 'From: ' . $mail . "\r\n";

							    		send_mail($to,$subject,$message,$headers,$mail,$mensagem);

							    	}
							    } else {
							    	echo json_encode( __MESSAGE_EMPTY_FILDS__);
							    }
							    ?>
							</h4>
						</div>
					</div>
			</div>
		</div>
	</div>

<?php include 'include/footer.php'; ?>
</div>
<?php include 'include/jsFile.php'; ?>


<!-- <script>
	setTimeout(function(){
		window.location='contato.php';
	}, 3000);
</script> -->
		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
	-->

</body>
</html>

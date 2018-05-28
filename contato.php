<!DOCTYPE html>
<html>
	<head>

		<?php include 'include/head.php'; ?>

	</head>
	<body>
		<div class="body">
			<?php include 'include/header.php';?>

			<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper" style="height: 700px;">
					
					<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': [800,800,500,400], 'gridheight': [900,900,500,500]}">
						<ul>
							<li data-transition="fade">
								<img src="img/slides/contato.jpg"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

								<div class="tp-caption"
									data-x="center" data-hoffset="-460"
									data-y="center" data-voffset="175"
									data-start="1000"
									style="z-index: 5"
									data-transform_in="x:[-300%];opacity:0;s:500;"><img src="img/Mouse-de-rolagem.png" alt=""></div>

							</li>
							
						</ul>
					</div>
				</div>
				<div class="container">
					<form id="contactForm" action="contact.php" method="POST">
						<section class="section section-default">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">NOME*</label>
											<input type="text" name="nome" data-obrigatorio class="input-lg radius_30 b-2 form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">EMAIL*</label>
											<input type="email" name="email" data-obrigatorio data-email="true" class="input-lg radius_30 b-2 form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">EMPRESA</label>
											<input type="text" name="empresa" class="input-lg radius_30 b-2 form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="">TELEFONE*</label>
											<input type="text" name="telefone" data-obrigatorio data-telefone="true" maxlength="14" class="input-lg radius_30 b-2 form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="">MENSAGEM</label>
											<textarea name="mensagem" id="" cols="30" rows="10"  class="form-control textarea-xlg radius_30 b-2"></textarea>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-12 ">
										<input type="submit" id="enviar" value="Enviar" class="btn btn-secondary btn-lg mb-xlg pull-right" data-loading-text="Loading...">
									</div>
								</div>							
							</div>
						</section>
					</form>
				</div>
				
				

				
				
				
			</div>
 
			<?php include 'include/footer.php' ?>
		</div>

		<!-- Vendor -->
		<?php include 'include/jsFile.php'; ?>
		<script>
			$('#enviar').click(function (e) {
				e.preventDefault();
				validaForm($('#contactForm'));
				if (validaForm($('#contactForm')) == true) {
					$('#enviar').hide().after('Enviando... <i class="fa  fa-spinner fa-spin"></i>');
					$('#contactForm').submit();
				}
			});
		</script>
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
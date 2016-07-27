<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es-419">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<style type="text/css">
		#outlook a { padding: 0; }   
		<?php $styles = [
			"body" =>  "background-color: #DDDDDD; color: #2C2C31; width: 100% !important; font-family: sans-serif; font-size: 16px; padding: 0; margin: 0px;",
			"header" => "background-color: #693871; border-bottom: 3px solid #4e2a54; min-height: 74px; position: relative;",
			"header_logo" => "background-color: #693871; border-bottom: 3px solid #4e2a54; min-height: 74px; position: relative; text-align: center;",
			"header_logo_img" => "text-align: center;",
			"container" => "padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;",
			"content" => "padding: 30px 0;",
			"section" => "background-color: #EEE; border: 1px solid #BABABA; border-right: transparent; border-left: transparent; padding: 10px 0;",
			"footer" => "background-color: #DDDDDD; font-size: 18px; padding: 10px 20px;",
		];
		$styles = (object)$styles;
		?> 	
		@media only screen and (max-width: 480px) {  }
		@media only screen and (max-width: 320px) {  }
		</style>
	</head>
	<body style="<?=$styles->body; ?>">
		<header style="<?=$styles->header; ?>">
			<div style="<?php=$styles->container; ?>">
				<div style="<?=$styles->header_logo; ?>">
					<img style="<?=$styles->header_logo_img;?>" src="http://sellutions.soho.cl/frontend/web/img/logo-white.png" />
				</div>
			</div>
		</header>
		<?php echo $content; ?>
		<footer style="<?=$styles->footer; ?>">
	        <small>Sellutions &copy; <?php echo date("Y"); ?> - Todos los derechos reservados</small>
	    </footer>
	</body>
</html>
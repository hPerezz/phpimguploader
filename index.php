<!doctype html>
<html>
<head>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style>
		img {
			border-radius: 10px;
		}
		div.dois {
			margin-right: 10%; margin-left: 10%; margin-top:5%;
		} 
		div.redes {
			z-index:-999;
			position: fixed;
			left: 50%;
			bottom: 10px;
			transform: translate(-50%, -50%);
			margin: 0;
			letter-spacing: .1rem;
			LINE-HEIGHT:35px; 
		}
    </style>

	<meta charset="utf-8">
	<title>Uploader</title>
</head>
<body>
	<center>
		<div class="dois">
			<h2>Uploader</h2>
			<br>
			<?php
				if(isset($_POST['ENVIAR'])){ // se o usuario enviou
					$formatosPermetidos = array("png","jpeg","jpg","gif","tiff","psd"); // arqui voce adiciona os formatos desejados
					$extensao = pathinfo($_FILES['ARQUIVO']['name'], PATHINFO_EXTENSION);
					if(in_array($extensao,$formatosPermetidos)){
						$folder="files/"; // pasta onde vai ser upado > n esqueca de mudar as permimssoes
						$temp = $_FILES['ARQUIVO']['tmp_name'];// nome temporario do arquivo gerado pelo proprio PHP dentro do server
						$novoNome=uniqid().".$extensao"; // o novo nome do arquivo vai ser um id unico mais a extensao
						if(move_uploaded_file($temp,$folder.$novoNome)){ //move o arquivo temporario pra pasta folder (n e mais temp) com o novo nome ja
							<img src="'.$folder.$novoNome.'" width="322"/>
							<br>
							<br>
							<div class="col-sm-3">
							  <div class="input-group">
								<div class="input-group-prepend">
								  <div class="input-group-text">URL</div>
								</div>
								<input type="text" class="form-control" value="seusite.com/'.$folder.$novoNome.'">
							  </div>
							</div>
							<br>
							Fique avonts pra upar outra :)
							<br>
							';
						} else {
							echo 'Nao foi possivel fazer o upload';
						}
					} else {
						echo "Formato Invalido";
					}
				}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"><!--Precisa desse enctype se n n funfa  -->
				<div class="custom-file">
					<div class="col-sm-3 my-1">
						<input type="file" class="custom-file-input" name="ARQUIVO" id="customFile">
						<label class="custom-file-label" for="customFile"></label>
					</div>
				</div>
				<br>
				<br>
				<input type="submit" name="ENVIAR" class="btn btn-primary" >
				<br>
				<br>
			</form>
			<script>
				$(".custom-file-input").on("change", function() {
				  var fileName = $(this).val().split("\\").pop();
				  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
				});
			</script>
		</div>
		<div class="redes">
            <small class="text-muted">by <a href="http://instagram.com.br/perezdjj" target="_blank">@perez</a></small>
        </div>
	</center>
</body>
</html>

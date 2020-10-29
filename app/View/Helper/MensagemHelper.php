
<?php 
class MensagemHelper extends AppHelper {

	public function sucesso($mensagem){
		echo "<div class='alert alert-success'>{$mensagem}
				<a class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</a>
			  </div>";
	}

	public function erro($mensagem){
		echo "<div class='alert alert-danger'>{$mensagem}
				<a class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</a>
			  </div>";
	}

	public function alerta($mensagem){
		echo "<div class='alert alert-warning'>{$mensagem}
			  </div>";
	}

	public function info($mensagem){
		echo "<div class='alert alert-info'>{$mensagem}
			  </div>";
	}

}
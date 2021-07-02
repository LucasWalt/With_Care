<?php
	include_once "../conexao.php";
	if(isset($_POST['votar'])){
		$artigoId = (int)$_POST['artigo'];
		$ponto = (int)$_POST['ponto'];
echo $ponto;
		$pegaArtigo = $pdo->prepare("SELECT qt_votos, qt_pontos FROM `pontuacao_avaliacao` WHERE `id_avaliado` = ?");
		$pegaArtigo->execute(array($artigoId));
		while($row = $pegaArtigo->fetchObject()){
			$pontosUpd = ($row->qt_pontos+$ponto);
			$votosUpd = ($row->qt_votos+1);

			$atualizaArtigo = $pdo->prepare("UPDATE `pontuacao_avaliacao` SET `qt_votos` = ?, `qt_pontos` = ? WHERE `id_avaliado` = ?");
			if($atualizaArtigo->execute(array($votosUpd, $pontosUpd, $artigoId))){
				$calculo = round(($pontosUpd/$votosUpd),1);
				die(json_encode(array('average' => $calculo, 'qt_votos' => $votosUpd)));
			}
		}
	}
?>
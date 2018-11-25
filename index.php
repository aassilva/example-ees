<?php

  require("arquivos-php/classes.php");
  $cotacoes = BolsaCotacao::getCotacoes();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Aplicação Exemplo de Monitoramento - AEM</title>

  </head>
  <body>
    <?php foreach ($cotacoes as $cotacao): ?>
      <div class="square">
        <div class="block">

          <div class="centered">
            <h1><?php echo $cotacao->name?></h1>
            <p>Moeda Original: <?php echo $cotacao->code?></p>
            <p>Convertido para: <?php echo $cotacao->codein?></p>
            <p>Valor Alto Práticado: <?php echo $cotacao->high?></p>
            <p>Valor Baixo Práticado: <?php echo $cotacao->low?></p>
            <p>Última Atualição: <?php echo $cotacao->create_date?></p>
          </div>

        </div>
      </div>
    <?php endforeach; ?>
    <div>

    </div>

  </body>
</html>

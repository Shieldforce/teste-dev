<?php

require __DIR__."/vendor/autoload.php";
require __DIR__."/src/contantes.php";

use App\Megasena;

$megasena         = new Megasena(QUANTIDADE_DE_DEZENAS, TOTAL_DE_JOGOS);
$jogosFeitos      = $megasena->jogosFeitos(INICIO_DEZENAS_PERMITIDAS, final_DEZENAS_PERMITIDAS);
$sorteio          = $megasena->sorteio();
$resultado        = $megasena->getResultado();
$acertosContidos  = $megasena->jogosFeitosComAcertos($jogosFeitos, $resultado);

/*echo "<pre>";
print_r($acertosContidos);
echo "<pre/>";
die;*/

?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Jogos Feitos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Jogos realizados</h1>
        <table class="table mt-5">
            <thead>
            <tr>
                <?php for ($i=1;$i<=QUANTIDADE_DE_DEZENAS;$i++): ?>
                    <th><?php echo "Dezena:".$i; ?></th>
                <?php endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach($acertosContidos as $index => $jogo): ?>
                <tr>
                    <?php foreach($jogo["acertos"] as $a => $acerto): ?>
                        <th class="text-success"><?php echo $acerto; ?></th>
                    <?php endforeach; ?>
                    <?php foreach($jogo["erros"] as $e => $erro): ?>
                        <th class="text-danger"><?php echo $erro; ?></th>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <hr>

    <div class="container mt-2">
        <h1 class="text-center">Resultado</h1>
        <table class="table mt-5">
            <thead>
            <tr>
                <?php for ($i=1;$i<=QUANTIDADE_DE_DEZENAS;$i++): ?>
                    <th><?php echo "Resultado:".$i; ?></th>
                <?php endfor; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach($resultado as $r): ?>
                    <th class="text-success"><?php echo $r; ?></th>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>
    </div>

    <p class="alert alert-danger text-center">Rodar testes: vendor/bin/phpunit test/AcertosContidosTest.php</p>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

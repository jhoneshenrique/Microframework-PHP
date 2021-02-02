<?php
    include './../app/Libraries/Rota.php';
    include './../app/Libraries/Controller.php';
    include './../app/configucacao.php';
    include './../app/Libraries/Database.php';
    $db = new Database;
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NOME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=URL?>/public/css/style.css" rel="stylesheet">
</head>
<body>
    <?php
        include '../app/Views/topo.php';
        $rotas = new Rota;
        include '../app/Views/rodape.php'
    ?>




    <script src="<?=URL?>/public/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" ></script>
</body>
</html>
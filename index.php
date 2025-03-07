<?php
$url = "https://reqres.in/api/users?page=2"; 
$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$response = curl_exec($ch);
curl_close($ch);

$user = json_decode($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Listagem de Usuário</h1>
        <p>Estudo de API</p>
    </header>
    
    <section class="container">
    <?php if (!empty($user->data)) { ?>
        <div class="columns">
            <?php foreach ($user->data as $usuario) { ?>
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-128x128">
                                <img src="<?= $usuario->avatar ?>" alt="Avatar de <?= $usuario->first_name ?>">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h4><?= $usuario->first_name ?> <?= $usuario->last_name ?></h4>
                                <p>Email: <?= $usuario->email ?></p>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <strong class="no-users">Nenhum usuário retornado pela API</strong>
    <?php } ?>
</section>
    
</body>
</html>
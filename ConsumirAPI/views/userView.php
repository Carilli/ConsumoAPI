<?php if (isset($data['error'])): ?>
    <pre><?= json_encode($data, JSON_PRETTY_PRINT) ?></pre>
<?php else: ?>
    <h2>Usuário:</h2>
    <pre><?php print_r($data); ?></pre>

    <?php if (isset($data['data'])): ?>
        <p><strong>Nome:</strong> <?= $data['data']['first_name'] . " " . $data['data']['last_name'] ?></p>
        <p><strong>Email:</strong> <?= $data['data']['email'] ?></p>
        <img src="<?= $data['data']['avatar'] ?>" alt="Avatar">

        <h3>Excluir Usuário</h3>
        <a href="?route=users/<?= $data['data']['id'] ?>&method=DELETE">Excluir Usuário</a>
    <?php endif; ?>
<?php endif; ?>

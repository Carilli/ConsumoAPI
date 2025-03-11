<?php
    require_once('Cache.php');

    $cache = new Cache("10", "LFU");

    do {
        echo("\n\n--- MENU ---\n\n");
        echo "1. Adicionar frase à cache\n";
        echo "2. Ver status da cache\n";
        echo "3. Mostrar conteúdo da cache\n";
        echo "4. Sair\n";
        $op = readline("Opção: ");

        switch ($op) {
            case 1: 
                $data = readline("Digite uma frase para adicionar à cache:\n");
                $cache->add($data);
                break;

            case 2:
                $cache->showStatus();
                break;
            
            case 3: 
                $cache->showCacheContent();
                $id = readline("Digite o ID que você gostaria de acessar: ");
                $data = $cache->get($id);
                echo "Frase no ID $id: $data\n"; 
                break;
            
            case 4: 
                echo("\n\n Saindo...\n\n");
                break;
            
            default:
                echo "Opção inválida. Tente novamente.\n";
                break;
        }
    } while($op != 4);
?>

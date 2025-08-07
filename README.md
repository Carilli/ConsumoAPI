# Primeiro Consumo de API com PHP

Este projeto é um estudo simples de consumo de API utilizando PHP para fazer requisições via cURL e exibir os dados obtidos em uma página web com layout minimalista e responsivo.

---

## Sobre o Projeto

- 🖥️ **Linguagem:** PHP, HTML e CSS  
- 🌐 **API Consumida:** [https://reqres.in/api/users?page=2](https://reqres.in/api/users?page=2)  
- 🎯 **Objetivo:** Aprender a consumir dados de uma API externa usando PHP e formatar esses dados em cards na interface web.  
- 🎨 **Frontend:** Layout moderno e responsivo pensado para exibir informações dos usuários retornados pela API.

---

## Estrutura do Projeto

- **index.php:** Script PHP que realiza a requisição para a API, decodifica o JSON e gera o HTML dinâmico para exibir os usuários.  
- **style.css:** Arquivo CSS com estilizações para um design limpo e organizado das cards de exibição de usuários.

---

## Como Funciona

1. O PHP faz uma requisição HTTP para a API usando cURL.  
2. Os dados JSON de usuários são decodificados para um objeto PHP.  
3. O HTML é montado dinamicamente para mostrar cada usuário em um card com foto, nome completo e email.  
4. Caso a API não retorne dados, uma mensagem informativa é exibida.  

---


## Considerações Finais

Este projeto é uma ótima base para iniciar no consumo de APIs com PHP e integrar dados externos em projetos web. Pode ser expandido para outras APIs e funcionalidades dinâmicas.

Fique à vontade para modificar o layout, adicionar recursos ou utilizar outros endpoints de API!

🚀 Bons estudos e sucesso com suas aplicações web!

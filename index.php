<?php

header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set("America/Sao_Paulo");
ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);

echo "<link rel='stylesheet' href='style.css'/>",
"<link rel='icon' href=''/>",
"<img alt='' class='logo' src=''/>";

echo "<title>Orientação Objetos PHP</title>";

$template = <<<TPL
    <ul class=menu>
        <li><a href="#001">001</a></li>
        <li><a href="#002">002</a></li>
        <li><a href="#003">003</a></li>
    </ul>
TPL;

echo $template;

echo "<div class='corpo'>";

echo "<div id='001'></div>";
echo "<div class='line'>001 - Classes, Propriedades e Métodos</div>";

echo "<h1>Classes</h1>";

require __DIR__ . "/classes/Users.php";
use classes\Users;

$user = new Users();
var_dump($user);

echo "<h1>Propriedades</h1>";

$user->firstName = "Leandro";
$user->lastName = "Silveira";

echo "<p>Seu nome é {$user->firstName} {$user->lastName}</p>";

var_dump($user);

echo "<h1>Métodos</h1>";

$user->setFirstname("José");
$user->setLastname("<script>Silva</script>");

if (!$user->setEmail("leandro@email.com.br")){
    echo "<p class='trigger error'>E-mail {$user->getEmail()} é inválido</p>";
}

var_dump($user);

echo "<div id='002'></div>";
echo "<div class='line'>002 - Encapsulamento</div>";

echo "<h1>Visibilidade e Manupilação</h1>";

$leandro = $user->setUser(
    "Leandro",
    "Silveira",
    "contato@"
);

if (!$leandro) {
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

var_dump($user);

echo "<div id='003'></div>";
echo "<div class='line'>003 - Operações</div>";

echo "<h1>__construct</h1>";

require __DIR__ . "/classes/Address.php";
use classes\Address;

$address = new Address("Serra Negra", 275, "Jardim dos Macucos");

var_dump($address);

echo "<h1>__clone e __destruct</h1>";

$endereco1 = clone $address;
$endereco2 = clone $address;

var_dump($endereco1, $endereco2);

echo "<h1>__set</h1>";

require __DIR__ . "/classes/Product.php";
use classes\Product;

$produtos = new Product();
$produtos->handler("Banana", 19.80);
$produtos->title = "Fruta Boa";
$produtos->value = 0.99;
$produtos->description = "Banana Prata";

var_dump($produtos);

echo "<h1>__get</h1>";

echo "<p>Eu comprei uma {$produtos->description} e cada uma ficou {$produtos->value}</p>";

echo "<h1>__isset</h1>";

isset($produtos->title);
isset($produtos->name);

echo "<h1>__call</h1>";

$produtos->notFound("Teste", "Ops");


echo "<h1>__toString</h1>";

echo $produtos;

echo "<h1>__unset</h1>";

unset(
    $produtos->name,
    $produtos->price);

var_dump($produtos);

echo "</div>";
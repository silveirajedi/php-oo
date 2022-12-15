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
echo "<div class='line'>002 - </div>";



echo "</div>";
<?php

require __DIR__ . "/vendor/autoload.php";

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
        <li><a href="#004">004</a></li>
        <li><a href="#005">005</a></li>
        <li><a href="#006">006</a></li>
        <li><a href="#007">007</a></li>
        <li><a href="#008">008</a></li>
        <li><a href="#009">009</a></li>
    </ul>
TPL;

echo $template;

echo "<div class='corpo'>";

echo "<div id='001'></div>";
echo "<div class='line'>001 - Classes, Propriedades e Métodos</div>";

echo "<h1>Classes</h1>";

use Classes\Users;

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
echo "<div class='line'>003 - Operações (Métodos Mágicos)</div>";

echo "<h1>__construct</h1>";

use Classes\Address;

$address = new Address("Serra Negra", 275, "Jardim dos Macucos");

var_dump($address);

echo "<h1>__clone e __destruct</h1>";

$endereco1 = clone $address;
$endereco2 = clone $address;

var_dump($endereco1, $endereco2);

echo "<h1>__set</h1>";

use Classes\Product;

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

//unset(
//    $produtos->name,
//    $produtos->price);

var_dump($produtos);

echo "<div id='004'></div>";
echo "<div class='line'>004 - Relacionamento entre Objetos</div>";


use Classes\Company;
use Classes\CompanyAddress;
use Classes\CompanyProduct;
use Classes\CompanyUser;

echo "<h1>Associação</h1>";

$company = new Company();
$company->bootCompany("Fratelli", "Rua Teste, 222");

$company->boot(
    "Fratelli",
    new CompanyAddress("Rua teste", 111, "Casa"),
);

var_dump($company);

echo "<p>A empresa {$company->getCompany()} está situada no endereço {$company->getAddress()->getStreet()}, {$company->getAddress()->getNumber()}, {$company->getAddress()->getComplement()}</p>";

echo "<h1>Agregação</h1>";

$productA = new CompanyProduct("Banana", 199);
$productB = new CompanyProduct("Maçã", 299);

var_dump(
    $productA,
    $productB
);

$company->addProduct($productA);
$company->addProduct($productB);

var_dump($company);

/** @var CompanyProduct $product */
foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por R$ {$product->getPrice()}</p>";
}

echo "<h1>Composição</h1>";

$company->addTeamMember("Developer", "Leandro", "Silveira");
$company->addTeamMember("Owner", "Caroline", "Lazaro");

var_dump($company);

/** @var CompanyUser $team */
foreach ($company->getTeam() as $team) {
    echo "<p>O funcionário {$team->getFirstName()} {$team->getLastName()} que trabalha como {$team->getJob()} foi demitido</p>";
}

echo "<div id='005'></div>";
echo "<div class='line'>005 - Herança e Polimorfismo</div>";

use Classes\Inheritance\Event;
use Classes\Inheritance\Event\EventLive;
use Classes\Inheritance\AddressEvent;
use Classes\Inheritance\Event\EventOnline;

echo "<h1>Classe Pai</h1>";

$event = new Event\Event(
    "Workshop",
    new DateTime("2023-01-01 18:00"),
    999,
    "4"
);

var_dump($event);

$event->register("Leandro Silveira", "leandro@email.com.br");
$event->register("Caroline Silveira", "carol@email.com.br");
$event->register("José da Silveira", "jose@email.com.br");
$event->register("Valdir Silveira", "valdir@email.com.br");
$event->register("Marcia Silveira", "marcia@email.com.br");

echo "<h1>Classe Filha</h1>";

$address = new AddressEvent("Rua Qualquer", 111, "Apartamento");
$event = new EventLive(
    "Workshop",
    new DateTime("2023-01-01 18:00"),
    999,
    "4",
    $address
);

var_dump($event);

$event->register("Leandro Silveira", "leandro@email.com.br");
$event->register("Caroline Silveira", "carol@email.com.br");
$event->register("José da Silveira", "jose@email.com.br");
$event->register("Valdir Silveira", "valdir@email.com.br");
$event->register("Marcia Silveira", "marcia@email.com.br");


echo "<h1>Polimorfismo</h1>";

$event = new EventOnline(
    "Workshop",
    new DateTime("2023-01-01 18:00"),
    199,
    "https://www.fratelliti.com.br"
);

var_dump($event);

$event->register("Leandro Silveira", "leandro@email.com.br");
$event->register("Caroline Silveira", "carol@email.com.br");
$event->register("José da Silveira", "jose@email.com.br");
$event->register("Valdir Silveira", "valdir@email.com.br");
$event->register("Marcia Silveira", "marcia@email.com.br");

echo "<div id='006'></div>";
echo "<div class='line'>006 - Membros de uma classe</div>";

use Classes\Members\Config;
use Classes\Members\Trigger;

echo "<h1>Constantes</h1>";

$config = new Config();
echo "</p>". $config::COMPANY ."</p>";

var_dump(
    $config::COMPANY,
//    $config::DOMAIN,
//    $config::SECTOR
);

$reflexion = new ReflectionClass(Config::class);

var_dump($config, $reflexion->getConstants());

echo "<h1>Propriedades</h1>";

Config::$company = "Fratelli";
Config::$domain = "fratelliti.com.br";
Config::$sector = "Desenvolvimento";

$config::$sector = "TI";

var_dump($config, $reflexion->getProperties(), $reflexion->getStaticProperties());

echo "<h1>Métodos</h1>";

$config::setConfig("", "", "");
$config::setConfig("Fratelli", "fratelliti.com.br", "Tecnologia");

var_dump($config, $reflexion->getMethods(), $reflexion->getStaticProperties());

echo "<h1>EXEMPLO</h1>";

$trigger = new Trigger();
$trigger::show("Teste de mensagem");

var_dump($trigger);

Trigger::show("Teste de mensagem 2");
Trigger::show("Sucesso!", Trigger::SUCCESS);
Trigger::show("Erro!", Trigger::ERROR);
Trigger::show("Aviso!", Trigger::WARNING);

echo Trigger::push("Teste de mensagem push");
echo Trigger::push("Teste de mensagem push", Trigger::SUCCESS);
echo Trigger::push("Teste de mensagem push", Trigger::ERROR);
echo Trigger::push("Teste de mensagem push", Trigger::WARNING);

echo "<div id='007'></div>";
echo "<div class='line'>007 - Fundamentos da abastração</div>";

use Classes\App\TriggerApp;
use Classes\App\UserApp;
use Classes\Bank\Account;
use Classes\Bank\AccountSaving;
use Classes\Bank\AccountCurrent;

echo "<h1>superclass</h1>";

$client = new UserApp("Leandro", "Silveira");
//$account = new Account(
//    1600,
//    22345,
//    $client,
//    1000
//);

var_dump($client);


echo "<h1>Especialização 1</h1>";

$saving = new AccountSaving(
    "1122",
    "123456",
    $client,
    "0"
);

var_dump($saving);

$saving->deposit(1000);
$saving->withdrawal(1500);
$saving->withdrawal(1000);
$saving->withdrawal(6);
$saving->extract();

echo "<h1>Especialização 2</h1>";

$current = new AccountCurrent(
  "1171",
  "101010-1",
    $client,
    100,
    200
);

$current->deposit(200);
$current->withdrawal(600);
$current->withdrawal(400);
$current->withdrawal(99,40);

$current->extract();

var_dump($current);

echo "<div id='008'></div>";
echo "<div class='line'>008 - Contratos com interfaces</div>";

use Classes\Contracts\UserContracts;

echo "<h1>implementação</h1>";

$user = new UserContracts("Caroline", "Silveira", "carol@fratelliti.com.br");

$admin = new \Classes\Contracts\UserAdminContracts(
    "Leandro",
    "Silveira",
    "contato@fratelliti.com.br"
);

var_dump($user, $admin);


echo "<h1>associação</h1>";

$login = new \Classes\Contracts\Login();

$loginUser = $login->loginUser($user);
$loginAdmin = $login->loginAdmin($admin);


var_dump($loginUser, $loginAdmin);


echo "<h1>dependência</h1>";

var_dump(
    $login->login($user),
    $login->login($admin),
    $login->login($admin)->getFirstName(),
    $login->login($user)->getEmail()
);

echo "<div id='009'></div>";
echo "<div class='line'>009 - Traits</div>";

$userT = new \Classes\Traits\User("Leandro", "Silveira", "teste@teste.com.br");
$addressT = new \Classes\Traits\Address("Rua Teste", "111", "casa");

$register = new \Classes\Traits\Register(
    $userT,
    $addressT
);

var_dump(
    $register,
    $register->getUser(),
    $register->getAdreess(),
    $register->getUser()->getFistName(),
    $register->getAdreess()->getStreet()
);
$cart = new \Classes\Traits\Cart();
$cart->add(1, "Banana", "10", "10");
$cart->add(2, "Maçã", "5", "12");
$cart->add(3, "Mamão", "2", "4");
$cart->remove(1, 11);

$cart->checkout($userT, $addressT);

var_dump($cart);

echo "</div>";




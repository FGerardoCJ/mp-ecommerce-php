<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = "1234";
$item->title = $_POST['title'];
$item->quantity = $_POST['unit'];
$item->unit_price = $_POST['price'];
$item->description = $_POST['description'];
$item->picture_url = $_POST['img'];
$preference->items = array($item);

// Crear datos del comprador
$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_81131286@testuser.com";
$payer->phone = array(
    "area_code" => "11",
    "number" => "22223333"
);
$payer->address = array(
    "street_name" => "Falsa",
    "street_number" => 123,
    "zip_code" => "1111"
);
$preference->payer = $payer;

// Links de retorno
// $preference->back_urls = array(
//     "success" => "localhost/mp-ecommerce-php/estatusPago.php",
//     "failure" => "localhost/mp-ecommerce-php/estatusPago.php",
//     "pending" => "localhost/mp-ecommerce-php/estatusPago.php"
// );
$preference->back_urls = array(
    "success" => "https://fgerardocj-mp-commerce-php.herokuapp.com/estatusPago.php",
    "failure" => "https://fgerardocj-mp-commerce-php.herokuapp.com/estatusPago.php",
    "pending" => "https://fgerardocj-mp-commerce-php.herokuapp.com/estatusPago.php"
);
$preference->auto_return = "approved";

// Excluir formas y tipos de pago
$preference->payment_methods = array(
    "excluded_payment_types" => array(
        array("id" => "atm")
    ),
    "excluded_payment_methods" => array(
        array("id" => "amex")
    ),
    "installments" => 6 //Número de mensualidades
);

$preference->notification_url = "https://hookb.in/G9XY0mrro0UE2xPP2kVN";
$preference->statement_descriptor = "Tienda e-commerce";
$preference->external_reference = "contacto@grupo-abx.com";
$preference->integrator_id = "dev_24c65fb163bf11ea96500242ac130004";
$preference->save();

header("Location: ".$preference->init_point);
die();

?>

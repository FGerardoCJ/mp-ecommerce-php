<?php
/***VARIABLES POR GET ***/

// $numero = count($_GET);
// $tags = array_keys($_GET);// obtiene los nombres de las varibles
// $valores = array_values($_GET);// obtiene los valores de las varibles
//
// // crea las variables y les asigna el valor
// for($i=0;$i<$numero;$i++){
//     echo $tags[$i]." => ".$valores[$i]."<br>";
// }
switch ($_GET['collection_status']) {
    case 'approved':
        $icon = '<i class="fas fa-check" style="font-size: 50px; color: rgb(15, 166, 12)"></i>';
        $text = "Pago realizado";
        break;
    case 'in_process':
        $icon = '<i class="fas fa-cog fa-spin" style="font-size: 50px; color: #2a2a2a"></i>';
        $text = "Pago pendiente";
        break;
    case 'pending':
        $icon = '<i class="fas fa-cog fa-spin" style="font-size: 50px; color: #2a2a2a"></i>';
        $text = "Pago pendiente";
        break;
    case 'ticket':
        $icon = '<i class="fas fa-cog fa-spin" style="font-size: 50px; color: #2a2a2a"></i>';
        $text = "Pago pendiente";
        break;
    case 'failure':
        $icon = '<i class="fas fa-times" style="font-size: 50px; color: #ff0000"></i>';
        $text = "Pago Rechazado";
        break;
    case 'null':
        $icon = '<i class="fas fa-times" style="font-size: 50px; color: #ff0000"></i>';
        $text = "Algo paso durante el pago";
        break;
    default:
        $icon = '<i class="fas fa-times" style="font-size: 50px; color: #ff0000"></i>';
        $text = "Algo paso";
        break;
}
switch ($_GET['payment_type']) {
    case 'credit_card':
        $type = "Tarjeta de credito";
        break;
    case 'debit_card':
        $type = "Tarjeta de débito";
        break;
    case 'prepaid_card':
        $type = "Mercado pago";
        break;
    case 'ticket':
        $type = "Oxxo o PayCash";
        break;
    case 'digital_wallet':
        $type = "PayPal";
        break;
    case 'null':
        $type = "Reitente de nuevo su compra";
        $_GET['payment_id'] = "Reitente de nuevo su compra";
        break;
    default:
        $type = "Bitcoin, Dinheiro em conta, BBVA Bancomer, Banamex 0 Santander";
        break;
}
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>CodePen - Fancy animated info window</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:400,500,800">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./src/style.css">
        <link rel="stylesheet" href="./src/all.min.css">

    </head>
    <body>

        <div id="wrapper">

          <div id="right-side">
            <div id="second" class="active">
              <div class="icon big" >
                  <?php echo $icon ?>
              </div>
              <h1 style="align:center;"><?php echo $text ?></h1>
              <br>
              <table class="table">
                  <tr>
                      <td><b>Metodo de pago</b></td>
                      <td><?php echo $type  ?></td>
                  </tr>
                  <tr>
                      <td><b>Referencia</b></td>
                      <td><?php echo $_GET['external_reference'] ?></td>
                  </tr>
                  <tr>
                      <td><b>ID</b></td>
                      <td><?php echo $_GET['payment_id'] ?></td>
                  </tr>
              </table>
              <a href="./" class="btn btn-primary" role="button">Ir a la tienda</a>
              <br>
            </div>

          </div>
        </div>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./src/script.js"></script>

    </body>
</html>

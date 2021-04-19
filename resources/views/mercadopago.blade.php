<?php
    // SDK de Mercado Pago
    require_once '../vendor/autoload.php';

    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('TEST-7826089881907483-091520-484212adddd4750b48232852a2e3aa6c-146764596');

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 100;
    $preference->items = array($item);

    $preference->back_urls = array(
    "success" => route('mercadopagoApproved'),
    "failure" => route('mercadopagoDenied'),
    );
    $preference->auto_return = "approved";
    
    $preference->save();
?>

        

 <!DOCTYPE html>
 <html>
 <head>
     <title>Mercadopago</title>
 </head>
 <body>
        <script
          src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
          data-preference-id="<?php echo $preference->id; ?>">
        </script>
 </body>
 </html>


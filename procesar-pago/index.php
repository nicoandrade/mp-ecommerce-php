<?php
// Loading Composer
require dirname( __DIR__, 1 ) . '/vendor/autoload.php';

// Mercado Pago Credentials
MercadoPago\SDK::setAccessToken( "APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398" ); // On Production
//MercadoPago\SDK::setAccessToken( "YOUR_TEST_ACCESS_TOKEN" ); // On Sandbox

$json_event = file_get_contents( 'php://input', true );
$event = json_decode( $json_event );

echo '<pre>';
print_r( $event );
echo '</pre>';
echo '<pre>';
print_r( $_POST );
echo '</pre>';

if ( isset( $event->type, $event->data->id ) ) {
    $event_type = $event->type;
    $event_id = $event->data->id;

    $payment = MercadoPago\Payment . find_by_id( $_POST["id"] );

}
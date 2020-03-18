<?php
// Loading Composer
require __DIR__ . '/vendor/autoload.php';

// Mercado Pago Credentials
MercadoPago\SDK::setAccessToken( "APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398" ); // On Production
//MercadoPago\SDK::setAccessToken( "YOUR_TEST_ACCESS_TOKEN" ); // On Sandbox

$file = 'logs.txt';

$json_event = file_get_contents( 'php://input', true );
$event = json_decode( $json_event );

if ( isset( $event->type, $event->id ) ) {
    $event_type = $event->type;
    $event_id = $event->id;

    $payment = MercadoPago\Payment::find_by_id( $event_id );

    $current = file_get_contents( $file );
    $current .= $event_type . " recibido - ID #" . $payment->id . "\n";

} else {
    $current = file_get_contents( $file );
    $current .= "Llamada directa\n";
}

file_put_contents( $file, $current );

http_response_code( 200 );
<?php
header('Content-Type: application/json');
require_once dirname(__FILE__) . '/vendor/autoload.php';

\Midtrans\Config::$serverKey = 'SB-Mid-server-ojDn7cgXmlrJSOFIaZeji6wv';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

$transaction_details = array(
    'order_id' => uniqid(),
    'gross_amount' => 10000
);

$item_details = array(
    array(
        'id' => 'item1',
        'price' => 10000,
        'quantity' => 1,
        'name' => 'Layanan Pembersihan'
    )
);

$customer_details = array(
    'first_name' => 'Nikeh',
    'email' => 'nikeh@example.com',
    'phone' => '08123456789'
);

$transaction = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
    'customer_details' => $customer_details
);

try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(array("token" => $snapToken));
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage()));
}

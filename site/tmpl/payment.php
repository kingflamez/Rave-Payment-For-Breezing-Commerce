<?php

defined('_JEXEC') or die('Restricted access');

$baseUrl = 'https://api.ravepay.co';
$secretKey = $rave->live_sk;
$publicKey = $rave->live_pk;
if ($rave->staging_account == 1) {
  $baseUrl = 'https://rave-api-v2.herokuapp.com';
  $secretKey = $rave->test_sk;
  $publicKey = $rave->test_pk;
}

$postfields = array();
$postfields['PBFPubKey'] = $publicKey;
$postfields['customer_email'] = $rave->email;
$postfields['customer_firstname'] = $rave->firstname;
$postfields['custom_logo'] = $rave->logo;
$postfields['customer_lastname'] = $rave->lastname;
$postfields['custom_description'] = "Pay for your order on " . $rave->business_name;
$postfields['custom_title'] = $rave->business_name;
$postfields['customer_phone'] = $rave->phone;
$postfields['country'] = $rave->country;
$postfields['redirect_url'] = $rave->redirect_url;
$postfields['txref'] = $rave->txref;
$postfields['payment_method'] = $rave->payment_method;
$postfields['amount'] = $rave->amount + 0;
$postfields['currency'] = strtoupper($rave->currency);
$postfields['hosted_payment'] = 1;
ksort($postfields);
$stringToHash = "";
foreach ($postfields as $key => $val) {
  $stringToHash .= $val;
}

$stringToHash .= $secretKey;
$hashedValue = hash('sha256', $stringToHash);
$meta = array();
array_push($meta, array('metaname' => 'amount', 'metavalue' => $rave->amount));
$transactionData = array_merge($postfields, array('integrity_hash' => $hashedValue), array('meta' => $meta));
$json = json_encode($transactionData);

$html = "
    <script type='text/javascript' src='" . $baseUrl . "/flwv3-pug/getpaidx/api/flwpbf-inline.js'></script>
    <script>
    document.addEventListener('DOMContentLoaded', function(event) {
    var data = JSON.parse('" . json_encode($transactionData = array_merge($postfields, array('integrity_hash' => $hashedValue))) . "');
    getpaidSetup(data);});
    </script>
    ";

echo $html;

?>
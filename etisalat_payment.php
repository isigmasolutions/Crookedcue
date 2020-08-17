 <?php
$response_curlerror = ""; 
$response_curl = ""; 
$ch = curl_init("https://demo-ipg.ctdev.comtrust.ae:2443"); 
$arr_sendRequest = array();
$arr_sendRequest['Currency'] = "USD";
$arr_sendRequest['TransactionHint'] = "CPT:Y;VCC:Y;";
$arr_sendRequest['OrderID'] = "1211121";
$arr_sendRequest['OrderName'] = "woocommerceorder";
$arr_sendRequest['Channel'] = "Web";
$arr_sendRequest['Amount'] = "100";
$arr_sendRequest['Customer'] = "Demo Merchant";
$arr_sendRequest['UserName'] = "Demo_fY9c";
$arr_sendRequest['Password'] = "Comtrust@20182018";
$arr_sendRequest['ReturnPath'] = "http://crookedcue.devstageserver.com/etisalat_payment.php";
$jonRequest = json_encode(array('Registration' => $arr_sendRequest), JSON_FORCE_OBJECT);
print "Json-submitted".$jonRequest;
curl_setopt($ch, CURLOPT_HEADER, 0); /* Set to 1 to see HTTP headers, otherwise 0 or XML reading will not work */
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:text/xml-standard-api'));
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_PORT, 2443);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $jonRequest );
curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . "/ca.crt"); /* Location in same folder as this file */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response_curl = curl_exec($ch);
if (curl_errno($ch)) {
$response_curlerror = curl_error($ch);
}
curl_close($ch);
?>
<html>
<head>
</head>
<body>
<?php
/* Generate some output */
/* STEP 3 */
/* Show results of submitting request using TLS 1.2 */
print "<br />Result of Submission:<br />";
if (strlen($response_curlerror) > 0) 
{ 
print "Curl ERROR: " . $response_curlerror . "<br />"; 
}
else { 
print "-->".$response_curl . "<br />"; 
}
?>
</body>
</html>
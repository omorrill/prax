<?php

class SoapClientWrapper extends SoapClient
{
  public function __doRequest($request, $location, $action, $version, $one_way = 0) {
    $host = cos_jis_get_jis_endpoint();

    $headers = array(
      'Host: ' . $host,
      'Method: POST',
      'Connection: Keep-Alive',
      'User-Agent: PHP-SOAP-CURL',
      'Content-Type: text/xml; charset=utf-8',
      'SOAPAction: "'.$action.'"',
    );
    $this->__last_request_headers = $headers;
    $ch = curl_init($location);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    $response = curl_exec($ch);
    return $response;
  }
  function __getLastRequestHeaders() {
    return implode("\n", $this->__last_request_headers)."\n";
  }
  public function __construct($wsdl, $options = array()){
    if($options['stream_context'] && is_resource($options['stream_context'])){
      $stream_context_options = stream_context_get_options($options['stream_context']);
      $user_agent = (isset($stream_context_options['http']['user_agent']) ? $stream_context_options['http']['user_agent'] : "PHP-SOAP/" . PHP_VERSION) . "\r\n";
      if(isset($stream_context_options['http']['header'])){
        if(is_string($stream_context_options['http']['header'])){
          $user_agent .= $stream_context_options['http']['header'] . "\r\n";
        }
        else if(is_array($stream_context_options['http']['header'])){
          $user_agent .= implode("\r\n", $stream_context_options['http']['header']);
        }
      }
      $options['user_agent'] = $user_agent;

      unset($options['stream_context']);
    }
    parent::__construct($wsdl, $options);
  }
}

function cos_jis_get_soap_client() {
  $host = cos_jis_get_jis_endpoint();
  $context = array('http' =>
    array(
      'header'  => "Host: $host\r\n",
    ),
  );
  // Build the required options to send to the SoapClient constructor.
  // See http://www.php.net/manual/en/soapclient.soapclient.php for all available.
  // Note that the manual states that many of these can be ommitted.
  $soap_options = array(
    'stream_context' => stream_context_create($context),
    'encoding' => 'UTF-8',
    'location' => "http://158.120.0.20:8080/jis-web/services/RemotePaymentService",
    'exceptions' => TRUE,
    'trace' => true,
    //'cache_wsdl' => WSDL_CACHE_NONE,
  );

  // Instantiate a client.
  $soap_client = new SoapClientWrapper('http://158.120.0.20:8080/jis-web/services/RemotePaymentService?wsdl', $soap_options);
  return $soap_client;
}

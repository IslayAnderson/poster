<?php
class Wordpress{

  private $url = 'https://blog.islayanderson.co.uk/index.php/wp-json/wp/v2/';
  public $curl;
  public $curlOpt;
  public $lastRequest;

  public function __construct() {
    $this->curl = curl_init();
    $this->curlOpt = array(
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    );
  }
  public function closeConnection (){
    curl_close($this->curl);
  }
  public function getLastRequest (){
    return $this->lastRequest;
  }
  private function sendRequest ($endpoint = null, $curlopt = null){
    if(is_null($curlopt) && !is_null($endpoint)){
      array_push($this->curlOpt, array(CURLOPT_URL=>$this->url.$endpoint));
    }else if(!is_null($endpoint) && !is_null($curlopt)){
      array_push($this->curlOpt, $curlopt);
    }else{
      return false;
    }
    return json_decode(curl_exec($this->curl));
  }

  public function getLatestPost (){
    $request = $this->sendRequest("posts");
    $this->lastRequest = $request;
    $latest = $request[0];
    return array("title"=>$latest->title->rendered, "content"=>$latest->content->rendered, "permalink"=>$latest->link);
  }
  public function getCategories (){
    $request = $this->sendRequest("categories");
    $this->lastRequest = $request;
    return $request;
  }


}
?>
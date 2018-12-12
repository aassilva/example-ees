<?php

class cotacao {
  public $code;
  public $codein;
  public $name;
  public $high;
  public $low;
  public $create_date;

  public function __construct($code, $codein, $name, $high, $low, $create_date) {
    $this->code = $code;
    $this->codein = $codein;
    $this->name = $name;
    $this->high = $high;
    $this->low = $low;
    $this->create_date = $create_date;
  }
}

class BolsaCotacao {
  public static function getCotacoes() {

    $arr = array();
    $arr = self::getCotacoesFromAPI();

    $cotacoes = array();
    array_push($cotacoes, self::getCotacao("USD", $arr));
    array_push($cotacoes, self::getCotacao("USDT", $arr));
    array_push($cotacoes, self::getCotacao("ARS", $arr));
    array_push($cotacoes, self::getCotacao("CAD", $arr));
    array_push($cotacoes, self::getCotacao("EUR", $arr));
    array_push($cotacoes, self::getCotacao("GBP", $arr));
    array_push($cotacoes, self::getCotacao("BTC", $arr));

    return $cotacoes;
  }

  private function getCotacao($id_busca, $arr) {

    return new cotacao($arr->$id_busca->code, $arr->$id_busca->codein, $arr->$id_busca->name, $arr->$id_busca->high, $arr->$id_busca->low, $arr->$id_busca->create_date);
  }

  private function getCotacoesFromAPI() {
    $url = "https://economia.awesomeapi.com.br/json/all";
    $json = file_get_contents($url);
    $data = json_decode($json);

    //$data->USD->name
    return $data;
  }
 
}


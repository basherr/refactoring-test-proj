<?php
use Illuminate\Support;  // https://laravel.com/docs/5.8/collections - provides the collect methods & collections class
use LSS\Array2Xml;
require_once('classes/Exporter.php');

class Controller {

    public function __construct($args) {
        $this->args = $args;
    }
    // the "FormatterFactory" is created for the sake of explaination, however, "PlayerFactory" is not created.
    public function export(string $type, string $format, FormatterFactory $formatterFactory, PlayerFactory $playerFactory) {
        $data = $playerFactory->getModel($type)->getData();
        return $formatterFactory->initialize($format)->format($data);
    }
}
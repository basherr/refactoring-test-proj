<?php namespace classes;

class FormatterFactory implements \contract\Initializable
{
  public function initialize(string $type): \contract\Formatable
  {
    if($type === 'xml') {
      return new XmlFormatter();
    }
    throw new FormatterNotFoundException();
  }
}

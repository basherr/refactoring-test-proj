<?php namespace contacts;

interface Initialzable
{
  public function initialize(string $type): Formatable;
}

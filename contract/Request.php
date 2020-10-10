<?php namespace contracts;

interface Request {
  public function has(string $key): bool;
  public function get(string $key);
}
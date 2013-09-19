<?php namespace Byznaga\Dressing\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Dressing extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'dressing'; }
 
}
<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


$lorenText = "Lorem       ipsum    dolor    sit        amet,    consectetur      
    adipiscing    elit, sed do eiusmod tempor    incididunt ut labore     
 et dolore magna    aliqua. Ut enim    ad minim veniam, quis nostrud    exercitation
  ullamco    laboris nisi ut aliquip   ex ea commodo consequat. ";

var_dump (preg_replace ('/\s+/', ' ', $lorenText));


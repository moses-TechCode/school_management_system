<?php
include_once("fpdf186/fpdf.php");
class pdf extends fpdf{
 
 function header(){
   $this -> image("image.png");
 }
}
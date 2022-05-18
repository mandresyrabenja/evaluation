<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<?php
if (!function_exists('assemble_strings'))
{
  //FONCTION MANAMBATRA STRING HANAOVANA REQUETE
  /**
    *@param $strings = array de strings
    *@param $table = anaranleh table hangalana anleh requete (exemple : offer)
  */
  function assemble_Strings_As_Request($strings = array(), $table)
  {
    $rep = "SELECT * FROM offer";
    if(sizeof($strings)>0)
    {
      for($i=0;$i<sizeof($strings);$i++)
      {
        if($i == 0)
        {
          $rep = ''.$rep.' WHERE '.$strings[$i].'';
        }
        else if($i > 0)
        {
          $rep = ''.$rep.' AND '.$strings[$i].'';
        }
      }
    }
    return $rep;
  }
}
 ?>

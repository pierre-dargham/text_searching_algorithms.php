<?php

function shift_and($haystack, $size_haystack, $needle, $size_needle) {

  $positions = array();
  $s = array();

    for ($i = 0; $i < 256; ++$i) {
      $s[$i] = ~0; 
    }

    $lim = 0;
    $j = 1;
    for ($i = 0; $i < $size_needle; ++$i) { 
      $s[ord($needle[$i])] &= ~$j; 
      $lim |= $j;
      $j <<= 1;
    }

    $lim = ~($lim>>1);

  //for ($i = 0; $i < $size_needle; ++$i) {
    //$k = ord($needle[$i]);
    //$s[$k] |= (1 << $k);
  //}
    //$d = chr(0);

    for ($j = 0; $j < $size_haystack; ++$j) {
        $lim = (($lim << 1) | 1) & $s[ord($haystack[$j])];

        if (($lim & (1 << ($size_needle - 1))) != 0) {
            $positions[] = $j - $size_needle + 1;
        }
    }

  return $positions;
}

/*function shift_and($haystack, $size_haystack, $needle, $size_needle) {

  $positions = array();
  $b = array();

    for ($i = 0; $i < 256; ++$i) {
      $b[$i] = ~0; 
    }

  // PRE
  foreach(ascii_letters_of($needle) as $ascii_letter) {
     $b[$ascii_letter] = ;
  }

  // SEARCH
}

/*function shift_and($haystack, $size_haystack, $needle, $size_needle) {

  $positions = array();
  $s = array();

    for ($i = 0; $i < 256; ++$i) {
      $s[$i] = ~0; 
    } 
    for ($lim = 0,  $i = 0, $j = 1; $i < $size_needle; ++$i, $j <<= 1) { 
      $s[ord($needle[$i])] &= ~$j; 
      $lim |= $j; 
    } 
    $lim = ~($lim>>1);


    for ($state = ~0, $j = 0; $j < $size_haystack; ++$j) {

    // shift AND 
        $state = (($state << 1) | 1) & $s[ord($haystack[$j])];
    // shift OR   
        //$state =  ($state << 1) | $s[ord($haystack[$j])];
        

      if ($state < $lim) {
        $positions[] = $j - $size_needle + 1; 
      }
    }
  
   return $positions;
}*/
<?php
$css = @file_get_contents('css/fonts.css');
$parts = explode(":before",$css);
$count = count($parts);
$icons = array();
for($i=0; $i<$count; $i++) {
   $str = $parts[$i];
   $clean = preg_replace('/content.*/', '', $str);
   $clean = preg_replace("/\s+/", "", $clean);
   $clean = preg_replace( "/\r|\n/", "", $clean );
   $clean = str_replace('{','',$clean);
   $clean = str_replace("@font-facefont-family:'Hcui';src:url('../fonts/Hcui.eot');src:url('../fonts/Hcui.eot?#iefix')format('embedded-opentype'),url('../fonts/Hcui.woff')format('woff'),url('../fonts/Hcui.ttf')format('truetype'),url('../fonts/Hcui.svg#Hcui')format('svg');font-weight:normal;font-style:normal;}[class*='hcui-']","",$clean);
   $clean = str_replace("display:inline-block;font-family:'Hcui';font-style:normal;font-weight:normal;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}","",$clean);
   $clean = str_replace(".","",$clean);
   if($clean) {
      $icons[] = $clean;
   }
}
echo json_encode( $icons, JSON_PRETTY_PRINT );

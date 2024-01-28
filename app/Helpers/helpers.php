<?php

function imageUpload($image, $directory)
{
   $extension =$image->getClientOriginalExtension();
   $imageName =time().'.'.$extension;
   $image->move($directory,$imageName);
   return $directory.$imageName;

}

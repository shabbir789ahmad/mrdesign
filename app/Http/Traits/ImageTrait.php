<?php

namespace App\Http\Traits;

trait ImageTrait
 {

    function image()
   {
       $req = app('request');
         
       if($req->file('image'))
       {
         $file=$req->file('image');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/brand/' , $filename);
         $image=$filename;

         return $image;
        }

       
   }

 }

?>
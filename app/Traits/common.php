<?php
    namespace App\Traits;
//للاكواد الثابته  
    Trait Common 
    {
        //calling function for helping uploaded fiels 
        public function uploadFile($file, $path){
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $file->move($path, $file_name);
            return $file_name;
        }
    }
?>
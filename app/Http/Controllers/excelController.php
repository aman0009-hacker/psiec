<?php

namespace App\Http\Controllers;

use App\Models\cat;
use App\Models\pro;
use App\Models\subcat;
use Illuminate\Http\Request;
use League\Csv\Reader;

class excelController extends Controller
{
    public function excelData()
    {
        $data=fopen(base_path('database/data/categories.csv'),'r');
        $array=array();
        
       
        $transRow = true;
      

        while (($content = fgetcsv($data,2000,',')) !== false) 
        {
                 if(!$transRow)
                   {
                
                $array[]=$content;
 


           }
           $transRow=false;

        }
        fclose($data);

        foreach($array as $value)
        {
        
            $catego=cat::where('name',$value[1])->exists();

            if($catego)
            {
                continue;
            }
            else
            {
               
                $catall=pro::all();

                      foreach($catall as $single)
                      {
                    
                        if($single->name == $value[0])
                        {
                          
                            cat::create([
                                "name"=>$value[1],
                                "pro_id"=>$single->id
                            ]);
                        }
                      }



              
                     


            }






        }
        foreach($array as $sub)
        {
        
            $catego=subcat::where('name',$sub[2])->exists();

            if($catego)
            {
                continue;
            }
            else
            {
               
                $catall=cat::all();

                      foreach($catall as $subid)
                      {
                    
                        if($subid->name == $sub[1])
                        {
                          
                            subcat::create([
                                "name"=>$sub[2],
                                "cat_id"=>$subid->id
                            ]);
                        }
                      }



              
                     


            }






        }
    

    



   return  "1";
         


}
}

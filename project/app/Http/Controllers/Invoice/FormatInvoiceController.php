<?php

namespace App\Http\Controllers\Invoice;


class FormatInvoiceController
{

    //reformat view of discount details
    public function FormattedDiscountDetails ($discount_details){
        $formatted_details=[];
        foreach ($discount_details as $key=>$value){
            $formatted_details[$key] = '-$'.$value;
        }
        return $formatted_details;
    }

    //reformat price
    public function formattedPrice($number){
        return '$'.$number;
    }

}

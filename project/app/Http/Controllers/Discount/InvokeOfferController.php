<?php

namespace App\Http\Controllers\Discount;

//to execute implemented offer details function
class InvokeOfferController
{
    public function execute(Offer $offer){
        return $offer->getOffer();
    }
}
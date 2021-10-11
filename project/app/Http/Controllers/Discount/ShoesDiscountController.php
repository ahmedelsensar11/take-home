<?php

namespace App\Http\Controllers\Discount;


class ShoesDiscountController implements Offer
{
    protected $numOfOffer;
    protected $discount_value;
    public function __construct($num_of_offer)
    {
        $this->numOfOffer = $num_of_offer;
    }

    public function getOffer() :array
    {
        // TODO: Implement getOffer() method.
        $num_of_offer = $this->numOfOffer;
        $this->discount_value = $num_of_offer*SHOES_OFFER_PERCENT*SHOES_PRICE;
        return [$num_of_offer.'X: %'.(SHOES_OFFER_PERCENT*100).' off shoes' => $this->discount_value];
    }

}
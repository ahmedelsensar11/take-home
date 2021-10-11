<?php

namespace App\Http\Controllers\Discount;


class ShippingDiscountController implements Offer
{
    protected $discount_value;

    public function getOffer() :array
    {
        // TODO: Implement getOffer() method.
        $this->discount_value = SHIPPING_DISCOUNT_VALUE;
        return ['$'.$this->discount_value.' of shipping' => $this->discount_value];
    }
}
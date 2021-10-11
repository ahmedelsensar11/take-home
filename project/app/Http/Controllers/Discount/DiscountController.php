<?php

namespace App\Http\Controllers\Discount;

class DiscountController
{
    protected $count_of_jacket_offers = 0;
    protected $count_of_shoes_offers = 0;
    protected $detailed_discount=[];

    //get detailed invoice discount
    public function getDiscount(array $products):array 
    {
        $discount_invoker = new InvokeOfferController();
        //get shoes offer
        if ($this->shoesHasOffer($products)) {
            //get shoes discount details
            $shoes_offer_details =$discount_invoker->execute(new ShoesDiscountController($this->count_of_shoes_offers));
            foreach ($shoes_offer_details as $key=>$value){
                $this->detailed_discount[$key] = $value;
            }
        };
        //get jacket discount
        if ($this->jacketHasOffer($products)) {
            //get jacket discount details
            $tops_offer_details =$discount_invoker->execute(new JacketDiscountController($this->count_of_jacket_offers));
            foreach ($tops_offer_details as $key=>$value){
                $this->detailed_discount[$key] = $value;
            }
        };
        //get shipping offer
        if ($this->shippingHasOffer($products)) {
            //get shipping discount details
            $shipping_offer_details =$discount_invoker->execute(new ShippingDiscountController());
            foreach ($shipping_offer_details as $key=>$value){
                $this->detailed_discount[$key] = $value;
            }
        };
        //return invoice detailed discount
        return $this->detailed_discount;
    }

    //check shoes offer is available
    public function shoesHasOffer(array $products): bool
    {
        try {
            $shoes_products = [];
            foreach ($products as $product) {
                if (strtoupper($product) == strtoupper(SHOES_PRODUCT_NAME)) {
                    array_push($shoes_products, $product);
                }
            }
            if (count($shoes_products) > 0) {
                $this->count_of_shoes_offers = count($shoes_products);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //check shipping offer is available
    public function shippingHasOffer(array $products): bool
    {
        if (count($products) > 1) {
            return true;
        }
        return false;
    }

    //check jacket offer is available
    public function jacketHasOffer(array $products): bool
    {
        try {
            $tops_products = [];
            $jacket_products = [];
            //select tops products and push them into tops_products
            //select jackets products and push them into jacket_products
            foreach ($products as $product) {
                if (strtoupper($product) == strtoupper(T_SHIRT_PRODUCT_NAME) || strtoupper($product) == strtoupper(BLOUSE_PRODUCT_NAME)) {
                    array_push($tops_products, $product);
                } elseif (strtoupper($product) == strtoupper(JACKET_PRODUCT_NAME)) {
                    array_push($jacket_products, $product);
                }
            }
            //check if number of product makes offer ?
            if (count($tops_products) < 2 || count($jacket_products) == 0) {
                return false; //offer is not available
            }else {
                //now offer is available, let us know number of jackets which have an offer
                $this->count_of_jacket_offers =$this->calcNumOfJacketOffers(count($jacket_products),(count($tops_products)));
                return true; //offer is available
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //return number of jackets which have discount
    public function calcNumOfJacketOffers($num_of_jackets, $num_of_tops){
        if ($num_of_tops % 2 !=0){
            //if number of tops products is odd
            $num_of_tops = $num_of_tops - 1;
        };
        if ($num_of_jackets <= ($num_of_tops/2)) {
            return $num_of_jackets;
        }else {
            return $num_of_tops/2;
        }
    }

}

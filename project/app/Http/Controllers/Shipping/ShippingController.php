<?php

namespace App\Http\Controllers\Shipping;
use App\Http\Controllers\Product\ProductController;

class ShippingController extends ProductController
{
    public $invoice_shipping_fees, $product_shipping_fees, $country_shipping_rate;
    protected $shipping_rates = [
        'US' => [
            'rate' => US_SHIPPING_RATE,
        ],
        'UK' => [
            'rate' => UK_SHIPPING_RATE,
        ],
        'CN' => [
            'rate' => CN_SHIPPING_RATE,
        ]
    ];

    //country shipping rate
    public function getCountryShippingRate(string $product_name)
    {
        try {
            $shipping_country = $this->getProductCountry($product_name);
            foreach ($this->shipping_rates as $key => $value) {
                if ($key == $shipping_country) {
                    $this->country_shipping_rate = $value['rate'];
                    return $this->country_shipping_rate;
                }
            }
        }
        catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    //product shipping fees
    public function getProductShippingFees(string $product_name){
        try {
            $country_shipping_rate = $this->getCountryShippingRate($product_name);
            $product_weight = $this->getProductWeight($product_name);
            // calc of shipping_fees =[rate(USD)/100(gm)]*product['weight']
            $this->product_shipping_fees = ($country_shipping_rate/SHIPPING_RELATED_WEIGHT)*$product_weight;
            return $this->product_shipping_fees;
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    //shipping fees for all invoice
    public function getInvoiceShippingFees(array $products){
        try{
        //unique because shipping on product not quantity
        $unique_products = array_unique($products);
        foreach ($unique_products as $product){
            $this->invoice_shipping_fees += $this->getProductShippingFees($product);
        }
        return $this->invoice_shipping_fees;
        } catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

}
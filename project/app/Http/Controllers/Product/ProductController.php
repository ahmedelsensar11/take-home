<?php

namespace App\Http\Controllers\Product;

class ProductController extends AvailableProductsController
{
    protected $product_price, $product_weight, $shipped_from;
    //check product is found in available products
    public function isProductAvailable(String $product_name)
    {
        $is_available = false;
        foreach ($this->available_products as $key => $value) {
            if (strtoupper($product_name) === strtoupper($key)) {
                $is_available = true;
            }
        }
        return $is_available;
    }
    //return product country
    public function getProductCountry(String $product_name)
    {
        try {
            foreach ($this->available_products as $key => $value) {
                if (strtoupper($product_name) == strtoupper($key)) {
                    $this->shipped_from = $value['shipped_from'];
                    return $this->shipped_from;
                }
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
    //return product price
    public function getProductPrice(string $product_name)
    {
        try {
            foreach ($this->available_products as $key => $value) {
                if (strtoupper($key) == strtoupper($product_name)) {
                    $this->product_price = $value['price'];
                    return $this->product_price;
                }
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
    //return product weight
    public function getProductWeight(string $product_name)
    {
        try {
            foreach ($this->available_products as $key => $value) {
                if (strtoupper($key) == strtoupper($product_name)) {
                    $this->product_weight = $value['weight'];
                    return $this->product_weight;
                }
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
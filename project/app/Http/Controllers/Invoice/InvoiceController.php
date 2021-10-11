<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Discount\DiscountController;
use App\Http\Controllers\Shipping\ShippingController;
use Illuminate\Http\Request;
use App\Http\Controllers\Product\ProductController;

class InvoiceController extends ProductController
{
    protected $detailed_invoice =[];
    protected $subtotal_price, $shipping_fees, $invoice_VAT ,$total_price;

    //get invoice by request
    public function getInvoice(Request $request)
    {
        $products = $request->all();
        if (is_array($products) && count($products) > 0){
            foreach ($products as $product){
                //check unavailable entered product
                if (!$this->isProductAvailable($product)){
                    return response()->json($product.' is not available now');
                }
            }
            //get detailed invoice
            return $this->getDetailedInvoice($products);
        }else{
            return response()->json('Please try to enter a not empty array, EX: [item1, item2, item3]');
        }
    }

    //get detailed invoice
    public function getDetailedInvoice(array $products)
    {
        try{
            $invoice_formatter = new FormatInvoiceController();
            $this->subtotal_price =$this->calcInvoiceSubtotalPrice($products);
            $this->detailed_invoice['Subtotal'] = $invoice_formatter->formattedPrice($this->subtotal_price);
            $shipping = new ShippingController();
            $this->shipping_fees = $shipping->getInvoiceShippingFees($products);
            $this->detailed_invoice['Shipping'] = $invoice_formatter->formattedPrice($this->shipping_fees);
            $this->invoice_VAT = $this->calcInvoiceVAT($this->subtotal_price);
            $this->detailed_invoice['VAT'] = $invoice_formatter->formattedPrice($this->invoice_VAT);
            $discount = new DiscountController();
            if (!empty($discount->getDiscount($products))){
                $this->detailed_invoice['Discount'] = $invoice_formatter->FormattedDiscountDetails($discount->getDiscount($products));
            }
            $this->total_price = $this->calcInvoiceTotalPrice($this->subtotal_price, $this->shipping_fees, $this->invoice_VAT, $discount->getDiscount($products));
            $this->detailed_invoice['Total'] = $invoice_formatter->formattedPrice($this->total_price);
            return response()->json($this->detailed_invoice);
        }
        catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    //calculate subtotal price
    public function calcInvoiceSubtotalPrice (array $products){
        try{
            $products_price =0;
            foreach ($products as $product){
                $products_price += $this->getProductPrice($product);
            }
            return round($products_price,2);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    //calculate VAT
    public function calcInvoiceVAT($subtotal_price){
        try{
            $invoice_vat = $subtotal_price * PERCENTAGE_OF_VAT;
            return round($invoice_vat,2);
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    //calculate total price
    public function calcInvoiceTotalPrice($subtotal,$shipping,$vat,$discount_details){
        try{
            $discount=0;
            $cost = $subtotal+$shipping+$vat;
            foreach ($discount_details as $key=>$value){
                $discount += $value;
            }
            $total = $cost - $discount;
            return $total;
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

}

<?php


class Coupon
{
    private $quantity, $cartTotal;

    public function __construct($_quantity, $_cartTotal)
    {
        $this->quantity = $_quantity;
        $this->cartTotal = $_cartTotal;
    }

    public static function validateCoupon($coupon, $quantity, $cartTotal)
    {
        switch ($coupon){
            case 'FIXED10':
                if ($quantity > 0 && $cartTotal > 50)
                {
                    return $cartTotal - 10;
                }
                break;
            case 'PERCENT10':
                if ($quantity > 1 && $cartTotal > 100)
                {
                    return $cartTotal -= $cartTotal * 10/100;
                }
                else
                {
                    return $cartTotal;
                }
                break;
            case 'MIXED10':
                if ($quantity > 2 && $cartTotal > 200)
                {
                    $tenOff = $cartTotal - 10;
                    $percentOff = $cartTotal - ($cartTotal * 10/100);
                    return $tenOff > $percentOff ? $tenOff : $percentOff;
                }
                else{
                    return $cartTotal;
                }
                break;
            case 'REJECTED10':
                if ($cartTotal > 1000)
                {
                    return $cartTotal - ($cartTotal * 10/100) - 10 ;
                }
                else{
                    return $cartTotal;
                }
                break;
            default;
                return $cartTotal;
        }
    }
}
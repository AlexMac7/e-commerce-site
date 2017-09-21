<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function add( $product_id ) {
        // For Identification Purpose
        $session_id = session()->get( '_token' );
        // Get Product Detils by ID

        $product = Product::where( 'id', $product_id )->first();
        if ( $product == null ) {
            return abort( 404 );
        }

        if ( Cart::where( 'session_id', '=', $session_id )->exists() ) {

            //CHeck whether product exist if yes increase quantity
            $entry = Cart::where( [ 'session_id' => $session_id, 'product_id' => $product_id ] )->increment( 'qty', 1 );
            if ( ! $entry ) {
                Cart::create( [
                    'session_id'   => $session_id,
                    'product_id'   => $product_id,
                    'product_name' => $product['title'],
                    'price'        => $product['discount_price'],
                    'qty'          => 1
                ] );
            }
        } else {
            Cart::create( [
                'session_id'   => $session_id,
                'product_id'   => $product_id,
                'product_name' => $product['title'],
                'price'        => $product['discount_price'],
                'qty'          => 1
            ] );
        }

        // First check whether the cart exist
        return redirect()->route( 'cart.show' );
    }
}

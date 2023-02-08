<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Order::join('items', 'items.item_id', '=', 'orders.item_id')
                ->where('account_id', Auth::user()->id)
                ->get();
        $total = 0;
        foreach($cart as $i){
            $total += $i->price;
        }
        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $id = $request->itemId;
        Order::create([
            "account_id" => $user->id,
            "item_id" => $id,
        ]);

        return redirect('/home');
    }

    public function checkout(){
        Order::where('account_id', Auth::user()->id)->delete();
        return view('cart.checkout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Order::where('order_id', $request->orderId)->delete();
        return redirect('/cart');
    }
}

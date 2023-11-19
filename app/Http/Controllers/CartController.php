<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function addToCart(Request $request, $id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        // dd($book);
        if ($book) {
            Cart::add(
                [
                    'id' => $book->id,
                    'name' => $book->title,
                    'qty' => 1,
                    'price' => $book->price,
                    'weight' => 0,
                    'options' => ['cover' => $book->cover]
                ]
            );
            return redirect()->back()->with('message', 'Check giỏ hàng đi');
        }
    }
    public function cart(Request $request)
    {
        $books = Cart::content();
        // dd(Cart::content());
        return view('cart.cart', compact('books'));
        // return view('interface.book_detail', compact('book'));
    }
    public function remove(Request $request, $id)
    {
        // $id = 
        // dd()
        Cart::remove($id);
        return redirect()->back()->with('message', 'Xóa dồi');
    }
    public function checkout(Request $request)
    {
        $books = Cart::content();
        // dd($books);
        $idUser = Auth::user()->id;
        if ($books->count() != 0) {
            $params = [
                'user_id' => $idUser,
                'total_price' => Cart::total(),
            ];
            $success = Order::create($params);
            if ($success) {
                foreach ($books as $book) {
                    $detail = [
                        'order_id' => $success->id,
                        'book_id' => $book->id,
                        'quantity' => $book->qty,
                        'total_price' => $book->price * $book->qty,
                    ];
                    OrderDetail::create($detail);
                }
                if ($detail) {
                    Cart::destroy();
                    return redirect()->back()->with('message', 'Order thành công');
                }
            }
        } else {
            return redirect()->back()->with('message', 'Giỏ hàng chưa có sản phẩm');
        }
    }
}

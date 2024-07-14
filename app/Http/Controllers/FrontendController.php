<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    private function getUserData()
    {
        $userId = session('user_id');
        $userName = session('user_name');
        $user = User::find($userId);

        return compact('user', 'userName');
    }
    public function index()
    {
        $categories = Category::all();
        $items = Item::paginate(8);
        $userId = session('user_id');
        $userName = session('user_name');
        $user = User::find($userId);
        $cartCount = Cart::where('customer_id', $userId)->count();
        session(['cart_count' => $cartCount]);

        return view('frontend.layout.ui.home', compact('categories', 'items', 'user', 'userName'));
    }

    public function categoryItems($id)
    {
        $categories = Category::all();
        $items = Item::where('category_id', $id)->paginate(8);
        $userId = session('user_id');
        $userName = session('user_name');
        $user = User::find($userId);

        $cartCount = Cart::where('customer_id', $userId)->count();
        session(['cart_count' => $cartCount]);

        return view('frontend.layout.ui.home', compact('categories', 'items', 'user', 'userName'));
    }

    public function product_detail($id)
    {
        $item = Item::find($id);
        return view('frontend.layout.ui.detail', compact('item'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('frontend.layout.ui.about',compact('categories'));
    }

    public function contact()
    {
        $categories = Category::all();
        return view('frontend.layout.ui.contact', compact('categories'));
    }

    public function contactform(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new Contact record
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Optionally, you can redirect to a thank you page or return a response
        return redirect()->route('contact')->with('success', 'Your message has been submitted successfully!');
    }

    public function order_done()
    {
        $categories = Category::all();
        return view('frontend.layout.ui.order_done',compact('categories'));
    }

    public function order()
    {
        $userData = $this->getUserData();
        $cart = Cart::where('customer_id', $userData['user']->id ?? null)->get();
        $categories = Category::all();

        if ($cart->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        return view('frontend.layout.ui.order', compact('categories', 'cart'));
    }


    public function cart()
    {
        $categories = Category::all();
        $userId = session('user_id');
        $cart = Cart::where('customer_id', $userId)->get();
        if(!$userId == null){
            $user = User::where('id', $userId)->first();
            if ($user->role == 0) {
                return redirect()->route('login')->with('error', 'You need to login first.');
            }

        }
        // Update cart count
        $cartCount = Cart::where('customer_id', $userId)->count();
        session(['cart_count' => $cartCount]);

        return view('frontend.layout.ui.cart', compact('cart','categories'));
    }
    public function placeOrder(Request $request)
    {
        $userId = session('user_id');
        $cart = Cart::where('customer_id', $userId)->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $totalQuantity = $cart->sum('quanity');
        $subTotal = $cart->sum(function ($carts) {
            return $carts->quanity * $carts->item_price;
        });
        $orderId = Str::uuid();

        $order = Order::create([
            'city' => $request->city,
            'phone' => $request->phone,
            'order_notes' => $request->order_notes,
            'order_date' => now(),
            'quantity' => $totalQuantity,
            'sub_total' => $subTotal, // Add this line
            'order_status' => 'pending',
            'customer_id' => $userId,
            'order_id' => $orderId,
        ]);

        foreach ($cart as $carts) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $carts->item_id,
                'item_name' => $carts->item_name,
                'item_price' => $carts->item_price,
                'quantity' => $carts->quanity,
            ]);
        }

        Cart::where('customer_id', $userId)->delete();

        return redirect()->route('order_done')->with('success', 'Order placed successfully.');
    }


    public function add_cart(Request $request)
    {
        $userId = session('user_id');
        if (!session('user_id')) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        $cart = Cart::create([
            'quanity' => $request->quanity,
            'item_id' => $request->product,
            'item_name' => $request->name,
            'img' => $request->img,
            'item_price' => $request->price,
            'customer_id' => $userId
        ]);

        // Update cart count
        $cartCount = Cart::where('customer_id', $userId)->count();
        session(['cart_count' => $cartCount]);
        if ($cart) {
            return redirect()->route('index')->with('success', 'Item added to cart.');
        } else {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }
    }
    public function updateCartQuantity(Request $request)
    {
        $cartId = $request->input('id');
        $quantity = $request->input('quantity');
        $price = $request->input('price'); // Add this line to get price from request

        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->quanity = $quantity;
            $cart->item_price = $price; // Update the price
            $cart->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }


    public function remove_cart($id)
    {
        $userId = session('user_id');
        $cart = Cart::where('id', $id)->where('customer_id', $userId)->first();

        if ($cart) {
            $cart->delete();

            // Update cart count
            $cartCount = Cart::where('customer_id', $userId)->count();
            session(['cart_count' => $cartCount]);

            return redirect()->route('cart')->with('success', 'Item removed from cart.');
        } else {
            return redirect()->route('cart')->with('error', 'Item not found in cart.');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('name', 'LIKE', "%$query%")
            ->paginate(8);

        $categories = Category::all();
        $userData = $this->getUserData();

        return view('frontend.layout.ui.home', compact('categories', 'items', 'userData'));
    }
}

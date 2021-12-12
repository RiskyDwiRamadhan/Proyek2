<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $goods = Goods::with('goodsImages')->get();
        return view('shop.index', compact('goods'));
    }

    public function show($id)
    {
        $goods = Goods::with('goodsImages')->find($id);
        return view('shop.detail', compact('goods'));
    }

}

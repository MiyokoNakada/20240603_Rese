<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;

class ShopController extends Controller
{
    //飲食店一覧表示
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with('area', 'genre')->get();

        return view('index', compact('areas', 'genres', 'shops'));
    }

    //検索機能
    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $query = Shop::with('area', 'genre');

        if ($request->filled('keyword')) {
            $query->keywordSearch($request->input('keyword'));
        }
        if ($request->filled('area_id')) {
            $query->areaSearch($request->input('area_id'));
        }
        if ($request->filled('genre_id')) {
            $query->genreSearch($request->input('genre_id'));
        }
        $shops = $query->get();

        return view('index', compact('areas', 'genres', 'shops'));
    }

    //飲食店詳細表示
    public function detail($shop_id)
    {
        $detail = Shop::find($shop_id);
        return view('shop_detail', compact('detail'));
    }

}

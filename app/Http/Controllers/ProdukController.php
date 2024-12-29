<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data produk dari database
        $user = Auth::user();
        $data['getRecord'] = User::find($user->id);
        $data['produks'] = Produk::all();

        // Kirim data produk ke view
        return view('layouts.admin.produks.produks', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $data['getRecord'] = User::find($user->id);
        return view('layouts.admin.produks.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'stock' => 'required|integer',
            'photo_main' => 'required|image',
            'photo_1' => 'nullable|image',
            'photo_2' => 'nullable|image',
            'photo_3' => 'nullable|image',
            'photo_4' => 'nullable|image',
        ]);

        $produk = new Produk();
        $produk->name = $request->name;
        $produk->description = $request->description;
        $produk->price = $request->price;
        $produk->type = $request->type;
        $produk->stock = $request->stock;
        $produk->photo_main = $request->file('photo_main')->store('images/produk', 'public');
        $produk->photo_1 = $request->file('photo_1') ? $request->file('photo_1')->store('images/produk', 'public') : null;
        $produk->photo_2 = $request->file('photo_2') ? $request->file('photo_2')->store('images/produk', 'public') : null;
        $produk->photo_3 = $request->file('photo_3') ? $request->file('photo_3')->store('images/produk', 'public') : null;
        $produk->photo_4 = $request->file('photo_4') ? $request->file('photo_4')->store('images/produk', 'public') : null;
        $produk->save();
        return redirect()->route('produks.create')->with('success', 'Product created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreprodukRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateprodukRequest $request, produk $produk)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
    }
}

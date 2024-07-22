<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'History';
        if (Auth::user()->role != 'User') {
            $pemesanans    = Pemesanan::when($request->name, function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%');
            })->latest()->paginate(10);
        } else {
            $pemesanans    = Pemesanan::where('user_id', Auth::user()->id)->latest()->paginate(10);
        }

        $pemesanans->appends(['name' => $request->name]);

        return view('pages.pemesanan.pemesanan-index', compact('type_menu', 'pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu  = 'History';
        return view('pages.Pemesanan.Pemesanan-create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "project" => 'required',
            "jumlah_tingkat" => 'required',
            "luas_bangunan" => 'required',
            "type" => 'required',
        ]);

        if ($request->type == 'Paket A') {
            $hargaPaket = 45000;
        } else if ($request->type == 'Paket B') {
            $hargaPaket = 60000;
        } else if ($request->type == 'Paket C') {
            $hargaPaket = 75000;
        } else if ($request->type == 'Paket D') {
            $hargaPaket = 100000;
        } else {
            $hargaPaket = 1;
        }

        $cost = $hargaPaket * $request->luas_bangunan * $request->jumlah_tingkat;


        $pemesanan = Pemesanan::create([
            "name" => $request->name,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "jumlah_tingkat" => $request->jumlah_tingkat,
            "luas_bangunan" => $request->luas_bangunan,
            "designType" => $request->type,
            'cost' => $cost,
            'status' => 'Unpaid',
        ]);

        return Redirect::route('pemesanan.edit', $pemesanan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $type_menu  = 'History';
        return view('pages.pemesanan.pemesanan-edit', compact('type_menu', 'pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "project" => 'required',
            "jumlah_tingkat" => 'required',
            "luas_bangunan" => 'required',
            "type" => 'required',
            "file" => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        if ($request->type == 'Paket A') {
            $hargaPaket = 45000;
        } else if ($request->type == 'Paket B') {
            $hargaPaket = 60000;
        } else if ($request->type == 'Paket C') {
            $hargaPaket = 75000;
        } else if ($request->type == 'Paket D') {
            $hargaPaket = 100000;
        } else {
            $hargaPaket = 1;
        }

        $cost = $hargaPaket * $request->luas_bangunan * $request->jumlah_tingkat;

        $files      = $request->file('file');
        $path = uniqid() . '.' . $files->getClientOriginalExtension();
        $files->move('img/payment/pemesanan/', $path);

        $pemesanan->update([
            "name" => $request->name,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "jumlah_tingkat" => $request->jumlah_tingkat,
            "luas_bangunan" => $request->luas_bangunan,
            "designType" => $request->type,
            'cost' => $cost,
            'status' => 'Paid',
            'paymentReceipt' => $path
        ]);

        return Redirect::route('pemesanan.index')->with('success', 'Pemesanan has been successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return Redirect::route('pemesanan.index')->with('success', 'Pemesanan has been successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'History';
        if (Auth::user()->role != 'User') {
            $surveis    = Survei::when($request->name, function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%');
            })->latest()->paginate(10);
        } else {
            $surveis    = Survei::where('user_id', Auth::user()->id)->latest()->paginate(10);
        }

        $surveis->appends(['name' => $request->name]);

        return view('pages.survei.survei-index', compact('type_menu', 'surveis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu  = 'History';
        $citys = [
            [
                'name' => 'Bandar Lampung',
                'price' => 0
            ],
            [
                'name' => 'Tarahan',
                'price' => 400000
            ],
            [
                'name' => 'Natar',
                'price' => 300000
            ],
            [
                'name' => 'Kota Bumi',
                'price' => 900000
            ],
            [
                'name' => 'Lampung Barat',
                'price' => 1200000
            ],
            [
                'name' => 'Tulang Bawang Barat',
                'price' => 950000
            ],
            [
                'name' => 'Pringsewu',
                'price' => 500000
            ],
            [
                'name' => 'Kota Agung',
                'price' => 1000000
            ],
            [
                'name' => 'Bandar Jaya',
                'price' => 600000
            ],
            [
                'name' => 'Trimurjo',
                'price' => 500000
            ],
            [
                'name' => 'Sidomulyo',
                'price' => 600000
            ],
            [
                'name' => 'Metro',
                'price' => 550000
            ],
            [
                'name' => 'Unit 2',
                'price' => 950000
            ],
            [
                'name' => 'Kalianda',
                'price' => 650000
            ],
            [
                'name' => 'BakauHeni',
                'price' => 700000
            ],
            [
                'name' => 'Way Kanan',
                'price' => 1300000
            ],
            [
                'name' => 'Palembang',
                'price' => 1800000
            ],
        ];

        return view('pages.survei.survei-create', compact('type_menu', 'citys'));
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
            "city" => 'required',
            "date" => 'required',
            "time" => 'required',
            "project" => 'required',
            "type" => 'required',
            "address" => 'required',
        ]);

        list($cost, $city) = explode('|', $request->city, 2);

        $survei = Survei::create([
            "name" => $request->name,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "city" => $city,
            "address" => $request->address,
            "surveiDate" => $request->date,
            "surveiTime" => $request->time,
            "designType" => $request->type,
            'cost' => $cost,
            'status' => 'Unpaid',
        ]);

        return Redirect::route('survei.edit', $survei);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survei $survei)
    {
        $type_menu  = 'History';
        $citys = [
            [
                'name' => 'Bandar Lampung',
                'price' => 0
            ],
            [
                'name' => 'Tarahan',
                'price' => 400000
            ],
            [
                'name' => 'Natar',
                'price' => 300000
            ],
            [
                'name' => 'Kota Bumi',
                'price' => 900000
            ],
            [
                'name' => 'Lampung Barat',
                'price' => 1200000
            ],
            [
                'name' => 'Tulang Bawang Barat',
                'price' => 950000
            ],
            [
                'name' => 'Pringsewu',
                'price' => 500000
            ],
            [
                'name' => 'Kota Agung',
                'price' => 1000000
            ],
            [
                'name' => 'Bandar Jaya',
                'price' => 600000
            ],
            [
                'name' => 'Trimurjo',
                'price' => 500000
            ],
            [
                'name' => 'Sidomulyo',
                'price' => 600000
            ],
            [
                'name' => 'Metro',
                'price' => 550000
            ],
            [
                'name' => 'Unit 2',
                'price' => 950000
            ],
            [
                'name' => 'Kalianda',
                'price' => 650000
            ],
            [
                'name' => 'BakauHeni',
                'price' => 700000
            ],
            [
                'name' => 'Way Kanan',
                'price' => 1300000
            ],
            [
                'name' => 'Palembang',
                'price' => 1800000
            ],
        ];

        return view('pages.survei.survei-edit', compact('type_menu', 'survei', 'citys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survei $survei)
    {

        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "city" => 'required',
            "date" => 'required',
            "time" => 'required',
            "project" => 'required',
            "type" => 'required',
            "address" => 'required',
            "file" => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        list($cost, $city) = explode('|', $request->city, 2);

        $files      = $request->file('file');
        $path = uniqid() . '.' . $files->getClientOriginalExtension();
        $files->move('img/payment/survei/', $path);

        $survei->update([
            "name" => $request->name,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "city" => $city,
            "address" => $request->address,
            "surveiDate" => $request->date,
            "surveiTime" => $request->time,
            "designType" => $request->type,
            'cost' => $cost,
            'status' => 'Paid',
            'paymentReceipt' => $path
        ]);

        return Redirect::route('survei.index')->with('success', 'Customer Survei has been successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survei $survei)
    {
        $survei->delete();
        return Redirect::route('survei.index')->with('success', 'Customer Survei has been successfully Deleted');
    }
}

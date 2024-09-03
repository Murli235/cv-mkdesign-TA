<?php

namespace App\Http\Controllers;

use App\Mail\PemesananBerhasil;
use App\Mail\pemesananOrder;
use App\Mail\SurveiBerhasil;
use App\Mail\SuveiOrder;
use App\Models\AboutUs;
use App\Models\Pemesanan;
use App\Models\Project;
use App\Models\Survei;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\FuncCall;
use RealRashid\SweetAlert\Facades\Alert;

class BerandaController extends Controller
{
    public function index()
    {
        $type_menu = 'Home';
        $projects = Project::with('Galery')->limit(3)->get();
        return view('pages.beranda.beranda-index', compact('type_menu', 'projects'));
    }

    public function ourProject(Request $request )
    {
        $q = $request->query('theme') ?? 'all';

        if($q === 'all'){
            $projects_eksterior = Project::with('Galery')->where('category', '=', 'eksterior')->get();
            $projects_interior = Project::with('Galery')->where('category', '=', 'interior')->get();
        } else {
            $projects_eksterior = Project::with('Galery')
                ->where('category', '=', 'eksterior')
                ->where('theme', 'LIKE', '%' . $q . '%')
                ->get();
            $projects_interior = Project::with('Galery')
                ->where('category', '=', 'interior')
                ->where('theme', 'LIKE', '%' . $q . '%')
                ->get();
        }

        $type_menu = 'ourProject';

        return view('pages.beranda.our-project-index', compact('type_menu', 'projects_eksterior', 'projects_interior', 'q'));
    }

    public function ourProjectDetail(Project $project)
    {
        $type_menu = 'ourProject';
        return view('pages.beranda.our-project-detail', compact('type_menu', 'project'));
    }

    public function estimasiBiaya()
    {
        $type_menu = 'Pricing';
        return view('pages.beranda.estimasi-index', compact('type_menu'));
    }

    public function indexPemesanan(Request $request)
    {
        $type_menu = 'Pricing';
        return view('pages.beranda.pricing-index', compact('type_menu', 'request'));
    }
    public function storePemesanan(Request $request)
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

        $cost = ($hargaPaket * $request->luas_bangunan * $request->jumlah_tingkat);

        $pemesanan = Pemesanan::create([
            "name" => $request->name,
            "user_id" => Auth::user()->id,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "jumlah_tingkat" => $request->jumlah_tingkat,
            "luas_bangunan" => $request->luas_bangunan,
            "designType" => $request->type,
            'cost' => $cost,
            'status' => 'Unpaid',
        ]);

        Mail::to($pemesanan->email)->send(new pemesananOrder($pemesanan));
        return Redirect::route('finishPemesanan.index', $pemesanan);
    }

    public function finishPemesanan(Pemesanan $pemesanan, Request $request)
    {
        $type_menu = 'Pricing';
        return view('pages.beranda.pricing-finish', compact('type_menu', 'pemesanan'));
    }

    public function finishPemesananStore(Pemesanan $pemesanan, Request $request)
    {
        $request->validate([
            "file" => 'required'
        ]);

        $files      = $request->file('file');
        $path = uniqid() . '.' . $files->getClientOriginalExtension();
        $files->move('img/payment/pemesanan/', $path);

        $pemesanan->update([
            'status' => 'Paid',
            'paymentReceipt' => $path
        ]);

        Alert::success('Success', 'Pemesanan Berhasil');
        Mail::to($pemesanan->email)->send(new PemesananBerhasil($pemesanan));

        return Redirect::route('finishPemesanan.index', $pemesanan);
    }

    public function indexSurvei()
    {
        $datesDis = [];
        $dates = Survei::get('surveiDate');
        foreach ($dates as $date) {
            $datesDis[] = $date->surveiDate;
        }

        $datesDisJson = json_encode($datesDis);

        $type_menu = 'Survei';
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

        return view('pages.beranda.survei-index', compact('type_menu', 'citys', 'datesDisJson'));
    }

    public function storeSurvei(Request $request)
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
            "user_id" => Auth::user()->id,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "city" => $city,
            "address" => $request->address,
            "surveiDate" => $request->date,
            "surveiTime" => $request->time,
            "designType" => $request->type,
            "cost" => $cost,
            "status" => '',
        ]);

        if ($cost == 0) {
            $status = 'Paid';
            Alert::success('Success', 'Request Survei Berhasil');
            Mail::to($request->email)->send(new SuveiOrder($survei));
            Mail::to($request->email)->send(new SurveiBerhasil($survei));
        } else {
            $status = 'Unpaid';
            Mail::to($request->email)->send(new SuveiOrder($survei));
        }

        $survei->update([
            'status' => $status,
        ]);

        return Redirect::route('detailSurvei.index', $survei);
    }

    public function detailSurvei(Survei $survei)
    {
        $type_menu = 'Survei';
        return view('pages.beranda.survei-detail', compact('type_menu', 'survei'));
    }

    public function detailSurveiUpdate(Request $request, Survei $survei)
    {
        $request->validate([
            "file" => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
        ]);

        $files      = $request->file('file');
        $path = uniqid() . '.' . $files->getClientOriginalExtension();
        $files->move('img/payment/survei/', $path);

        $survei->update([
            'status' => 'Paid',
            'paymentReceipt' => $path
        ]);

        Alert::success('Success', 'Request Survei Berhasil');
        Mail::to($survei->email)->send(new SurveiBerhasil($survei));

        return Redirect::route('detailSurvei.index', $survei);
    }

    public function aboutUsIndex()
    {
        $type_menu = 'About Us';
        $aboutUs = AboutUs::get()->first();
        $testimonis  = Testimoni::all();
        return view('pages.beranda.aboutUs-index', compact('type_menu', 'testimonis', 'aboutUs'));
    }

    public function storeTestimoni(Request $request)
    {
        $request->validate([
            'desc' => 'required',
            'rating' => 'required'
        ]);

        Testimoni::create([
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->desc,
        ]);

        Alert::success('Success', 'Terimakasih Sudah Menggunakan Jasa Kami ');
        return Redirect::back();
    }
}

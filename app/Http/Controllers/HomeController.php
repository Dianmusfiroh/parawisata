<?php

namespace App\Http\Controllers;

use App\Repositories\GaleryRepository;
use App\Repositories\HotelRepository;
use App\Repositories\KulinerRepository;
use App\Repositories\WisataRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HotelRepository $hotelRepository, GaleryRepository $galeryRepository, KulinerRepository $kulinerRepository, WisataRepository $wisataRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->wisataRepository = $wisataRepository;
        $this->kulinerRepository = $kulinerRepository;
        $this->galeryRepository = $galeryRepository;
        $this->middleware('auth');
        $this->w = 'wisata';
        $this->k = 'kuliner';
        $this->h = 'hotel';
        $this->g = 'galery';



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotel = $this->hotelRepository->all();
        $wisata = $this->wisataRepository->all();
        $kuliner = $this->kulinerRepository->all();
        // $galery = $this->galeryRepository->all();
        $w = $this->w;
        $k = $this->k;
        $h = $this->h;
        $g = $this->g;

        return view('home', compact ('hotel','wisata','kuliner','w','k','h','g'));
    }

}

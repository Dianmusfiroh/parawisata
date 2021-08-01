<?php

namespace App\Http\Controllers;
use App\Http\Requests\KulinerCreateRequest;
use App\Http\Requests\KulinerUpdateRequest;
use App\Repositories\GaleryRepository;
use App\Repositories\HotelRepository;
use App\Repositories\KulinerRepository;
use App\Repositories\WisataRepository;
use App\Validators\KulinerValidator;

use Illuminate\Http\Request;




class conten extends Controller
{
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
    public function visit()
    {
        $hotel = $this->hotelRepository->all();
        $wisata = $this->wisataRepository->all();
        $kuliner = $this->kulinerRepository->all();
        $galery = $this->galeryRepository->all();
        $w = $this->w;
        $k = $this->k;
        $h = $this->h;
        $g = $this->g;

        return view('visit', compact ('hotel','wisata','kuliner','galery','w','k','h','g'));
    }
    public function wisata_list()
    {
       return view('wisata.list');
    }
    public function wisata_show()
    {
       return view('wisata.show');
    }
}

<?php

namespace App\Http\Controllers;

use App\Entities\Fasilitas;
use App\Entities\Hotel;
use App\Entities\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\HotelCreateRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Repositories\FasilitasRepository;
use App\Repositories\HotelRepository;
use App\Validators\HotelValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class HotelsController.
 *
 * @package namespace App\Http\Controllers;
 */
class HotelsController extends Controller
{
    private $modul;
    /**
     *
     * @var HotelRepository
     */
    protected $repository;

    /**
     * @var HotelValidator
     */
    protected $validator;

    /**
     * HotelsController constructor.
     *
     * @param HotelRepository $repository
     * @param HotelValidator $validator
     */
    public function __construct(HotelRepository $repository,
     HotelValidator $validator,
     FasilitasRepository $fasilitasRepository)
    {
        $this->middleware('auth', ['except' => [ 'list', 'show' ]]);

        $this->repository = $repository;
        $this->validator  = $validator;
        $this->fasilitasRepository = $fasilitasRepository;
         $this->modul = 'hotel';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $hotels = $this->repository->all();
        $modul = $this->modul;

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $hotels,
            ]);
        }
// dd($hotels);
        return view('hotel.index', compact('hotels','modul'));
    }
    public function list()
    {
        $hotels = $this->repository->all();
        $modul = $this->modul;
        return view('hotel.list',compact('modul','hotels'));
    }
    public function create()
    {
        $modul = $this->modul;
        $hotel = $this->repository;
        $fasilitas = $this->fasilitasRepository->all();

        // $hotel = $this->repository->all();

        return view('hotel.create',compact('modul','fasilitas','hotel'));

    }
    public function item(Request $request)
    {
        $modul = $this->modul;
        $hotel = $this->repository;
        $fasilitas = $this->fasilitasRepository->all();

        // $hotel = $this->repository->all();

        return view('hotel.item',compact('modul','hotel'));


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  HotelCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $fasilitas = $this->fasilitasRepository->all();

        $name1 = '';
        $name2 = '';
        $name3 = '';
        $name4 = '';
        // if ($request->has('pic')) {
        //     $upload = $request->file('pic');
        //     $name = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
        //     $upload->move(public_path() . '/uploads/', $name);
        // }
        if ($request->has('pic1')) {
            $upload = $request->file('pic1');
            $name1 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name1);
        }
        if ($request->has('pic2')) {
            $upload = $request->file('pic2');
            $name2 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name2);
        }
        if ($request->has('pic3')) {
            $upload = $request->file('pic3');
            $name3 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name3);
        }
        if ($request->has('pic4')) {
            $upload = $request->file('pic4');
            $name4 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name4);
        }

        $i = new Item();
        $h = new Hotel();
        $h->id ;
        $h->name = $request->name;
        $h->address = $request->alamat;
        $h->info = $request->info;
        $h->jarak = $request->jarak;
        $h->harga = $request->harga;
        // dd($h);


            $h['fasilitas']= $request->input('fasilitas');
            // $f = $request->input('fasilitas');

            // $h->fasilitas_id = $request->input('fasilitas');
        // $h->fasilitas_id = $this->fasilitas->($request->id);
        // $cek = implode(",", $f);
        // $h->fasilitas_id = $cek;
        // $h->pic = '/uploads/' . $name;
        $h->pic1 ='/uploads/' . $name1 ;
        $h->pic2 ='/uploads/' . $name2;
        $h->pic3 ='/uploads/' . $name3 ;
        $h->pic4 ='/uploads/' . $name4 ;
        $h->save();
        // $i = new Item();

        // $i->hotel_id= $h->id ;

        // // dd($i);
        // $i->name = $request->name;
        // $i->harga = $request->harga;
        // $i->save();



        return redirect()->back();
    }

    // public function search()
    // {
    //     $search = request()->search;
    //     $fasilitas_id = request()->fasilitas_id;
    //     $response = array();
    //     if (request()->searchFields != 'id:='){

    //         $gtts = $this->repository->scopeQuery(function ($query) use($fasilitas_id) {
    //             return $query->whereNotIn('id',function($q) use($fasilitas_id){
    //                 return $q->select('fasilitas_id')->from('fasilitas')->whereInvoiceId($fasilitas_id)->get();
    //             })->limit(10);
    //         })->all(['name']);
    //         foreach ($fasilitas_id as $f) {
    //             $response[] = array(
    //                 "id" => $f->id,
    //                 "text" => $f->name,
    //             );
    //         }
    //     }
    //     if (request()->is('api*') || request()->ajax()) {
    //         return response()->json($response);
    //     }

    // }
    // public function store(HotelCreateRequest $request)
    // {
    //     try {

    //         $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

    //         $hotel = $this->repository->create($request->all());
    //         // $fasilitas = $this->;
    //         // $fasilitas = $request->input('name');
    //         $response = [
    //             'message' => 'Hotel created.',
    //             'data'    => $hotel->toArray(),
    //         ];

    //         if ($request->wantsJson()) {

    //             return response()->json($response);
    //         }

    //         return redirect()->back()->with('message', $response['message']);
    //     } catch (ValidatorException $e) {
    //         if ($request->wantsJson()) {
    //             return response()->json([
    //                 'error'   => true,
    //                 'message' => $e->getMessageBag()
    //             ]);
    //         }

    //         return redirect()->back()->withErrors($e->getMessageBag())->withInput();
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = $this->repository->find($id);
        $fa = DB::select(DB::raw("SELECT fasilitas AS fasilitas FROM hotel WHERE id=$id"));
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $hotel,
            ]);
        }

        return view('hotel.show', compact('hotel','fa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $assesmentOption = $this->repository->find($id);
    //     $modul = $this->modul;
    //     return view('assesmentOption.edit', compact('assesmentOption','modul'));
    // }
    public function edit($id)
    {
        $hotel = $this->repository->find($id);
        $modul = $this->modul;

        return view('hotel.edit', compact('hotel','modul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HotelUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(HotelUpdateRequest $request, $id)
    {
        try {
            $h = Hotel::findOrFail($id);

        $name1 = '';
        $name2 = '';
        $name3 = '';
        $name4 = '';
        // if ($request->has('pic')) {
        //     $upload = $request->file('pic');
        //     $name = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
        //     $upload->move(public_path() . '/uploads/', $name);
        // }
        if ($request->has('pic1')) {
            $upload = $request->file('pic1');
            $name1 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name1);
        }
        if ($request->has('pic2')) {
            $upload = $request->file('pic2');
            $name2 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name2);
        }
        if ($request->has('pic3')) {
            $upload = $request->file('pic3');
            $name3 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name3);
        }
        if ($request->has('pic4')) {
            $upload = $request->file('pic4');
            $name4 = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            $upload->move(public_path() . '/uploads/', $name4);
        }

        // $i = new Item();
        // $h = new Hotel();
        // $h->id ;
        $h->name = $request->name;
        $h->address = $request->address;
        $h->info = $request->info;
        $h->jarak = $request->jarak;
        $h->harga = $request->harga;
        // dd($h);


            $h['fasilitas']= $request->input('fasilitas');
            // $f = $request->input('fasilitas');

            // $h->fasilitas_id = $request->input('fasilitas');
        // $h->fasilitas_id = $this->fasilitas->($request->id);
        // $cek = implode(",", $f);
        // $h->fasilitas_id = $cek;
        // $h->pic = '/uploads/' . $name;
        $h->pic1 ='/uploads/' . $name1 ;
        $h->pic2 ='/uploads/' . $name2;
        $h->pic3 ='/uploads/' . $name3 ;
        $h->pic4 ='/uploads/' . $name4 ;
            $h->update();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => 'Terjadi Kesalahan']);
        }

        // try {

        //     $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        //     $hotel = $this->repository->update($request->all(), $id);

        //     $response = [
        //         'message' => 'Hotel updated.',
        //         'data'    => $hotel->toArray(),
        //     ];

        //     if ($request->wantsJson()) {

        //         return response()->json($response);
        //     }

        //     return redirect()->back()->with('message', $response['message']);
        // } catch (ValidatorException $e) {

        //     if ($request->wantsJson()) {

        //         return response()->json([
        //             'error'   => true,
        //             'message' => $e->getMessageBag()
        //         ]);
        //     }

        //     return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        // }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Hotel deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Hotel deleted.');
    }
}

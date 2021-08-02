<?php

namespace App\Http\Controllers;

use App\Entities\Wisata;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\WisataCreateRequest;
use App\Http\Requests\WisataUpdateRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\WisataRepository;
use App\Validators\WisataValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class WisatasController.
 *
 * @package namespace App\Http\Controllers;
 */
class WisatasController extends Controller
{
    /**
     * @var WisataRepository
     */
    protected $repository;
    private $modul;

    /**
     * @var WisataValidator
     */
    protected $validator;

    /**
     * WisatasController constructor.
     *
     * @param WisataRepository $repository
     * @param WisataValidator $validator
     */
    public function __construct(WisataRepository $repository, WisataValidator $validator, CategoryRepository $categoryRepository)
    {
        $this->middleware('auth', ['except' => [ 'listAlam','listBudaya', 'show' ]]);
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->validator  = $validator;
        $this->modul = 'wisata';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $wisatum = $this->repository->all();
        $modul = $this->modul;
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $wisatum,
            ]);
        }
        return view('wisata.index', compact('wisatum','modul'));
    }
    public function create()
    {
        $category = $this->categoryRepository->all();
        $modul = $this->modul;
        // dd($category);
        return view('wisata.create',compact('modul','category'));
    }
    public function listAlam($id)
    {
        $category = $this->categoryRepository->find($id);
        // dd($id);
        $wisatum = $this->repository->all();
        $modul = $this->modul;
        $budaya = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=2"));
        $alam = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id='$id'"));
        $tiga = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=3"));
        $empat = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=4"));
        $lima = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=5"));
        $nama = DB::select(DB::raw("SELECT * FROM kategori_wisata WHERE id='$id'"));

        return view('wisata.listalam',compact('modul','wisatum','alam','budaya','tiga','empat','lima','category','nama'));
    }
    public function listBudaya()
    {
        $wisatum = $this->repository->all();
        $modul = $this->modul;
        $budaya = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=2"));
        $alam = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=1"));
        $tiga = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=3"));
        $empat = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=4"));
        $lima = DB::select(DB::raw("SELECT * FROM wisata WHERE kategori_wisata_id=5"));
        return view('wisata.listbudaya',compact('modul','wisatum','alam','budaya','tiga','empat','lima'));
    }
    /**
     * Store a newly created resource in storage
     *
     * @param  WisataCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    // public function store(WisataCreateRequest $request)
    // {
    //     try {

    //         $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

    //         $wisatum = $this->repository->create($request->all());

    //         $response = [
    //             'message' => 'Wisata created.',
    //             'data'    => $wisatum->toArray(),
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
    public function store(Request $request)
    {
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
        $w = new Wisata();
        $w->name = $request->name;
        $w->address = $request->address;
        $w->deskripsi = $request->deskripsi;
        $w->kategori_wisata_id = $request->kategori_wisata_id;
        $w->jarak = $request->jarak;
        $w->pic1 = '/uploads/' . $name1;
        $w->pic2 = '/uploads/' . $name2;
        $w->pic3 = '/uploads/' . $name3;
        $w->pic4 = '/uploads/' . $name4;

        $w->save();

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisatum = $this->repository->find($id);
        $category = $this->categoryRepository->all();
        $modul = $this->modul;
        $wis = DB::select(DB::raw("SELECT w.name AS name, w.address address, w.deskripsi deskripsi, c.name AS kategori, w.pic1 , w.pic2 , w.pic3, w.pic4 FROM wisata w JOIN kategori_wisata c ON w.kategori_wisata_id= c.id WHERE w.id= $id"));
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $wisatum,
            ]);
        }

        return view('wisata.show', compact('wisatum','modul','category','wis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisata = $this->repository->find($id);
        $modul = $this->modul;
        $category = $this->categoryRepository->all();

        return view('wisata.edit', compact('wisata','modul','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WisataUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(WisataUpdateRequest $request, $id)
    {

        try {
            $w = Wisata::findOrFail($id);
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
            // $w = new Wisata();
            $w->name = $request->name;
            $w->address = $request->address;
            $w->deskripsi = $request->deskripsi;
            $w->kategori_wisata_id = $request->kategori_wisata_id;
            $w->jarak = $request->jarak;
            $w->pic1 = '/uploads/' . $name1;
            $w->pic2 = '/uploads/' . $name2;
            $w->pic3 = '/uploads/' . $name3;
            $w->pic4 = '/uploads/' . $name4;


            $w->update();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => 'Terjadi Kesalahan']);
        }

        // try {

        //     $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        //     $wisatum = $this->repository->update($request->all(), $id);
        //     // if ($request->has('pic')) {
        //     //     $upload = $request->file('pic');
        //     //     $extensi = $upload->getClientOriginalExtension();
        //     //     $name = $wisatum->id . '_' . rand(100,9999) . '.' . $extensi;
        //     //     $upload->move(public_path() . '/uploads/' . $name);
        //     //     $wisatum->pic = '/uploads/' . $name;
        //     // }

        //     $response = [
        //         'message' => 'Wisata updated.',
        //         'data'    => $wisatum->toArray(),

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
                'message' => 'Wisata deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Wisata deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Entities\Kuliner;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\KulinerCreateRequest;
use App\Http\Requests\KulinerUpdateRequest;
use App\Repositories\KulinerRepository;
use App\Validators\KulinerValidator;
use Illuminate\Support\Arr;

/**
 * Class KulinersController.
 *
 * @package namespace App\Http\Controllers;
 */
class KulinersController extends Controller
{
    /**
     * @var KulinerRepository
     */
    protected $repository;
    private $modul;

    /**
     * @var KulinerValidator
     */
    protected $validator;

    /**
     * KulinersController constructor.
     *
     * @param KulinerRepository $repository
     * @param KulinerValidator $validator
     */
    public function __construct(KulinerRepository $repository, KulinerValidator $validator)
    {
        $this->middleware('auth', ['except' => [ 'list', 'show' ]]);

        $this->repository = $repository;
        $this->validator  = $validator;
        $this->modul = 'kuliner';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $kuliners = $this->repository->all();
        $modul = $this->modul;
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $kuliners,
            ]);
        }

        return view('kuliner.index', compact('kuliners','modul'));
    }
    public function create()
    {
       $modul = $this->modul;
       return view('kuliner.create', compact('modul'));
    }
    public function list()
    {
        $kuliners = $this->repository->all();
        $modul = $this->modul;
        return view('kuliner.list',compact('modul','kuliners'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  KulinerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    // public function store(KulinerCreateRequest $request)
    // {
    //     try {

    //         $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

    //         $kuliner = $this->repository->create($request->all());

    //         $response = [
    //             'message' => 'Kuliner created.',
    //             'data'    => $kuliner->toArray(),
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

// dd($name);
        // if ($request->has(['pic'])) {
        //     // $upload = $request->file('pic');
        //     foreach ($request->file(['pic']) as $upload) {


        //         $name = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
        //         $upload->move(public_path() . '/uploads/', $name);
        // $d[] ='/uploads/' . $name;

        //     }

        // }

        $k = new Kuliner();
        $k->name = $request->name;
        $k->address = $request->address;
        $k->menu = $request->menu;

        $k->info = $request->info;
        $k->harga = $request->harga;
        $k->jarak = $request->jarak;
        // $p =['/uploads/' . $name];

        // $k->pic=implode(",",$d);
        $k->pic1 ='/uploads/' . $name1 ;
        $k->pic2 ='/uploads/' . $name2;
        $k->pic3 ='/uploads/' . $name3 ;
        $k->pic4 ='/uploads/' . $name4 ;
    //  dd($k);
        $k->save();

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
        $kuliner = $this->repository->find($id);
        // dd($kuliner);
        $modul = $this->modul;

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $kuliner,
            ]);
        }

        return view('kuliner.show', compact('kuliner','modul'));
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
        $edit = Kuliner::findOrFail($id);
        // $kuliner = $this->repository->find($id);
       $modul = $this->modul;


        return view('kuliner.edit', compact('modul','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  KulinerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(KulinerUpdateRequest $request, $id)
    {


        try {
            $k = Kuliner::findOrFail($id);
            $name1 = '';
            $name2 = '';
            $name3 = '';
            $name4 = '';
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

    // dd($name);
            // if ($request->has(['pic'])) {
            //     // $upload = $request->file('pic');
            //     foreach ($request->file(['pic']) as $upload) {


            //         $name = $upload->getClientOriginalName() . '_' . rand(100, 9999) . max(3000,5000);
            //         $upload->move(public_path() . '/uploads/', $name);
            // $d[] ='/uploads/' . $name;

            //     }

            // }

            $k = new Kuliner();
            $k->name = $request->name;
            $k->address = $request->address;
            $k->menu = $request->menu;

            $k->info = $request->info;
            $k->harga = $request->harga;
            $k->jarak = $request->jarak;
            // $p =['/uploads/' . $name];

            // $k->pic=implode(",",$d);
            $k->pic1 ='/uploads/' . $name1 ;
            $k->pic2 ='/uploads/' . $name2;
            $k->pic3 ='/uploads/' . $name3 ;
            $k->pic4 ='/uploads/' . $name4 ;

            $k->update();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => 'Terjadi Kesalahan']);
        }


        // try {

        //     $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        //     $kuliner = $this->repository->update($request->all(), $id);

        //     $response = [
        //         'message' => 'Kuliner updated.',
        //         'data'    => $kuliner->toArray(),
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
                'message' => 'Kuliner deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Kuliner deleted.');
    }
}

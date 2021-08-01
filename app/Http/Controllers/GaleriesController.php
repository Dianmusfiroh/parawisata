<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GaleryCreateRequest;
use App\Http\Requests\GaleryUpdateRequest;
use App\Repositories\GaleryRepository;
use App\Repositories\HotelRepository;
use App\Repositories\KulinerRepository;
use App\Repositories\WisataRepository;
use App\Validators\GaleryValidator;
use App\Validators\HotelValidator;

/**
 * Class GaleriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class GaleriesController extends Controller
{
    /**
     * @var GaleryRepository
     */
    protected $repository;

    /**
     * @var GaleryValidator
     */
    protected $validator;

    /**
     * GaleriesController constructor.
     *
     * @param GaleryRepository $repository
     * @param GaleryValidator $validator
     */
    public function __construct(GaleryRepository $repository, GaleryValidator $validator,
    HotelRepository $hotelRepository, KulinerRepository $kulinerRepository, WisataRepository $wisataRepository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->hotelRepository  = $hotelRepository;
        $this->wisataRepository = $wisataRepository;
        $this->kulinerRepository = $kulinerRepository;
        $this->modul = 'galery';
        $this->w = 'wisata';
        $this->k = 'kuliner';
        $this->h = 'hotel';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
      $hotel = $this->hotelRepository->all();
         $galeries = $this->repository->all();
        $wisata = $this->wisataRepository->all();
        $kuliner = $this->kulinerRepository->all();
        $modul = $this->modul;
      $w = $this->w;
      $k = $this->k;
      $h = $this->h;

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $galeries,
            ]);
        }
        // dd($w);
        return view('galery.index', compact('k','h','w','modul','galeries','hotel','wisata','kuliner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GaleryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(GaleryCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $galery = $this->repository->create($request->all());

            $response = [
                'message' => 'Galery created.',
                'data'    => $galery->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $galery = $this->repository->find($id);
        // $wisata = $this->wisataRepository->find($id);
      $w = $this->w;
        $modul =$this->modul;
        if (request()->wantsJson()) {

            return response()->json([
                'data' => ['$galery', '$wisata'],

            ]);
        }


        return view('galery.show', compact('galery','wisata','modul','w'));
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
        $galery = $this->repository->find($id);

        return view('galeries.edit', compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GaleryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GaleryUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $galery = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Galery updated.',
                'data'    => $galery->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
                'message' => 'Galery deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Galery deleted.');
    }
}

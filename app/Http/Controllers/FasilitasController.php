<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\FasilitasCreateRequest;
use App\Http\Requests\FasilitasUpdateRequest;
use App\Repositories\FasilitasRepository;
use App\Validators\FasilitasValidator;

/**
 * Class FasilitasController.
 *
 * @package namespace App\Http\Controllers;
 */
class FasilitasController extends Controller
{
    /**
     * @var FasilitasRepository
     */
    protected $repository;

    /**
     * @var FasilitasValidator
     */
    protected $validator;

    /**
     * FasilitasController constructor.
     *
     * @param FasilitasRepository $repository
     * @param FasilitasValidator $validator
     */
    public function __construct(FasilitasRepository $repository, FasilitasValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $fasilitas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $fasilitas,
            ]);
        }

        return view('fasilitas.index', compact('fasilitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FasilitasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(FasilitasCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $fasilita = $this->repository->create($request->all());

            $response = [
                'message' => 'Fasilitas created.',
                'data'    => $fasilita->toArray(),
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
        $fasilita = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $fasilita,
            ]);
        }

        return view('fasilitas.show', compact('fasilita'));
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
        $fasilita = $this->repository->find($id);

        return view('fasilitas.edit', compact('fasilita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FasilitasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(FasilitasUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $fasilita = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Fasilitas updated.',
                'data'    => $fasilita->toArray(),
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
                'message' => 'Fasilitas deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Fasilitas deleted.');
    }
}

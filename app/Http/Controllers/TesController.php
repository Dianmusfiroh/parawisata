<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TesCreateRequest;
use App\Http\Requests\TesUpdateRequest;
use App\Repositories\TesRepository;
use App\Validators\TesValidator;

/**
 * Class TesController.
 *
 * @package namespace App\Http\Controllers;
 */
class TesController extends Controller
{
    /**
     * @var TesRepository
     */
    protected $repository;

    /**
     * @var TesValidator
     */
    protected $validator;

    /**
     * TesController constructor.
     *
     * @param TesRepository $repository
     * @param TesValidator $validator
     */
    public function __construct(TesRepository $repository, TesValidator $validator)
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
        $tes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tes,
            ]);
        }

        return view('tes.index', compact('tes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TesCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $te = $this->repository->create($request->all());

            $response = [
                'message' => 'Tes created.',
                'data'    => $te->toArray(),
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
        $te = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $te,
            ]);
        }

        return view('tes.show', compact('te'));
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
        $te = $this->repository->find($id);

        return view('tes.edit', compact('te'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TesUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $te = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Tes updated.',
                'data'    => $te->toArray(),
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
                'message' => 'Tes deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Tes deleted.');
    }
}

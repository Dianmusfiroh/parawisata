<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SmsapiCreateRequest;
use App\Http\Requests\SmsapiUpdateRequest;
use App\Repositories\SmsapiRepository;
use App\Validators\SmsapiValidator;

/**
 * Class SmsapisController.
 *
 * @package namespace App\Http\Controllers;
 */
class SmsapisController extends Controller
{
    /**
     * @var SmsapiRepository
     */
    protected $repository;

    /**
     * @var SmsapiValidator
     */
    protected $validator;

    /**
     * SmsapisController constructor.
     *
     * @param SmsapiRepository $repository
     * @param SmsapiValidator $validator
     */
    public function __construct(SmsapiRepository $repository, SmsapiValidator $validator)
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
        $smsapis = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $smsapis,
            ]);
        }

        return view('smsapi.blade.index', compact('smsapis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SmsapiCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SmsapiCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $smsapi = $this->repository->create($request->all());

            $response = [
                'message' => 'Smsapi created.',
                'data'    => $smsapi->toArray(),
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
        $smsapi = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $smsapi,
            ]);
        }

        return view('smsapis.show', compact('smsapi'));
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
        $smsapi = $this->repository->find($id);

        return view('smsapis.edit', compact('smsapi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SmsapiUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SmsapiUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $smsapi = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Smsapi updated.',
                'data'    => $smsapi->toArray(),
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
                'message' => 'Smsapi deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Smsapi deleted.');
    }
}

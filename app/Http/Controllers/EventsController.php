<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Event;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EventCreateRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Repositories\EventRepository;
use App\Validators\EventValidator;

/**
 * Class EventsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EventsController extends Controller
{
    /**
     * @var EventRepository
     */
    private $modul;
    protected $repository;

    /**
     * @var EventValidator
     */
    protected $validator;

    /**
     * EventsController constructor.
     *
     * @param EventRepository $repository
     * @param EventValidator $validator
     */
    public function __construct(EventRepository $repository, EventValidator $validator)
    {
        $this->middleware('auth', ['except' => [ 'list', 'show' ]]);

        $this->repository = $repository;
        $this->validator  = $validator;
        $this->modul= 'event';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $events = $this->repository->all();
        $modul = $this->modul;
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $events,
            ]);
        }

        return view('event.index', compact('events','modul'));
    }
    public function create()
    {
       $modul = $this->modul;
       return view('event.create', compact('modul'));
    }
    public function list()
    {
        $events = $this->repository->all();
        $modul = $this->modul;
        return view('event.list',compact('modul','events'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  EventCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    // public function store(EventCreateRequest $request)
    // {
    //     try {

    //         $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

    //         $event = $this->repository->create($request->all());

    //         $response = [
    //             'message' => 'Event created.',
    //             'data'    => $event->toArray(),
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
        $name = '';
        if ($request->has('pic')) {
            $upload = $request->file('pic');
            $name = $upload->getClientOriginalName() . '_' . rand(100, 9999);
            $upload->move(public_path() . '/uploads/', $name);
        }
        $e = new Event();
        $e->nama = $request->nama;
        $e->day = $request->day;
        $e->time = $request->time;
        $e->location = $request->location;

        $e->desc = $request->desc;
        // $e->history = $requesst->history;
        $e->pic = '/uploads/' . $name;

        $e->save();

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
        $events = $this->repository->find($id);
        $modul = $this->modul;

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $events,
            ]);
        }

        return view('event.show', compact('events','modul'));
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
        $event = $this->repository->find($id);
        $modul = $this->modul;
        return view('event.edit', compact('event','modul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EventUpdateRequest $request, $id)
    {
        try {
            $e = Event::findOrFail($id);
            if ($request->has('pic')) {
                $upload = $request->file('pic');
                $name = $upload->getClientOriginalName() . '_' . rand(100, 9999);
                $upload->move(public_path() . '/uploads/', $name);
                $e->pic = '/uploads/' . $name;
            }
            $e->nama = $request->nama;
           $e->day = $request->day;
           $e->time = $request->time;
           $e->location = $request->location;
           $e->desc = $request->desc;

            $e->update();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => 'Terjadi Kesalahan']);
        }

        // try {

        //     $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        //     $event = $this->repository->update($request->all(), $id);

        //     $response = [
        //         'message' => 'Event updated.',
        //         'data'    => $event->toArray(),
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
                'message' => 'Event deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Event deleted.');
    }
}

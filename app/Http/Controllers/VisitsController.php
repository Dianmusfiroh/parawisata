<?php

namespace App\Http\Controllers;

use App\Entities\Visit;
use Illuminate\Http\Request;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use App\Http\Requests;
use CyrildeWit\EloquentViewable\Support\Period;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VisitCreateRequest;
use App\Http\Requests\VisitUpdateRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\EventRepository;
use App\Repositories\GaleryRepository;
use App\Repositories\HotelRepository;
use App\Repositories\KulinerRepository;
use App\Repositories\VisitRepository;
use App\Repositories\WisataRepository;
use App\Validators\EventValidator;
use App\Validators\VisitValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class VisitsController.
 *
 * @package namespace App\Http\Controllers;
 */
class VisitsController extends Controller
{
    /**
     * @var VisitRepository
     */
    protected $repository;

    /**
     * @var VisitValidator
     */
    protected $validator;

    /**
     * VisitsController constructor.
     *
     * @param VisitRepository $repository
     * @param VisitValidator $validator
     */
    public function __construct(VisitRepository $repository,
    VisitValidator $validator, HotelRepository $hotelRepository,
    EventRepository $eventRepository,
    CategoryRepository $categoryRepository,
    ContactRepository $contactRepository,
    WisataRepository $wisataRepository, KulinerRepository $kulinerRepository,
    GaleryRepository $galeryRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->hotelRepository = $hotelRepository;
        $this->wisataRepository = $wisataRepository;
        $this->kulinerRepository = $kulinerRepository;
        $this->galeryRepository = $galeryRepository;
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
        $this->contactRepository = $contactRepository;
        $this->modul = 'visit';
        $this->w = 'wisata';
        $this->k = 'kuliner';
        $this->e = 'event';
        $this->h = 'hotel';
        $this->c = 'comment';
        // $this->g = 'galery';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Visit $visit)
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $visit = $this->repository->all();
        $modul = $this->modul;
        $hotel = $this->hotelRepository->all();
        $wisata = $this->wisataRepository->all();
        $kuliner = $this->kulinerRepository->all();
        $event = $this->eventRepository->all();
        $category = $this->categoryRepository->all();
        $contact =$this->contactRepository->all();
        // dd($event);
        // $galery = $this->galeryRepository->all();
        // $post= $this->View;
        $w = $this->w;
        $k = $this->k;
        $h = $this->h;
        $e = $this->e;
        $c = $this->c;
        // $g = $this->g;
        // dd($visit);
        $n =1;

       $up_count= DB::select(DB::raw("UPDATE visit AS v SET visit_count=visit_count+1"));
// dd($up_count);
$find_count = DB::select(DB::raw("SELECT visit_count as v FROM visit"));
$dt = DB::table('hotel')->paginate(10);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $visit,
            ]);
        }


// dd($visit->id);
// views($visit)->record();
// views($visit)->count();
        // views($visit)->record();
        return view('visit.index', compact('dt','c','contact','category','event','e','w','up_count','find_count','visit','modul','hotel','wisata','kuliner','w','k','h'));
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $dt = DB::table('hotel')
        ->where('name','like',"%".$search."%")
        ->paginate();

        return view('visit.index',['hotel' => $dt]);
        // $search = request()->search;

        // $response = array();
        // $g=$this->hotelRepository->scopeQuery(function ($query) use($search){
        //     return $query->select('name')->from('hotel')->get();
        //     })->where('name','LIKE','%'.$search.'%');

    // })->all(['name']);
    // if ($gtts->count() > 0) {
        // foreach ($g as $item) {
        //         $response[] = array(
        //             "id" => $item->id,
        //             "text" => $item->name,
        //         );
        // }
        // $cari = DB::table('event','wisata','hotel','kuliner')
        // ->where('name','LIKE','%'.$search.'%')
        // ->all(['name']);
        // foreach ($cari as $item){
        //     $response[]= array(
        //         "text" => $item->name,
        //     );
        // }
        // if (request()->is('api*') || request()->ajax()) {
        //     return response()->json($response);
        // }
    }
    public function tes(Visit $visit)
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $visit = $this->repository->all();
        $modul = $this->modul;
        $hotel = $this->hotelRepository->all();
        $wisata = $this->wisataRepository->all();
        $kuliner = $this->kulinerRepository->all();
        // $galery = $this->galeryRepository->all();
        // $post= $this->View;
        $w = $this->w;
        $k = $this->k;
        $h = $this->h;
        $g = $this->g;
        $e = $this->e;
        // dd($visit);
        $n =1;

       $up_count= DB::select(DB::raw("UPDATE visit AS v SET visit_count=visit_count+1"));
// dd($up_count);
$find_count = DB::select(DB::raw("SELECT visit_count as v FROM visit"));

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $visit,
            ]);
        }


// dd($visit->id);
// views($visit)->record();
// views($visit)->count();
        // views($visit)->record();
        return view('visit.tes', compact('up_count','find_count','visit','modul','hotel','wisata','kuliner','w','k','h','e','event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VisitCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VisitCreateRequest $request)
    {

      $visit = new visit;


      $visit->visit_count = $request->input(0);

      $visit->save();

      // try {

        //     $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

        //     $visit = $this->repository->create($request->all());
        //     // $visitCount -> $request->visitCount;

        //     $response = [
        //         'message' => 'Visit created.',
        //         'data'    => $visit->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $visit = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $visit,
            ]);
        }

        // $visit = Visit::find($id);

        // $data = array(
        //   'id' => $id,
        //   'visit' => $visit
        // );
        return view('visit.show', compact('visit'));
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
        $visit = $this->repository->find($id);

        return view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VisitUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
      $visit = Visit::find($id);

    //   $commentCount = $request->commentCount;
      $visitCount = $request->visitCount;

    //   $post->comment_count = $commentCount;
      $visit->visit_count = $visitCount;

      $visit->save();

      return redirect()->route('visit.show', ['id'=>$id]);
    }
    // public function update(VisitUpdateRequest $request, $id)
    // {
    //     try {

    //         $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

    //         $visit = $this->repository->update($request->all(), $id);
    //         $visitCount -> $request->visitCount;
    //         $response = [
    //             'message' => 'Visit updated.',
    //             'data'    => $visit->toArray(),
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
                'message' => 'Visit deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Visit deleted.');
    }
}

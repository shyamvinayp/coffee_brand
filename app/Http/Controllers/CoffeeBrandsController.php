<?php

namespace App\Http\Controllers;

use App\CoffeeBrand;
use App\UserBrandVote;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\View\View;

class CoffeeBrandsController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = CoffeeBrand::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($cbrand){
                    return view('cbrands.partials.action-index', [
                        'cbrand' => $cbrand,
                    ])->render();
                })
                ->addColumn('votes', function($cbrand){
                   return UserBrandVote::where('coffee_brand_id',$cbrand->id)->get()->count();
                })
                ->editColumn('image', function($cbrand){
                    return view('cbrands.partials.index-image', [
                        'cbrand' => $cbrand,
                    ])->render();
                })
                ->editColumn('created_at', function ($cbrand) {
                    return date('Y-m-d', strtotime($cbrand->created_at));
                })
                ->rawColumns(['action', 'image', 'votes', 'serial_no'])
                ->make(true);
        }

        return view('cbrands.index');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function view($id)
    {
        $data['coffeeBrand'] = CoffeeBrand::query()->where('id', $id)->first();
        $userBrandVote = UserBrandVote::query()->where('user_id', Auth::user()->id)->where('coffee_brand_id', $id)->first();
        $data['isVoted'] = false;
        if(!empty($userBrandVote)){
            $data['isVoted'] = true;
        }
       
        return view('cbrands.view', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('cbrands.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {

        $this->validateCreate($request->all())->validate();

        $coffeeBrand = new CoffeeBrand();
        $coffeeBrand->name = $request->get('name');
  
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('uploads', $imageName, 'public');

            $coffeeBrand->image = $imageName;
            $coffeeBrand->path = '/storage/'.$path;
        }

        if($coffeeBrand->save()) {
            if(Auth::user()){
                return redirect()->route("cbrands.index")->with("success", "Item saved successfully!");
            } else {
               dd('some problem in item saving!');
            }
        }
    }

    /**
     * @param array $data
     * @param null $updateId
     * @return \Illuminate\Contracts\Validation\Validator
     */
	public function validateCreate(array $data, $updateId = null) {
        if(empty($updateId)) {
            $rules = [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];
        } else {
            $rules = [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }

        return Validator::make($data, $rules);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws \Exception
     */
	public function destroy($id)
    {
        $coffeeBrand = CoffeeBrand::query()->findOrFail($id);
        $coffeeBrand->delete();
        return redirect()->back()->with('success','Item deleted successfully!');
    }

    /** 
     * This function is used to save user votes on co
     * 
     * @param Request $request
     * @return AjaxResponse
    */

    public function vote(Request $request){
        $cbrandcoffeeBrand = UserBrandVote::query()->where('user_id', Auth::user()->id)->where('coffee_brand_id', $request->input('cbrandId'))->first();
        
        if(empty($cbrandcoffeeBrand)){
            $userBrandVote = new UserBrandVote();
            $userBrandVote->user_id = Auth::user()->id;
            $userBrandVote->coffee_brand_id = $request->input('cbrandId');
            $userBrandVote->save();

            return response()->json(['message' => 'User Vote Saved successfully to this coffee brand!', 'status' => 'success']); 
        } else {
            return response()->json(['message' => 'User already voted to this coffee brand!', 'status' => 'success']); 
        }

    }

}

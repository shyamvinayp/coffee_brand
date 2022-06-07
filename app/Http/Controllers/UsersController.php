<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\View\View;

class UsersController extends Controller
{

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','home', 'store','index']]);
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($user){
                    return view('users.partials.action-index', [
                        'user' => $user,
                    ])->render();
                })
               
                ->editColumn('created_at', function ($user) {
                    return date('Y-m-d', strtotime($user->created_at));
                })
                ->rawColumns(['action', 'serial_no'])
                ->make(true);
        }

        return view('users.index');
    }

    /**
     * @return Application|Factory|View
     */
	public function create()
    {
        return view('users.create');
    }

    /**
     * @return Application|Factory|View
     */
    public function home() {
        return view('users.home');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
	public function edit($id)
    {
        $data['user'] = User::query()->findOrFail($id);

        return view('users.edit', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) {
        $this->validateCreate($request->all())->validate();

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        if($user->save()) {
            if(Auth::user()){
                return redirect()->route("users.index")->with("success", "User saved successfully!");
            } else {
                return redirect()->route("login")->with("success", "User registerd successfully, Login to access the application!");
            }
        } else {
            return redirect()->back()->with('error', 'Registration failed! Try again');
        }
    }


    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $this->validateCreate($request->all(), $id)->validate();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
    
		$user->update();

        return redirect()->route("users.index")->with("success", "User updated successfully!");
    }


    /**
     * @param array $data
     * @param null $updateId
     * @return \Illuminate\Contracts\Validation\Validator
     */
	public function validateCreate(array $data, $updateId = null) {
	    //TODO-commented code for future use
        if(empty($updateId)) {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
        }

        if($updateId) {
            $rules['email'] = [
                Rule::unique('users', 'email')->ignore($updateId)
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
        $user = User::query()->findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','User deleted successfully!');;
    }

}

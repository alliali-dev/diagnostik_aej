<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:Admin')->except(['logoutAs']);
    }

    public function index()
    {

        $title = 'List of active Users';
        $users = User::where('status', true)->get();
        return view('users.index');
    }

    public function profile()
    {
        $profil = auth()->user();
        return view('users.profile',compact('profil'));
    }

    public function disabledUsers()
    {
        if ( ! Auth::user()->hasRole('SuperAdmin') ) {
            abort(401, 'You can not access to this section');
        }

        $title = 'List of deactivated Users';
        return view('users.datatables.disabled-users', compact('title'));
    }

    public function deletedUsers()
    {
        if ( ! Auth::user()->hasRole('SuperAdmin') ) {
            abort(401, 'You can not access to this section');
        }

        $title = 'List of deleted Users';
        return view('users.datatables.deleted-users', compact('title'));
    }

    public function create()
    {
        /*if ( ! Auth::Users()->can('Manage') ) {
            abort(401, 'You can not access to this section');
        }

        if ( Auth::Users()->hasRole('Reseller Pro') || Auth::Users()->hasRole('Bundle') ) {
            if ( Users::where('created_by', Auth::id())->count() == 250 ) {
                abort(403, 'Max users created');
            }
        } else if ( Auth::Users()->hasRole('Reseller') ) {
            if ( Users::where('created_by', Auth::id())->count() == 50 ) {
                abort(403, 'Max users created');
            }
        }*/

        $roles = Role::get();
        //dd($roles);
        return view('users.create', ['roles'=>$roles]);
    }

    public function edit($id)
    {
        /*if ( ! Auth::Users()->can('Manage') )
            abort(401, 'You can not access to this section');*/

        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('users.edit', compact('user','roles'));
    }

    public function show($id)
    {
	    /*if ( ! Auth::Users()->can('Manage') )
		    abort(401, 'You can not access to this section');*/

        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:users',
            'password' => 'sometimes',
            'agence_id' => 'required|string',
            'password_confirm' => 'sometimes|same:password'
        ]);

        $agence = Agence::findOrfail(request('agence_id'));

        $data = request()->all();

        if (request()->has('status')) {
            $data['status'] = (bool)request('status');
        }
        if (request()->has('confirmed')) {
            $data['confirmed'] = (bool)request('confirmed');
        }

        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }

        $data['created_by'] = Auth::id();
        $data['agence_id'] = $agence->id;

        $user = User::create($data);

        $roles = request()->roles;
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r);
            }
        }

        session()->flash('success','Les utilisateurs ont été sauvegardés avec succès.');

        return redirect(route('users.index'));
    }

     public function update(Request $request)
    {
        $user = User::withTrashed()->find($request->id);
        if (!$user) {
            flashy()->success('Users not found');
            return redirect(route('users.index'));
        }

        $this->validate($request, [
            'name' => 'sometimes|required',
            'password' => 'sometimes',
            //'password_confirm' => 'sometimes|same:password'
        ]);

        if(!is_null($request['password']))
            $user->password = bcrypt($request['password']);

        if ($request->has('email'))
            $user->email = $request['email'];

	    if ($request->has('name'))
            $user->name = $request['name'];

        if ($request->has('roles'))
            $roles = $request['roles'];

	    if ($request->has('status')) {
	        $user->status = $request['status'];
            $user->deleted_at = null;
        }

        $user->update();

        if (isset($roles)) {
        	if(Auth::user()->hasRole('Super Admin'))
                $user->roles()->sync($roles);
        }

        session()->flash('success','Utilisateur a été mis à jour avec succès.');

        if($request->has('profile')){
            return back();
        }

        return redirect(route('users.index'));
    }

    public function delete(Request $request)
    {
	    /*if ( ! Auth::Users()->can('Manage') )
		    abort(401, 'You can not do this action');*/

	    $user = User::findOrFail( $request['id'] );
	    $user->status = false;
	    $user->deleted_at = date('Y-m-d H:i:s');

        if ( $user->save() )
            session()->flash('danger','Users deleted successfully.');
        else
            session()->flash('danger','Problem while deleting Users. Please try later.');

	    if(Auth::user()->can('Reseller') || Auth::user()->can('Reseller Pro') || Auth::user()->can('Bundle'))
		    return redirect(route('users.myClients'));

	    return redirect(route('users.index'));
    }

    public function destroy(Request $request)
    {
	    if ( ! Auth::user()->hasRole('Admin') )
		    abort(401, 'You can not do this action');

	    $user = User::withTrashed()->find($request->id);
        if ( $user->forceDelete() )
            session()->flash('danger','Users destroy successfully.');
        else
            session()->flash('danger','Problem while destroying Users. Please try again.');

        return redirect()->back();
    }

    public function loginAs($userId)
    {
        /*if ( ! Auth::Users()->hasRole('Admin') ) {
            abort(401, 'You can not access to this section');
        }*/
        $user = User::find($userId);
        session()->put( 'orig_user', Auth::user() );
        Auth::login($user);
        return redirect()->route('home');
    }

    public function logoutAs()
    {
        $orig_user = session()->pull( 'orig_user' );
        $user = User::find( $orig_user->id );
        Auth::login($user);
        return redirect()->route('home');
    }

    public function activeUsersTable()
    {
        $users = User::withTrashed()->where('status', true);

        return DataTables::of($users)
            ->addColumn('actions', function ($model) {
                $actions = '';
                if(auth()->user()->hasRole('Super Admin')){
                if($model->id != Auth::id())
                    $actions .= '<a href="'. route('users.login-as', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light"><i class="feather icon-lock"></i></a>';
                    $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-info  waves-effect waves-light"><i class="feather icon-search"></i></a>';
                    $actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-primary  waves-effect waves-light"><i class="feather icon-edit"></i></a>';
                    $actions .= '<a href="'. route('users.passwordReset', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-success  waves-effect waves-light"><i class="feather icon-refresh-ccw"></i></a>';

                if($model->id != Auth::id()) {

                        $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                            '<input type="hidden" name="_method" value="PUT">'.
                            '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                        if($model->status)
                            $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-warning  waves-effect waves-light"><i class="feather icon-pause"></i></button>';
                        else
                            $actions .= '<input type="hidden" name="status" value="1"><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-success waves-effect waves-light"><i class="feather icon-play-circle"></i></button>';
                        $actions .= '</form>';
                        $actions .= '<form action="' . route( 'users.delete' ) . '" method="post" style="display: inline">' .
                            '<input type="hidden" name="id" value="' . $model->id . '">' . csrf_field() .
                            '<button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light"><i class="feather icon-trash"></i></button>';
                        $actions .= '</form>';
                    }
                }
                return $actions;
            })
            ->editColumn('agence_id', function ($model){
                $agence = $model->agence->name;
                return $agence;
            })
            ->editColumn('status', function ($model){
                if ($model->confirmed)
                    $status = '<span class="badge badge-success">Yes</span>';
                else
                    $status = '<span class="badge badge-warning">Non</span>';
                return $status;
            })
            ->editColumn('roles', function ($model){
                $roles = $model->roles()->pluck('name')->implode(', ') ;
                return $roles;
            })
            ->editColumn('created_at', function ($model){
                $createdAt = Carbon::parse($model->created_at);
                return $createdAt->format('M d, Y');
            })
            ->editColumn('updated_at', function ($model){
                $createdAt = Carbon::parse($model->updated_at);
                return $createdAt->format('M d, Y');
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function deletedUsersTable()
    {
        $users = User::withTrashed()->whereNotNull('deleted_at');

        return DataTables::of($users)
            ->addColumn('actions', function ($model) {
                $actions = '';
                if($model->id != Auth::id())
                    $actions .= '<a href="'. route('users.login-as', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light"><i class="feather icon-lock"></i></a>';
                $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-info  waves-effect waves-light"><i class="feather icon-search"></i></a>';
                $actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-primary  waves-effect waves-light"><i class="feather icon-edit"></i></a>';
                $actions .= '<a href="'. route('users.passwordReset', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-success  waves-effect waves-light"><i class="feather icon-refresh-ccw"></i></a>';
                $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="_method" value="PUT">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                if($model->status)
                    $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-warning  waves-effect waves-light"><i class="feather icon-pause"></i></button>';
                else
                    $actions .= '<input type="hidden" name="status" value="1"><input type="hidden" name="deleted_at" value="null"><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-success waves-effect waves-light"><i class="feather icon-play-circle"></i></button>';
                $actions .= '</form>';
                $actions .= '<form action="'. route('users.destroy') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">' . csrf_field() .
                    '<button type="submit" class="btn btn-icon btn-icon rounded-circle waves-effect waves-light btn-danger"><i class="feather icon-clock"></i></button>';
                $actions .= '</form>';
                return $actions;
            })
            ->editColumn('status', function ($model){
                if ($model->status)
                    $status = '<span class="badge badge-success">Yes</span>';
                else
                    $status = '<span class="badge badge-danger">Deleted</span>';
                return $status;
            })
            ->editColumn('deleted_at', function ($model){
                $createdAt = Carbon::parse($model->deleted_at);
                return $createdAt->format('M d, Y');
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function disabledUsersTable()
    {
        //$users = User::withTrashed()->where('status', false)->whereNull('created_at');
        $users = User::where('users.status', false);

        return DataTables::of($users)
            ->addColumn('actions', function ($model) {
                $actions = '';
                if($model->id != Auth::id())
                    $actions .= '<a href="'. route('users.login-as', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light"><i class="feather icon-lock"></i></a>';
                $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-info  waves-effect waves-light"><i class="feather icon-search"></i></a>';
                $actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-primary  waves-effect waves-light"><i class="feather icon-edit"></i></a>';
                $actions .= '<a href="'. route('users.passwordReset', [$model->id]) .'" class="btn btn-icon btn-icon rounded-circle btn-secondary waves-effect waves-light"><i class="fas icon-settings"></i></a>';
                $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="_method" value="PUT">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                if($model->status)
                    $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-warning  waves-effect waves-light"><i class="feather icon-pause"></i></button>';
                else
                    $actions .= '<input type="hidden" name="status" value="1"><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-success waves-effect waves-light"><i class="feather icon-play-circle"></i></button>';
                $actions .= '</form>';
                $actions .= '<form action="'. route('users.delete') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">' . csrf_field() .
                    '<button type="submit" class="btn btn-icon btn-icon rounded-circle waves-effect waves-light btn-danger"><i class="feather icon-clock"></i></button>';
                $actions .= '</form>';
                return $actions;
            })
            ->editColumn('status', function ($model){
                if ($model->status)
                    $status = '<span class="badge badge-success">Confirmed</span>';
                else
                    $status = '<span class="badge badge-warning">Deactivated</span>';
                return $status;
            })
            ->editColumn('created_at', function ($model){
                $createdAt = Carbon::parse($model->created_at);
                return $createdAt->format('M d, Y');
            })
            ->editColumn('updated_at', function ($model){
                $createdAt = Carbon::parse($model->updated_at);
                return $createdAt->format('M d, Y');
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    /* Reseller */
    public function myClients()
    {
	    /*if ( ! Auth::Users()->can('Manage') )
		    abort(401, 'You can not access to this section');*/

        $title = Auth::user()->name . ' clients';
        $clients = DB::table('users')
            ->select('users.id')
            ->join('users as creator', 'users.created_by', '=', 'creator.id')
            ->where('users.created_by', Auth::id())
            ->where('users.status', true)->get();

        return view('users.datatables.my-clients', compact('title','clients'));
    }

    public function myClientsTable()
    {
        $users = DB::table('users')
                ->select('users.id','users.name','users.email','users.created_at','users.status', 'creator.email as mail')
                ->join('users as creator', 'users.created_by', '=', 'creator.id')
                ->where('users.created_by', Auth::id())
                ->where('users.status', true)
                ->whereNull('users.deleted_at')
                ->orderBy('users.name');

        return DataTables::of($users)
            ->addColumn('actions', function ($model) {
                $actions = '';
                $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="dt-fab-btn right-side btn-info btn-shadow size-25 mr-1"><i class="icon icon-search"></i></a>';
                $actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="dt-fab-btn right-side btn-primary btn-shadow size-25 mr-1"><i class="icon icon-edit"></i></a>';
                $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="_method" value="PUT">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                if($model->status)
                    $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-sm btn-warning"><i class="icon icon-align-left"></i></button>';
                else
                    $actions .= '<input type="hidden" name="status" value="1"><button type="submit" class="btn btn-sm btn-success"><i class="icon icon-play"></i></button>';
                $actions .= '</form>';
                $actions .= '<form action="'. route('users.delete') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">' . csrf_field() .
                    '<button type="submit" class="dt-fab-btn right-side btn-success btn-shadow size-25"><i class="fa fa-trash"></i></button>';
                $actions .= '</form>';
                return $actions;
            })
            ->editColumn('status', function ($model){
                if ($model->status)
                    $status = '<span class="badge badge-success">Yes</span>';
                else
                    $status = '<span class="badge badge-warning">No</span>';
                return $status;
            })
            ->editColumn('created_at', function ($model){
	            $createdAt = new Carbon($model->created_at);
	            return $createdAt->format('M d, Y');
            })
            ->editColumn('creator', function ($model){
                return $model->mail;
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function myDisabledClients()
    {
	    /*if ( ! Auth::Users()->can('Manage') )
		    abort(401, 'You can not access to this section');*/

        $title = Auth::user()->name . ' deactivated clients';

        return view('users.datatables.my-disabled-clients', compact('title'));
    }

    public function myDisabledClientsTable()
    {
        $users = DB::table('users')
                ->select('users.id','users.name','users.email','users.created_at','users.status', 'creator.email as mail')
                ->join('users as creator', 'users.created_by', '=', 'creator.id')
                ->where('users.created_by', Auth::id())
                ->where('users.status', false)
                ->whereNull('users.deleted_at')
                ->orderBy('users.name');

        return DataTables::of($users)
            ->addColumn('actions', function ($model) {
                $actions = '';
                $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="dt-fab-btn right-side btn-info btn-shadow size-25 mr-1"><i class="icon icon-search"></i></a>';
                $actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="dt-fab-btn right-side btn-primary btn-shadow size-25 mr-1"><i class="icon icon-edit"></i></a>';
                $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="_method" value="PUT">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                if($model->status)
                    $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-sm btn-warning"><i class="icon icon-align-left"></i></button>';
                else
                    $actions .= '<input type="hidden" name="status" value="1"><button type="submit" class="btn btn-sm btn-success"><i class="icon icon-play"></i></button>';
                $actions .= '</form>';
                $actions .= '<form action="'. route('users.delete') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">' . csrf_field() .
                    '<button type="submit" class="dt-fab-btn right-side btn-danger btn-shadow size-25"><i class="icon icon-trash"></i></button>';
                $actions .= '</form>';
                return $actions;
            })
            ->editColumn('status', function ($model){
                if ($model->status)
                    $status = '<span class="badge badge-success">Yes</span>';
                else
                    $status = '<span class="badge badge-warning">No</span>';
                return $status;
            })
            ->editColumn('created_at', function ($model){
	            $createdAt = new Carbon($model->created_at);
	            return $createdAt->format('M d, Y');
            })
            ->editColumn('creator', function ($model){
                return $model->mail;
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function myDeletedClients()
    {
	    /*if ( ! Auth::Users()->can('Manage') )
		    abort(401, 'You can not access to this section');*/

        $title = Auth::user()->name . ' deleted clients';

        return view('users.datatables.my-deleted-clients', compact('title'));
    }

    public function myDeletedClientsTable()
    {
        $users = DB::table('users')
            ->select('users.id','users.name','users.email','users.deleted_at','users.status', 'creator.email as mail')
            ->join('users as creator', 'users.created_by', '=', 'creator.id')
            ->where('users.created_by', Auth::id())
            ->whereNotNull('users.deleted_at')
            ->orderBy('users.name');

        return DataTables::of($users)
            ->addColumn('actions', function ($model) {
                $actions = '';
                $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="dt-fab-btn right-side btn-info size-25 mr-1"><i class="icon icon-search"></i></a>';
                $actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="dt-fab-btn right-side btn-primary size-25 mr-1"><i class="icon icon-edit"></i></a>';
                $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                    '<input type="hidden" name="_method" value="PUT">'.
                    '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                if($model->status)
                    $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-sm btn-warning"><i class="icon icon-align-left"></i></button>';
                else
                    $actions .= '<input type="hidden" name="status" value="1"><button type="submit" class="btn btn-sm btn-success"><i class="icon icon-play"></i></button>';
                $actions .= '</form>';

                return $actions;
            })
            ->editColumn('status', function ($model){
                if ($model->status)
                    $status = '<span class="badge badge-success">Yes</span>';
                else
                    $status = '<span class="badge badge-warning">No</span>';
                return $status;
            })
            ->editColumn('deleted_at', function ($model){
	            $createdAt = new Carbon($model->deleted_at);
	            return $createdAt->format('M d, Y');
            })
            ->editColumn('creator', function ($model){
                return $model->mail;
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function agenciesClients() {
    	$users = DB::table('users')
	               ->select('users.id','users.name','users.email','users.created_at','users.deleted_at','users.status', 'creator.email as mail')
	               ->join('users as creator', 'users.created_by', '=', 'creator.id')
	               ->where('users.created_by', '!=', 0)
	               ->get();
    	return view('users.agencies-clients', compact('users'));
    }

	public function agenciesClientsTable()
	{
		$users = DB::table('users')
			->select('users.id','users.name','users.email','users.created_at','users.deleted_at','users.status', 'creator.email as mail')
			->join('users as creator', 'users.created_by', '=', 'creator.id')
			->where('users.created_by', '>', 0)
			->orderBy('users.name');

		return DataTables::of($users)
             ->addColumn('actions', function ($model) {
                 $actions = '';
                 $actions .= '<a href="'. route('users.view', [$model->id]) .'" class="dt-fab-btn right-side btn-info btn-shadow size-25 mr-1"><i class="icon icon-search"></i></a>';
                 /*$actions .= '<a href="'. route('users.edit', [$model->id]) .'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';
                 $actions .= '<form action="'. route('users.update') .'" method="post" style="display: inline">'.
                             '<input type="hidden" name="_method" value="PATCH">'.
                             '<input type="hidden" name="id" value="'. $model->id .'">'. csrf_field();
                 if($model->status)
	                 $actions .= '<input type="hidden" name="status" value="0"><button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-align-left"></i></button>';
                 else
	                 $actions .= '<input type="hidden" name="status" value="1"><button type="submit" class="btn btn-sm btn-success"><i class="fa fa-play"></i></button>';
                 $actions .= '</form>';
                 $actions .= '<form action="'. route('users.delete') .'" method="post" style="display: inline">'.
                             '<input type="hidden" name="id" value="'. $model->id .'">' . csrf_field() .
                             '<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                 $actions .= '</form>';*/
                 return $actions;
             })
             ->editColumn('status', function ($model){
                if ( strlen($model->deleted_at) > 0 ) {
	                 $status = '<span class="badge badge-danger">Deleted</span>';
                } else {
					if ($model->status)
						$status = '<span class="badge badge-success">Actived</span>';
					else
						$status = '<span class="badge badge-warning">Deactivated</span>';
                }
                 return $status;
             })
             ->editColumn('created_at', function ($model){
                 $createdAt = new Carbon($model->created_at);
                 return $createdAt->format('M d, Y');
             })
             ->editColumn('creator', function ($model){
                 return $model->mail;
             })
             ->rawColumns(['actions', 'status'])
             ->make(true);
	}
}

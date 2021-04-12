<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use PDF;
use App\Rolemanager;
use App\Exports\RoleExportfun;
use App\Imports\RoleImport;
use Maatwebsite\Excel\Facades\Excel;


////////////////////////////////// ROLES PERMISSION MODULE ///////////////////////////////////////////



class RolesController extends Controller
{
    //
    function __construct()
    {

        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);

       $this->middleware('permission:role-create', ['only' => ['create', 'store']]);

        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        // echo "<pre>";
        // print_r($this);
        // exit();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // die("test11");
        $roles = Role::orderBy('id', 'DESC')->paginate(5);

        return view('admin.roles.index')->with('roles',$roles);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // die("test1");
        $permission = Permission::get();
        // dd($permission);
        return view('admin.roles.create',compact('permission'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Role $role)
    {
        $this->validate($request, ['name' => 'required|unique:roles,name', 'permission' => 'required', ]);
        $roles = Role::create(['name' => $request->input('name') ]);
        $roles->syncPermissions($request->input('permission'));

        // return redirect('admin/roles/index');

        return redirect()->route('roles.index')
        ->with('success','Role created successfully');

        // return view('admin.roles.index',compact('roles'))
        //     ->with('success', 'Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")->where("role_has_permissions.role_id", $id)->get();
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required', ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()
            ->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        return redirect('admin/roles/')->with('success', 'Role deleted successfully');
    }
    public function export() 
    {
        // echo "test";
        // die("test1122");
        return Excel::download(new RoleExportfun, 'rolefun.xls');
    }
    public function import(Request $request) 
    {
        // die("test");
        $path1 = $request->file('file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = Excel::import(new RoleImport,$path);
        // Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }

      public function exportPDF123() {
        // die("test123");
        $data = Rolemanager::all();
        // echo "<pre>";
        // print_r($data->toArray());
        // exit();
        view()->share('role',$data);
        $pdf = PDF::loadView('admin.rolemanagement.pdfrole', $data);
        return $pdf->download('rolepdf.pdf');

        //Only View data used stream replaced download..
    } 
    public function exportContractor(Request $request){
        // die("test");

          $data =DB::table('rolemanagers')
        ->select('rolemanagers.role','rolemanagers.status')
        ->where(function ($query) use ($request) {
            // $skillids  = Skill::select('id')->where('skill', $request->search )->first();
            $query->Where('rolemanagers.role', 'like', '%' . $request->search . '%')
                ->orWhere('rolemanagers.status', 'like', '%' . $request->search . '%');
        })
        ->groupBy('rolemanagers.id')
        ->orderBy('rolemanagers.id', 'ASC')
        ->get();
        // echo "<pre>"; 
        // print_r($data); 
        // die();
        
        $column_array[] = array('role', 'status');
        foreach($data as $main_data)
        {
            $column_array[] = array(
                'Contractor Name'   => ($main_data->role) ? $main_data->role : '',
                'Email'             => ($main_data->status) ? $main_data->status : ''
            );
        }
         $check=Excel::create('Role', function($excel) use ($column_array){
            $excel->setTitle('Role');
            $excel->sheet('Role', function($sheet) use ($column_array){
                $sheet->fromArray($column_array, null, 'A1', false, false);
        });
        })->store('xlsx', storage_path('app/public/exports'));
      
      return response()->json(['status' => true, 'url' => url('storage/exports/role.xlsx')]);
    }
}


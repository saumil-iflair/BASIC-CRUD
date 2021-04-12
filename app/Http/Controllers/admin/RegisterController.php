<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RegisterData;
use PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // die("test");
        return view('admin.registration.index');

        // $rolemanagement = Rolemanager::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // die("test");
        return view('admin/registration/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // die("test");
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

        $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
              
            ];

        // dd($data);
        RegisterData::create($data);
        return view('admin/registration/index');
        // return redirect()->route('admin.registration.index')->with('success_message', array('msg' => 'User inserted successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // die("test");
        $user = RegisterData::find($id);


        return view('admin/registration/show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = RegisterData::find($id);


        return view('admin/registration/update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,RegisterData $user,$id)
    {
        //
        // dd($id);

         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

         $data = [

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,   
            ];

            // dd($data);
             RegisterData::where('id',$id)->update($data);
            return view('admin/registration/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //die("test12");
        $user = RegisterData::find($id);
        $user->delete();

        return view('admin.registration.index')->with('success_message', array('msg' => 'User deleted successfully'));
    }
    public function getData(Request $request)
    {
        // die("test123");
         $sql = RegisterData::select('id', 'name', 'email', 'phone', 'address')
            ->orderBy($request->columns[$request->order[0]['column']]['name'], $request->order[0]['dir']);

        if (isset($request->search['value'])) {
            $sql->where(function ($query) use ($request) {
                $query->Where('name', 'like', "%{$request->search['value']}%")
                    ->orWhere('email', 'like', "%{$request->search['value']}%")
                    ->orWhere('phone', 'like', "%{$request->search['value']}%")
                    ->orWhere('address', 'like', "%{$request->search['value']}%");  
            });


        }

        $recordsTotal = $sql->count();
        $data = $sql->limit($request->length)->skip($request->start)->get();

        $json['data'] = $data;
        $json['draw'] = $request->draw;
        $json['recordsTotal'] = $recordsTotal;
        $json['recordsFiltered'] = $recordsTotal;

        return $json;
    }
    public function import(Request $request) 
    {
        // die("test");
        $path1 = $request->file('file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = Excel::import(new UsersImport,$path);
        // Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
    public function export() 
    {
        // echo "test";
        // die("test123");
        return Excel::download(new UsersExport, 'users.xls');
    }

     public function exportPDF() {
        // die("test123");
        $data = RegisterData::all();
        // echo "<pre>";
        // print_r($data->toArray());
        // exit();
        view()->share('register',$data);
        $pdf = PDF::loadView('admin.registration.pdfview', $data);
        return $pdf->download('registration.pdf');

        //Only View data used stream replaced download..
    } 
}

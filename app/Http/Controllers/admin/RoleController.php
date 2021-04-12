<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rolemanager;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $rolemanagement = DB::table('rolemanagers')->orderBy('id', 'desc')
        // ->get();
        // return view('admin/rolemanagement/index')
        // ->with('rolemanagementpass', $rolemanagement);

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
         die("test");
        return view('admin/rolemanagement/create');
    }
    // public function simple()
    // {
    //     // die("test");
    //     return view('admin/rolemanagement/create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['role' => 'required|string|max:10', 'status' => 'required',
        // 'pwd' => 'required|min:6',
        // 'confpwd' => 'required_with:password|same:pwd|min:6'
        ]);
        $rolemanagement = new Rolemanager();
        $rolemanagement->role = $request->input('role');
        $rolemanagement->status = $request->input('status');
        $rolemanagement->save();
        return redirect('admin/rolemanagement/')->with('success','Sucessfully Record Inserted..');

        // return redirect()->back();

    }
    public function serverSideIndex(Request $request)
    {
        return view('admin/rolemanagement/index');
    }
    public function getData(Request $request)
    {
       
        $columns = array(
            0 => 'id',
            1 => 'role',
            2 => 'status',
            3 => 'option',
        );
        $totalData = Rolemanager::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $request->input('order.0.column');
        $order = $columns[$request->input('order.0.column') ];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value')))
        {
            $posts = Rolemanager::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else
        {
            $search = $request->input('search.value');
            $posts = Rolemanager::where('id', 'LIKE', "%{$search}%")->orWhere('role', 'LIKE', "%{$search}%")->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = Rolemanager::where('id', 'LIKE', "%{$search}%")->orWhere('role', 'LIKE', "%{$search}%")->count();
        }
        $data = array();
        if (!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit = url('posts.create', $post->id);
                $index = url('admin/rolemanagement', $post->id);
                $edit = route('posts.edit', $post->id);
                $delete = url('posts.destroy', $post->id);

                $nestedData['id'] = $post->id;
                $nestedData['role'] = $post->role;
                $nestedData['status'] = $post->status;
                $nestedData['option'] = $post->option;
                // $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                $nestedData['option'] = "&emsp;
<form action='" . route("posts.destroy", $post->id) . "' method='post'>
   <input type='hidden' name='_token' value='" . csrf_token() . "'>
   <input type='hidden' name='_method' value='DELETE'>
   <input type='submit' class='btn btn-xs btn-danger' value='Delete'>
</form>
&emsp;
<form action='" . route("posts.edit", $post->id) . "' method='put'>
   <input type='hidden' name='_token' value='" . csrf_token() . "'>
   <input type='hidden' name='_method' value='EDIT'>
   <input type='submit'  value='EDIT' style='background-color: #0d3ba5;color: white;'>
</form>
";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')) ,
            "recordsTotal" => intval($totalData) ,
            "recordsFiltered" => intval($totalFiltered) ,
            "data" => $data
        );
        echo json_encode($json_data);
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
        $rolemanagement = DB::table('rolemanagers')->orderBy('id', 'desc')
            ->get();
        return view('admin/rolemanagement/index')
            ->with('rolemanagementpass', $rolemanagement);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //   die("edit");
        //
        $rolemodel = Rolemanager::find($id);
        $rolemodelstatus = Rolemanager::pluck('status', 'status');
        $data = array(
            'rolemodel' => $rolemodel,
            'rolemodelstatus' => $rolemodelstatus
        );
        return view('admin/rolemanagement/update')->with($data);
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
        //
        // die("test");
        $rolemanagement = Rolemanager::find($id);
        $rolemanagement->role = $request->input('role');
        $rolemanagement->status = $request->input('status');
        // dd($rolemanagement);
        $rolemanagement->save();
        return redirect('admin/rolemanagement/')->with('success','Successfully Updated Recoerd..');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rolemanagement = Rolemanager::find($id);
        $rolemanagement->delete();
        return redirect('admin/rolemanagement')
            ->with('success', 'Sucessfully deleted..');
    }
}


<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TestParent;
use App\TestChild;
use Image;
use Storage;
use DB;
use PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ChildImgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $imgpass= TestChild::all();


        // return view('admin/childimg/index')->with('imgpass',$imgpass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $master= img_master::pluck('id','id');

        // $data=array('master'=>$master);
        return view('admin/childimg/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function serverSideIndex(Request $request){
        //  die("test");

        // $imgpass= TestChild::all();
        // dd($imgpass);
        // $imagepass= TestChild::latest()->get();
            // dd($imgpass);

            return view('admin/childimg/serverside');
    }

    public function getData(Request $request)
    {
        //echo "<pre>";print_r(env('APP_URL'));exit;
        // die("test1");

        $columns = array(
            0 =>'id',
            1=> 'title',
            2=> 'imagename',


        );

        // $posts= DB::table('testparent')
        // ->join('testchild','testchild.imgid','testparent.id')
        // ->select('testchild.*','testparent.title')
        // ->get();



                $totalData = TestChild::count();

                $totalFiltered = $totalData;

                $limit = $request->input('length');
                $start = $request->input('start');
                $request->input('order.0.column');
                $order = $columns[$request->input('order.0.column')];
                $dir = $request->input('order.0.dir');

                if(empty($request->input('search.value')))
            {
                $posts= DB::table('testparent')

                    ->leftjoin('testchild','testchild.imgid','testparent.id')
                    ->select('testparent.*','testchild.imagename')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->groupBy('testparent.id')
                    ->get();



                // $posts = TestChild::offset($start)
                //     ->limit($limit)
                //     ->orderBy($order,$dir)
                //     ->get();


            }
            else {

                    // $posts= DB::table('testparent')
                    // ->join('testchild','testchild.imgid','testparent.id')
                    // ->select('testchild.*','testparent.title')
                    // ->get();

            $search = $request->input('search.value');

            $posts =  TestChild::where('id','LIKE',"%{$search}%")
                        ->orWhere('imagename', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();

            $totalFiltered = TestChild::where('id','LIKE',"%{$search}%")
                        ->orWhere('imagename', 'LIKE',"%{$search}%")
                        ->count();

            }

            $data = array();
            if (!empty($posts))
            {
                foreach ($posts as $post)
                {

                    $edit = url('childedit.edit', $post->id);
                    $update = url('childupdate.update', $post->id);
                    $delete = url('childdelete.destroy', $post->id);

                    $nestedData['id'] = $post->id;
                    $nestedData['title'] = $post->title;
                    $nestedData['imagename'] = '
                    <img src="'.asset('/storage/uploads/' . $post->imagename).'" style="height:100px;width:300px"/>
                    ';

                    // $nestedData['option'] = $post->option;
                    // $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                    $nestedData['option'] = "&emsp;


                    <form action='" . route("childdelete.destroy", $post->id) . "' method='post'>
                    <input type='hidden' name='_token' value='" . csrf_token() . "'>
                    <input type='hidden' name='_method' value='DELETE'>
                    <input type='submit' class='btn btn-xs btn-danger' value='Delete'>
                 </form>

                 &emsp;
                 <form action='" . route("childedit.edit", $post->id) . "' method='put'>
                    <input type='hidden'  value='" . csrf_token() . "'>
                    <input type='hidden' value='EDIT'>
                    <input type='submit'  value='EDIT' style='background-color: #0d3ba5;color: white;'>
                 </form>


    &emsp;";
                    $data[] = $nestedData;

                }
            }



            $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data
                );

            echo json_encode($json_data);

    }

    public function store(Request $request)
    {
        // die("test");

        $this->validate($request,
        ['title' => 'required|string|max:10',
        'imagename' => 'required',
        ]);

        $data=$request->all();
        $mstr=TestParent::create($data);
        // dd($mstr);
        if($mstr)
        {
            if($request->hasFile('imagename'))
            {
                $image_array=$request->file('imagename');
                $array_len=count($image_array);

                for($i=0;$i<$array_len;$i++)
                {

                    $image_ext =$image_array[$i]->getClientOriginalName();
                    $new_img_name="pro_".time()."_".$i.'.'.$image_ext;
                    // echo $new_img_name;
                    // exit();
                    // $profile = \Storage::disk('public')->putFile('uploads',$image_array[$i]);
                    $resize_image = Image::make($image_array[$i]->getRealPath());
                    $resize_image->resize(150,150,function($constraint)
                    {
                            $constraint->aspectRatio();
                    });
                   $resize_image->save(storage_path('app/public/uploads/'.$new_img_name),60);

                    $temp=new TestChild(['imagename'=>$new_img_name]);
                    $mstr->child()->save($temp);
                }
                return redirect('admin/childimg/serverside')->with('success','All Images Inserted Successfully..');
            }
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $multipleimagemodel=TestChild::find($id);

        $imgmodel=TestParent::find($id);


        $imgpass= DB::table('testparent')

        ->join('testchild','testchild.imgid','testparent.id')
        ->where('testparent.id',$id)
        ->select('testchild.*','testchild.imagename')
        ->get();

        // foreach($imgpass as $v)
        // {
        //     $v->testchild=DB::table('testchild')->where('testparent.id','=',$v->id)->get()->toArray();
        // }

        // dd($imgpass);


        $data=array('multipleimagemodel'=>$multipleimagemodel,'imgmodel'=>$imgmodel,'imgpass'=>$imgpass);

        return view('admin/childimg/update')->with($data);
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
        // $temp = TestParent::find($id);

        $this->validate($request,
        [

        'imagename' => 'required',

        ]);


        $img= TestParent::find($id);
        // $img->title=$request->input('title');
        // $img->save();

        // $imgdataone = TestChild::find($id);

        if($img)
        {
            if($request->hasFile('imagename'))
            {
                $image_array=$request->file('imagename');
                $array_len=count($image_array);

                for($i=0;$i<$array_len;$i++)
                {
                    $image_ext =$image_array[$i]->getClientOriginalName();
                    $new_img_name="pro_".time()."_".$i.'.'.$image_ext;
                    // echo $new_img_name;
                    // exit();
                    // $profile = \Storage::disk('public')->putFile('uploads',$image_array[$i]);
                    $resize_image = Image::make($image_array[$i]->getRealPath());
                    $resize_image->resize(150,150,function($constraint)
                    {
                            $constraint->aspectRatio();
                    });

                   $resize_image->save(storage_path('app/public/uploads/'.$new_img_name),60);

                    $temp=new TestChild(['imagename'=>$new_img_name]);
                    $img->child()->save($temp);
                }
                return redirect('admin/childimg/serverside')->with('success','All images uploaded Successfully..');
            }
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {


        $imges = TestParent::find($id);

        if(file_exists('storage/uploads/' . $imges->imagename )){
           @unlink('storage/uploads/' . $imges->imagename);
        }

        $imges->delete();

        return redirect('admin/childimg/serverside')->with('success','Deletes Successfully..');


    }
    public function delete($id)
    {
        // die("test");

        $imges = TestChild::find($id);

        if(file_exists('storage/uploads/' . $imges->imagename )){
           @unlink('storage/uploads/' . $imges->imagename);
        }

        $imges->delete();

    }

    public function importExportView()
    {
       return view('import');
    }

    public function export() 
    {
        // echo "test";
        // die("test123");
        return Excel::download(new UsersExport, 'users.xls');
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

    public function exportPDF() {
        // die("test123");
        $data = TestParent::all();
        // echo "<pre>";
        // print_r($data->toArray());
        // exit();
        view()->share('img',$data);
        $pdf = PDF::loadView('admin.childimg.pdf', $data);

        //$pdf->save(storage_path('/documents/').'students_data_'.date('d-m-Y H:i:s').'.pdf');
        return $pdf->download('childimg.pdf');
    } 


}

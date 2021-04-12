<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\multipleimage;
use App\Multipleimagestore;
use Image;

class MutlipleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    function __construct()
    {
    $this->middleware('permission:img-list|img-create|img-edit|img-delete', ['only' => ['index','show']]);
    $this->middleware('permission:img-create', ['only' => ['create','store']]);
    $this->middleware('permission:img-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:img-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        // die("test");
        $imagepass = Multipleimagestore::all();

        return view('admin/image/index')->with('imagepass',$imagepass);

    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/image/create');
    }
    public function serverSideIndex(Request $request)
    {
        return view('admin/image/serverside');
    }
    public function getData(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'multipleimage',
            2=>'option',
        );
        $totalData = Multipleimagestore::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $request->input('order.0.column');
        $order = $columns[$request->input('order.0.column') ];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value')))
        {
            $posts = Multipleimagestore::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value');

            $posts =  Multipleimagestore::where('id','LIKE',"%{$search}%")
                        ->orWhere('multipleimage', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();

            $totalFiltered = Multipleimagestore::where('id','LIKE',"%{$search}%")
                        ->orWhere('multipleimage', 'LIKE',"%{$search}%")
                        ->count();

            }
        $data = array();
        if (!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit = url('imagepost.create', $post->id);
                // $index = url('admin/rolemanagement', $post->id);
                $edit = route('imagepost.edit', $post->id);
                $delete = url('imagepost.destroy', $post->id);

                $nestedData['id'] = $post->id;
                // $nestedData['multipleimage'] = "$post->multipleimage";
                $nestedData['multipleimage'] = '
                <img src="'.asset('uploads/' . $post->multipleimage).'" style="height:100px;width:300px"/>
                ';

                // $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                $nestedData['option'] = "&emsp;
<form action='" . route("imagepost.destroy", $post->id) . "' method='post'>
   <input type='hidden' name='_token' value='" . csrf_token() . "'>
   <input type='hidden' name='_method' value='DELETE'>
   <input type='submit' class='btn btn-xs btn-danger' value='Delete'>
</form>
&emsp;
<form action='" . route("imagepost.edit", $post->id) . "' method='put'>
<input type='hidden' name='_token' value='" . csrf_token() . "'>
<input type='hidden' name='_method' value='EDIT'>
<input type='submit'  value='EDIT' style='background-color: #0d3ba5;color: white;'>
</form>
&emsp;";
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $multiple = new Multipleimagestore();

        $this->validate($request, [
            'multipleimage'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);
            // $multiple->img_mstr_id=$request->input('img_mstr_id');

        //    You Need to Acess Permission in terminal
        //    sudo chmod -R 777 /opt/lampp/htdocs/projects/blog/public/thumbnail
        // sudo chmod -R 777 /opt/lampp/htdocs/projects/blog/public/uploads

           if($request->hasfile('multipleimage'))
           {
               $image = $request->file('multipleimage');
               $image_name = time().'.'.$image->getClientOriginalExtension();
               $thumb_name = 'thumb_'.time().'.'.$image->getClientOriginalExtension();
               $destination = public_path('thumbnail');
               $resize_image = Image::make($image->getRealPath());


               $resize_image->resize(150,150,function($constraint)
               {
                   $constraint->aspectRatio();
               })->save($destination . '/' . $thumb_name);
               $destination = public_path('uploads');
               $image->move($destination,$image_name);
               $multiple->multipleimage = $image_name;
           }
           else
           {
               return $request;
               $multiple->multipleimage = "";
           }

           $multiple->save();
           return redirect('admin/image/serverside');
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

        $imagemodel=Multipleimagestore::find($id);

        $data=array('imagemodel'=>$imagemodel);

        return view('admin/image/update')->with($data);
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
        $this->validate($request, [
            'multipleimage'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ]);

        $multiple = Multipleimagestore::find($id);

        if($request->hasfile('multipleimage'))
        {
            $image = $request->file('multipleimage');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $thumb_name = 'thumb_'.time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('thumbnail');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(150,150,function($constraint)
            {
                $constraint->aspectRatio();
            })->save($destination . '/' . $thumb_name);
            $destination = public_path('uploads');
            $image->move($destination,$image_name);
            $multiple->multipleimage = $image_name;
        }
        else
        {
            return $request;
            $multiple->multipleimage = "";
        }

        $multiple->save();
        return redirect('admin/image/serverside');

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
        $user= Multipleimagestore::find($id);
        $user->delete();

        return redirect('admin/image/serverside')->with('success','Sucessfully deleted..');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\multiimage;

class MultipleImage extends Controller
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

        $imagepass= multiimage::latest()->get();

        // echo "<pre>";

        // foreach($imagepass as $row)
        // {

        //     $images= json_decode($row->image);

        //     echo $images;
        //     // foreach($images as $file)
        //     // {
        //     //     echo $file;
        //     // }
        //     // echo $row->image;
        //     // foreach($row->image as $filename)
        //     // {
        //     //     echo $filename;
        //     // }
        // }
        // exit();

        // foreach($imagepass as $row){


        //     $row->image = explode(",",$row->image);

        //     // echo "<pre>";
        //     //  print_r($row);
        //     // dd($row);

        // }

        // $result = multiimage::all($imagepass);

        return view('admin/multipleimage/index')->with('imagepass',$imagepass);

        // return view('admin/multipleimage/index')->with('imagepass',$imagepass);


    }



    public function serverSideIndex(Request $request)
    {
        return view('admin/multipleimage/index');
    }
    public function getData(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'multipleimage',
            2=>'option',
        );
        $totalData = multiimage::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $request->input('order.0.column');
        $order = $columns[$request->input('order.0.column') ];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value')))
        {
            $posts = multiimage::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value');

            $posts =  multiimage::where('id','LIKE',"%{$search}%")
                        ->orWhere('image', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();

            $totalFiltered = multiimage::where('id','LIKE',"%{$search}%")
                        ->orWhere('image', 'LIKE',"%{$search}%")
                        ->count();

            }
        $data = array();
        if (!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit = url('multiimage.create', $post->id);
                // $index = url('admin/rolemanagement', $post->id);
                $edit = route('multiimage.edit', $post->id);
                $delete = url('multiimage.destroy', $post->id);

                $nestedData['id'] = $post->id;
                $nestedData['image'] = "$post->image";

                // $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                $nestedData['option'] = "&emsp;
<form action='" . route("multiimage.destroy", $post->id) . "' method='post'>
   <input type='hidden' name='_token' value='" . csrf_token() . "'>
   <input type='hidden' name='_method' value='DELETE'>
   <input type='submit' class='btn btn-xs btn-danger' value='Delete'>
</form>
&emsp;
<form action='" . route("multiimage.edit", $post->id) . "' method='put'>
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('admin/multipleimage/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [

        'image' => 'required',

    ]);
        // $slider = null;
        // try{
        //     $images= [];
        //     if($request->hasFile('image')){
        //         $i=0;
        //         foreach($request->file('image') as $file){
        //             $fileEx=$file->getClientOriginalExtension();
        //             $fileName = date('ymdhis_') . $i . '.' . $fileEx;

        //             Image::make($file)
        //             ->resize(500,250)
        //             ->save(public_path('uploads').$fileName);
        //             $images[]=$fileName;
        //             $i++;
        //         }
        //     }
        //     print_r($images);
        //     exit();

        //     $slider= multiimage::create([
        //         'image'=>json_encode($images),
        //     ]);
        // }
        // catch(Exception $exception){
        //     $slider =false;
        // }
        // if($slider){
        //     setMessage('success','Yay successfully created..');

        // }
        // else{
        //     setMessage('danger','unable to created..');
        // }

        // return redirect()->back();

        $result= new multiimage();

        $files = array();
        foreach ($request->file('image') as $image) {
            $profile = \Storage::disk('public')->putFile('admin.multipleimage', $image);
            $files[] = $profile;
        }
        // 'image'=>json_encode($images),
        $data['image'] = json_encode($files);

        //  dd($data);

         $result = multiimage::create($data);


        // $multiple->save();
        // if ($result){

        //     return redirect()->route('admin.multipleimage.index')
        //     ->with('success', "Record added successfully");
        // } else {
        //     return redirect()->route('admin.multipleimage.create')
        //     ->with('error', 'Failed to Add Record');
        // }

        // return redirect('admin.')

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
        $result= multiimage::find($id);
        $result->delete();

        return redirect('admin/multipleimage/')->with('success','Sucessfully deleted..');
    }
}

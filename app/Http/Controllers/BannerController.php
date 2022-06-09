<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
 
    public function index()
    {
        return Banner::all();
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'title'    => 'required',
        'description'   => 'required',
  ]);
    $input =$request->all();
    if ($image = $request->file('image')) {
    $destinationPath = 'storage/images/banner';
    $ImageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
    $image->move($destinationPath, $ImageName);
    $input['image'] = "$ImageName";
    }
    $success=Banner::create($input);
 return $success;
   
 
} 
 
    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        return Banner::where('id', $id)->get();

    }

   
    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'title'    => 'required',
        'description'   => 'required',
        'image' => 'required',
  ]);
  $input =$request->all();
  if ($image = $request->file('image')) {
  $destinationPath = 'storage/images/banner';
  $ImageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
  $image->move($destinationPath, $ImageName);
  $input['image'] = "$ImageName";
  }
  $success=Banner::where('id', $id)->update($input);
 return $success;
    }

 
    public function destroy($id)
    {
        //
    }
}

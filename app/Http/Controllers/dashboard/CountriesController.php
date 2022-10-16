<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $showallcountries = countries::all();
        return view('dash-board.countries.allcountry', compact('showallcountries'));
    }


    public function create()
    {
        return view('dash-board.countries.createcountry');
    }


    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'country_name'  => 'required',
            'href'          => 'required',
            
            'title'         => 'required'
        ]);
if($request->flag)
        {
                                       
                             $time=time();
             
                         $image = Image::make($request->file('flag')->getRealPath())->encode('webp', 100)->resize(20, 80)->save(public_path('flags/'  .  $time . '.webp'));
          $newImageName = time(). '.' . $request->flag->extension();  
        }
else {
    $time=NULL;
}


        $datacountry = countries::create([
            'country_name'      => $request->input('country_name'),
            'href'              => $request->input('href'),
            
            'title'             => $request->input('title'),
            'flag'=>  $time.".webp",
            'descrip'=>$request->Description,
        ]);


        return  redirect()->route('countries')
            ->with('success', 'Successfuly Added Country');
    }


    // public function show($id)
    // {
    //     $countries = Countries::find($id);
    //     return view('countries.detailcountry', compact('countries'));
    // }


    public function edit(countries $countries, $id)
    {
        $countries = countries::find($id);
        return view('dash-board.countries.editcountry', compact('countries'));
    }

    public function update(Request $request, Countries $countries, $id)
    {
        $countries = countries::find($id);

        $request->validate([
            'country_name'  => 'required',
            'href'          => 'required',
            'country_flag'  => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:max_width=600,max_height=600',
            'title'         => 'required'
        ]);
        $pathImg = str_replace('\\', '/', public_path('uploading/')) . $countries->country_flag;

        if (File::exists($pathImg)) {
            File::delete($pathImg);
        }
        // $newImageName = time() .'-' . $request->name_product .'.'. $request->photo->extension();
        $newImageName = time() . '.' . $request->country_flag->extension();
        $request->country_flag->move(public_path('uploading/'), $newImageName);


        $countries->country_name = $request->country_name;
        $countries->href         = $request->href;
        $countries->country_flag = $newImageName;
        $countries->title         = $request->title;
        $countries->update();

        return  redirect()->route('countries.main')
            ->with('success', 'Successfuly Added Country');
    }

    public function destroy(countries $countries, $id)
    {
        $countries = countries::find($id);

        $destination = str_replace('\\', '/', public_path('uploading/')) . $countries->country_flag;
        // $path =str_replace('\\' , '/' ,public_path('uploads/picture/'));

        // dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
            $countries->delete();
            return redirect()->route('countries.main')
                ->with('success', 'deleted data');
        }
        $countries->delete();
        return redirect()->route('countries.main')
            ->with('success', 'deleted data');
    }
}

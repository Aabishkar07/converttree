<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $advertisements = Advertisement::latest()->get();
        $today = Carbon::now()->toDateString();
        return view("admin.advertisement.index", compact("advertisements", "today"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view("admin.advertisement.create");
    }

    function randomString($length)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function fileUpload($file, $name)
    {

        $destinationPath = public_path() . '/images/';
        $randomString = $this->randomString(8);
        $imageName = $name . "_" . $randomString . ".webp";
        $file->move($destinationPath, $imageName);
        return $imageName;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $req = $request->all();
        $ad_image = "";
        if ($req["type"] == "script") {
            $req["image"] = "";
            $req["link"] = "";
        }
        if ($req["type"] == "image") {
            $req["ad_script"] = "";
            if ($request->hasFile("image")) {
                $ad_image = $this->fileUpload($request->image, 'ad');
                $req["image"] = $ad_image;
            }
        }
        Advertisement::create($req);
        return redirect()->route("admin.advertisement.index")->with("success", "Advertisement created successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
     

        return view("admin.advertisement.edit", compact("advertisement"));
    }

    public function imageDelete($filePath)
    {
        $destinationPath = public_path('images/');

        if (file_exists($destinationPath . $filePath)) {
            unlink($destinationPath . $filePath);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $req = $request->all();
        $ad_image = "";
        if ($req["type"] == "script") {
            if ($advertisement->image) {
                $this->imageDelete($advertisement->image);
            }
            $req["image"] = "";
            $req["link"] = "";
        }
        if ($req["type"] == "image") {
            $req["ad_script"] = "";
            if ($request->hasFile("image")) {
                if ($advertisement->image) {
                    $this->imageDelete($advertisement->image);
                }
                $ad_image = $this->fileUpload($request->image, 'ad');
                $req["image"] = $ad_image;
            }
        }

        $advertisement->update($req);
        return redirect()->route("admin.advertisement.index")->with("success", "Advertisement Updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        // dd("aa");
        if ($advertisement->image) {
            $this->imageDelete($advertisement->image);
        }
        $advertisement->delete();
        return redirect()->route("admin.advertisement.index")->with("success", "Advertisement Deleted successfully");
    }
}

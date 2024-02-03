<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\FirebaseConnection;
use App\Http\Requests\ProfileStoreRequest;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileStoreRequest $request)
    {
        /* Upload image to cloud storage */
            $localPath = public_path('firebase-temp-uploads') .'/';
            $cloudPath = "Images/";
           $image = $request->file('image');
           $extension = $image->getClientOriginalExtension();
           $name = $image->getFilename().time();
           $file = $name .'.'.$extension;
           if($image->move($localPath,$file)){
            $uploadFile = fopen($localPath.$file, 'r');
           $storageRef = Firebase::storage()->getBucket()->upload($uploadFile,['name' => $cloudPath.$file]);
            unlink($localPath . $file);
            $downloadUrl = $storageRef->signedUrl(new \DateTime('2100'));
            if(isset($downloadUrl)){
                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'image' => $downloadUrl,
                    'city' => $request->city,
                ];
                FirebaseConnection::connect()->getReference('users')->push($data);
                return redirect()->route('users.index');
            }
           }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $user = FirebaseConnection::connect()->getReference('users')->getChild($id)->getValue();
        return view('users.edit',compact('user','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        FirebaseConnection::connect()->getReference('users/'.$id)->update($request->except(['_token']));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FirebaseConnection::connect()->getReference('users/'.$id)->remove();
        return redirect()->route('users.index');
    }
}

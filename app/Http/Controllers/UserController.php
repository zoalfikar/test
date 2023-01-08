<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        foreach ($users as $user)
        {
            echo $user->name." : ".$user->email."<br/><br/>" ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createUser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return "user created successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        echo $user->name." : ".$user->email."<br/><br/>" ;
        echo "user image path is ".$user->image_path;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userImage = Image::where('o_id',$user->id)->first();
        return view("createUser")->with(["user"=>$user,"userImage"=>$userImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $updatedUser = User::find($user->id);
        $updatedUser->name = $request->name;
        $updatedUser->email = $request->email;
        $updatedUser->password = $request->password;
        $updatedUser->save();
        $imageUpdater = new ImageController ;
        $image = Image::find($request->imageId);
        if ($image) {
            $imageUpdater->update($request,$image);
        }
        return "user updated successfully" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user=User::find($user->id);
        $user->delete();
        $userImage = Image::where('o_id',$user->id)->first();
        if ($userImage) {
            $userImage->delete();
        }
        return "user deleted successfully" ;
    }
}

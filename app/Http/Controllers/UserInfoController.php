<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = auth()->user()->userInfo;
        return view('users.info', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        if ($userInfo->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Wystąpił problem');
        }

        $userInfo->name = $request->name;
        $userInfo->province = '---';
        $userInfo->district = '---';
        $userInfo->city = $request->city;
        $userInfo->community = '---';
        $userInfo->zipCode = $request->zipCode;
        $userInfo->street = $request->street;
        $userInfo->save();
        return redirect()->back()->with('success', 'Dane zostały zaktualizowane');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserInfo $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}

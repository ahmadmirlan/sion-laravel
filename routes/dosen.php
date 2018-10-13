<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('dosen')->user();

    //dd($users);

    return view('dosen.home');
})->name('home');


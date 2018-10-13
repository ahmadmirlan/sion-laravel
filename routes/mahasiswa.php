<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('mahasiswa')->user();

    //dd($users);

    return view('mahasiswa.home');
})->name('home');


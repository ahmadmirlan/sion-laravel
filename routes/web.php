<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'api'], function () {
    Route::get('/update/kehadiran/{request}',
        'ApiAbsensiController@updateKehadiran');

    Route::get('/monoabsensi/{request}',
        'ApiAbsensiController@monoAbsensi');

    Route::get('/cekKelas/{request}',
        'ApiAbsensiController@cekKelas');

    Route::get('/getAllKelas/',
        'ApiAbsensiController@getAllClassRoom');

    Route::get('/getKelas/{request}',
        'ApiAbsensiController@getSingleCLassRoom');

    Route::get('/getVersiKelas',
        'ApiAbsensiController@getClassVersion');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'admin\HomeController@index')->name('admin.index');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');


    Route::group(array('prefix' => 'user'), function (){
        Route::get('/tambah', 'admin\AdminController@create')->name('admin.user.create');
        Route::get('/tampil', 'admin\AdminController@index')->name('admin.user.index');
        Route::post('/store', 'admin\AdminController@store')->name('admin.user.store');
        Route::delete('/destroy/{admin}', 'admin\AdminController@destroy')->name('admin.user.destroy');
    });

    Route::group(array('prefix' => 'prodi'), function (){
        Route::get('/tambah', 'admin\JurusanController@create')->name('admin.prodi.create');
        Route::get('/tampil', 'admin\JurusanController@index')->name('admin.prodi.index');
        Route::post('/store', 'admin\JurusanController@store')->name('admin.prodi.store');
        Route::get('/edit/{jurusan}','admin\JurusanController@edit')->name('admin.prodi.edit');
        Route::match(['patch','put'],'/update/{jurusan}', 'admin\JurusanController@update')->name('admin.prodi.update');
        Route::delete('/destroy/{jurusan}', 'admin\JurusanController@destroy')->name('admin.prodi.destroy');
    });

    Route::group(array('prefix' => 'agama'), function (){
        Route::get('/tambah', 'admin\AgamaController@create')->name('admin.agama.create');
        Route::get('/tampil', 'admin\AgamaController@index')->name('admin.agama.index');
        Route::post('/store', 'admin\AgamaController@store')->name('admin.agama.store');
        Route::get('/edit/{agama}','admin\AgamaController@edit')->name('admin.agama.edit');
        Route::match(['patch','put'],'/update/{agama}', 'admin\AgamaController@update')->name('admin.agama.update');
        Route::delete('/destroy/{agama}', 'admin\AgamaController@destroy')->name('admin.agama.destroy');
    });

    Route::group(array('prefix' => 'mahasiswa'), function (){
        Route::get('/tambah', 'admin\MahasiswaController@create')->name('admin.mahasiswa.create');
        Route::get('/tampil', 'admin\MahasiswaController@index')->name('admin.mahasiswa.index');
        Route::post('/store', 'admin\MahasiswaController@store')->name('admin.mahasiswa.store');
        Route::get('/edit/{mahasiswa}','admin\MahasiswaController@edit')->name('admin.mahasiswa.edit');
        Route::match(['patch','put'],'/update/{mahasiswa}', 'admin\MahasiswaController@update')->name('admin.mahasiswa.update');
        Route::delete('/destroy/{mahasiswa}', 'admin\MahasiswaController@destroy')->name('admin.mahasiswa.destroy');
    });

    Route::group(array('prefix' => 'dosen'), function (){
        Route::get('/tambah', 'admin\DosenController@create')->name('admin.dosen.create');
        Route::get('/tampil', 'admin\DosenController@index')->name('admin.dosen.index');
        Route::post('/store', 'admin\DosenController@store')->name('admin.dosen.store');
        Route::get('/edit/{dosen}','admin\DosenController@edit')->name('admin.dosen.edit');
        Route::match(['patch','put'],'/update/{dosen}', 'admin\DosenController@update')->name('admin.dosen.update');
        Route::delete('/destroy/{dosen}', 'admin\DosenController@destroy')->name('admin.dosen.destroy');
    });

    Route::group(array('prefix' => 'matakuliah'), function (){
        Route::get('/tambah', 'admin\MatakuliahController@create')->name('admin.matakuliah.create');
        Route::get('/tampil', 'admin\MatakuliahController@index')->name('admin.matakuliah.index');
        Route::post('/store', 'admin\MatakuliahController@store')->name('admin.matakuliah.store');
        Route::get('/edit/{matakuliah}','admin\MatakuliahController@edit')->name('admin.matakuliah.edit');
        Route::match(['patch','put'],'/update/{matakuliah}', 'admin\MatakuliahController@update')->name('admin.matakuliah.update');
        Route::delete('/destroy/{matakuliah}', 'admin\MatakuliahController@destroy')->name('admin.matakuliah.destroy');
    });

    Route::group(array('prefix' => 'ruangan'), function (){
        Route::get('/tambah', 'admin\RuanganController@create')->name('admin.ruangan.create');
        Route::get('/tampil', 'admin\RuanganController@index')->name('admin.ruangan.index');
        Route::post('/store', 'admin\RuanganController@store')->name('admin.ruangan.store');
        Route::get('/edit/{ruangan}','admin\RuanganController@edit')->name('admin.ruangan.edit');
        Route::match(['patch','put'],'/update/{ruangan}', 'admin\RuanganController@update')->name('admin.ruangan.update');
        Route::delete('/destroy/{ruangan}', 'admin\RuanganController@destroy')->name('admin.ruangan.destroy');
    });

    Route::group(array('prefix' => 'kelas'), function (){
        Route::get('/tambah', 'admin\KelasController@create')->name('admin.kelas.create');
        Route::get('/tambahMahasiswa/{kelas}', 'admin\KelasController@tambahMahasiswa')->name('admin.kelas.tambahMahasiswa');
        Route::post('/tambahMahasiswaStore', 'admin\KelasController@tambahMahasiswaStore')->name('admin.kelas.tambahMahasiswaStore');
        Route::delete('/hapusMahasiswa/{kelas}/{mahasiswa}', 'admin\KelasController@hapusMahasiswa')->name('admin.kelas.hapusMahasiswa');
        Route::get('/tampil', 'admin\KelasController@index')->name('admin.kelas.index');
        Route::get('/detail/{kelas}', 'admin\KelasController@show')->name('admin.kelas.view');
        Route::post('/store', 'admin\KelasController@store')->name('admin.kelas.store');
        Route::get('/edit/{kelas}','admin\KelasController@edit')->name('admin.kelas.edit');
        Route::post('/edit/kehadiran','admin\KelasController@editKehadiran')->name('admin.kelas.editKehadiran');
        Route::match(['patch','put'],'/update/{kelas}', 'admin\KelasController@update')->name('admin.kelas.update');
        Route::match(['patch','put'],'/update/kehadiran/{kelas}/{pertemuan}', 'admin\KelasController@updateKehadiran')->name('admin.kelas.updateKehadiran');
        Route::delete('/destroy/{kelas}', 'admin\KelasController@destroy')->name('admin.kelas.destroy');
    });
});

Route::group(['prefix' => 'dosen'], function () {

    Route::get('/', 'dosen\HomeController@index')->name('dosen.index');

    Route::get('/login', 'DosenAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'DosenAuth\LoginController@login');
  Route::get('/logout', 'DosenAuth\LoginController@logout')->name('dosen.logout');

    Route::match(['patch','put'],'/update/kehadiran/{kelas}/{pertemuan}', 'dosen\KelasController@updateKehadiran')->name('dosen.kelas.updateKehadiran');
    Route::post('/kelas/edit/kehadiran','dosen\KelasController@editKehadiran')->name('dosen.kelas.editKehadiran');
    Route::get('/kelas/detail/{kelas}', 'dosen\KelasController@detail')->name('dosen.kelas.detail');
    Route::get('/kelas/tampil', 'dosen\KelasController@index')->name('dosen.kelas.index');
    Route::get('/kelas/detail/kehadiran', 'dosen\KelasController@kehadiran')->name('dosen.kehadiran');
});

Route::group(['prefix' => 'mahasiswa'], function () {

  Route::get('/', 'mahasiswa\HomeController@index')->name('mahasiswa.index');
  Route::get('/login', 'MahasiswaAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'MahasiswaAuth\LoginController@login');
  Route::get('/logout', 'MahasiswaAuth\LoginController@logout')->name('mahasiswa.logout');

  Route::get('/kelas/detail/{mahasiswa}', 'mahasiswa\KelasController@detail')->name('mahasiswa.kelas.detail');
  Route::get('/kehadiran', 'mahasiswa\KelasController@kehadiran')->name('mahasiswa.kehadiran');

});

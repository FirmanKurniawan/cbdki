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
Route::get('/images/{filename}', function ($filename)
{
    $path = storage_path('images') . '/' . $filename;
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
});
 
Route::get('/admin', function () {
    return view('admin.welcome');
});
Route::get('/admin/korwil', function(){
    return view('admin.Fkorwil.korwil');
});
Route::get('/admin/korwil2', function(){
    return view('admin.Fkorwilmember.korwilmember');
});
Route::get('/admin/gallery', function(){
    return view('admin.gallery');
});
Route::get('/admin/gallery2', function(){
    return view('admin.gallery2');
});
Route::get('/admin/visimisi', function(){
    return view('admin.visimisi');
});
Route::get('/admin/newsletter', function(){
    return view('admin.newsletter');
});
Route::get('/admin/contact', function(){
    return view('admin.contact');
});
Route::get('/admin/footer',function(){
    return view('admin.footer');
});
Route::get('/admin/about',function(){
    return view('admin.about');
});
Route::get('/admin/merchandise',function(){
    return view('admin.merchandise.index');
});
Route::get('/admin/merchandise/add',function(){
    return view('admin.merchandise.add');
});
Route::get('/admin/merchandise/edi/{id}',function(){
    return view('admin.merchandise.edit');
});
Route::get('/admin/history',function(){
    return view('admin.history');
});
//Merchandise
    Route::get('/merchandise', 'MerchandiseController@indexmerchandise');
    Route::get('/merchandise/add', 'MerchandiseController@addmerchandise');
    Route::post('/merchandise/save', 'MerchandiseController@savemerchandise');
    Route::get('/admin/merchandise/edit/{id}', 'MerchandiseController@editmerchandise');
    Route::post('/admin/merchandise/update', 'MerchandiseController@updatemerchandise');
    Route::get('/merchandise/delete/{id}', 'MerchandiseController@deletemerchandise');
//NEWSLETTER
Route::get('/admin/newsletter', 'NewsletterController@index');
Route::get('/admin/newsletter/delete/{id}', 'NewsletterController@delete');
Route::post('/admin/newsletter/save', 'NewsletterController@save');
//contact
Route::get('/admin/contact', 'ContactController@index');
Route::get('/admin/contact/delete/{id}', 'ContactController@delete');
Route::post('/admin/contact/save', 'ContactController@save');
//Member
    Route::get('/admin/member', 'MemberController@index');
    Route::get('/admin/member/add', 'MemberController@add');
    Route::post('/admin/member/save', 'MemberController@save');
    Route::get('/admin/member/edit/{id}', 'MemberController@edit');
    Route::post('/admin/member/update', 'MemberController@update');
    Route::get('/admin/member/delete/{id}', 'MemberController@delete');
    //User
    Route::get('/admin/user', 'UserController@index');
    Route::get('/admin/user/add', 'UserController@add');
    Route::post('/admin/user/save', 'UserController@save');
    Route::get('/admin/user/edit/{id}', 'UserController@edit');
    Route::post('/admin/user/update', 'UserController@update');
    Route::get('/admin/user/delete/{id}', 'UserController@delete');
    Route::get('/ubah-password','UserController@index');
    Route::post('/ubah-password','UserController@update');
//Berita
    Route::get('/admin/berita', 'BeritaController@pagiindex');
    Route::get('/admin/berita/add', 'BeritaController@add');
    Route::post('/admin/berita/save', 'BeritaController@save');
    Route::get('/admin/berita/edit/{id}', 'BeritaController@edit');
    Route::post('/admin/berita/update', 'BeritaController@update');
    Route::get('/admin/berita/delete/{id}', 'BeritaController@delete');
 
//PROFILE
Route::get('/admin/profile', 'ProfileController@all');
Route::post('/admin/profile/update/{id}', 'ProfileController@update');
Route::post('/admin/footer/update', 'FooterController@update');
Route::post('/admin/about/update', 'AboutController@update');
Route::post('/admin/history/update', 'HistoryController@update');
 
Route::post('/admin/footer/update', 'FooterController@update');
Route::post('/admin/about/update', 'AboutController@update');
 
Auth::routes();
 
Route::get('/admin', 'HomeController@welcome');
 
Route::prefix('admin111')->group(function(){
    Route::get('/', 'VisimisiController@indexvisimisi');
    Route::get('/misi/add', 'VisimisiController@addmisi');
    Route::post('/misi/save', 'VisimisiController@savemisi');
    Route::get('/misi/edit/{id}', 'VisimisiController@editmisi');
    Route::post('/misi/update', 'VisimisiController@updatemisi');
    Route::get('/misi/delete/{id}', 'VisimisiController@deletemisi');
    
    Route::get('/visi/add', 'VisimisiController@addvisi');
    Route::post('/visi/save', 'VisimisiController@savevisi');
    Route::get('/visi/edit/{id}', 'VisimisiController@editvisi');
    Route::post('/visi/update', 'VisimisiController@updatevisi');
    Route::get('/visi/delete/{id}', 'VisimisiController@deletevisi');
});
Route::group(['prefix' => 'gallery'] , function(){
    Route::get('/', 'GalleryController@indexgallery');
    Route::get('/add', 'GalleryController@addgallery');
    Route::post('/save', 'GalleryController@savegallery');
    Route::get('/delete/{id}', 'GalleryController@deletegallery');
});
Route::group(['prefix' => 'gallery2'] , function(){
    Route::get('/', 'GalleryController@indexgallery2');
    Route::post('/save', 'GalleryController@savegallery2');
    Route::get('/edit/{id}', 'GalleryController@editgallery2');
    Route::post('/update', 'GalleryController@updategallery2');
    Route::get('/delete/{id}', 'GalleryController@deletegallery2');
});
Route::group(['prefix' => 'korwil'] , function(){
    Route::get('/', 'KorwilController@indexkorwil');
    Route::post('/save', 'KorwilController@savekorwil');
    Route::get('/edit/{id}', 'KorwilController@editkorwil');
    Route::post('/update', 'KorwilController@updatekorwil');
    Route::get('/delete/{id}', 'KorwilController@deletekorwil');
});
Route::group(['prefix' => 'korwil2'] , function(){
    Route::get('/', 'KorwilController@indexkorwilmember');
    Route::post('/save', 'KorwilController@savekorwilmember');
    Route::get('/edit/{id}', 'KorwilController@editkorwilmember');
    Route::post('/update', 'KorwilController@updatekorwilmember');
    Route::get('/delete/{id}', 'KorwilController@deletekorwilmember');
});
Route::post('/admin/visimisi/update', 'VisimisiController@visimisi_update');
Route::get('/', function() {
    return view('index');
});
Route::get('/about', function() {
    return view('about');
});
Route::get('/contact', function() {
    return view('contact');
});
Route::get('/member', function() {
    return view('member');
});
Route::get('/member2', function() {
    return view('member2');
});
Route::get('/merchandise', function() {
    return view('merchandise');
});
Route::get('/berita', 'BeritaController@pagi');
Route::get('berita-detail/{id}','BeritaController@baca');
Route::get('member2/search2', 'MemberController@search2');
Route::get('member/search', 'MemberController@search');
Route::get('search2/{id}', 'MemberController@search2');
Route::get('autocomplete', 'MemberController@autocomplete')->name('autocomplete');
<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Http\Controllers\Website\Auth\AuthController;
use App\Http\Controllers\Website\Home\HomeController;
use App\Http\Controllers\Website\About\AboutController;
use App\Http\Controllers\Website\Search\SearchController;
use App\Http\Controllers\Website\Contact\ContactController;
use App\Http\Controllers\Website\Enquiry\EnquiryController;
use App\Http\Controllers\Website\Package\PackageController;
use App\Http\Controllers\Website\PDF\UserInfoPdfController;
use App\Http\Controllers\Website\Auth\ForgetPasswordController;
use App\Http\Controllers\Website\ShortList\ShortListController;
use App\Http\Controllers\Website\UserDashboard\ProfileController;
use App\Http\Controllers\Website\PaymentController\PayUController;
use App\Http\Controllers\Admin\UserManagement\UserMasterController;
use App\Http\Controllers\Website\PackageInfo\PackageInfoController;
use App\Http\Controllers\Website\ViewProfile\ViewProfileController;
use App\Http\Controllers\Website\MatchProfile\MatchProfileController;
use App\Http\Controllers\Website\Transaction\UserTransactionController;
use App\Http\Controllers\Website\UserDashboard\Gallery\GalleryController;
use App\Http\Controllers\Admin\Payments\PayUPayments\PayUPaymentController;
use App\Http\Controllers\Website\UserDashboard\PartnerPreferenceController;
use App\Http\Controllers\Website\DynamicDropDown\CountryStateCityController;
use App\Http\Controllers\Website\Members\MemberController;
use App\Http\Controllers\Website\Profile\Basicdetails\BasicDetailController;
use App\Http\Controllers\Website\Profile\FamilyDetails\FamilyDetailsController;
use App\Http\Controllers\Website\Profile\NativeDetails\NativeDetailsController;
use App\Http\Controllers\Website\Profile\HoroscopeDetails\HoroscopeDetailsController;
use App\Http\Controllers\Website\Profile\ReligiousDetails\ReligiousDetailsController;
use App\Http\Controllers\Website\Profile\ProfessionalDetails\ProfessionalDetailsController;
use App\Http\Controllers\Website\PartnerPreference\BasicPreference\BasicPreferenceController;
use App\Http\Controllers\Website\PartnerPreference\ReligiousPreference\ReligiousPreferenceController;
use App\Http\Controllers\Website\PartnerPreference\ProfessionalPreference\ProfessionalPreferenceController;
use App\Http\Controllers\Website\PrivacyPolicy\PrivacyPolicyController;
use App\Http\Controllers\Website\RefundPolicy\RefundPolicyController;
use App\Http\Controllers\Website\TermsAndConditions\TermsController;
use App\Http\Controllers\Website\UserDashboard\DocumentUploadController;

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

// WEBSITE PAGES
Route::get('/', [HomeController::class, 'index'])->name('Home');

Route::get('/about', [AboutController::class, 'index'])->name('About');
Route::get('/search', [SearchController::class, 'index'])->name('Search');
Route::get('/packages', [PackageController::class, 'index'])->name('Package');
Route::get('/contact', [ContactController::class, 'index'])->name('Contact');
Route::get('/enquiry', [EnquiryController::class, 'index'])->name('Enquiry');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('Privacy.Policy');
Route::get('/terms-and-conditions', [TermsController::class, 'index'])->name('Terms.Condition');
Route::get('/refund-policy', [RefundPolicyController::class, 'index'])->name('Refund.Policy');

// USER REGISTRATION
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/login',  [AuthController::class, 'index'])->name('user.login');
Route::post('login', [AuthController::class, 'login'])->name('sign.in');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');

// AUTH ROUTES => USER DASHBOARD
Route::group(['middleware' => ['is_paid', 'is_member'], 'prefix' => 'user-panel'], function () {


    Route::get('user/profiles', [MemberController::class, 'index'])->name('profile');
    /***** USER DASHBOARD ROUTES START *****/

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');

    /***** USER DASHBOARD ROUTES END *****/

    /****** UPDATE PROFILE SECTION ROUTES START ******/

    // ==> USER IMAGE UPDATE
    Route::post('userImageUpdate/{id}', [BasicDetailController::class, 'userImageUpdate'])->name('userImage.update');

    // ==> USER IMAGE DELETE
    Route::get('userImageDelete/{id}', [BasicDetailController::class, 'userImageDelete'])->name('userImage.delete');

    // ==> USER VIEW PROFILE & EDIT PROFILE
    Route::resource('user-Profile', ProfileController::class, ['names' => 'user.profile']);

    // ==> USER BASIC DETAILS
    Route::resource('userBasicDetails', BasicDetailController::class, ['names' => 'profile.basic']);

    // ==> USER FAMILY DETAILS
    Route::resource('userFamilyDetails', FamilyDetailsController::class, ['names' => 'profile.familyInfo']);

    // ==> USER NATIVE INFO DETAILS
    Route::resource('usernativeDetails', NativeDetailsController::class, ['names' => 'profile.nativeInfo']);

    // ==> USER PROFESSIONAL DETAILS
    Route::resource('userProfDetails', ProfessionalDetailsController::class, ['names' => 'profile.professionalInfo']);

    // ==> USER RELIGIOUS DETAILS
    Route::resource('userReligiousDetails', ReligiousDetailsController::class, ['names' => 'profile.religiousInfo']);

    // ==> USER HOROSCOPE DETAILS
    Route::resource('userHoroscopeDetails', HoroscopeDetailsController::class, ['names' => 'profile.horoscopeInfo']);
    Route::put('rasi-katam-update/{id}', [HoroscopeDetailsController::class, 'userRasiKatamUpdate'])->name('userRasiKatamUpdate');
    Route::put('navamsam-katam-update/{id}', [HoroscopeDetailsController::class, 'userRasiNavamsamUpdate'])->name('userRasiNavamsamUpdate');
    Route::post('jathakam-image-upload/{id}', [HoroscopeDetailsController::class, 'updateHoroscopeImage'])->name('updateUserHoroscopeImage');

    // ==> PDF GENERATE FOR USER INFO  /generate-pdf/{id}
    Route::get('/generate-pdf/{id}', [UserInfoPdfController::class, 'generateUserInfoPDF'])->name('generate-pdf');

    /***** UPDATE PROFILE SECTION ROUTES END *****/

    /***** PARTNER PREFERENCES SECTION ROUTES START *****/

    // USER DASHBOARD => PARTNER PREFERENCE
    Route::get('partnerPreferences/{id}', [PartnerPreferenceController::class, 'show'])->name('user.preference');

    // BASIC PARTNER PREFERENCE
    Route::resource('updateBasicPreference', BasicPreferenceController::class, ['names' => 'basic.preference']);

    // PARTNER PROFESSIONAL PREFERENCE
    Route::resource('updateProfPreference', ProfessionalPreferenceController::class, ['names' => 'professional.preference']);

    // PARTNER RELIGIOUS PREFERENCE
    Route::resource('updateReligiousPreference', ReligiousPreferenceController::class, ['names' => 'religious.preference']);

    /***** PARTNER PREFERENCES ROUTES SECTION END *****/

    /* PROFILE MATCH */
    //USER DASHBOARD => NEW MATCH FOUND
    Route::get('match', [MatchProfileController::class, 'matchProfile'])->name('user.matches');

    //USER SHORTLISTS
    //USER DASHBOARD => SHORTLIST
    Route::get('/myShortlist/{id}', [ShortListController::class, 'show'])->name('user.shortlists');
    Route::post('add-to-shortlist', [ShortListController::class, 'create'])->name('user.add_to_shortlists');
    Route::post('remove-from-shortlist', [ShortListController::class, 'remove'])->name('user.remove_from_shortlists');

    /**** TRANSACTION ROUTES */
    Route::get('/userTransaction/{id}', [UserTransactionController::class, 'index'])->name('user.transaction');

    /**** TRANSACTION ROUTES */
    /**** GALLERY SECTION ROUTES */
    Route::resource('myGallery', GalleryController::class, ['names' => 'user.gallery']);
    Route::post('myGallery/{id}', [GalleryController::class, 'userImageUpload'])->name('userImage.upload');
    /**** GALLERY SECTION ROUTES */

    /* PROFILE PACKAGE INFO */
    //USER DASHBOARD => PACKAGE INFO
    Route::get('package/{id}', [PackageInfoController::class, 'show'])->name('user.packageinfo');
    Route::resource('packages', PackageController::class, ['names' => 'purchaseNew']);

    // ADD TO SHORTLIST FROM SEARCH RESULT
    Route::get('/addToShortList/{id}', [ShortListController::class, 'addToShortList'])->name('addShortList');
    Route::get('/removeShortlist/{id}', [ShortListController::class, 'removeShortlist'])->name('removeShortList');

    // VIEW PROFILE
    Route::resource('viewProfile', ViewProfileController::class, ['names' => 'viewprofile']);

    //Document Upload Section
    Route::resource('/upload-Document', DocumentUploadController::class, ['names' => 'document.upload']);
    Route::post('/upload-Medical-Certificate/{id}', [DocumentUploadController::class, 'uploadMedicalCertificate'])->name('medical.certificate');
    Route::post('/upload-Tenth-Certificate/{id}', [DocumentUploadController::class, 'uploadTenthCertificate'])->name('tenth.certificate');
    Route::post('/upload-Twelth-Certificate/{id}', [DocumentUploadController::class, 'uploadTwelthCertificate'])->name('twelth.certificate');
    Route::post('/upload-TC-Certificate/{id}', [DocumentUploadController::class, 'uploadCollegeTc'])->name('tc.certificate');
});

// FORGET PASSWORD ROUTES
Route::any('/user-password-reset', [ForgetPasswordController::class, 'userpasswordReset'])->name('userpassword.reset');
Route::any('/user/password/reset/update/{token}', [ForgetPasswordController::class, 'userpassResetUpdate'])->name('user.resetupdate');

/* ===================== ROUTES FOR SEARCH ========================== */

// SEARCH OPTIONS
Route::any('/search-by-profile-id', [SearchController::class, 'profile_id_search'])->name('profile_id.search');
Route::post('basic-search', [SearchController::class, 'basic_search'])->name('basic.search');
Route::post('advanced-search', [SearchController::class, 'advanced_search'])->name('advanced.search');

// SEARCH PROFILE RESULTS
Route::view('/search-results', 'Website.SearchResults')->name('search.results');

/* ===================== ROUTES FOR DYNAMIC DROPDOWNS ========================== */

Route::get('get-caste', [CountryStateCityController::class, 'getCaste'])->name('getCaste');

Route::get('get-star', [CountryStateCityController::class, 'getStar'])->name('getStar');

// GET STATES BY COUNTRY
Route::get('get-states', [CountryStateCityController::class, 'getStates'])->name('getStates');

//GET CITY BY STATE
Route::get('get-cities', [CountryStateCityController::class, 'getCities'])->name('getCities');
/* ===================== ROUTES FOR PAYMENT ========================== */

Route::group(['prefix' => 'user', 'as' => 'user.payments.'], function () {

    //routes section of pay-u money
    Route::get('/payU-money/{id}/checkout', [PayUController::class, 'index'])->name('payU-Checkout');
    Route::get('/payNow', [PayUController::class, 'payNow'])->name('pay-Now');
    Route::get('/payU-money/paid-success', [PayUController::class, 'payusuccess'])->name('payU.paymentDone');
    //url for success response
    Route::post('/payU-money/success', [PayUController::class, 'success'])
        ->name('payU.paymentSuccess')
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    //url for success failed response
    Route::post('/payU-money/failed', [PayUController::class, 'failed'])
        ->name('payU.paymentFailure')
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    //routes end section of pay-u money
});

/* ===================== END ROUTES FOR PAYMENT ========================== */

Route::get('/loginPage', function () {
    return view('Website.Auth.login');
});

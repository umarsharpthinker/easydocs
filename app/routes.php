<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
 * ===========================================================================
 * Public Routes
 * ===========================================================================
 */
Route::group(['namespace' => 'App\Controllers\CommunitySite'],function () {

    Route::group(['Public'],function (){
        /**
         * HomeController Routes
         */
        Route::group(['Home'],function (){
            Route::get('/', 'HomeController@index');

            Route::group(['domain' => '{companyDomain}.ep.loc'], function ($companyDomain) {
                Route::get('companyHome', array('as'=>'showCompanyHomePage','uses'=>'HomeController@showCompanyHomePage'));
            });

            Route::get('fetchDoctorDutyAndFeeInfo', array('as'=>'fetchDoctorDutyAndFeeInfo','uses'=>'HomeController@fetchDoctorDutyAndFeeInfo'));
            Route::get('home', array('as'=>'home','uses'=>'HomeController@index'));
            Route::get('about', array('as'=>'about','uses'=>'HomeController@showAbout'));
            Route::get('services', array('as'=>'services','uses'=>'HomeController@showServices'));
            Route::get('contacts', array('as'=>'contacts','uses'=>'HomeController@showContacts'));
            Route::post('sendContactUsMail', array('as'=>'sendContactUsMail','uses'=>'HomeController@sendContactUsMail'));
            Route::get('create', ['as'=>'create','uses'=>'AppointmentsController@create']);
        });

        Route::group(['PublicSearch'],function () {
            Route::resource('publicsearch', 'PublicSearchController');
            Route::get('fetchDoctorsSpecialties', array('as'=>'fetchDoctorsSpecialties','uses'=>'PublicSearchController@fetchDoctorsSpecialties'));
            Route::get('fetchDoctorDetails/{id}', array('as'=>'fetchDoctorDetails','uses'=>'PublicSearchController@fetchDoctorDetails'));
            Route::get('fetchDoctors/{name}', array('as'=>'fetchDoctors','uses'=>'PublicSearchController@fetchDoctors'));
            Route::post('searchAllDoctors', array('as'=>'searchAllDoctors','uses'=>'PublicSearchController@searchAllDoctors'));
            Route::post('commentOnDoctors', array('as'=>'commentOnDoctors','uses'=>'PublicSearchController@commentOnDoctors'));
            Route::post('searchDoctors', array('as'=>'searchDoctors','uses'=>'PublicSearchController@searchDoctors'));
            Route::get('fetchTopDoctors', ['as'=>'fetchTopDoctors','uses'=>'PublicSearchController@fetchTopDoctors']);
            Route::get('giveRating', array('as' => 'giveRating', 'uses' => 'PublicSearchController@giveRating'));
            Route::get('index', array('as'=>'index','uses'=>'PublicSearchController@index'));

        });
    });
});

Route::group(['Public'],function (){
    /**
     * AuthController Routes
     */
    Route::get('login', array('as'=>'login','uses'=>'AuthController@showLogin'));
    Route::post('doLogin', array('as'=>'doLogin','uses'=>'AuthController@doLogin'));
    Route::get('unauthorized', array('as'=>'unauthorized','uses'=>'AuthController@unauthorized'));


    /**
     * RemindersController Routes
     */
    Route::get('remind', array('as'=>'remind','uses'=>'RemindersController@getRemind'));
    Route::controller('password', 'RemindersController');
});


/**
 * ===========================================================================
 * Private Routes
 * ===========================================================================
 */
Route::group(['Private', 'before' => 'auth'],function (){
    /**
     * AuthController Routes
     */
    Route::get('logout', array('before' => 'auth', 'as'=>'logout','uses'=>'AuthController@logout'));

    /**
     * DashboardsController Routes
     */
    Route::get('show-dashboard', array('as'=>'showDashboard', 'uses' =>'DashboardsController@showDashboard'));

    /**
     * HomeController Routes
     */
    Route::group(['Home'],function (){

        Route::get('adminHome', array('as'=>'adminHome','uses'=>'HomeController@showAdminHome'));
        Route::any('doctorHome', array('before' => 'Doctor', 'as'=>'doctorHome', 'uses' => 'HomeController@showDoctorHome'));
        Route::get('receptionistHome', array('before' => 'Receptionist', 'as'=>'receptionistHome', 'uses' => 'HomeController@showReceptionistHome'));
        Route::get('labManagerHome', array('before' => 'Lab', 'as'=>'labManagerHome', 'uses' => 'HomeController@showLabManagerHome'));
        Route::get('accountantHome', array('before' => 'Accountant','as' => 'accountantHome', 'uses' => 'HomeController@showAccountantHome'));
    });


    /**
     * TimeSlotsController Routes
     */
    Route::get('getSlots', 'TimeSlotsController@getFreeSlots');
    Route::resource('timeSlots', 'TimeSlotsController');


    /**
     * UsersController Routes
     */
    Route::any('uploadProfilePic', array('as' => 'uploadProfilePic', 'uses' => 'UsersController@uploadProfilePic'));
    Route::resource('users', 'UsersController');


    /**
     * RolesController Routes
     */
    Route::resource('roles', 'RolesController');



    /**
     * CompaniesController Routes
     */
    Route::resource('companies', 'CompaniesController');


    /**
     * CompaniesController Routes
     */
    Route::resource('doctors', 'DoctorsController');

    /**
     * PatientsController Routes
     */
    Route::get('patientsReporting', ['as'=>'patientsReporting', 'uses'=>'PatientsController@patientsReporting']);
    Route::resource('patients', 'PatientsController');


    /**
     * MedicinesController Routes
     */
    Route::resource('medicines', 'MedicinesController');


    /**
     * FamilyHistoriesController Routes
     */
    Route::resource('familyHistories', 'FamilyHistoriesController');


    /**
     * PreviousDiseasesController Routes
     */
    Route::resource('previousDiseases', 'PreviousDiseasesController');


    /**
     * AllergiesController Routes
     */
    Route::resource('allergies', 'AllergiesController');


    /**
     * DrugUsagesController Routes
     */
    Route::resource('drugUsages', 'DrugUsagesController');


    /**
     * VitalSignsController Routes
     */
    Route::resource('vital_signs', 'VitalSignsController');


    /**
     * DutyDaysController Routes
     */
    Route::resource('dutyDays', 'DutyDaysController');


    /**
     * AppointmentsController Routes
     */
    Route::group(['Appointments'],function () {
        Route::resource('appointments', 'AppointmentsController');
        Route::get('vitalSign', array('as'=>'vitalSign', 'uses' => 'AppointmentsController@fetchVitalSign'));
        Route::get('appPrescription',  array('as'=>'appPrescription', 'uses' => 'AppointmentsController@addPrescriptions'));
        Route::get('showTestReports', ['as'=>'showTestReports','uses'=>'AppointmentsController@showTestReports']);
        Route::get('addCheckUpFee', ['as'=>'addCheckUpFee','uses'=>'AppointmentsController@addCheckUpFee']);
        Route::get('addTestFee', ['as'=>'addTestFee','uses'=>'AppointmentsController@addTestFee']);
        Route::get('printTestReports', ['as'=>'printTestReports','uses'=>'AppointmentsController@printTestReports']);
        Route::get('checkupFeeInvoice', ['as'=>'checkupFeeInvoice','uses'=>'AppointmentsController@checkupFeeInvoice']);
        Route::get('testFeeInvoice', ['as'=>'testFeeInvoice','uses'=>'AppointmentsController@testFeeInvoice']);
        Route::get('fetchTimeSlotsAndBookedAppointments',['as'=>'fetchTimeSlotsAndBookedAppointments','uses' => 'AppointmentsController@fetchTimeSlotsAndBookedAppointments']);
        Route::get('fetchAppointmentsByPatientId', array('as'=>'fetchAppointmentsByPatientId', 'uses' => 'AppointmentsController@fetchAppointmentsByPatientId'));
    });


    /**
     * PrescriptionsController Routes
     */
    Route::group(['Prescriptions'],function () {
        Route::resource('prescriptions', 'PrescriptionsController');
        Route::get('patientPrescriptions/{patientId}', array('before' => 'auth', 'as' => 'patientPrescriptions', 'uses' => 'PrescriptionsController@patientPrescriptions'));
        Route::get('printPrescription/{id}', ['as' => 'printPrescription', 'uses' => 'PrescriptionsController@printPrescription']);
        Route::any('uploadCheckUpPic', array('as' => 'uploadCheckUpPic', 'uses' => 'PrescriptionsController@uploadCheckUpPic'));
        Route::any('deleteCheckUpPic', array('as' => 'deleteCheckUpPic', 'uses' => 'PrescriptionsController@deleteCheckUpPic'));
        Route::get('followUpPrescriptions', array('as' => 'followUpPrescriptions', 'uses' => 'PrescriptionsController@followUpPrescriptions'));

    });


    /**
     * PrescriptionsController Routes
     */
    Route::group(['VitalSigns'],function () {
        Route::resource('vital_signs', 'VitalSignsController');
        Route::resource('vitalSigns', 'VitalSignsController');
        Route::get('create', array('as' => 'create', 'uses' => 'VitalSignsController@create'));
        Route::get('vitalSignFetchHistory', array('as' => 'vitalSignFetchHistory', 'uses' => 'VitalSignsController@vitalSignFetchHistory'));
        Route::get('show/{patientId}', array('before' => 'auth', 'as' => 'show', 'uses' => 'VitalSignsController@show'));
        Route::get('fetchVitalSignsByPatientId', array('as' => 'fetchVitalSignsByPatientId', 'uses' => 'VitalSignsController@fetchVitalSignsByPatientId'));



//        Route::get('create', array('before' => 'auth', 'as' => 'create', 'uses' => 'VitalSingsController@create'));

    });

});


/**
 * Testing Route
 */
Route::get('testing', function(){

/*//    echo Route::getCurrentRoute()->getActionName();die;
    echo Route::getCurrentRoute()->getActionName();die;
    print_r(get_class_methods(Route::getCurrentRoute()));die;*/

    return  Redirect::route('showCompanyHomePage', array("ep-clinic"));
    //App\Globals\Ep::checkUpPrescrptionDirectory();die;
});

/**
 * Inventory Module Routes
 */

Route::group(['namespace' => 'App\Controllers\Inventory'],function () {



    /**
     * ===========================================================================
     * Private Routes
     * ===========================================================================
     */
    Route::group(['Private', 'before' => 'auth'],function (){

        /**
         * MedicinePurchasesController Routes
         */
        Route::resource('medicinePurchases','MedicinePurchasesController');

        /**
         * MedicineSalesController Routes
         */
        Route::resource('medicineSales','MedicineSalesController');

        /**
         * MedicineStocksController Routes
         */
        Route::resource('medicineStocks','MedicineStocksController');

        /**
         * MedicineLocationsController Routes
         */
        Route::resource('medicineLocations','MedicineLocationsController');

        /**
         * MedicineMenufacturersController Routes
         */
        Route::resource('medicineMenufacturers','MedicineMenufacturersController');

        /**
         * MedicineCategoryController Routes
         */
        Route::resource('medicineCategories','MedicineCategoriesController');

    });



    /**
     * ===========================================================================
     * Public Routes
     * ===========================================================================
     */
    Route::group(['Public'],function () {

    });


});

Route::get('test', function () {
    $ParentId = 1;
    $controllers = \App\Globals\Ep::getAllEpControllers();
    echo '<pre>';
    print_r($controllers);
    $class = new ReflectionClass(trim('App\Controllers\CommunitySite\HomeController'));
    var_dump($class);
//    die;
    foreach ($controllers as $controller) {

        //*******Add controllers
        $resources[] = [
            'parent_id' => $ParentId,
            'name' => $controller,
            'type' => 'Controller',
        ];

        //*******Add Actions of controllers
        echo $controller .'<br/>';

        $class = new ReflectionClass(($controller));
//        if(class_exists($class) ) continue;
        $cMethods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        $cUniqueMethods = array_unique($cMethods);
        foreach ($cUniqueMethods as $m) {
            if ($m->class == $controller)
                $resources[] = [
                    'parent_id' => $ParentId,
                    'name' => $m->name,
                    'type' => 'Action',
                ];
        }
        $ParentId++;
    }
});

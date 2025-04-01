<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Donor\DonorsController;

Auth::routes();

// Define a route group with the 'donors' prefix
Route::middleware('auth')->group(function () {
    // Index route
    Route::get('/', [DonorsController::class, 'index'])->name('dashboard');

    Route::prefix('donors')->name('donors.')->group(function () {
        Route::get('/label-print-address', [DonorsController::class, 'labelPrintAddress'])->name('labelPrintAddress');
        Route::get('/print-address', [DonorsController::class, 'printAddress'])->name('printAddress');
        // Route to show the donor creation form
        Route::get('/create', [DonorsController::class, 'create'])->name('create');

        // Route to store a new donor
        Route::post('/store', [DonorsController::class, 'store'])->name('store');

        // Route to import donors from an Excel file
        Route::post('/import', [DonorsController::class, 'import'])->name('import');

        // Route to view all donors
        Route::get('/view', [DonorsController::class, 'viewAll'])->name('view');

        // Route to view details of a single donor
        Route::get('/{donor}/all-details', [DonorsController::class, 'donorDetails'])->name('donardetails');

        // Route to add a donation amount for a donor
        Route::post('/{donor}/donation', [DonorsController::class, 'donationAmt'])->name('donationAmt');

        // Route to remove a donation
        Route::get('/{donation}/remove', [DonorsController::class, 'otherAction'])->name('otheraction');

        // Route to search for donors
        Route::get('/search', [DonorsController::class, 'searchable'])->name('search');

        // Route to add family members to a donor
        Route::post('/{donor}/add-family', [DonorsController::class, 'addfamily'])->name('addfamily');

        // Route to remove a family member
        Route::get('/family/{family}', [DonorsController::class, 'removeFamily'])->name('removeFamily');

        // Route to remove a donor
        Route::get('/{donor}', [DonorsController::class, 'removeDonor'])->name('removeDonor');
        Route::post('/search', [DonorsController::class, 'searchable'])->name('searchable');
    });
});

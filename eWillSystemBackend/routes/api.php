<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BurialDetialController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\CreditorController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\DependantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ExecutorController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\PaymentController; //payment
use App\Http\Controllers\ShareController;
use App\Http\Controllers\SpouseController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WitnessController;
use App\Http\Controllers\HeirController;
use App\Http\Controllers\OtherRelativeController;
use App\Http\Controllers\OtherPropertyController;
use App\Http\Controllers\PropertyDispositionDetailController;
use App\Http\Controllers\LandDispositionController;
use App\Http\Controllers\HouseDispositionController;
use App\Http\Controllers\LivestockDispositionController;
use App\Http\Controllers\BankaccountDispositionController;
use App\Http\Controllers\VehicleDispositionController;
use App\Http\Controllers\ShareDispositionController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ProfileController;
// use App\Models\Livestock;
// use App\Models\OtherRelative;
use App\Http\Controllers\OptionsCriteriaController;
use App\Http\Controllers\SubPackageController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::group(["middleware" => "auth:sanctum"], function () {
    // Email Verification Routes
    Route::get("/email/verify/{id}/{hash}", function (
        EmailVerificationRequest $request
    ) {
        $request->fulfill();
        return response()->json(["message" => "Email verified successfully."]);
    })->name("verification.verify");

    Route::post("/email/resend", function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return response()->json(["message" => "Verification email sent."]);
    })->name("verification.resend");

    Route::get("fetchdata", [UserController::class, "view"]);
    Route::post("savepersonaldata", [UserController::class, "save"]);
    Route::post("updatepassword", [UserController::class, "passupdate"]);
    Route::post("addchild", [ChildController::class, "store"]);
    Route::post("updaterelative", [ChildController::class, "edit"]);
    Route::post("addspouse", [SpouseController::class, "store"]);
    Route::post("adddependant", [DependantController::class, "store"]);
    Route::post("addheir", [HeirController::class, "store"]);
    Route::post("addotherrelative", [OtherRelativeController::class, "store"]);
    Route::post("removerelative", [ChildController::class, "destroy"]);
    Route::post("adddisposition", [
        PropertyDispositionDetailController::class,
        "store",
    ]);
    Route::post("removedisposition", [
        PropertyDispositionDetailController::class,
        "destroy",
    ]);
    Route::post("addguardian", [GuardianController::class, "store"]);
    Route::post("updateguardian", [GuardianController::class, "edit"]);
    Route::post("removeguardian", [GuardianController::class, "destroy"]);
    Route::post("adddebtor", [DebtorController::class, "store"]);
    Route::post("removedebtor", [DebtorController::class, "destroy"]);
    Route::post("updatedebtor", [DebtorController::class, "edit"]);
    Route::post("addcreditor", [CreditorController::class, "store"]);
    Route::post("removecreditor", [CreditorController::class, "destroy"]);
    Route::post("updatecreditor", [CreditorController::class, "edit"]);
    Route::post("addexecutor", [ExecutorController::class, "store"]);

    Route::post("updateexecutor", [ExecutorController::class, "update"]);

    Route::get("executor", [ExecutorController::class, "index"]);

    Route::post("removeexecutor", [ExecutorController::class, "destroy"]);
    Route::get("witness", [WitnessController::class, "index"]);
    Route::post("addwitness", [WitnessController::class, "store"]);
    Route::post("updatewitness", [WitnessController::class, "update"]);
    Route::post("removewitness", [WitnessController::class, "destroy"]);
    Route::post("addland", [LandController::class, "store"]);
    Route::post("updateland", [LandController::class, "edit"]);
    Route::post("landdisposition", [LandController::class, "update"]);
    Route::post("removeland", [LandController::class, "destroy"]);
    Route::post("addlanddisposition", [
        LandDispositionController::class,
        "store",
    ]);
    Route::get("fetchlanddisposition", [
        LandDispositionController::class,
        "index",
    ]);
    Route::post("landdispositiondetail", [
        LandDispositionController::class,
        "update",
    ]);
    Route::post("editlanddisposition", [
        LandDispositionController::class,
        "edit",
    ]);
    Route::post("removelanddispose", [
        LandDispositionController::class,
        "destroy",
    ]);
    Route::post("addhouse", [HouseController::class, "store"]);
    Route::post("updatehouse", [HouseController::class, "edit"]);
    Route::post("housedisposition", [HouseController::class, "update"]);
    Route::post("removehouse", [HouseController::class, "destroy"]);
    Route::post("addhousedisposition", [
        HouseDispositionController::class,
        "store",
    ]);
    Route::get("fetchhousedisposition", [
        HouseDispositionController::class,
        "index",
    ]);
    Route::post("housedispositiondetail", [
        HouseDispositionController::class,
        "update",
    ]);
    Route::post("edithousedisposition", [
        HouseDispositionController::class,
        "edit",
    ]);
    Route::post("removehousedispose", [
        HouseDispositionController::class,
        "destroy",
    ]);
    Route::post("addlivestock", [LivestockController::class, "store"]);
    Route::post("updatelivestock", [LivestockController::class, "edit"]);
    Route::post("livestockdisposition", [LivestockController::class, "update"]);
    Route::post("removelivestock", [LivestockController::class, "destroy"]);
    Route::post("addlivestockdisposition", [
        LivestockDispositionController::class,
        "store",
    ]);
    Route::post("editlivestockdisposition", [
        LivestockDispositionController::class,
        "edit",
    ]);
    Route::get("fetchlivestockdisposition", [
        LivestockDispositionController::class,
        "index",
    ]);
    Route::post("livestockdispositiondetail", [
        LivestockDispositionController::class,
        "update",
    ]);
    Route::post("removelivestockdispose", [
        LivestockDispositionController::class,
        "destroy",
    ]);
    Route::post("addbankaccount", [BankAccountController::class, "store"]);
    Route::post("bankaccountdisposition", [
        BankAccountController::class,
        "update",
    ]);
    Route::post("updatebankaccount", [BankAccountController::class, "edit"]);
    Route::post("removebankaccount", [BankAccountController::class, "destroy"]);
    Route::post("addbankaccountdisposition", [
        BankaccountDispositionController::class,
        "store",
    ]);
    Route::get("fetchbankaccountdisposition", [
        BankaccountDispositionController::class,
        "index",
    ]);
    Route::post("bankaccountdispositiondetail", [
        BankaccountDispositionController::class,
        "update",
    ]);
    Route::post("removebankaccountdispose", [
        BankaccountDispositionController::class,
        "destroy",
    ]);
    Route::post("addvehicle", [VehicleController::class, "store"]);
    Route::post("updatevehicle", [VehicleController::class, "edit"]);
    Route::post("vehicledisposition", [VehicleController::class, "update"]);
    Route::post("removevehicle", [VehicleController::class, "destroy"]);
    Route::post("addvehicledisposition", [
        VehicleDispositionController::class,
        "store",
    ]);
    Route::get("fetchvehicledisposition", [
        VehicleDispositionController::class,
        "index",
    ]);
    Route::post("vehicledispositiondetail", [
        VehicleDispositionController::class,
        "update",
    ]);
    Route::post("editvehicledisposition", [
        VehicleDispositionController::class,
        "edit",
    ]);
    Route::post("removevehicledispose", [
        VehicleDispositionController::class,
        "destroy",
    ]);
    Route::post("addotherproperty", [OtherPropertyController::class, "store"]);
    Route::post("updateotherproperty", [
        OtherPropertyController::class,
        "edit",
    ]);
    Route::post("otherpropertydisposition", [
        OtherPropertyController::class,
        "update",
    ]);

    Route::post("otherpropertydisposition", [
        OtherPropertyController::class,
        "update",
    ]);
    Route::post("removeotherproperty", [
        OtherPropertyController::class,
        "destroy",
    ]);
    Route::post("addpropertydispositiondetail", [
        PropertyDispositionDetailController::class,
        "store",
    ]);
    Route::get("fetchotherpropertydisposition", [
        PropertyDispositionDetailController::class,
        "index",
    ]);
    Route::post("propertydispositiondetail", [
        PropertyDispositionDetailController::class,
        "update",
    ]);
    Route::post("editpropertydispositiondetail", [
        PropertyDispositionDetailController::class,
        "edit",
    ]);
    Route::post("removepropertydispose", [
        PropertyDispositionDetailController::class,
        "destroy",
    ]);
    Route::post("addshare", [ShareController::class, "store"]);
    Route::post("updateshare", [ShareController::class, "edit"]);
    Route::post("sharedisposition", [ShareController::class, "update"]);
    Route::post("editsharedisposition", [
        ShareDispositionController::class,
        "edit",
    ]);
    Route::post("removeshare", [ShareController::class, "destroy"]);
    Route::post("addsharedisposition", [
        ShareDispositionController::class,
        "store",
    ]);
    Route::get("fetchsharedisposition", [
        ShareDispositionController::class,
        "index",
    ]);
    Route::post("sharedispositiondetail", [
        ShareDispositionController::class,
        "update",
    ]);
    Route::post("removesharedispose", [
        ShareDispositionController::class,
        "destroy",
    ]);
    Route::post("saveburialdata", [BurialDetialController::class, "store"]);
    Route::post("makeapayment", [PaymentController::class, "store"]);
});
Route::get("/viewpackages", [SubPackageController::class, "view"]);

Route::post("login", [UserController::class, "index"])->name("login");
Route::post("register", [UserController::class, "register"])->name("register");
Route::post("checkemail", [UserController::class, "checkemail"]);
Route::post("/send-password-email", [
    UserController::class,
    "sendPasswordEmail",
]); //for default password email

// reset password
//for password reset otp
Route::post("/auth/password-reset/send-otp", [
    ResetPasswordController::class,
    "sendFrontResetOtp",
])->name("send-password-otp"); //valid
Route::post("/verify-otp", [
    ResetPasswordController::class,
    "verifyResetOtp",
])->name("password.otp.verify"); //valid
Route::post("/reset-password", [
    ResetPasswordController::class,
    "resetPassword",
])->name("password.reset");

Route::get("faqs", [FaqController::class, "view"]);
Route::get("knowledgebases", [KnowledgeBaseController::class, "view"]);

Route::post("/request-payment", [PaymentController::class, "requestToPay"]);
Route::get("/payment-status/{referenceId}", [
    PaymentController::class,
    "checkPaymentStatus",
]);
Route::post("/generate-token", [PaymentController::class, "generateToken"]);

Route::get("/options", [OptionsCriteriaController::class, "index"]);
Route::get("/options/{category}", [
    OptionsCriteriaController::class,
    "getOptionsByCategory",
]);
Route::post("/feedback", [FeedbackController::class, "store"]);

Route::post("verifywill", [UserController::class, "verifyNin"]);

Route::get("/showadverts", [AdvertController::class, "view"]);

Route::get("/business", [ProfileController::class, "showbusiness"]);
// Route::get("/business", [ProfileController::class, "business"]);

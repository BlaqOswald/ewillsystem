<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ExcelExportController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WillController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\OptionsCriteriaController;
use App\Http\Controllers\SubPackageController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\RestrictedController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ImageFileController;
use App\Http\Controllers\AdvertController;

//these for admins for users file preview
use App\Http\Controllers\ChildController;
use App\Http\Controllers\SpouseController;
use App\Http\Controllers\DependantController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\OtherRelativeController;
use App\Http\Controllers\CreditorController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\VehicleController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

// Auth::routes();
Auth::routes(["verify" => true]);

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/profile", [ProfileController::class, "index"])->name(
    "profile.index"
);
Route::post("/check-email", [ProfileController::class, "checkEmail"])->name(
    "check.email"
);
Route::post("/register-admin", [ProfileController::class, "register"])->name(
    "register.admin"
);
Route::get("/admins", [ProfileController::class, "admins"])->name(
    "profile.admin"
);
Route::post("/update_admin/{id}", [
    ProfileController::class,
    "updateAdminProfile",
])->name("profile.admin.update");

Route::get("/business", [ProfileController::class, "business"])->name(
    "business.index"
);
Route::post("/business/{id}", [ProfileController::class, "update"])->name(
    "business.update"
);

Route::get("/profile", [ProfileController::class, "index"])->name(
    "profile.index"
);

//for forgot password
// Request reset link
Route::get("forgotpassword", [
    ForgotPasswordController::class,
    "showLinkRequestForm",
])->name("password.request");
Route::post("password/email", [
    ForgotPasswordController::class,
    "sendResetLinkEmail",
])->name("password.email");

// Reset password form
Route::get("password/reset/{token}", [
    ResetPasswordController::class,
    "showResetForm",
])->name("password.reset");
Route::post("password/update", [ResetPasswordController::class, "reset"])->name(
    "password.update"
);

//for password reset otp
Route::post("/auth/password-reset/send-otp", [
    ResetPasswordController::class,
    "sendotp",
])->name("send-password-otp");
Route::post("/profile/verify-otp", [
    ResetPasswordController::class,
    "verifyotp",
])->name("verify-password-otp");

// for password reset
Route::get("/reset-password", function (Request $request) {
    return view("profile.reset-password", [
        "email" => $request->query("email"),
    ]);
})->name("request.password");
Route::post("/auth/password-reset/send-otp", [
    ResetPasswordController::class,
    "sendOtp",
])->name("send-password-otp");
Route::post("/profile/verify-otp", [
    ResetPasswordController::class,
    "verifyOtp",
])->name("verify-password-otp");
Route::post("/reset-password", [
    ResetPasswordController::class,
    "passwordReset",
])->name("reset.password");

// for otp login verification
Route::post("/admin/login", [LoginController::class, "sendLoginOtp"])->name(
    "send-otp-mail"
);
Route::post("/verify-otp", [LoginController::class, "verifyOtp"])->name(
    "verify-login-otp"
);

// Role Management
Route::get("/roles", [AdminRoleController::class, "showUsersWithRoles"])->name(
    "roles.index"
);
Route::post("/users/assign-role", [
    AdminRoleController::class,
    "assignRole",
])->name("users.assignRole");
Route::post("/roles/store", [AdminRoleController::class, "storeRole"])->name(
    "roles.store"
);
Route::post("/roles/update/{id}", [
    AdminRoleController::class,
    "updateRole",
])->name("roles.update");
Route::delete("/roles/delete/{id}", [
    AdminRoleController::class,
    "deleteRole",
])->name("roles.delete");

// Permissions Management
Route::get("/permissions", [AdminPermissionController::class, "index"])->name(
    "permissions.index"
);
Route::post("/permissions/assign", [
    AdminPermissionController::class,
    "assignPermissions",
])->name("permissions.assign");
Route::post("/permissions/store", [
    AdminPermissionController::class,
    "storePermission",
])->name("permissions.store");
Route::delete("/permissions/{id}", [
    AdminPermissionController::class,
    "destroy",
])->name("permissions.destroy");
Route::get("/admin/roles/{roleId}/permissions", [
    AdminPermissionController::class,
    "getPermissionsByRole",
]);

// Admin User Management
Route::post("/users/store", [
    AdminPermissionController::class,
    "createAdmin",
])->name("users.store");
Route::post("/users/update-role", [
    AdminPermissionController::class,
    "updateUserRole",
])->name("users.updateRole");

Route::get("/admin/feedback", [FeedbackController::class, "index"])->name(
    "feedback.index"
);
Route::get("/feedback/{id}", [FeedbackController::class, "show"])->name(
    "feedback.show"
);
Route::post("/store-feedback-reply", [
    FeedbackController::class,
    "share",
])->name("feedback.share");
Route::delete("/feedback/{id}", [FeedbackController::class, "destroy"])->name(
    "feedback.destroy"
);
Route::delete("/feedback/delete/{id}", [
    FeedbackController::class,
    "destroy",
])->name("feedback.destroy");
// Assuming you have admin authentication

Route::get("/faqs", [FaqController::class, "index"]);
Route::get("/showfaqs", [FaqController::class, "show"]);
Route::post("/addfaqs", [FaqController::class, "store"]);
Route::post("/edit_faqs", [FaqController::class, "update"]);
Route::post("/delete_faqs", [FaqController::class, "destroy"]);

Route::get("/knowledgebases", [KnowledgeBaseController::class, "index"]);
Route::get("/showknowledgebases", [KnowledgeBaseController::class, "show"]);
Route::post("/addknowledgebases", [KnowledgeBaseController::class, "store"]);
Route::post("/edit_knowledgebases", [KnowledgeBaseController::class, "update"]);
Route::post("/delete_knowledgebases", [
    KnowledgeBaseController::class,
    "destroy",
]);
Route::post("/update_user/{id}", [
    ProfileController::class,
    "updateAdminProfile",
])->name("update.profiles");
Route::get("/downloadwills", [
    UserController::class,
    "downloadUserDetails",
])->name("downloadwills");
Route::get("/wills", [WillController::class, "index"])->name("wills");
Route::get("/showwills", [WillController::class, "show"])->name("show");
Route::get("/print/{id}", [WillController::class, "view"]);

Route::get("/downloads", [WillController::class, "indexpdf"])->name(
    "downloadindex"
);
Route::get("/showdownloads/{id}", [WillController::class, "showpdf"])->name(
    "downloadshow"
);
Route::get("/will/{userId}/print-data", [
    WillController::class,
    "printUserData",
])->name("downloadprint");
Route::post("/users/deactivate/{id}", [
    WillController::class,
    "deactivateUser",
]);
Route::post("/users/reactivate/{id}", [
    WillController::class,
    "reactivateUser",
]);
Route::get("/filtered-users", [WillController::class, "filteredWills"]); // Returns JSON data
Route::get("/export-users", [ExcelExportController::class, "exportUsers"]);

Route::get("/audit", [AuditController::class, "view"]); // Renders Blade view
Route::get("/showaudit", [AuditController::class, "show"]); // Renders a different Blade view
Route::get("/audit-data", [AuditController::class, "index"]); // Returns JSON data
Route::get("/filtered-data", [AuditController::class, "filteredAudits"]); // Returns JSON data

// field options
Route::get("/options", [OptionsCriteriaController::class, "index"]);
Route::get("/viewoptions", [OptionsCriteriaController::class, "view"]);
Route::get("/showoptions", [OptionsCriteriaController::class, "show"]);
Route::get("/options/{category}", [
    OptionsCriteriaController::class,
    "getOptionsByCategory",
]);
Route::post("/addoptions", [OptionsCriteriaController::class, "store"])->name(
    "optionsCriteria.addoptions"
);
Route::post("/edit_options", [OptionsCriteriaController::class, "update"]);
Route::delete("/options/{id}", [OptionsCriteriaController::class, "destroy"]);

// subscription packages
Route::get("/packages", [SubPackageController::class, "index"])->name(
    "spackages.index"
);
Route::get("/showpackages", [SubPackageController::class, "show"])->name(
    "packages.show"
);
// Displays the form
Route::post("/packages", [SubPackageController::class, "store"])->name(
    "packages.store"
);
Route::get("/packages/{id}/edit", [SubPackageController::class, "edit"])->name(
    "packages.edit"
);
Route::put("/packages/{id}", [SubPackageController::class, "update"])->name(
    "packages.update"
);
Route::post("/packages/{id}", [SubPackageController::class, "destroy"])->name(
    "packages.destroy"
);

Route::get("/files", [ImageFileController::class, "index"]);
Route::post("/files", [ImageFileController::class, "uploadFile"]);

Route::post("/files/{id}", [ImageFileController::class, "deleteFile"])->name(
    "file.delete"
);

Route::get("/children", [ChildController::class, "index"]);
Route::post("/children", [ChildController::class, "store"]);
Route::get("/children/{id}", [ChildController::class, "show"]);
Route::put("/children/{id}", [ChildController::class, "update"]);
Route::delete("/children/{id}", [ChildController::class, "destroy"]);

Route::get("/guardians", [GuardianController::class, "index"]); // List all guardians
Route::post("/guardians", [GuardianController::class, "store"]); // Add a new guardian
Route::get("/guardians/{id}", [GuardianController::class, "show"]); // Show a specific guardian
Route::put("/guardians/{id}", [GuardianController::class, "update"]); // Update a guardian
Route::delete("/guardians/{id}", [GuardianController::class, "destroy"]); // Delete a guardian

Route::get("/dependants", [DependantController::class, "index"]);
Route::post("/dependants", [DependantController::class, "store"]);
Route::get("/dependants/{id}", [DependantController::class, "show"]);
Route::put("/dependants/{id}", [DependantController::class, "update"]);
Route::delete("/dependants/{id}", [DependantController::class, "destroy"]);

Route::get("/debtors", [DebtorController::class, "index"]);
Route::post("/debtors", [DebtorController::class, "store"]);
Route::get("/debtors/{id}/file", [DebtorController::class, "show"]);
Route::put("/debtors/{id}/file", [DebtorController::class, "update"]);
Route::delete("/debtors/{id}/file", [DebtorController::class, "destroy"]);

Route::get("/creditors", [CreditorController::class, "index"]);
Route::post("/creditors", [CreditorController::class, "store"]);
Route::get("/creditors/{id}/file", [CreditorController::class, "show"]);
Route::put("/creditors/{id}/file", [CreditorController::class, "update"]);
Route::delete("/creditors/{id}/file", [CreditorController::class, "destroy"]);

Route::get("/other-relatives", [OtherRelativeController::class, "index"]);
Route::post("/other-relatives", [OtherRelativeController::class, "store"]);
Route::get("/other-relatives/{id}", [OtherRelativeController::class, "show"]);
Route::put("/other-relatives/{id}", [OtherRelativeController::class, "update"]);
Route::delete("/other-relatives/{id}", [
    OtherRelativeController::class,
    "destroy",
]);

Route::get("/spouses", [SpouseController::class, "index"]);
Route::post("/spouses", [SpouseController::class, "store"]);
Route::get("/spouses/{id}", [SpouseController::class, "show"]);
Route::put("/spouses/{id}", [SpouseController::class, "update"]);
Route::delete("/spouses/{id}", [SpouseController::class, "destroy"]);

Route::get("/adverts", [AdvertController::class, "index"]);
Route::get("/showadverts", [AdvertController::class, "show"]);
Route::post("/add_adverts", [AdvertController::class, "store"]);
Route::post("/edit_adverts/{id}", [AdvertController::class, "update"]); // Changed from POST to PUT
Route::post("/delete_adverts/{id}", [AdvertController::class, "destroy"]); // Changed from POST to DELETE

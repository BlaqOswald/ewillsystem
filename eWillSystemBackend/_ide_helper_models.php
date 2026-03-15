<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AdminUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUser query()
 */
	class AdminUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Audit
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Audit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audit query()
 */
	class Audit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BankAccount
 *
 * @property int $id
 * @property string $account_number
 * @property string $bank_name
 * @property string $account_name
 * @property string $branch
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUpdatedAt($value)
 */
	class BankAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BurialDetial
 *
 * @property int $burial_executor
 * @property string $location
 * @property string $Instructions
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial query()
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereBurialExecutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BurialDetial whereUpdatedAt($value)
 */
	class BurialDetial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Business
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Business query()
 */
	class Business extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Categorie
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie query()
 */
	class Categorie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Child
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Child newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Child newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Child query()
 * @method static \Illuminate\Database\Eloquent\Builder|Child whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Child whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Child whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Child whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Child whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Child whereUpdatedAt($value)
 */
	class Child extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Creditor
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property string $amount
 * @property string $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creditor whereUpdatedAt($value)
 */
	class Creditor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Debtor
 *
 * @property int $id
 * @property int $relative_id
 * @property string $amount
 * @property string $description
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Debtor whereUpdatedAt($value)
 */
	class Debtor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Dependant
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dependant whereUpdatedAt($value)
 */
	class Dependant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Executor
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Executor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Executor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Executor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executor whereUpdatedAt($value)
 */
	class Executor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpenseCart
 *
 * @property-read \App\Models\Expense_catergorie|null $rcategory
 * @property-read \App\Models\Expense_item|null $rexpense
 * @method static \Illuminate\Database\Eloquent\Builder|ExpenseCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpenseCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpenseCart query()
 */
	class ExpenseCart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpenseDetail
 *
 * @property-read \App\Models\Expense_catergorie|null $rcategory
 * @property-read \App\Models\Expense_item|null $rexpense
 * @method static \Illuminate\Database\Eloquent\Builder|ExpenseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpenseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpenseDetail query()
 */
	class ExpenseDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExpensePayment
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensePayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpensePayment query()
 */
	class ExpensePayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expense_catergorie
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_catergorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_catergorie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_catergorie query()
 */
	class Expense_catergorie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expense_item
 *
 * @property-read \App\Models\User|null $raddedby
 * @property-read \App\Models\Expense_catergorie|null $rcategory
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_item query()
 */
	class Expense_item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expense_payment
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense_payment query()
 */
	class Expense_payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Expenses
 *
 * @property-read \App\Models\User|null $raddedby
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExpenseDetail> $rdetails
 * @property-read int|null $rdetails_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Expense_payment> $rpaid
 * @property-read int|null $rpaid_count
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expenses query()
 */
	class Expenses extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Guardian
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guardian whereUpdatedAt($value)
 */
	class Guardian extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\House
 *
 * @property int $id
 * @property string $type
 * @property string $category
 * @property string $location
 * @property string $custodian
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|House newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|House newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|House query()
 * @method static \Illuminate\Database\Eloquent\Builder|House whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereCustodian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|House whereUpdatedAt($value)
 */
	class House extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Land
 *
 * @property int $id
 * @property string $address
 * @property string $size
 * @property string $custodian
 * @property string $intrest_type
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Land newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Land newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Land query()
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereCustodian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereIntrestType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereUpdatedAt($value)
 */
	class Land extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\License
 *
 * @property-read mixed $remaining_days
 * @property-read \App\Models\Business|null $rbusiness
 * @method static \Illuminate\Database\Eloquent\Builder|License newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|License newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|License query()
 */
	class License extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Livestock
 *
 * @property int $id
 * @property int $number
 * @property string $location
 * @property string $location_owner
 * @property string $custodian
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereCustodian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereLocationOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Livestock whereUpdatedAt($value)
 */
	class Livestock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OtherPropertyTypes
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OtherPropertyTypes whereUpdatedAt($value)
 */
	class OtherPropertyTypes extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Owner
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 */
	class Owner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment_method
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment_method query()
 */
	class Payment_method extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property-read \App\Models\Role|null $rrole
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pharmacysale
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysale query()
 */
	class Pharmacysale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pharmacysaledetail
 *
 * @property-read \App\Models\User|null $raddedby
 * @property-read \App\Models\Product|null $rproduct
 * @property-read \App\Models\Product_unit|null $runit
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysaledetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysaledetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysaledetail query()
 */
	class Pharmacysaledetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pharmacysalepayment
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysalepayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysalepayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pharmacysalepayment query()
 */
	class Pharmacysalepayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property-read \App\Models\User|null $raddedby
 * @property-read \App\Models\Categorie|null $rcategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stock_level> $runits
 * @property-read int|null $runits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product_unit
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Product_unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product_unit query()
 */
	class Product_unit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PropertyDisposition
 *
 * @property int $id
 * @property int $disposed_to
 * @property int $property_disposed
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition whereDisposedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition wherePropertyDisposed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyDisposition whereUpdatedAt($value)
 */
	class PropertyDisposition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProperyType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProperyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProperyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProperyType query()
 */
	class ProperyType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchase
 *
 * @property-read \App\Models\Categorie|null $rcategory
 * @property-read \App\Models\Product|null $rproduct
 * @property-read \App\Models\Product_unit|null $runit
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchasecart
 *
 * @property-read \App\Models\Categorie|null $rcategory
 * @property-read \App\Models\Product|null $rproduct
 * @property-read \App\Models\Product_unit|null $runit
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasecart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasecart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasecart query()
 */
	class Purchasecart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchasedetails
 *
 * @property-read \App\Models\Categorie|null $rcategory
 * @property-read \App\Models\Product|null $rproduct
 * @property-read \App\Models\Product_unit|null $runit
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasedetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasedetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasedetails query()
 */
	class Purchasedetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchasepayment
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasepayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasepayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchasepayment query()
 */
	class Purchasepayment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Relative
 *
 * @property int $id
 * @property string $name
 * @property string $current_address
 * @property string $phone
 * @property string $date_of_birth
 * @property string $gender
 * @property int $added_by
 * @property int $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Relative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relative query()
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereCurrentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relative whereUpdatedAt($value)
 */
	class Relative extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Salecart
 *
 * @property-read \App\Models\Categorie|null $rcategory
 * @property-read \App\Models\Product|null $rproduct
 * @property-read \App\Models\Product_unit|null $runit
 * @method static \Illuminate\Database\Eloquent\Builder|Salecart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salecart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salecart query()
 */
	class Salecart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Share
 *
 * @property int $id
 * @property string $percentage
 * @property string $bank
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Share newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Share newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Share query()
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereUpdatedAt($value)
 */
	class Share extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Spouse
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spouse whereUpdatedAt($value)
 */
	class Spouse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stock_level
 *
 * @property-read \App\Models\User|null $raddedby
 * @property-read \App\Models\Product|null $rproduct
 * @property-read \App\Models\Product_unit|null $runit
 * @method static \Illuminate\Database\Eloquent\Builder|Stock_level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock_level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock_level query()
 */
	class Stock_level extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Supplier
 *
 * @property-read \App\Models\User|null $raddedby
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $phone
 * @property string $nin
 * @property string $tribe
 * @property string $clan
 * @property string $gender
 * @property string $father
 * @property string $mother
 * @property string $date_of_birth
 * @property string $original_address
 * @property string $current_address
 * @property string $marital_status
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Business|null $rbusiness
 * @property-read \App\Models\Permission|null $rpermissions
 * @property-read \App\Models\Role|null $rrole
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFather($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMother($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOriginalAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vehicle
 *
 * @property int $id
 * @property string $name
 * @property string $number_plate
 * @property string $model
 * @property string $color
 * @property string $type
 * @property string $custodian
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereCustodian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereNumberPlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vehicle whereUpdatedAt($value)
 */
	class Vehicle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Witness
 *
 * @property int $id
 * @property int $relative_id
 * @property int $status
 * @property int $added_by
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Witness newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Witness newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Witness query()
 * @method static \Illuminate\Database\Eloquent\Builder|Witness whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Witness whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Witness whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Witness whereRelativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Witness whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Witness whereUpdatedAt($value)
 */
	class Witness extends \Eloquent {}
}


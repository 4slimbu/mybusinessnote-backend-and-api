<?php

namespace App\Models;

use App\Traits\Authenticable;
use Illuminate\Database\Eloquent\Model;

class BusinessOption extends Model
{
    use Authenticable;

    public $uploadDirectory = 'images/business-options/';
    protected $fillable = [
        'level_id',
        'section_id',
        'parent_id',
        'name',
        'slug',
        'content',
        'element',
        'tooltip',
        'menu_order',
        'weight',
    ];

    //each can have a parent

    public static function elements()
    {
        return [
            'GettingStartedHome'      => 'GettingStartedHome',
            'BusinessCategories'      => 'BusinessCategories',
            'SellGoods'               => 'SellGoods',
            'RegisterUser'            => 'RegisterUser',
            'CreateBusiness'          => 'CreateBusiness',
            'RegisterBusiness'        => 'RegisterBusiness',
            'Logo'                    => 'Logo',
            'Tagline'                 => 'Tagline',
            'BrandColor'              => 'BrandColor',
            'SocialMediaRegistration' => 'SocialMediaRegistration',
            'FinancingOption'         => 'FinancingOption',
            'InitialAccountSoftware'  => 'InitialAccountSoftware',
            'BusinessBanking'         => 'BusinessBanking',
            'MerchantFacilities'      => 'MerchantFacilities',
            'BusinessEmailSetUp'      => 'BusinessEmailSetUp',
            'PhoneSetUp'              => 'PhoneSetUp',
            'QuickOfficeSetUp'        => 'QuickOfficeSetUp',
            'SetUpInternet'           => 'SetUpInternet',
            'OfficeAccessories'       => 'OfficeAccessories',
            'SWOT'                    => 'SWOT',
            'CustomerAnalysis'        => 'CustomerAnalysis',
            'DemographicArea'         => 'DemographicArea',
            'SocialMediaExecution'    => 'SocialMediaExecution',
            'Budget'                  => 'Budget',
            'LegalAdviser'            => 'LegalAdviser',
            'EmploymentContracts'     => 'EmploymentContracts',
            'AwardWages'              => 'AwardWages',
            'HrPolicy'                => 'HrPolicy',
            'BookKeeping'             => 'BookKeeping',
            'CashFlowForecasting'     => 'CashFlowForecasting',
            'OfficeSpace'             => 'OfficeSpace',
            'StoreLease'              => 'StoreLease',
            'NeedHardware'            => 'NeedHardware',
        ];
    }

    //Each can have multiple children
    public function parent()
    {
        return $this->belongsTo(BusinessOption::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BusinessOption::class, 'parent_id');
    }

    public function business()
    {
        return $this->belongsToMany(Business::class)->withPivot("status");
    }

    public function businessCategories()
    {
        return $this->belongsToMany(BusinessCategory::class);
    }

    public function affiliateLinks()
    {
        return $this->belongsToMany(AffiliateLink::class)->withPivot("label");
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function businessMetas()
    {
        return $this->hasMany(BusinessMeta::class);
    }

    public function next()
    {
        if ($currentUser = $this->getAuthUser()) {
            $nextBusinessOption = $currentUser->business->businessOptions()
                ->where('menu_order', '>', $this->menu_order)
                ->where('status', '!=', 'irrelevant')
                ->first();
        } else {
            $nextBusinessOption = BusinessOption::where('menu_order', '>', $this->menu_order)->first();
        }

        return $nextBusinessOption;
    }

    public function previous()
    {
        if ($currentUser = $this->getAuthUser()) {
            $nextBusinessOption = $currentUser->business->businessOptions()
                ->where('menu_order', '<', $this->menu_order)
                ->where('status', '!=', 'irrelevant')
                ->orderBy('menu_order', 'desc')
                ->first();
        } else {
            $nextBusinessOption = BusinessOption::where('menu_order', '<', $this->menu_order)
                ->orderBy('menu_order', 'desc')->first();
        }

        return $nextBusinessOption;
    }

    public function getStatus()
    {
        if ($currentUser = $this->getAuthUser()) {
            if ($relatedBusiness = $this->business()->where('id', $currentUser->business->id)->first()) {
                return $relatedBusiness->pivot->status;
            }
        }

        return null;
    }

}

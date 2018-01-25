<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessOption extends Model
{
    protected $fillable = [
        'section_id',
        'parent_id',
        'name',
        'slug',
        'content',
        'element',
        'tooltip',
        'weight'
    ];

    //each can have a parent
    public function parent()
    {
        return $this->belongsTo(BusinessOption::class, 'parent_id');
    }

    //Each can have multiple children
    public function children() {
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
        return $this->belongsToMany(AffiliateLink::class);
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

    public static function elements()
    {
        return [
            'GettingStartedHome' => 'GettingStartedHome',
            'BusinessCategories' => 'BusinessCategories',
            'SellGoods' => 'SellGoods',
            'RegisterUser' => 'RegisterUser',
            'CreateBusiness' => 'CreateBusiness',
            'RegisterBusiness' => 'RegisterBusiness',
            'Logo' => 'Logo',
            'Tagline' => 'Tagline',
            'BrandColor' => 'BrandColor',
            'SocialMediaRegistration' => 'SocialMediaRegistration',
            'FinancingOption' => 'FinancingOption',
            'InitialAccountSoftware' => 'InitialAccountSoftware',
            'BusinessBanking' => 'BusinessBanking',
            'MerchantFacilities' => 'MerchantFacilities',
            'BusinessEmailSetUp' => 'BusinessEmailSetUp',
            'PhoneSetUp' => 'PhoneSetUp',
            'QuickOfficeSetUp' => 'QuickOfficeSetUp',
            'SetUpInternet' => 'SetUpInternet',
            'OfficeAccessories' => 'OfficeAccessories',
            'SWOT' => 'SWOT',
            'CustomerAnalysis' => 'CustomerAnalysis',
            'DemographicArea' => 'DemographicArea',
            'SocialMediaExecution' => 'SocialMediaExecution',
            'Budget' => 'Budget',
            'LegalAdviser' => 'LegalAdviser',
            'EmploymentContracts' => 'EmploymentContracts',
            'AwardWages' => 'AwardWages',
            'HrPolicy' => 'HrPolicy',
            'BookKeeping' => 'BookKeeping',
            'CashFlowForecasting' => 'CashFlowForecasting',
            'OfficeSpace' => 'OfficeSpace',
            'StoreLease' => 'StoreLease',
            'NeedHardware' => 'NeedHardware',
        ];
    }

}

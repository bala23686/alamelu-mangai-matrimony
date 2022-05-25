<?php

namespace App\View\Composers;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use Illuminate\View\View;

class AdminComposer
{

    protected $companyInfo;

    /**
     * Create a new profile composer.
     *
     * @param  null
     * @return void
     */
    public function __construct()
    {
        $this->commonData = CompanySettingHelper::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('company', $this->commonData);
    }
}

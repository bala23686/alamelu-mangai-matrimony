<?php

namespace App\Traits\Model\ProductSetting;

use App\Models\ProductSetting\ProductSetting;

trait SettingHelperTrait
{

    /**
     * save function
     * this  methode update of product setting table company values
     * Has high Performance issuse use this function has minimum as possibale
     * @return bool
     */
    public function save(): bool
    {
        foreach ($this->fillable as $setting) {

            ProductSetting::where('setting_name', $setting)
                ->update(["value" => $this->$setting]);
        }

        return 1;
    }
    /**
     * all function
     * this static method returns new instance of product setting table company values
     * @return self
     */
    public static function all(): self
    {
        return new self;
    }
}


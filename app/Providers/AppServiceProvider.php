<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Lunar\Admin\Support\Facades\LunarPanel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
         LunarPanel::register();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Override the default price formatter
        $this->app->bind(
            \Lunar\Pricing\DefaultPriceFormatter::class,
            \App\Lunar\Pricing\CustomPriceFormatter::class
        );

        // Ensure we have defaults before registering
        try {
            $currency = \Lunar\Models\Currency::getDefault();
            $taxClass = \Lunar\Models\TaxClass::getDefault();

            if ($currency && $taxClass) {
                \Lunar\Facades\ShippingManifest::addOption(
                    new \App\Lunar\DataTypes\CustomShippingOption(
                        name: 'Entrega en Campus',
                        description: 'Entrega en su ubicación dentro del campus',
                        identifier: 'campus-delivery',
                        price: new \Lunar\DataTypes\Price(0, $currency, 1),
                        taxClass: $taxClass
                    )
                );
            }
        } catch (\Exception $e) {
            // Log or ignore if DB not ready (e.g. during migration)
        }
    }
}

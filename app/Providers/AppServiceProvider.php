<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Atoms\HealthIcon;
use App\View\Components\Atoms\CostIndicator;
use App\View\Components\Atoms\StatusBadge;
use App\View\Components\Molecules\MedicationCard;
use App\View\Components\Molecules\CostComparison;
use App\View\Components\Utilities\HighContrastToggle;
use App\View\Components\TraumaInformed\GentleButton;
use App\View\Components\TestComponent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register custom components
        Blade::component('components.atoms.health-icon', HealthIcon::class);
        Blade::component('components.atoms.cost-indicator', CostIndicator::class);
        Blade::component('components.atoms.status-badge', StatusBadge::class);
        Blade::component('components.molecules.medication-card', MedicationCard::class);
        Blade::component('components.molecules.cost-comparison', CostComparison::class);
        Blade::component('components.utilities.high-contrast-toggle', HighContrastToggle::class);
        Blade::component('components.trauma-informed.gentle-button', GentleButton::class);
        Blade::component('test-component', TestComponent::class);
    }
}

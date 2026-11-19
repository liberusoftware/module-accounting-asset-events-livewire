<?php

declare(strict_types=1);

use Illuminate\Auth\Access\AuthorizationException;
use Liberu\Accounting\AssetEventsLivewire\AssetEventsLivewireServiceProvider;
use Liberu\Accounting\AssetEventsLivewire\Livewire\AssetEvents;
use Liberu\Accounting\Erp\Models\User;
use Livewire\Livewire;

it('renders accounting-asset-events-livewire livewire components', function (): void {
    $provider = $this->app->register(AssetEventsLivewireServiceProvider::class, force: true);
    if (method_exists($provider, 'boot')) { $provider->boot(); }
    expect($provider)->toBeInstanceOf(AssetEventsLivewireServiceProvider::class);


    $this->actingAs(User::factory()->create());

    $component = new AssetEvents;
    if (method_exists($component, 'mount')) { $component->mount(); }
    expect($component->render())->not->toBeNull();
});

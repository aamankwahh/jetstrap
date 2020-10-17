<?php

namespace NascentAfrica\Jetstrap\Tests;

use NascentAfrica\Jetstrap\JetstrapFacade;

class BootstrapFourCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Set default to Bootstrap 4
        JetstrapFacade::bootstrap4();
    }

    /** @test */
    public function livewire_swapped()
    {
        // Run the make command
        $this->artisan('jetstrap:swap:bootstrap-4 livewire')
            ->expectsOutput('Bootstrap scaffolding swapped for livewire successfully.')
            ->expectsOutput('Please execute the "npm install && npm run dev" command to build your assets.')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicLivewireTests();
    }

    /** @test */
    public function inertia_swapped()
    {
        // Run the make command
        $this->artisan('jetstrap:swap:bootstrap-4 inertia')
            ->expectsOutput('Bootstrap scaffolding swapped for inertia successfully.')
            ->expectsOutput('Please execute the "npm install && npm run dev" command to build your assets.')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicInertiaTests();
    }

    /** @test */
    public function livewire_swapped_with_teams()
    {
        // Run the make command
        $this->artisan('jetstrap:swap:bootstrap-4 livewire --teams')
            ->expectsOutput('Bootstrap scaffolding swapped for livewire successfully.')
            ->expectsOutput('Please execute the "npm install && npm run dev" command to build your assets.')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicLivewireTests();
        $this->livewireTeamTests();
    }

    /** @test */
    public function inertia_swapped_teams()
    {
        // Run the make command
        $this->artisan('jetstrap:swap:bootstrap-4 inertia --teams')
            ->expectsOutput('Bootstrap scaffolding swapped for inertia successfully.')
            ->expectsOutput('Please execute the "npm install && npm run dev" command to build your assets.')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicInertiaTests();
        $this->inertiaTeamTests();
    }

    /** @test */
    public function livewire_core_ui_swap()
    {
        JetstrapFacade::useCoreUi3();

        // Run the make command
        $this->artisan('jetstrap:swap:bootstrap-4 livewire')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicLivewireTests();
    }

    /** @test */
    public function inertia_core_ui_swap()
    {
        JetstrapFacade::useCoreUi3();

        // Run the make command
        $this->artisan('jetstrap:swap:bootstrap-4 inertia')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicInertiaTests();
    }
}

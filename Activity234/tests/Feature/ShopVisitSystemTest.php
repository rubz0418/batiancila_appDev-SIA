<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopVisitSystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_item_crud_pages_are_available(): void
    {
        $item = Item::create([
            'shop_name' => 'Hinunangan Craft Corner',
            'description' => 'Local craft supplier',
            'location' => 'Poblacion',
            'purpose' => 'Checked supplies for a small household project.',
            'time_on_site' => '30 minutes',
            'visit_date' => '2026-04-10',
            'image' => 'images/shops/mr-diy.png',
        ]);

        $this->get(route('items.index'))->assertOk()->assertSee('Hinunangan Craft Corner');
        $this->get(route('items.create'))->assertOk()->assertSee('Add a shop visit');
        $this->get(route('items.show', $item))->assertOk()->assertSee('Local craft supplier');
        $this->get(route('items.edit', $item))->assertOk()->assertSee('Edit Hinunangan Craft Corner');
    }

    public function test_item_store_validates_and_saves_database_record(): void
    {
        $this->post(route('items.store'), [
            'shop_name' => 'Visit Lane Essentials',
            'description' => 'Household goods shop',
            'location' => 'Labrador',
            'purpose' => 'Recorded shop layout notes and checked the general visit details.',
            'time_on_site' => '45 minutes',
            'visit_date' => '2026-04-11',
        ])->assertRedirect(route('items.index'));

        $this->assertDatabaseHas('items', [
            'shop_name' => 'Visit Lane Essentials',
            'location' => 'Labrador',
        ]);
    }

    public function test_custom_input_form_displays_validation_errors(): void
    {
        $this->from(route('form.create'))
            ->post(route('form.store'), [
                'full_name' => 'Al',
                'email' => 'not-an-email',
                'age' => 15,
                'barangay' => '',
                'visit_focus' => '',
                'preferred_date' => '2020-01-01',
                'message' => 'short',
            ])
            ->assertRedirect(route('form.create'))
            ->assertSessionHasErrors(['full_name', 'email', 'age', 'barangay', 'visit_focus', 'preferred_date', 'message']);
    }

    public function test_custom_input_form_accepts_valid_submission(): void
    {
        $this->post(route('form.store'), [
            'full_name' => 'Ruben Shop Visitor',
            'email' => 'ruben@example.com',
            'age' => 21,
            'barangay' => 'Poblacion',
            'visit_focus' => 'store-observation',
            'preferred_date' => now()->addDay()->format('Y-m-d'),
            'message' => 'I want to record observations from a local shop visit.',
        ])
            ->assertRedirect(route('form.create'))
            ->assertSessionHas('success');
    }
}

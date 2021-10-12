<?php

namespace DetosphereLtd\LaravelFaqs\Tests\Actions;

use DetosphereLtd\LaravelFaqs\Actions\DeleteFAQAction;
use DetosphereLtd\LaravelFaqs\Models\Faq;
use DetosphereLtd\LaravelFaqs\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteFAQActionTest extends TestCase
{
    use RefreshDatabase;

    protected DeleteFAQAction $action;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(DeleteFAQAction::class);
    }

    public function test_deletes_a_faq()
    {
        $faq = Faq::factory()->create();

        $this->action->execute($faq);

        $this->assertDatabaseCount('faqs', 1);

        $this->assertSoftDeleted($faq);
    }
}

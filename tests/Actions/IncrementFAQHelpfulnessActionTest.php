<?php

namespace DetosphereLtd\LaravelFaqs\Tests\Actions;

use DetosphereLtd\LaravelFaqs\Actions\IncrementFAQHelpfulnessAction;
use DetosphereLtd\LaravelFaqs\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DetosphereLtd\LaravelFaqs\Tests\TestCase;

class IncrementFAQHelpfulnessActionTest extends TestCase
{
    use RefreshDatabase;

    protected IncrementFAQHelpfulnessAction $action;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(IncrementFAQHelpfulnessAction::class);
    }

    public function test_increments_helpful_yes()
    {
        $faq = Faq::factory()->create();

        $this->action->execute($faq, 'yes');

        $this->assertEquals(1, $faq->fresh()->helpful_yes);
    }

    public function test_increments_helpful_no()
    {
        $faq = Faq::factory()->create();

        $this->action->execute($faq, 'no');

        $this->assertEquals(1, $faq->fresh()->helpful_no);
    }
}

<?php

namespace DetosphereLtd\LaravelFaqs\Tests\Actions;

use DetosphereLtd\LaravelFaqs\Actions\IncrementFAQHelpfulnessAction;
use DetosphereLtd\LaravelFaqs\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DetosphereLtd\LaravelFaqs\Tests\TestCase;
use Illuminate\Database\QueryException;

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

    public function test_throws_query_exception_if_invalid_helpfulness_is_submitted()
    {
        $faq = Faq::factory()->create();

        try {
            $this->action->execute($faq, 'invalid');

            $this->fail('Expected query exception to be thrown');
        } catch (QueryException $exception) {
            $this->assertTrue(true, 'Query exception was thrown as expected');
        }
    }
}

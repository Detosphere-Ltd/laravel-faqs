<?php

namespace DetosphereLtd\LaravelFaqs\Tests\Actions;

use DetosphereLtd\LaravelFaqs\Actions\UpdateFAQAction;
use DetosphereLtd\LaravelFaqs\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DetosphereLtd\LaravelFaqs\Tests\TestCase;

class UpdateFAQActionTest extends TestCase
{
    use RefreshDatabase;

    protected UpdateFAQAction $action;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(UpdateFAQAction::class);
    }

    public function test_updates_a_faq_in_the_database()
    {
        $faq = Faq::factory()->create();

        $this->action->execute($faq, [
            'question' => 'What does your app do?',
            'answer' => 'It helps manage Frequently asked questions on any application.',
            'type' => 'type'
        ]);

        tap($faq->fresh(), function ($faq) {
            $this->assertEquals('What does your app do?', $faq->question);
            $this->assertEquals('It helps manage Frequently asked questions on any application.', $faq->answer);
            $this->assertEquals('type', $faq->type);
        });
    }
}

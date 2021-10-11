<?php

namespace DetosphereLtd\LaravelFaqs\Tests\Actions;

use DetosphereLtd\LaravelFaqs\Actions\CreateFAQAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DetosphereLtd\LaravelFaqs\Tests\TestCase;

class CreateFAQActionTest extends TestCase
{
    use RefreshDatabase;

    protected CreateFAQAction $action;

    public function setUp(): void
    {
        parent::setUp();

        $this->action = app(CreateFAQAction::class);
    }

    public function test_creates_a_faq()
    {
        $this->action->execute([
            'question' => 'What does your app do?',
            'answer' => 'It helps manage Frequently asked questions on any application.',
            'type' => 'type'
        ]);

        $this->assertDatabaseCount('faqs', 1);

        $this->assertDatabaseHas('faqs', [
            "question" => 'What does your app do?',
            "answer" => 'It helps manage Frequently asked questions on any application.',
            "type" => 'type',
            "helpful_yes" => 0,
            "helpful_no" => 0,
        ]);
    }
}

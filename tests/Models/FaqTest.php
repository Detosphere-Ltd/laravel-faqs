<?php

namespace DetosphereLtd\LaravelFaqs\Tests\Models;

use DetosphereLtd\LaravelFaqs\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DetosphereLtd\LaravelFaqs\Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    public function test_filters_faq_by_type()
    {
        $foundFaq = Faq::factory()->create(['type' => 'type-1']);

        $notFoundFaq = Faq::factory()->create(['type' => 'type']);

        $results = Faq::type('type-1')->get();

        $this->assertCount(1, $results);

        $this->assertTrue($results->contains('question', $foundFaq->question));

        $this->assertFalse($results->contains('question', $notFoundFaq->question));
    }
}

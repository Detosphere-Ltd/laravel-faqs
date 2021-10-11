<?php

namespace DetosphereLtd\LaravelFaqs\Actions;

use DetosphereLtd\LaravelFaqs\Models\Faq;

class IncrementFAQHelpfulnessAction
{
    /**
     * Increment helpfulness
     *
     * @param \DetosphereLtd\LaravelFaqs\Models\Faq $faq
     * @param string $helpfulness
     */
    public function execute(Faq $faq, string $helpfulness)
    {
        $faq->increment('helpful_' . $helpfulness);
    }
}

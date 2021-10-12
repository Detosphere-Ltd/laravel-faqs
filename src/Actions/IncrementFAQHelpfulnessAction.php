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
     *
     * @return \DetosphereLtd\LaravelFaqs\Models\Faq;
     *
     * @throws \Illuminate\Database\QueryException
     */
    public function execute(Faq $faq, string $helpfulness)
    {
        $faq->increment('helpful_' . $helpfulness);

        return $faq->fresh();
    }
}

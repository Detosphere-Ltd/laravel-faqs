<?php

namespace DetosphereLtd\LaravelFaqs\Actions;

use DetosphereLtd\LaravelFaqs\Models\Faq;

class DeleteFAQAction
{
    /**
     * Delete faq
     *
     * @param \DetosphereLtd\LaravelFaqs\Models\Faq $faq
     * @return void
     */
    public function execute(Faq $faq)
    {
        $faq->delete();
    }
}

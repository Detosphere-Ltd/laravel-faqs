<?php

namespace DetosphereLtd\LaravelFaqs\Actions;

use DetosphereLtd\LaravelFaqs\Models\Faq;

class CreateFAQAction
{
    /**
     * Create new faq
     *
     * @param array $data
     * @return \App\Models\Faq
     */
    public function execute(array $data)
    {
        return Faq::create($data);
    }
}

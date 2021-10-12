<?php

namespace DetosphereLtd\LaravelFaqs\Actions;

use DetosphereLtd\LaravelFaqs\Models\Faq;
use Illuminate\Support\Arr;

class UpdateFAQAction
{
    /**
     * update an faq
     *
     * @param \DetosphereLtd\LaravelFaqs\Models\Faq $faq
     * @param array $data
     *
     * @return \DetosphereLtd\LaravelFaqs\Models\Faq
     */
    public function execute(Faq $faq, array $data)
    {
        $faq->update(Arr::except($data, ['created_by']));

        return $faq->fresh();
    }
}

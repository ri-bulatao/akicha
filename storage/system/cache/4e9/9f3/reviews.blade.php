<?php 
/* C:\laragon\www\test\themes\tastyigniter-orange/_pages/default\reviews.blade.php */
class Pagic661e6a4876555433040585_ac89501ad4179225ee102f157169e5d4Class extends \Main\Template\Code\PageCode
{

public function onStart()
{
    if (!View::shared('showReviews')) {
        flash()->error(lang('igniter.local::default.review.alert_review_disabled'))->now();

        return Redirect::to($this->controller->pageUrl($this['localReview']->property('redirectPage')));
    }
}

}

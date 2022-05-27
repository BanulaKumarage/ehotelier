<?php

class HotelReview extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Rating');
    }

    public function rateAction() {
        if ($_POST) {
            $this->RatingModel->rate($_POST);
            Router::redirect('HotelReview/rate');
        } else {
            $this->view->ratings = $this->RatingModel->getRatings();
            $this->view->render('rating/rate');
        }
    }

}
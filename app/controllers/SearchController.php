<?php

class SearchController extends BaseController {

    public function showSearchResults()
    {
        $searchString = Input::get('searchString');
        $searchBy = Input::get('searchBy');



        return View::make('pages.search_result')
            ->with('searchString',$searchString)
            ->with('searchBy',$searchBy);
    }

}

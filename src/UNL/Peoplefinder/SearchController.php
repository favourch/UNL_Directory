<?php
class UNL_Peoplefinder_SearchController
{
    public $options = array('q'           => '',
                            'affiliation' => '');
    
    /**
     * The search results
     * @var UNL_Peoplefinder_SearchResults
     */
    public $results;

    public function __construct($options = array())
    {
        $this->options = $options + $this->options;

        $search_method = 'getExactMatches';

        if (is_numeric(str_replace(array('-', '(', ')'),
                                   array('',  '',  ''),
                                   $this->options['q']))) {
            // Phone number search
            $search_method = 'getPhoneMatches';
        } elseif (isset($this->options['sn']) || isset($this->options['cn'])) {
            // Detailed search
            $search_method = 'getAdvancedSearchMatches';
            $this->options['q'] = array(
                'sn' => $this->options['sn'],
                'cn' => $this->options['cn']);
        } else {
            // Standard text search, run exact matches first.
        }

        if (!is_array($this->options['q'])
            && strlen($this->options['q']) <= 3) {
            throw new UNL_Peoplefinder_InvalidArgumentException('Too few characters were entered.');
        }

        $this->results = new UNL_Peoplefinder_SearchResults(
            $this->options + array('results'=>
            $this->options['peoplefinder']->$search_method($this->options['q'], $this->options['affiliation'])));
    }
}
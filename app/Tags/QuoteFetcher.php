<?php

namespace App\Tags;

use Statamic\Tags\Tags;

class QuoteFetcher extends Tags
{
    /**
     * The {{ quote_fetcher }} tag.
     *
     * @return string|array
     */
    public function index()
    {
        $quotes = collect([
			[
				'author' => 'Ron Swanson',
				'quotes' => [
					"The greatest glory in living lies not in never falling, but in rising every time we fall.",
					"The way to get started is to quit talking and begin doing.",
					"Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking.",
					"The future belongs to those who believe in the beauty of their dreams."
				]
			],
			[
				'author' => 'Michael Scott',
				'quotes' => [ 'Howzit' ]
			],
		]);

		$limit = $this->params->int('limit', 1);
		$author = $this->params->get('author', 'Michael Scott');

		$filtered_quotes = $quotes->where( 'author', $author )->first();


		return $filtered_quotes['quotes'][array_rand($filtered_quotes['quotes'])];
    }

}

<?php

namespace App\Traits\Model;

trait SearchTrait
{

	public function scopeSearch($query, $to_search = '', $fields = [])
	{

		$exclude_search_words = ['a', 'e', 'o', 'da', 'de', 'do', 'dos', 'na', 'nas', 'em', 'um'];

		/**
		 * Merge colunas das tabelas pra buscar com as colunas passada na query
		 */
		if(property_exists($this, 'collumns_to_search'))
		{
			if(is_array($this->collumns_to_search))
			{
				$fields = array_unique(array_merge($fields, $this->collumns_to_search));
			}
		}

		/**
		 *  Merge as palavras que sÃ£o para excluir da busca
		 */
		if(property_exists($this, 'exclude_from_search'))
		{
			if(is_array($this->exclude_from_search))
			{
				$exclude_search_words = array_unique(array_merge($exclude_search_words, $this->exclude_from_search));
			}
		}


		/**
		 * Verifica dados incorretos. Se existir, retorna a query sem passar pela busca
		 */
		if($to_search == '' 		||
			$fields == [] 			||
			!is_string($to_search)  ||
			!is_array($fields) 		||
			count($fields) < 1) {
			return $query;
		}

		$words = explode(' ', $to_search);


		$query->where(function($query) use ($words, $fields, $exclude_search_words) {

			foreach ($words as $word) {

				if(!in_array($word, $exclude_search_words))
				{
					foreach ($fields as $attr) {

						$query->orWhere($attr, 'LIKE', '%' . $word . '%');
					}
				}

			}

		});

		return $query;
	}

}

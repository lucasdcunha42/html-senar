<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $table = "search_logs";

    protected $fillable = ['search_query','path', 'status', 'count'];

     /**
     * Registra uma consulta de pesquisa, incrementando a contagem se já existir.
     *
     * @param string $searchQuery
     * @param string $path
     * @return SearchLog
     */
    public static function registerSearch($searchQuery, $path, $status)
    {
        // Tenta encontrar um registro com a consulta de pesquisa existente
        $searchLog = self::where('search_query', $searchQuery)->first();

        if ($searchLog) {
            // Se existir, incrementa a contagem e atualiza o caminho
            $searchLog->count++;
            $searchLog->path = $path;
            $searchLog->status = $status;
            $searchLog->save();
        } else {
            // Se não existir, cria um novo registro
            $searchLog = self::create([
                'search_query' => $searchQuery,
                'count' => 1,
                'path' => $path,
                'status' => $status,
            ]);
        }

        return $searchLog;
    }
}

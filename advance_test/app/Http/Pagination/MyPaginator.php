<?php
namespace App\Http\Pagination;


use Illuminate\Contracts\Pagination\Paginator;


class MyPaginator
{
    private $paginator;


    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }


    public function link()
    {
        $prev = $this->paginator->currentPage() == 1 ?
            ' disabled' : '';
        $next = $this->paginator->currentPage() == 
            $this->paginator->count() ? ' disabled' : '';
        $result = '<div class="pagination" role="navigation">';
        $result .= '<span class="page-item' . $prev . 
            '"><a class="page-link" href="' . 
            $this->paginator->previousPageUrl() . 
            '"><前ページ[</a></span>';
        $result .= '<span class="page-item disabled">' .
            '<a class="page-link">'. 
            $this->paginator->currentPage() . '</a>ページ目</span>';
        $result .= '<span class="page-item' . $next . 
            '"><a class="page-link" href="' . 
            $this->paginator->nextPageUrl() . 
            '">]次ページ></a></span>';
        $result .= '</div>';
        return $result;
    }
}
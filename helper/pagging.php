<?php
function get_pagging($num_page, $page, $base_url = '')
{
    $str_pagging = "<ul class='pagination home-product__pagination'>";
    if ($page > 1) {
        $page_prev = $page - 1;
        $str_pagging .= "<li class='pagination-item'>
                            <a href='{$base_url}&page={$page_prev}' class='pagination-item__link'>
                                <i class='pagination-item__icon fas fa-angle-left'></i>
                            </a>
                        </li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page) $active = "pagination-item--active";
        $str_pagging .= " <li class='pagination-item {$active}'>
                            <a href='{$base_url}&page={$i}' class='pagination-item__link'>{$i}</a>
                        </li>";
    }
    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li class='pagination-item'>
                            <a href='index.php?page={$page_next}' class='pagination-item__link'>
                                <i class='pagination-item__icon fas fa-angle-right'></i>
                            </a>
                        </li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}

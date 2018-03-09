<?php
/**
 * Created by PhpStorm.
 * User: Lala
 * Date: 2018. 03. 09.
 * Time: 10:15
 */

namespace Models;


class News extends Model
{
    protected $table = 'news';

    public function getLatest()
    {
        return $this
            ->orderBy('id','desc')
            ->first();
    }
}
<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommonTag extends Model
{
    protected $table = 'u_common_tag';

    public function relationTags()
    {
        return $this->hasManyThrough('App\Model\CommonTag', 'App\Model\CommonTagRelation', 'tag_id', 'id', 'id', 'tag_relation_id');
    }

    public function news()
    {
        return $this->hasManyThrough('App\Model\News', 'App\Model\NewsTag', 'tag_id', 'id', 'id', 'news_id');
    }
}
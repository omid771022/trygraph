<?php
namespace App\GraphQL\Queries;
use
    App\Article;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SingleArticle extends Query
{
    protected $attributes = [
        'name' => 'singleArticle',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type("SingleArticle");
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(type::int())
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $Article=Article::find($args['id']);
        return $Article;
    }
}

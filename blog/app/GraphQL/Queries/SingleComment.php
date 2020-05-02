<?php
namespace App\GraphQL\Queries;
use App\comment;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SingleComment extends Query
{
    protected $attributes = [
        'name' => 'singleComment',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('SingleComment');

    }
    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Comment::find($args['id']);
    }
}

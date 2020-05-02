<?php
namespace App\GraphQL\Queries;
use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SingleUser extends Query
{
    protected $attributes = [
        'name' => 'singleUser',
        'description' => 'A query'
    ];

    public function type(): Type
    {
return GraphQL::type("SingleUser");
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
           $user=User::find($args['id']);
            return $user;
    }
}

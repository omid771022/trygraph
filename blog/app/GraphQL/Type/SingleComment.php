<?php
namespace App\GraphQL\Type;
use  App\comment;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\SelectFields;

class SingleComment extends GraphQLType
{
    protected $attributes = [
        'name' => 'SingleComment',
        'description' => 'A type',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'user' => [
                'type' => GraphQL::type('SingleUser')
            ],
            'Articles' => [
                'type' => GraphQL::type('SingleArticle')
            ],
            'approved' => [
                'type' => Type::nonNull(Type::boolean())
            ],
            'body' => [
                'type' =>  Type::nonNull(Type::string())
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string())
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }
}


<?php
declare(strict_types=1);
namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
class AllArticle extends GraphQLType
{
    protected $attributes = [
        'name' => 'AllArticle',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(type::int())
            ],

            "email" => [
                "type" => Type::nonNull(type::string())
            ],
            "name" => [
                "type" => Type::nonNull(type::string())
            ],
            "password" => [
                "type" => Type::nonNull(type::string())
            ]
        ];
    }
}

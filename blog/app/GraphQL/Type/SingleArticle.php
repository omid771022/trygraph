<?php
namespace App\GraphQL\Type;
use  App\Article;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\SelectFields;
class SingleArticle extends GraphQLType
{
    protected $attributes = [
        'name' => 'SingleArticle',
        'description' => 'A type'
    ];
    public function fields(): array
    {
        return [
            "user"=>[
                "type"=>GraphQL::type('SingleUser')
            ],
             "id"=>[
              "type"=>Type::nonNull(Type::int())
            ],
            "title"=>[
                "type"=>Type::nonNull(Type::string())
            ],
            "user_id"=>[
                "type"=>Type::nonNull(Type::string())
            ],
            "body"=>[
                "type"=>Type::nonNull(Type::string())
            ],
            'Comments'=>[
                "type"=>Type::listOf(GraphQL::type('SingleComment'))
            ],
        ];
    }
}

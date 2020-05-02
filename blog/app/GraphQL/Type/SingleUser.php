<?php

namespace App\GraphQL\Type;
use  App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\SelectFields;

use Rebing\GraphQL\Support\Facades\GraphQL;
class SingleUser extends GraphQLType
{
    protected $attributes = [
        'name' => 'SingleUser',
        'description' => 'A type'
    ];
    public function fields(): array
    {
     return [

         'id' => [
             'type' => Type::nonNull(type::int())
         ],
         'email'=> [
             'type'=> Type::nonNull(type::string())
         ],
         'name'=> [
             'type'=> Type::nonNull(type::string())
         ],
         'password' => [
             'type'=> Type::nonNull(type::string())
         ],
         'comments'=>[
             "type"=>Type::listOf(GraphQL::type('SingleComment'))
         ],
         "articles"=>[
             "type"=>Type::listOf(GraphQL::type("SingleArticle"))
         ],
        ];
    }
}

<?php

namespace App\GraphQL\Mutations;
use GraphQL\Type\Definition\NonNull;
use phpDocumentor\Reflection\Types\Boolean;
use Rebing\GraphQL\Support\Mutation;
use App\Article;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

class DeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'delete',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
     'id'=>[
    'type'=>Type::nonNull(Type::int())
          ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
  $article= Article::findOrFail($args['id']);


  if ( $article->delete()){
   return "ok";
  }

    }
}

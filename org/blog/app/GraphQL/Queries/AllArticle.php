<?php
namespace App\GraphQL\Query;
use App\User;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
class AllArticle extends Query
{
    protected $attributes = [
        'name' => 'AllArticle',
        'description' => 'A query'
    ];

    public function type(): Type
    {
      return  Type::string();
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        return "wellcome in kossher";



    }
}

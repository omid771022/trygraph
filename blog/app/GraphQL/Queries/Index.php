<?php
declare(strict_types=1);
namespace App\GraphQL\Queries;
use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class Index extends Query
{
    protected $attributes = [
        'name' => 'index',
        'description' => 'A query'
    ];

    public function type(): Type
    {

        return  Type::listOf(GraphQL::type('Index'));
    }

    public function args(): array
    {
        return [
//'page'=>[
//    'type'=>Type::nonNull(Type::int())
//],
//            'limit'=>[
//                'type'=>Type::nonNull(Type::int())
//            ]

            "id"=>[
            "type"=>Type::nonNull(Type::int())
        ]

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
//$page=$args['page']??1;
//$limit=$args['limit']?? 10;
return User::find($args['id']);

//return  User::paginate($limit, ['*'],'page',$page);




    }
}

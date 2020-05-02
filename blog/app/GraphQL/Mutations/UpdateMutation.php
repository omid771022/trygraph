<?php
namespace App\GraphQL\Mutations;
use GraphQL\Type\Definition\NonNull;
use Rebing\GraphQL\Support\Mutation;
use App\Article;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;


class UpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'update',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('SingleArticle');
    }

    public function args(): array
    {
        return [
'id'=>[
    'type'=>Type::int()
],
            'title'=>[
                'type'=>Type::string()
            ],
            'body'=>[
                'type'=>Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $Article=Article::find($args['id']);
        if (! $Article){
            return null;
        }
        $Article->body=$args['body'];
        $Article->title=$args['title'];
        $Article->save();
        return $Article;




    }
}

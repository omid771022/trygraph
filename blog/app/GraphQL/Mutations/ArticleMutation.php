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
class ArticleMutation extends Mutation
{
    protected $attributes = [
        'name' => 'article',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type("SingleArticle");
    }

    public function args(): array
    {
        return [
        'title'=>[
               'type'=>Type::nonNull(Type::string())
],
            'body'=>[
                'type'=>Type::nonNull(Type::string())
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
$article= Article::create([
'user_id'=>2,
    'title'=>$args['title'],
    'body'=>$args['body'],


    ]);

 return $article;

    }
}

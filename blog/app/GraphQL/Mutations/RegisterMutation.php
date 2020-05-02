<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class RegisterMutation extends Mutation
{
    protected $attributes = [
        'name' => 'register',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return Type::listOf(Type::string());
    }

    public function args(): array
    {
        return [
            'name' => [
                'type' => Type::string()
            ],
            'email' => [
                'type' => Type::string()
            ],
            'password' => [
                'type' => Type::string()
            ],

        ];
    }
    protected function rules(array $args = []): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ];




    }
    public function validationErrorMessages(array $args = []): array
    {
         return [
                  'email.required'=>'فیلد ها خالیست ',
                  'email.string'=>'فرمت نباید عددی باشد ',
                  'email.email'=>'فرمت غلط است',
                  'email.unique'=>'t4',
                  'name.required'=>'t5',
                  'name.string'=>'t6 ',
                  'name.max'=>'t7',


         ];

    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
$user=User::create([
    'name'=>$args['name'],
    'email'=>$args['email'],
    'password'=>bcrypt($args['password'])
]);


    }
}

<?php

namespace App\Providers;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param  \Illuminate\Contracts\Validation\Factory  $validator
     */
    public function boot(Factory $validator)
    {
        $validator->resolver(
            function ($translator, $data, $rules, $messages, $attributes) {
                    $rules = $this->replaceRulesExpressions($rules, $data);

                    return new Validator($translator, $data, $rules, $messages, $attributes
                );
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Realiza a troca das expressões da array de regras.
     *
     * @param  array $rules
     * @param  array $data
     * @return array $rules
     */
    public function replaceRulesExpressions(array $rules = [], array $data = [])
    {
        $array = [];
        array_walk($rules, function ($rules, $attribute) use ($data, &$array) {
            $array[$attribute] = $this->replaceStringExpression($data, $attribute, $rules);
        }, array_keys($rules));
        return $array;
    }

    /**
     * Busca e troca recursivamente a expressão pelo valor existente
     * correspondente dentro da array de valores.
     *
     * @param  array  $data
     * @param  string  $attribute
     * @param  string  $rules
     * @return string $rule
     */
    public function replaceStringExpression(array $data, $attribute, $rules)
    {
        if (!str_contains($rules, ',:')) {
            return $rules;
        }

        $left = substr(
            $rules,
            strrpos($rules, ',:'),
            strlen($rules) - strrpos($rules, ',:')
        );

        $right = substr(
            str_replace(',:', '', $left),
            0,
            strpos(str_replace(',:', '', $left), '|') ?: strlen($left)
        );

        if (!array_key_exists($right, $data)) {
            return $rules;
        }

        $rules = str_replace(
            sprintf(':%s', $right),
            $data[$right],
            $rules
        );

        return $this->replaceStringExpression($data, $attribute, $rules);
    }
}

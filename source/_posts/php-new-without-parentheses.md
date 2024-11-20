---
extends: _layouts.post
section: content
title: Chamar método de classe omitindo parênteses no PHP 8.4
date: 2024-05-15
description: Com o PHP 8.4, você poderá chamar métodos de classes sem utilizar parênteses na criação da instância.
categories: [php, php84, phprfc, opensource]
---

## Omissão de parênteses na chamada de métodos de classes

Com o PHP 8.4, você poderá chamar métodos de classes sem utilizar parênteses na criação da instância.🐘

É o que propõe a RFC: `new MyClass()->method() without parentheses`.

A partir da versão 5.4.0 do PHP, foi introduzida a funcionalidade *"class member access on instantiation"*, ou acesso a membros da classe na instanciação em nosso glorioso português.

Isso significa que, desde essa versão, é possível acessar constantes, propriedades e métodos de uma instância recém-criada sem precisar usar uma variável intermediária. No entanto, isso só funciona se a expressão 'new' estiver envolta em parênteses.

Com a nova RFC, será permitido omitir os parênteses ao redor da expressão `new` quando há parênteses dos argumentos do construtor, conforme a imagem deste post.

![RFC new without parentheses](/assets/images/blog/php-new-class-without-parentheses.jpeg)

Então, você também poderá escrever:

```php
class MyClass
{
    const CONSTANT = 'constant';
    public static $staticProperty = 'staticProperty';
    public static function staticMethod(): string { return 'staticMethod'; }
    public $property = 'property';
    public function method(): string { return 'method'; }
    public function __invoke(): string { return '__invoke'; }
}

var_dump(
    new MyClass()::CONSTANT, // string(8) "constant"
    new MyClass()::$staticProperty, // string(14) "staticProperty"
    new MyClass()::staticMethod(), // string(12) "staticMethod"
    new MyClass()->property,// string(8) "property"
    new MyClass()->method(), // string(6) "method"
    new MyClass()(), // string(8) "__invoke"
);

// Antes
(new MyClass())::CONSTANT;

// Depois
new MyClass()::CONSTANT;
```

E aí, gostou dessa novidade? Particularmente, o PHP 8.4 trará excelentes adições, e essa é uma melhoria menos significativa. No momento, prefiro a utilização de parênteses, pois parece deixar mais claro o que está acontecendo, mas acredito que me acostumarei facilmente.

Vale lembrar que isso não afeta o uso de parênteses, que continuará funcionando normalmente.

Você pode ler mais sobre a proposta na publicação oficial: [clique aqui](https://wiki.php.net/rfc/new_without_parentheses).

Até a próxima e abraços! 🐘

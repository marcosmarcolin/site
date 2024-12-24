---
extends: _layouts.post
section: content
title: Suporte a Closures em expressões constantes no PHP 8.5
date: 2024-12-24
description: Agora será possível utilizar _Closures_ como parte de expressões constantes no PHP 8.5!
categories: [php, php85, phprfc, opensource]
---

## _**Closures**_

No PHP, _**Closures**_ são funções anônimas que podem ser atribuídas a variáveis, passadas como argumentos ou retornadas por outras funções. 

Elas são amplamente utilizadas para simplificar a criação de `callbacks` e encapsular lógica específica que não precisa ser definida como uma função nomeada. Por exemplo:

```php
$greet = function ($name) {
    return "Hello, $name!";
};
echo $greet("World"); // Saída: Hello, World!
```

Ou, desde o PHP 7.4 você poderia escrever apenas:

```php
$greet = fn($name) => "Hello, $name!";
echo $greet("World"); // Saída: Hello, World!
```

## Suporte a _**Closures**_ em expressões constantes

Agora será possível utilizar _**Closures**_ como parte de expressões constantes no PHP! Isso significa que você poderá definir funções anônimas diretamente em:

* Parâmetros de atributos
* Valores padrão de propriedades e parâmetros
* Constantes e constantes de classe

Algumas restrições importantes:

* As _**Closures**_ devem ser estáticas (sem acesso ao `$this`).
* Não podem capturar variáveis do escopo externo (`use`).

Exemplo:

```php
function transformStrings(
    array $strings,
    array $transformations = [
        static function ($value) {
            return trim($value); // Remove espaços extras
        },
        static function ($value) {
            return ucfirst($value); // Coloca a primeira letra em maiúscula
        },
    ]
) {
    foreach ($strings as &$string) {
        foreach ($transformations as $transformation) {
            $string = $transformation($string);
        }
    }

    return $strings;
}

var_dump(transformStrings(['  hello', 'world  ', ' php '])); 
// array(3) { [0]=> string(5) "Hello" [1]=> string(5) "World" [2]=> string(3) "Php" }
```

O que acontece no exemplo acima:

* A função recebe uma lista de `strings` e aplica transformações a cada uma delas.
* Primeiro, remove espaços extras ao redor da `string` com `trim`.
* Depois, transforma a primeira letra de cada palavra em maiúscula com `ucfirst`.

Agora, um exemplo utilizando POO:

```php
class Dummy {
    public function __construct(
        public Closure $c,
    ) {}
}

// Define uma constante que armazena um objeto Dummy com uma Closure
const Closure = new Dummy(static function () {
    echo "called", PHP_EOL;
});

// Executa a Closure armazenada no objeto
(Closure->c)(); // Saída: "called"
```

Explicação simples:

* A classe recebe uma `Closure` como propriedade pública, armazenada na instância.
* Contém uma instância da classe `Dummy` com a `Closure` definida, que imprime `"called"` ao ser executada.
* A expressão `(Closure->c)()` executa a Closure armazenada na propriedade pública `c` da instância.

Essa nova funcionalidade também abre portas para outros casos de uso interessantes, como o uso de `Closures` em `Attributes`.

Você pode ler mais sobre a proposta na publicação oficial: [clique aqui](https://wiki.php.net/rfc/closures_in_const_expr?utm_source=blog&utm_medium=post&utm_campaign=blog-marcos-marcolin&utm_id=php85).

O que você achou dessa novidade? Compartilhe suas ideias nos comentários!
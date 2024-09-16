---
extends: _layouts.post
section: content
title: Novas funções para arrays no PHP 8.4 -> array_find, array_find_key, array_any e array_all
date: 2024-09-16
description: Descubra as novas funções que facilitam a manipulação de arrays com callbacks eficientes, tornando o código mais simples e legível.
categories: [php, php84]
---

A nova versão do PHP, 8.4, trará um novo conjunto de funções para manipulação de `arrays`: `array_find`, `array_find_key`, `array_any` e `array_all`. 
Essas funções oferecem uma maneira mais direta e eficiente de trabalhar com `arrays`, simplificando operações comuns.

Quer você goste ou não, o `array` é uma das estruturas de dados mais versáteis do PHP, sendo prática e objetiva – características que refletem a essência da linguagem.

Pessoalmente, eu prefiro escrever código simples e limpo. Por isso, considero essas novas funções uma adição muito bem-vinda. 
Elas nos ajudam a evitar loops desnecessários e tornam o código mais legível, mantendo a elegância da linguagem.

## array_find

O nome já diz tudo: `array_find` pesquisa um elemento em um `array` e retorna o primeiro elemento que satisfaz o critério definido pelo `callback`.

Assinatura da função:
```php
function array_find(array $array, callable $callback): mixed {}
```

Exemplo de uso:
```php
// Verifica se o valor é > 10
function is_greater_than_ten(int $value): bool {
    return $value > 10;
}

$array = [5, 8, 12, 3, 15];

array_find($array, 'is_greater_than_ten'); // 12

// Com Arrow Functions
array_find($array, fn($value) => $value > 10); // 12
```

## array_find_key

Semelhante à `array_find`, a função `array_find_key` retorna a chave do primeiro elemento que satisfaz o critério do `callback`. 
Se nenhum elemento for encontrado, retorna `null`.

Assinatura da função:
```php
function array_find_key(array $array, callable $callback): mixed {}
```

Exemplo de uso:
```php
function is_greater_than_ten(int $value): bool {
    return $value > 10;
}

$array = [5, 8, 12, 3, 15];

array_find_key($array, 'is_greater_than_ten'); // 2

// Com Arrow Functions
array_find_key($array, fn($value) => $value > 10); // 2
```

## array_all

A função `array_all` verifica se todos os elementos do `array` atendem ao critério definido pelo `callback`. 
Se todos os elementos retornarem `true` para o `callback`, a função retorna `true`, caso contrário, `false`.

Assinatura da função:
```php
function array_all(array $array, callable $callback): bool {}
```

Exemplo de uso:
```php
$array = [5, 8, 12, 3, 15];
array_all($array, fn($value) => $value > 10); // false
array_all($array, fn($value) => is_numeric($value)); // true
```

## array_any

A função `array_any` verifica se pelo menos um dos elementos do `array` atende ao critério do `callback`. 
Se ao menos um elemento retornar `true` para o `callback`, a função retorna `true`.

Assinatura da função:
```php
function array_any(array $array, callable $callback): bool {}
```

Exemplo de uso:
```php
$array = [5, 8, 12, 3, 15];
array_any($array, fn($value) => $value > 10); // true
array_any($array, fn($value) => $value > 20); // false
array_any($array, fn($value) => is_numeric($value)); // true
```

# Conclusão

As novas funções introduzidas no PHP 8.4 reforçam o compromisso da linguagem em fornecer ferramentas que tornam o código mais simples e legível.

Se você, como eu, valoriza um código mais direto e fácil de manter, essas novas adições são uma excelente oportunidade para aprimorar sua forma de trabalhar com `arrays` no PHP.

Fique atento à evolução da linguagem e aproveite essas funcionalidades para escrever código ainda mais eficiente.

Você pode conferir a RFC clicando [aqui](https://wiki.php.net/rfc/array_find?utm_source=site&utm_medium=post&utm_campaign=marcosmarcolin&utm_id=2024).

Até a próxima!
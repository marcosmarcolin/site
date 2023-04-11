---
extends: _layouts.post
section: content
title: PHP Core Roundup 11
date: 2023-04-11
description: Em Março, o trabalho continuou acontecendo com diversos RFCs sendo discutidos, melhorias, lançamentos de segurança para versões anteriores, etc
categories: [php, phpfoundation, opensource, php-core-roundup]
---

As melhorias para o PHP 8.3 seguem acontecendo!

As atualizações a seguir são referentes ao último mês de Março, no núcleo da linguagem e são um resumo do #PHP Core Roundup #11 by PHP Foundation.

Antes disso, preciso informar que o PHP 8.2.4 e 8.1.17 foram lançados, ambos contendo mais de 45 correções de bugs(e nenhuma correção de segurança).

## RFCs

Implementados

* Saner array_(sum|product)() by George Peter Banyard

Proposto para alterar o comportamento atual de `array_sum()` e `array_product()` para lidar adequadamente com valores não numéricos. Isso resulta em avisos adicionais(warnings) quando essas funções encontram tipos sem suporte, como determinados objetos, matrizes e recursos.

* Typed class constants by Benas Seliuginas and Máté Kocsis

O sistema de tipos do PHP segue melhorando, e agora será possível declarar tipos constantes. Com isso, você poderá definir constantes de classes, veja o exemplo abaixo.

```php
enum E {
  const string TEST = "Test1";
}

trait T {
  const string TEST = E::TEST;
}

interface I {
  const string TEST = E::TEST;
}

class C {
  const string TEST = E::TEST;
}
```

Em discussão

* Make `unserialize()` emit a warning for trailing bytes by Tim Düsterhus

Um aviso deve ser emitido se os bytes puderem ser removidos do final da string de entrada sem alterar o valor de retorno de `unserialize()`.

* Define proper semantics for `range()` function by George Peter Banyard

Este RFC tenta eliminar vários comportamentos indesejáveis e inesperados da função `range()`. Introduzido no PHP 4, `range()` tenta trabalhar com vários tipos, não apenas incluindo números inteiros, floats e strings, mas também outros tipos.

------

Além dos RFCs, foram mesclados dezenas de PRs, que propõem correção de bugs e pequenas melhorias no código do PHP. Você pode conferir a lista completa no site da PHP Foundation.

Para conferir todas as novidades do mês, [clique aqui](https://thephp.foundation/blog/2023/04/01/php-core-roundup-11/).
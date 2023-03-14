---
extends: _layouts.post
section: content
title: PHP Core Roundup 9
date: 2023-02-05
description: Conforme o Core Roundup #9, essas são algumas melhorias e RFCs para a versão 8.3, destaques do mês de Janeiro
categories: [php, phpfoundation, opensource, php-core-roundup]
---

Conforme o [Core Roundup #9](https://opencollective.com/phpfoundation/updates/php-core-roundup-9), essas são algumas melhorias e RFCs para a versão 8.3, destaques do mês de Janeiro:

## RFC em votação: [Readonly amendments](https://wiki.php.net/rfc/readonly_amendments)

A sugestão de mudança é para classes normais poderem estender(herdar) de classes _Readonly_(somente leitura). Hoje, é proibido e lança um ‘_Fatal error_‘. Também, é permitir a reinicialização de propriedades _Readonly_ durante a clonagem.

## RFC implementada: [Randomizer Additions](https://wiki.php.net/rfc/randomizer_additions)

Melhoria na nova extensão ‘_Random_‘ do PHP, criada para padronizar a geração de números aleatórios/randômicos. Esta RFC propõe adicionar os métodos `getBytesFromString()` e `getFloat()/nextFloat()`, para geração de string e ponto flutuante(_float_) aleatório. Estas operações geralmente são aplicadas na userland, com uma certa dificuldade.

## RFC em discussão: [Path to Saner Increment/Decrement operators](https://wiki.php.net/rfc/saner-inc-dec-operators)

Alteração no operador de incremento(`$v++`) e decremento(`$v–`), para padronizar a saída quando utilizado com tipo _int_ ou _float_. Muitas vezes, a saída é inesperada.

A ideia é para `$v++` ser igual `$v += 1`, e `$v– à $v -= 1`.

## RFC em discussão: Saner [array_(sum|product)()](https://wiki.php.net/rfc/saner-array-sum-product)

Aqui, é para gerar um aviso quando a utilização de `array_sum()` e `array_product()` tiverem um array com tipos incompatíveis. Isso irá gerar incompatibilidade com versões anteriores.

## RFC recusada: [Asymmetric Visibility](https://wiki.php.net/rfc/asymmetric-visibility)

Nesta, teria uma nova sintaxe para declaração do encapsulamento de propriedades de uma classe, ex:

```php
class Foo {

  public private(set) string $bar;
  
}
```
No trecho acima, a operação getBar() seria pública, enquanto setBar() privada.

* * *

Além destas e outras RFCs, foram implementadas diversas melhorias de desempenho, principalmente nas extensões mbstring e random.

Pude acompanhar diversos PRs de dezembro de 2022 para cá e é perceptível a evolução e melhorias que a linguagem vem recebendo, a PHP Foundation deu um ‘gás’ para a linguagem continuar evoluindo. 🙂

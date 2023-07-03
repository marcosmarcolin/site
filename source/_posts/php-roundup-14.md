---
extends: _layouts.post
section: content
title: PHP Core Roundup 14
date: 2023-06-30
description: 🎉 A próxima versão do PHP, a 8.3, está programada para ser lançada em 23 de novembro. Com isso, o congelamento de recursos está próximo.
categories: [php, phpfoundation, opensource, php-core-roundup]
---

🎉 A próxima versão do PHP, a 8.3, está programada para ser lançada em 23 de novembro. Com isso, o congelamento de recursos está próximo.

Enquanto não chega, o núcleo segue trazendo novos recursos, melhorias internas e correções de bugs e segurança. 🐘

O **PHP Core Roundup #14** destaca alguns RFCs(Request for Comments) e discussões recentes na lista de discussão do PHP. Alguns desses RFCs incluem a introdução do atributo `#[\Override]` para marcar métodos sobrescritos, melhorias na função `range()`, introdução da função `mb_str_pad()` para manipulação de strings multibyte e propostas de depreciação de determinadas funcionalidades menos consistentes do PHP.

Sobre o novo atributo `#[\Override]`, se este atributo for adicionado a um método, o mecanismo validará que existe um método com o mesmo nome em uma classe pai ou em qualquer uma das interfaces implementadas. Se tal método não existir, um erro de compilação será emitido.

```php
// Exemplo válido
class P {
    protected function p(): void {}
}
 
class C extends P {
    #[\Override]
    public function p(): void {}
}

// Exemplo válido
class Foo implements IteratorAggregate
{
    #[\Override]
    public function getIterator(): Traversable
    {
        yield from [];
    }
}
```

```php
// Exemplo inválido
class C
{
    #[\Override]
    public function c(): void {} // Fatal error: C::c() has #[\Override] attribute, but no matching parent method exists
}

// Exemplo inválido
interface I {
    public function i(): void;
}
 
class P {
    #[\Override]
    public function i(): void {} // Fatal error: P::i() has #[\Override] attribute, but no matching parent method exists
}
 
class C extends P implements I {}
```

Para conferir todas as novidades do mês, [clique aqui](https://thephp.foundation/blog/2023/07/01/php-core-roundup-14/).
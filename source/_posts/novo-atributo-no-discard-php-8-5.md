---
extends: _layouts.post
section: content
title: Marcando valores de retorno como importantes (#[\NoDiscard]) no PHP 8.5
date: 2025-03-05
description: Atributo #[\NoDiscard] no PHP 8.5: evite falhas silenciosas ao ignorar retornos importantes de funções e métodos.
categories: [php, php85, phprfc, opensource]
---

## 🐘💡 RFC: Atributo #[\NoDiscard] no PHP 8.5?!

Uma nova **RFC em votação** no PHP 8.5 propõe a adição do atributo **#[\NoDiscard]**, que alerta quando o retorno de uma função ou método não é utilizado.

### ⚠️ O problema?

Ignorar retornos pode gerar **falhas silenciosas** e difíceis de detectar. Essa RFC busca tornar esse comportamento mais explícito e reduzir bugs, garantindo que retornos importantes sejam sempre verificados.

### ⚙️ Como funciona?

Se uma função for marcada com **#[\NoDiscard]**, o PHP emitirá um **warning** caso o retorno seja ignorado. Caso o desenvolvedor queira **descartar intencionalmente** o retorno, será possível usar o **(void) cast**.

A RFC ainda está em votação, mas tem boas chances de ser aprovada.

### E aí, você gostaria desse recurso?

Eu particularmente, **sim**, pois o uso é opcional. Tornar isso obrigatório seria uma loucura, que acredito nunca acontecer.

## Exemplo prático

```php
<?php

#[\NoDiscard("Verifique o retorno para garantir o processamento correto.")]
function processarItens(array $items): array 
{
    $resultados = [];

    foreach ($items as $item) {
        $resultados[] = random_int(0, 1);
    }

    return $resultados;
}

$items = ['foo', 'bar', 'baz'];

// ⚠️ Warning: The return value of function processarItens() is expected to be consumed, Verifique o retorno para garantir o processamento correto in %s on line %d
processarItens($items);

// ✅ Sem warning, pois o retorno foi utilizado
$resultados = processarItens($items);

// ✅ Sem warning, pois o retorno foi intencionalmente descartado
(void) processarItens($items);
```

Você pode ler mais sobre a proposta na publicação oficial: [clique aqui](https://wiki.php.net/rfc/marking_return_value_as_important?utm_source=blog&utm_medium=post&utm_campaign=blog-marcos-marcolin&utm_id=php85).

O que você achou dessa novidade? Compartilhe suas ideias nos comentários!
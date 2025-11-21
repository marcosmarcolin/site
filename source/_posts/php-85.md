---
extends: _layouts.post
section: content
title: Descubra as principais novidades do PHP 8.5
date: 2025-11-21
description: O PHP 8.5 chegou com recursos como a nova extensão URI, o pipe operator e a possibilidade de modificar propriedades ao clonar objetos, deixando o código mais simples, expressivo e preparado para o futuro. Confira os principais destaques neste post.
categories: [ php, php85, phprfc ]
---

# Novidades do PHP 8.5 🐘

Como já virou tradição na última década, o PHP recebe uma nova versão todos os anos, e agora é a vez do **PHP 8.5**.

Se você acompanha este blog ou meu [LinkedIn](https://www.linkedin.com/in/marcosmarcolin/), provavelmente já viu algumas
das novidades, pois costumo comentar as RFCs e mudanças mais importantes ao longo do ano.

Neste post, trago um resumo das principais melhorias do 8.5. Separei o que mais faz diferença no dia a dia, já que muita
coisa foi desenvolvida ao longo do ano para deixar a linguagem mais simples, mais rápida e mais consistente.

## Extensão `URI`: análise e manipulação de URLs com API moderna - [RFC](https://wiki.php.net/rfc/url_parsing_api?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

A nova extensão `URI` agora vem sempre disponível no PHP 8.5. Ela fornece APIs próprias para analisar e modificar URIs e
URLs seguindo os padrões RFC 3986 e WHATWG URL.

A implementação é baseada nas bibliotecas uriparser (RFC 3986) e Lexbor (WHATWG URL), garantindo um parsing muito mais
consistente que o `parse_url`, que sempre teve limitações e diferenças de comportamento.

PHP 8.4 e anteriores

```php
$components = parse_url('https://php.net/releases/8.4/pt_BR.php');
var_dump($components['host']);
// string(7) "php.net"
```

PHP 8.5

```php
use Uri\Rfc3986\Uri;
$uri = new Uri('https://php.net/releases/8.5/pt_BR.php');
var_dump($uri->getHost());
// string(7) "php.net"
```

## Operador Pipe: encadeamento mais limpo e legível - [RFC](https://wiki.php.net/rfc/pipe-operator-v3?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

O operador pipe facilita o encadeamento de funções sem criar variáveis intermediárias e sem aninhar chamadas. O fluxo
fica de cima para baixo, muito mais fácil de ler, manter e evoluir.

PHP 8.4 e anteriores

```php
$title = ' PHP 8.5 Lançado ';

$slug = strtolower(
    str_replace('.', '',
        str_replace(' ', '-',
            trim($title)
        )
    )
);

var_dump($slug);
// string(15) "php-85-lançado"
```

PHP 8.5

```php
$title = ' PHP 8.5 Lançado ';

$slug = $title
    |> trim(...)
    |> (fn($str) => str_replace(' ', '-', $str))
    |> (fn($str) => str_replace('.', '', $str))
    |> strtolower(...);

var_dump($slug);
// string(15) "php-85-lançado"
```

Você pode conferir minha explicação completa [neste link](https://www.marcosmarcolin.com.br/blog/php-pipe-operator).

## Clone With: modifique propriedades direto no clone - [RFC](https://wiki.php.net/rfc/clone_with_v2?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

O PHP 8.5 introduziu a possibilidade de alterar propriedades durante a clonagem, passando um array associativo para a
função `clone()`.
Isso simplifica o padrão de métodos “with”, muito comum em classes `readonly`, eliminando código repetitivo para
reconstruir objetos.

PHP 8.4 e anteriores

```php
readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        $values = get_object_vars($this);
        $values['alpha'] = $alpha;

        return new self(...$values);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
```

PHP 8.5

```php
readonly class Color
{
    public function __construct(
        public int $red,
        public int $green,
        public int $blue,
        public int $alpha = 255,
    ) {}

    public function withAlpha(int $alpha): self
    {
        return clone($this, [
            'alpha' => $alpha,
        ]);
    }
}

$blue = new Color(79, 91, 147);
$transparentBlue = $blue->withAlpha(128);
```

## Atributo

`#[\NoDiscard]`: garanta que o retorno seja usado - [RFC](https://wiki.php.net/rfc/marking_return_value_as_important?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

O atributo `#[\NoDiscard]` permite marcar funções cujo valor retornado não deve ser ignorado. Se o retorno não for
utilizado, o PHP emitirá um aviso. Isso aumenta a segurança de APIs em que o retorno é essencial, evitando erros
silenciosos.

Se você realmente quiser descartar o valor, pode usar o cast `(void)` para deixar essa intenção explícita.

PHP 8.4 e anteriores

```php
function getPhpVersion(): string
{
    return 'PHP 8.4';
}

getPhpVersion(); // Sem warning
```

PHP 8.5

```php
#[\NoDiscard]
function getPhpVersion(): string
{
    return 'PHP 8.5';
}

getPhpVersion();
// Warning: The return value of function getPhpVersion() should either be used or intentionally ignored
```

Você pode conferir minha explicação
completa [neste link](https://www.marcosmarcolin.com.br/blog/novo-atributo-no-discard-php-8-5).

## Closures e first-class callables em expressões constantes - [RFC](https://wiki.php.net/rfc/closures_in_const_expr?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025) - [RFC](https://wiki.php.net/rfc/fcc_in_const_expr?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

O PHP 8.5 agora permite usar closures estáticas e `first-class callables` em expressões constantes. Isso inclui
parâmetros de atributos, valores padrão de propriedades e parâmetros, além de constantes dentro da classe.

Esse recurso abre espaço para configurações mais expressivas e reutilizáveis, sem necessidade de funções auxiliares ou
blocos adicionais.

PHP 8.4 e anteriores

```php
class Example
{
    const HANDLER = fn() => 'test'; // Fatal error
}
```

PHP 8.5

```php
class Example
{
    const HANDLER = (static fn() => 'test');

    public function run(): string
    {
        return (self::HANDLER)();
    }
}

$e = new Example();
var_dump($e->run()); 
// string(4) "test"
```

Você pode conferir minha explicação
completa [neste link](https://www.marcosmarcolin.com.br/blog/closures-em-expressoes-constantes-php-85).

## cURL Share Handles persistentes - [RFC](https://wiki.php.net/rfc/curl_share_persistence?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025) - [RFC](https://wiki.php.net/rfc/curl_share_persistence_improvement?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

O PHP 8.5 introduziu `curl_share_init_persistent()`, que cria share handles persistentes.
Diferente de `curl_share_init()`, esses handles não são destruídos ao final da requisição.
Se outro handle com as mesmas opções já existir, ele será reutilizado, evitando custo de inicialização e melhorando a
performance de requisições repetidas.

PHP 8.4 e anteriores

```php
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_DNS);
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_CONNECT);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

curl_exec($ch);
```

PHP 8.5

```php
$sh = curl_share_init_persistent([
    CURL_LOCK_DATA_DNS,
    CURL_LOCK_DATA_CONNECT,
]);

$ch = curl_init('https://php.net/');
curl_setopt($ch, CURLOPT_SHARE, $sh);

// Isso agora pode reutilizar a conexão de uma requisição SAPI anterior
curl_exec($ch);
```

## Funções `array_first()` e `array_last()` - [RFC](https://wiki.php.net/rfc/array_first_last?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025)

O PHP 8.5 ganhou duas funções novas para trabalhar com arrays: `array_first()` e `array_last()`.

Elas retornam, respectivamente, o primeiro e o último valor do array. Se o array estiver vazio, retornam `null`, o que
facilita muito quando combinadas com o operador `??`.

PHP 8.4 e anteriores

```php
$lastEvent = $events === []
    ? null
    : $events[array_key_last($events)];
```

PHP 8.5

```php
$lastEvent = array_last($events);
```

Você pode conferir minha explicação completa [neste link](https://www.marcosmarcolin.com.br/blog/php-array-first-last/).

## Recursos e melhorias adicionais

Além dos principais recursos do PHP 8.5, várias melhorias menores foram adicionadas para tornar o desenvolvimento mais
seguro, consistente e previsível.

### `Backtrace` em erros fatais

Erros fatais, como tempo máximo de execução excedido, agora exibem um `backtrace` para facilitar a investigação.

### Atributos mais flexíveis

Atributos agora podem ser aplicados a constantes.

* O atributo `#[\Override]` também pode ser usado em propriedades.
* O atributo `#[\Deprecated]` passa a funcionar em traits e constantes.

### Melhorias em propriedades

* Propriedades estáticas agora suportam visibilidade assimétrica.
* Propriedades promovidas no construtor podem ser marcadas como final.

### Novidades em funções e API interna

* Novo método `Closure::getCurrent()`, útil para recursão em closures.
* `setcookie()` e `setrawcookie()` agora aceitam a chave _partitioned_.
* Novas funções: `get_error_handler()` e `get_exception_handler()`.
* Nova função `grapheme_levenshtein()` para strings multibyte.
* Métodos novos em DOM: `Dom\Element::getElementsByClassName()` e `Dom\Element::insertAdjacentHTML()`.

### Atributo `#[\DelayedTargetValidation]`

Permite suprimir erros de compilação de atributos aplicados a alvos inválidos, útil para extensões e atributos internos.

## Descontinuações e quebras de compatibilidade

### Sintaxe e operadores

* O operador backtick como alias de `shell_exec()` foi descontinuado.
* Casts não canônicos como `(boolean)`, `(integer)`, `(double)` e `(binary)` também foram descontinuados. Use `(bool)`,
  `(int)`, `(float)` e `(string)`.

### Ajustes no engine e sintaxe

* A diretiva INI `disable_classes` foi removida.
* Finalizar `case` com ponto e vírgula foi descontinuado.
* Usar `null` como índice de array ou ao chamar `array_key_exists()` agora é descontinuado. Use string vazia.
* Não é mais possível usar “array” e “callable” como nomes de alias em `class_alias()`.

### Serialização e lifecycle

Os métodos mágicos` __sleep()` e `__wakeup()` foram suavemente descontinuados. O recomendado é usar `__serialize()` e
`__unserialize()`.

### Conversões e avisos adicionais

* Agora um aviso é emitido ao converter `NAN` para outro tipo.
* Desestruturar valores que não sejam arrays (exceto `null`) usando `[]` ou `list()` agora emite aviso.
* Conversões de `floats` (ou `strings` que parecem `floats`) para `int` que não cabem mais no tipo também geram aviso.

## Considerações finais

Na minha visão, o **PHP 8.5** reforça o quanto a linguagem continua evoluindo de forma consistente. Os novos recursos são úteis no dia a dia, resolvem problemas reais e deixam o código mais claro e moderno.

Acompanhar o core da linguagem segue sendo algo que gosto bastante. Mesmo sem entender todos os detalhes internos, dá para ver o cuidado com performance, segurança e qualidade do runtime.

E, sinceramente, não preciso entrar naquela discussão antiga sobre o que o PHP “é ou não é”. A linguagem continua entregando, continua crescendo e segue extremamente relevante por mérito próprio.

Você pode conferir todas as mudanças no  
[site oficial do PHP](https://www.php.net/releases/8.5/pt_BR.php?utm_source=blog&utm_medium=post&utm_campaign=php85&utm_id=2025).

Até a próxima!
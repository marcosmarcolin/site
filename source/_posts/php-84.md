---
extends: _layouts.post
section: content
title: Descubra as principais novidades do PHP 8.4
date: 2024-11-20
description: O PHP 8.4 chegou com melhorias incríveis, como hooks de propriedade, visibilidade assimétrica, suporte completo a HTML5, melhorias na extensão DOM, instância de classes sem parênteses e muito mais. Confira tudo neste post!
categories: [php, php84, phprfc]
---

# Novidades PHP 8.4 🐘

Como tem sido tradição na última década, o PHP lança uma versão da linguagem por ano, e agora chegou a vez do **PHP 8.4.**

Se você acompanha este blog ou meu [LinkedIn](https://www.linkedin.com/in/marcosmarcolin/), provavelmente já viu algumas das novidades, pois já escrevi posts sobre elas. Você pode conferir [neste tópico](https://www.marcosmarcolin.com.br/blog/categories/php84).

Neste post, trago um apanhado geral das principais mudanças. Vou destacar o que considero mais relevante, já que muita coisa foi feita durante 1 ano de desenvolvimento para tornar esta versão ainda melhor.

## Hooks de Propriedade: simplifique `getters` e `setters` - [RFC](https://wiki.php.net/rfc/property-hooks?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

Os _property hooks_ (ou ganchos de propriedade) são uma abordagem moderna para definir _getters_ e _setters_ diretamente na declaração da propriedade dentro da classe.

```php
class Product 
{
    public float $price {
        set {
            if ($value <= 0) throw new ValueError('O preço deve ser positivo!');
            $this->price = $value;
        }
        get {
            return number_format($this->price, 2);
        }
    }

    public function __construct(float $price) {
        $this->price = $price;
    }
}
```

Isso elimina a necessidade de `getters` e `setters` repetitivos, tornando seu código mais limpo e fácil de manter.

Você pode conferir minha explicação completa [neste link](https://www.marcosmarcolin.com.br/blog/php-property-hooks/).

## Visibilidade Assimétrica: mais controle nas propriedades - [RFC](https://wiki.php.net/rfc/asymmetric-visibility-v2?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

Agora é possível definir escopos diferentes para leitura e escrita de propriedades, permitindo leitura pública enquanto mantém a escrita restrita, eliminando a necessidade de _getters_ redundantes.

```php
class Product
{
    public private(set) float $price = 19.99;
}

$product = new Product();
var_dump($product->price); // float(19.99)

$product->price = 25.99; // Visibility error
```

Ideal para cenários onde você precisa proteger a integridade dos dados sem abrir mão de uma leitura pública.

## #[\Deprecated] Atributo - [RFC](https://wiki.php.net/rfc/deprecated_attribute?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

O novo atributo `#[\Deprecated]` torna o mecanismo de descontinuação existente no PHP disponível para funções, métodos e constantes de classe definidas pelo usuário.

```php
class Product
{
    #[\Deprecated(
        message: "Use Product::getPrice() instead",
        since: "8.4",
    )]
    public function getProductPrice(): float
    {
        return $this->getPrice();
    }

    public function getPrice(): float
    {
        return 19.99;
    }
}

$product = new Product();
// Deprecated: Method Product::getProductPrice() is deprecated since 8.4, use Product::getPrice() instead
echo $product->getProductPrice();
```

## Suporte completo a HTML5: modernizando o DOM no PHP - [RFC](https://wiki.php.net/rfc/dom_additions_84?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024) / [RFC](https://wiki.php.net/rfc/domdocument_html5_parser?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

Por mais de 16 anos, o `HTML5` esteve presente, mas o PHP nunca acompanhou totalmente sua evolução. A classe `\DOMDocument`, projetada para suportar `HTML4`, já não atendia aos padrões modernos, deixando os desenvolvedores lidando com limitações frustrantes.

Com o PHP 8.4, essa lacuna finalmente foi preenchida! Um parser totalmente compatível com `HTML5` chegou para modernizar o trabalho com documentos `HTML`.

Novas classes `Dom\HTMLDocument`, `Dom\XMLDocument` e métodos `DOMNode::compareDocumentPosition()`, `DOMXPath::registerPhpFunctionNS()`, `DOMXPath::quote()`, `XSLTProcessor::registerPHPFunctionNS()` estão disponíveis.

```php
$dom = Dom\HTMLDocument::createFromString(
    <<<HTML
        <section>
            <div class="info">O PHP 8.4 introduz novos recursos poderosos!</div>
            <div class="destaque">Agora você pode consultar elementos DOM facilmente com suporte a HTML5.</div>
        </section>
        HTML,
    LIBXML_NOERROR,
);

$node = $dom->querySelector('section > div.destaque');
var_dump($node->classList->contains("destaque")); // bool(true)
```

## Novas funções array_*() - [RFC](https://wiki.php.net/rfc/array_find?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

A nova versão traz um novo conjunto de funções para manipulação de `arrays`: `array_find`, `array_find_key`, `array_any` e `array_all`. 

Essas funções oferecem uma maneira mais direta e eficiente de trabalhar com `arrays`, simplificando operações comuns.

#### `array_find`

```php
function array_find(array $array, callable $callback): mixed {}
```

#### `array_find_key`

```php
function array_find_key(array $array, callable $callback): mixed {}
```

#### `array_all`

```php
function array_all(array $array, callable $callback): bool {}
```

#### `array_any`

```php
function array_any(array $array, callable $callback): bool {}
```

Você pode conferir minha explicação completa sobre as novas funções [neste link](https://www.marcosmarcolin.com.br/blog/new-array-functions-php-8-4/).

## PDO e SQL: Subclasses específicas para Drivers - [RFC](https://wiki.php.net/rfc/pdo_driver_specific_parsers?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

O PHP 8.4 introduziu novas subclasses no `PDO`, específicas para cada driver de banco de dados suportado: `Pdo\Dblib`, `Pdo\Firebird`, `Pdo\MySql`, `Pdo\Odbc` e `Pdo\Sql`. 

Essas subclasses trazem maior clareza e organização, permitindo acesso a funcionalidades específicas de cada driver, enquanto mantêm a compatibilidade com o `PDO` padrão. Uma melhoria que facilita o trabalho com diferentes bancos de dados de forma mais intuitiva e especializada.

```php
$connection = PDO::connect(
    'sqlite:foo.db',
    $username,
    $password,
); // objeto(Pdo\Sqlite)

$connection->createFunction(
    'prepend_php',
    static fn ($string) => "PHP {$string}",
);

$connection->query('SELECT prepend_php(version) FROM php'); // PHP 8.4
```

## new MyClass()->method() sem parênteses - [RFC](https://wiki.php.net/rfc/new_without_parentheses?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

Agora é possível acessar diretamente métodos e propriedades de um objeto recém-criado sem precisar envolver a expressão `new` com parênteses adicionais. 

Isso torna o código mais limpo e intuitivo, especialmente em chamadas diretas.

```php
class Product
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getFormattedName(): string
    {
        return "Produto: {$this->name}";
    }
}

echo new Product('Notebook')->getFormattedName(); // Produto: Notebook
```
Você pode conferir minha explicação completa sobre as novas funções [neste link](https://www.marcosmarcolin.com.br/blog/php-new-without-parentheses/).

## API de Objetos para BCMath - [RFC](https://wiki.php.net/rfc/support_object_type_in_bcmath)

O novo objeto `BcMath\Number` possibilita o uso de operações matemáticas padrão de forma orientada a objetos com números de precisão arbitrária. 

Esses objetos são imutáveis e implementam a interface `Stringable`, permitindo seu uso em contextos de `string`, como em `echo $num`.

```php
use BcMath\Number;

$price = new Number('199.99');
$discount = new Number('50.00');
$finalPrice = $price - $discount;

echo $finalPrice; // '149.99'
var_dump($finalPrice > $price); // false
```

# Novas classes, interfaces e funções

### Nova implementação JIT baseada no Framework IR - [RFC](https://wiki.php.net/rfc/jit-ir?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

A nova implementação JIT baseada no Framework IR simplifica o código, melhora a detecção de erros, facilita otimizações avançadas e atrai especialistas externos, reduzindo a complexidade e a dependência de poucos desenvolvedores.

### Nova função `request_parse_body()` - [RFC](https://wiki.php.net/rfc/rfc1867-non-post?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

A função `request_parse_body()` permite o parsing de `multipart/form-data` em outros métodos `HTTP`, como `PUT` e `PATCH`, usando a funcionalidade nativa do PHP, atualmente limitada a `POST`. Isso evita parsing manual no código, melhora a performance e permite reutilizar endpoints `POST` facilmente.

### Novas funções `bcceil()`, `bcdivmod()`, `bcfloor()` e `bcround()` - [RFC](https://wiki.php.net/rfc/adding_bcround_bcfloor_bcceil_to_bcmath?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

### Novo Enum `RoundingMode` para `round()` com 4 novos modos de arredondamento: `TowardsZero`, `AwayFromZero`, `NegativeInfinity` e `PositiveInfinity` - [RFC](https://wiki.php.net/rfc/correctly_name_the_rounding_mode_and_make_it_an_enum?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

### Novas funções `http_get_last_response_headers(),` `http_clear_last_response_headers()` e `fpow()`.

### Novas funções `mb_trim()`, `mb_ltrim()`, `mb_rtrim()`, `mb_ucfirst()` e `mb_lcfirst()`.

# Alterações obsoletas e incompatibilidades com versões anteriores

### Tipos de parâmetros implicitamente anuláveis agora estão obsoletos - [RFC](https://wiki.php.net/rfc/deprecate-implicitly-nullable-types?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

Os tipos implicitamente nulos foram `depreciados`, marcando um passo importante para maior clareza e consistência na linguagem. 

Agora, é necessário declarar explicitamente que um tipo pode ser nulo usando `?T` ou `T|null.` 

Essa mudança prepara o terreno para a remoção total dessa funcionalidade no `PHP 9`.

```php
// Antes (válido, mas agora gera aviso de depreciação):
function foo(string $var = null): void {
    // $var pode ser null, mas o tipo não reflete isso explicitamente.
}

// Agora (recomendado):
function foo(?string $var = null): void {
    // Declaração explícita de que $var pode ser null.
}

// Ou
function foo(string|null $var = null): void {
    // Alternativa válida com union types.
}
```

Funções com assinaturas como `function foo(string $var = null)` agora geram o seguinte aviso em tempo de compilação no PHP 8.4:

```php
// Deprecated: Implicitly marking parameter $var as nullable is deprecated, the explicit nullable type must be used instead
```

### O uso de `_` no nome da classe agora está obsoleto.

### A constante `E_STRICT` está obsoleta.

### Alteração de comportamento no uso de `exit()` - [RFC](https://wiki.php.net/rfc/exit-as-function?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024)

No PHP 8.4, `exit` (e `die`) foi transformado de construtor da linguagem para uma função real com a assinatura:

```php
function exit(string|int $status = 0): never {}
```

Ideias Futuras:

- Depreciar o uso de `exit` sem parênteses.
- Executar blocos `finally` ao usar `exit()`.
- Permitir desativar `exit()/die()` via `disable_functions` no `INI`.

## Consideração finais

Em minha opinião, o **PHP** continua entregando versões sólidas que atendem às demandas da comunidade.

Os novos recursos adicionados são extremamente úteis, resolvendo problemas importantes.

Acompanhar o `core` da linguagem é algo que gosto muito, mesmo sem compreender tudo em detalhes. É evidente que muitas melhorias estão sendo implementadas, trazendo mais desempenho ao `runtime`.

Nem preciso entrar na velha discussão sobre o que o PHP é ou deixa de ser; a linguagem tem provado seu valor por conta própria ;)

Não deixe de conferir TUDO no [site oficial](https://www.php.net/?utm_source=blog&utm_medium=post&utm_campaign=php84&utm_id=2024).

Abraços e até a próxima!

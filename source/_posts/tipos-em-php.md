---
extends: _layouts.post
section: content
title: Declaração de tipos em PHP
date: 2023-09-18
description: O PHP é historicamente reconhecido pela sua tipagem dinâmica, caracterizada pela ausência de obrigatoriedade na especificação dos tipos de dados, visto que o mecanismo interno da linguagem cuida dessa tarefa de forma implícita. Esse paradigma é também conhecido como tipagem fraca.
categories: [php]
---

O **PHP** é historicamente reconhecido pela sua tipagem dinâmica, caracterizada pela ausência de obrigatoriedade na especificação dos tipos de dados, visto que o mecanismo interno da linguagem cuida dessa tarefa de forma implícita. Esse paradigma é também conhecido como tipagem fraca.

Nas últimas semanada, tem havido um intenso debate sobre a importância da tipagem de dados em aplicações, e é exatamente esse tema que será abordado neste artigo. Nele, exploraremos como é possível declarar e utilizar tipos de dados em PHP, bem como em quais versões essa funcionalidade está disponível.

Vale ressaltar que não pretendo aqui entrar na discussão sobre se a tipagem é a melhor abordagem em todos os cenários. Pessoalmente, sou um defensor da tipagem sempre que possível, embora compreendo que a ausência dela possa ser justificada, especialmente quando se trata de código legado.

Neste artigo, focaremos apenas nas versões do PHP que introduziram alterações significativas relacionadas à manipulação de tipos de dados, omitindo menção a outras melhorias implementadas em cada versão, a fim de concentrarmos nosso estudo na tipagem de dados.

É possível que esta publicação não abranja todos os aspectos dos tipos, mas tenho certeza de que abrange a maioria deles.

# O que são tipos de dados?

Resumidamente, tipos de dados são classificações que determinam o que um valor pode representar. Por exemplo, um tipo inteiro pode representar números inteiros, enquanto um tipo string pode representar texto.

Os tipos de dados são úteis por vários motivos:

* Permitem que o compilador ou interpretador da linguagem verifique se o código é válido. Por exemplo, o compilador não permitirá que uma variável do tipo inteiro seja atribuída a um valor de texto.
* Ajudam a garantir que o código seja eficiente. O compilador ou interpretador pode otimizar o código de acordo com o tipo de dados das variáveis.
* Facilitam a leitura e a compreensão do código. Os programadores podem usar os tipos de dados para entender o que uma variável representa.

Vamos fazer uma breve incursão na história do PHP e explorar os tipos que ele suporta.

## PHP 4.0(2000)

Lamentavelmente, não tive a oportunidade de trabalhar com a versão 4 do PHP. 

No entanto, ao realizar uma pesquisa, constatei que esta versão não apresentava qualquer indício de tipagem de dados(além de `resource`(recurso)), sendo totalmente dinâmica e dependente do mecanismo interno do PHP para determinar os tipos de dados utilizados com base em seu valor.

O tipo `resource` é um tipo de dados especial que representa um recurso externo, como uma conexão de banco de dados, um arquivo ou um socket. Os recursos são criados por funções específicas de cada extensão do PHP.

Um exemplo clássico é a criação de um arquivo:

```php
$fp = fopen('file.txt', 'w');
var_dump($fp); // resource(2) of type (stream)
```

É importante destacar que a versão 4 foi marcada pela introdução da reescrita de uma parte fundamental do núcleo da linguagem, com a inclusão do Zend Engine. Foi nesse ponto que ocorreram mudanças substanciais que possibilitaram melhorias significativas nas versões subsequentes do PHP.

## PHP 5.0 (2004)

Nessa época, a coisa ficou mais séria com a introdução do *Type Hinting*(dicas de tipo). Agora, você podia dizer explicitamente que tipo de dado esperava nos argumentos das funções.

Só que não se empolgue demais, meu amigo. Não era como hoje em 2023, onde você pode ser específico até dizer "olá" para uma `string`. Nessa época, era aceito apenas objetos, sendo `class/interface`, além do uso de `self`.

Veja um exemplo abaixo, o uso é muito simples.

```php
class Car 
{
  protected $brand;
 	
  public function __construct(Brand $brand)
  {
    $this->brand = $brand;
  }
}

class Brand {}

class Driver {}

new Car(new Brand());
new Car(new Driver()); // Error Argument 1 passed to Car::__construct() must be an instance of Brand, instance of Driver given
```

Basicamente, o construtor de `Car` espera um objeto do tipo `Brand`. Quando não passado, um erro é lançado.

### PHP 5.1 (2005)

Agora a gente teve um novo brinquedo na caixa: o tipo `array`.

Em PHP, um `array` é uma estrutura de dados que armazena uma coleção de valores, como números, strings ou outros tipos de dados, em uma única variável.

```php
function myFunction (array $names)
{
    foreach($names as $name){
        echo $name . PHP_EOL;
    }
}

myFunction(array('Marcos', 'Marcolin')); // Marcos Marcolin
myFunction('Marcos'); // Error Argument 1 passed to myFunction() must be an array, string given
```

### PHP 5.4 (2012)

Um tempinho depois, foi adicionado o tipo `callable`.

Em PHP, `callable` é um tipo de dado especial que representa uma referência a algo que pode ser chamado como uma função ou método.

```php
function apply(callable $callback, $value1, $value2) 
{
    return $callback($value1, $value2);
}

function sum($a, $b) 
{
    return $a + $b;
}

function subtract($a, $b) 
{
    return $a - $b;
}

$resultSum = apply('sum', 10, 2);  // 12
$resultSubtraction = apply('subtract', 10, 2); // 8

$resultMultiplication= apply('multiplication', 10, 2);  // Error Argument 1 passed to apply() must be callable, string given \ FATAL ERROR Call to undefined function multiplication()
```

Obviamente, se você passar um `callback` que não exista, resulta em um erro fatal.

## PHP 7.0 (2015)

Chegamos finalmente à versão 7.0 do PHP, que ganhou notoriedade devido às otimizações significativas realizadas no núcleo da linguagem, juntamente com várias melhorias.

Contudo, nosso foco agora é sobre os aspectos relacionados aos tipos.

Primeiramente, é importante destacar que a terminologia mudou. Não se trata mais de _Type Hinting_(dicas de tipo), mas sim de _Type Declarations_(declaração de tipos). 
Além disso, foram introduzidas as declarações de tipos escalares, que abrangem strings`(string)`, inteiros`(int)`, números de ponto flutuante`(float)` e booleanos`(bool)`. Essa alteração representou uma evolução notável, consolidando uma abordagem mais rigorosa no tratamento de tipos na linguagem.

Veja a seguir alguns exemplos.

* `string`

```php
function greet(string $name) 
{
  return "Hello, $name!";
}

echo greet("Marcos"); // Hello, Marcos
```

* `int`

```php
function calculateAge(int $birthYear) 
{
    return date('Y') - $birthYear;
}

echo calculateAge(1994); // 29
echo calculateAge('1994'); // 29
```

* `float`

```php
function calculateTotalPrice(float $unitPrice, int $quantity) 
{
    return $unitPrice * $quantity;
}

echo calculateTotalPrice(12.5, 5); // 62.5
```

* `bool`

```php
function printStatus(bool $status) 
{
    return $status ? "Enabled" : "Disabled";
}

echo printStatus(true);  // Enabled
echo printStatus(false); // Disabled
```

E é claro, não podemos deixar de mencionar as _return type declarations_, ou seja, as declarações de tipos de retorno, que complementam as declarações de tipos nos argumentos.

Isso significa que agora temos a capacidade de especificar o tipo de dado que uma função irá retornar. Vamos aproveitar dois exemplos anteriores para ilustrar isso.

* Retorno do tipo `string`

```php
function greet(string $name): string 
{
  return "Hello, $name!";
}

echo greet("Marcos"); // Hello, Marcos
```

* Retorno do tipo `int`

```php
function calculateAge(int $birthYear): int 
{
    return date('Y') - $birthYear;
}

echo calculateAge(1994); // 29
```

Nesta versão, também foi introduzido o suporte para `Strict Types`(tipos estritos), complementando os tipos coercitivos.

Mas o que isso significa? No PHP, a declaração `declare(strict_types=1);` é utilizada para habilitar o modo estrito de tipos. O modo estrito de tipos implica que conversões implícitas entre tipos de dados não são permitidas, assegurando uma verificação rigorosa dos tipos de argumentos e valores de retorno de funções. Isso contribui para evitar comportamentos inesperados e erros relacionados a tipos de dados em seu código.

Para habilitar o modo estrito de tipos em um arquivo PHP, você pode incluir a declaração `declare(strict_types=1)` no início do arquivo.

```php
<?php

declare(strict_types=1);

function calculateAge(int $birthYear) 
{
    return date('Y') - $birthYear;
}

echo calculateAge(1994); // 29
echo calculateAge('1994'); // FATAL ERROR Uncaught TypeError: Argument 1 passed to calculateAge() must be of the type integer, string given
```

Você percebeu que no exemplo anterior, ao passar uma saída como `string` , o resultado foi 29? Agora, com o uso dos tipos estritos, a validação torna-se mais rigorosa, levando a erros fatais, e isso é altamente benéfico.

### PHP 7.1 (2016)

Na versão 7.1 do PHP, foram introduzidos dois novos recursos importantes: os _Nullable Types_(tipos nulos)e o tipo _Iterable_(iterável), juntamente com o retorno do tipo `void.

* _Nullable Types_

Os tipos nulos em PHP se referem à capacidade de declarar que uma variável ou um parâmetro de função pode aceitar um valor de um tipo específico ou o valor null. Isso permite que você indique explicitamente que uma variável pode não ter um valor definido.

Essa funcionalidade foi introduzida através do uso do operador `?` antes do tipo de dado, indicando que a variável pode ser nula. Por exemplo, `?string` significa que a variável pode ser uma `string` ou nula. Essa adição ao PHP proporciona uma maneira mais precisa de lidar com variáveis que podem ou não ter um valor válido.

```php
function greet(?string $name) 
{
    if ($name === null) {
        echo "Hello, anonymous!";
    } else {
        echo "Hello, $name!";
    }
}

greet(null); // Hello, anonymous!
greet('Marcos'); // Hello, Marcos!
```

* _Iterable_

O tipo `Iterable` se refere a qualquer valor que pode ser iterado através de um loop `foreach()`, e pode ser empregado como um tipo de dados para argumentos de função e valores de retorno de função. Isso significa que variáveis declaradas com o tipo `Iterable` podem conter coleções de dados que podem ser facilmente percorridas e processadas usando a estrutura de loop `foreach()`.

```php
function sumValues(Iterable $numbers) 
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

$array = [1, 2, 3, 4, 5];
$result = sumValues($array);
echo "Sum: $result"; // Sum: 15
```

* Retorno do tipo `void`

O retorno do tipo `void` em PHP é uma declaração que você pode usar ao definir uma função para indicar que essa função não retorna nenhum valor.

Essa declaração é útil quando uma função tem efeitos colaterais desejados, mas não precisa retornar nenhum dado específico como resultado de sua execução.

```php
function greetUser(string $name): void 
{
    echo "Hello, $name!";
}

greetUser("Marcos"); // Hello, Marcos
$greet = greetUser("Marcolin"); // FATAL ERROR Uncaught TypeError: Return value of greetUser() must be an instance of void, none returned
```

### PHP 7.2 (2017)

Esta versão introduziu suporte a `object` como parâmetro de função ou valor de retorno.

Para utilizar, basta especificar a palavra-chave `object` antes do tipo do parâmetro ou valor de retorno.

```php
function getClassName(object $obj): string
{
    return get_class($obj);
}
var_dump(getClassName(new stdClass())); // string(8) "stdClass"
var_dump(getClassName('class')); // FATAL ERROR Uncaught TypeError: Argument 1 passed to getClassName() must be an object, string given
```

```php
function getObject(): object 
{
    return json_decode('{}');
}
var_dump(getObject()); // object(stdClass)#1 (0) { }
```

### PHP 7.4 (2019)

A versão 7.4 do PHP trouxe o suporte para _Typed properties_(propiedades tipadas), permitindo a declaração de tipos em propriedades de classes.

As propriedades tipadas permitem que você especifique o tipo de dados das propriedades de uma classe. Isso significa que você pode declarar explicitamente qual tipo de dado uma propriedade de classe pode conter. As propriedades tipadas são particularmente úteis para impor restrições de tipos de dados e aprimorar a clareza do código, garantindo que as propriedades de uma classe contenham apenas os tipos de dados esperados.

```php
class Person 
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$person = new Person("Marcos", 29); // Ok
$person2 = new Person("Marcolin", '29'); // Ok
```

Com a utilização de `declare(strict_types=1);`, a saída será afetada, uma vez que isso habilita o modo estrito de tipos no PHP.

```php
declare(strict_types=1);

// code...

$person = new Person("Marcos", 29); // Ok
$person2 = new Person("Marcolin", '29'); // FATAL ERROR Uncaught TypeError: Argument 2 passed to Person::__construct() must be of the type int, string given,
```

É fundamental destacar que as propriedades tipadas não se restringem a dados escalares apenas. Você pode utilizar propriedades tipadas com uma ampla variedade de tipos de dados, abrangendo desde dados escalares até objetos, arrays e outros tipos complexos.

```php
class Address 
{
    public string $street;
    public string $city;
    public string $zipCode;

    public function __construct(string $street, string $city, string $zipCode) 
    {
        $this->street = $street;
        $this->city = $city;
        $this->zipCode = $zipCode;
    }
}

class Person 
{
    public string $name;
    public int $age;
    public Address $address;

    public function __construct(string $name, int $age, Address $address) 
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }
}

$address = new Address("123 Main St", "Cityville", "12345");
$person = new Person("John", 30, $address);
```

## PHP 8.0 (2020)

A versão 8.0 do PHP trouxe uma série de melhorias e novidades que surpreenderam positivamente os entusiastas da linguagem e sua vasta comunidade, incluindo a introdução do JIT (_Just-In-Time compiler_) e outras funcionalidades.

No que diz respeito aos tipos, uma das adições notáveis foi o suporte aos _Union Types_(união de tipos), particularmete, eu adoro esse recurso.

Os _Union types_ permitem que você declare que um parâmetro, um valor de retorno ou uma propriedade de classe pode aceitar valores de dois ou mais tipos diferentes. Os tipos são especificados separados por um caractere de barra vertical `|`.

```php
function printValue(string|int $value) 
{
    echo "The value is: $value\n";
}

printValue("Hello, World!"); // The value is: Hello, World!
printValue(2023); // The value is: 2023
```

Agora, vamos aplicar o uso de _Union Types_ no retorno de uma função:

```php
function generateValue(bool $useString): string|int 
{
    if ($useString) {
        return "Hello, World!";
    } else {
        return 2023;
    }
}

echo generateValue(true); // Hello, World!
echo generateValue(false); // Hello, 2023!
```

Além disso, foi introduzido o tipo pseudo `mixed`, que representa um parâmetro, retorno ou propriedade que pode assumir qualquer tipo de valor.

`mixed` é equivalente a união dos tipos `string|int|float|bool|null|array|object|callable|resource`.

```php
class Example {
    public mixed $exampleProperty;
    public function foo(mixed $foo): mixed {}
}
```

Não é permitido converter uma variável para o tipo `mixed`, pois este não é um tipo real, mas sim um tipo pseudo.

```php
$foo = (mixed) $bar; // FATAL ERROR syntax error
```

O tipo `mixed` também não pode ser usado em uniões de tipos.

```php
function foo (mixed|FooClass $bar): int|mixed {} // Fatal error: Type mixed can only be used as a standalone type
```

## PHP 8.1 (2021)

A versão 8.1 do PHP trouxe _Intersection Types_(tipos de interseção) e o tipo de retorno `never.

* _Intersection Types_

Complementando o recurso introduzido na versão 8.0, agora é possível declarar um tipo para um parâmetro, propriedade ou retorno de método que deve pertencer a todos os tipos de classe/interface declarados na interseção. 
Isso representa o oposto dos _Union Types_, que permitem qualquer um dos tipos declarados, permitindo um maior controle sobre os tipos aceitáveis em um contexto específico.

```php
function login(User & CanLogin $user): void
{
    // code
}
```

Apenas valores que sejam instâncias da classe `User` e implementem a interface `CanLogin` podem ser passados para esta função.

Agora, no que diz respeito aos retornos:

```php
class User
{
    public User & CanLogin $currentUser;

    public function getLoggedInUser(): User & CanLogin
    {
        return $this->currentUser;
    }
}
```

A propriedade `currentUser` deve ser uma instância da classe `User` e implementar a interface `CanLogin`. O método `getLoggedInUser()` retorna uma instância da classe `User` que também implementa a interface `CanLogin`.

* Tipo de retorno `never`

O tipo de retorno `never` é um recurso que permite declarar uma função ou método que nunca retornará um valor. Isso é útil para funções que têm a finalidade de sempre lançar uma exceção ou encerrar a execução do script, garantindo que nenhum valor de retorno seja gerado.

```php
function redirect(string $uri): never 
{
    header('Location: ' . $uri);
    exit();
}
```

É importante lembrar que o tipo de retorno `never` indica que a função não deve retornar um valor e deve ser finalizada de forma abrupta, por exemplo, lançando uma exceção ou utilizando a função `exit`. Qualquer tentativa de retornar um valor diferente disso resultará em um erro fatal.

```php
function dispatch(string $message): never 
{
    echo $message;
}

dispatch('test'); // FATAL ERROR Uncaught TypeError: dispatch(): never-returning function must not implicitly return

function foo(): never 
{
    return;
}
foo(); // FATAL ERROR A never-returning function must not return
```

## PHP 8.2 (2022)

A inclusão de tipos *stand alone*(autônomos), que englobam null`, `true` e `false`, no PHP 8.2, permite que os desenvolvedores declarem que um parâmetro, propriedade ou retorno de método pode assumir um desses valores.

Resumidamente, isso significa que o retorno sempre estará de acordo com a definição escolhida.

Antes do PHP 8.2, a definição de funções era feita da seguinte maneira:

```php
function alwaysFalse(): bool
{
    return false;
}
```

Agora, temos a capacidade de escrever da seguinte forma:

```php
function alwaysFalse(): false
{
    return false;
}
```

O mesmo princípio se aplica também para `null` e `true`.

Essa adição, embora possa não ser particularmente empolgante para alguns, enriquece a linguagem com recursos adicionais que podem ser úteis em diversos cenários de desenvolvimento.

Outra adição desta versão é _Disjunctive Normal Form Types_(tipos de forma normal disjuntiva), uma nova forma de declarar tipos de dados que permite combinar tipos de união e interseção.

Com a introdução de tipos de união em PHP 8.0, foi possível declarar que um valor poderia ser de um ou mais tipos. Com a introdução de tipos de interseção em PHP 8.1, foi possível declarar que um valor deveria pertencer a todos os tipos especificados.

_DNF Types_ permitem combinar essas duas formas de declarar tipos. Por exemplo, o tipo `string|int|object` pode ser declarado como `(string&object)|(int&object)`, e podem ser usados em qualquer lugar onde tipos de dados são aceitos, como parâmetros, retornos de funções e propriedades.

```php
function foo(mixed $value): (string|int|object) 
{
  // code
}
```

Esta função pode receber qualquer tipo de valor, incluindo strings, números inteiros e objetos.

```php
class Bar 
{
  public (string|int|object) $value;
}
```

Esta classe tem uma propriedade value que pode ser atribuída a qualquer tipo de valor, incluindo strings, números inteiros e objetos.

## PHP 8.3 (2023)

A versão 8.3 do PHP, com previsão para novembro de 2023, incluirá um recurso interessante chamado _Typed class constants_(constantes de classe tipadas).

O recurso _Typed class constants_ é uma adição significativa que permite declarar um tipo para as constantes de classe. Isso assegura a compatibilidade de tipos das constantes, mesmo quando classes filhas ou implementações de interface as sobrescrevem.

Para declarar uma constante de classe com um tipo, utilize a seguinte sintaxe:

```php
class Foo
{
    public const BAR: string = 'bar';
}
```

Neste exemplo, a constante BAR é declarada como uma `string`. Isso significa que apenas strings podem ser atribuídas à constante `BAR` e suas sobrescritas em subclasses.

## Conclusões

A evolução contínua da linguagem PHP ao longo do tempo é uma prática fundamental e esperada. A introdução de recursos relacionados a tipos de dados desempenha um papel crucial nessa evolução. O uso de tipos oferece benefícios significativos, tais como maior segurança na validação de dados, o que, por sua vez, facilita o desenvolvimento e a manutenção de código mais ágil e funcional.

Como mencionei anteriormente, sou um defensor do uso de tipos. No entanto, é importante lembrar que ao introduzir tipos em aplicações legadas, podem surgir erros, uma vez que nem sempre se conhece com precisão os tipos de dados que estão sendo passados ou retornados por uma função.

Quando se trata de escrever novo código, é essencial incorporar tipos como medida preventiva contra erros e resultados inesperados.

À medida que novos recursos, como Typed properties, Union Types, Intersection Types, Typed class constants e outros, são incorporados à linguagem, os desenvolvedores têm à disposição ferramentas mais poderosas para criar sistemas robustos e eficientes. Isso contribui para elevar o nível de qualidade dos projetos PHP

## Referências

* [php.net](http://www.php.net/)
* [php.watch](https://php.watch/)
* [RFCs PHP](https://wiki.php.net/rfc)
* [stitcher.io](https://stitcher.io/blog)
* [Blog Hostinger](https://www.hostinger.com.br/blog/)
* [Sean Dreilinger](https://durak.org/sean/pubs/)
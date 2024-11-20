---
extends: _layouts.post
section: content
title: Property Hooks no PHP 8.4
date: 2024-04-15
description: O PHP *vai permitir* Ganchos de Propriedade na versão 8.4.0.
categories: [php, phprfc, php84, opensource]
---

## Property Hooks

Há algum tempo, a comunidade vem discutindo a implementação dos `Property Hooks`, ou `Ganchos de Propriedade`, como são chamados em português.

Agora, chegou-se a um consenso e sua implementação estará disponível no PHP 8.4.

Essa funcionalidade foi inspirada em outras linguagens, como `C#`, `Kotlin` e `Swift`.

Este artigo é um resumo da `RFC` criada por Ilija Tovilo e Larry Garfield. O link para a RFC completa está disponível no final deste post.

Destaquei os pontos mais interessantes neste momento, mas posso escrever outro artigo abordando o que ficou de fora.

## Motivação

Quando precisamos encapsular uma propriedade de classe, geralmente recorremos à criação de `getter` e `setter`, certo? 
Se essa foi a sua primeira ideia, estamos na mesma página. 
Por exemplo, se temos uma classe `User` com o atributo `$name`, é comum criar métodos `getName()` e `setName()` para acessar e modificar essa propriedade.

Assim, o exemplo mencionado acima seria representado da seguinte forma:

``` php
class User { 
	private string $name;
	
	public function __construct(string $name) {
		$this->name = $name;
	}
	
	public function getName(): string {
		return $this->name;
	}
	
	public function setName(string $name): void {
		$this->setName = $name
	}
}
```

No PHP 8.0, podemos simplificar ainda mais ao usar `Constructor Property Promotion`, que nos permite definir a propriedade diretamente nos argumentos do construtor.

``` php
class User { 
	public function __construct(public string $name) {
		$this->name = $name;
	}
}
```

Fique atento, pois o atributo é `public`, caso precise ser `private`, não haverá como evitar a necessidade de `getter` e `setter`.

Além disso, podemos recorrer aos métodos mágicos `__set` e `__get`, no entanto, eles são executados para todos os atributos das classes, 
o que significa que seria necessário verificar qual atributo está sendo escrito ou lido no momento e, se necessário, 
aplicar validações específicas. Isso resulta em um código confuso e de difícil leitura.

``` php
class User 
{
    private string $name;
 
    public function __construct(string $name) {
        $this->name = $name;
    }
 
    public function __get(string $prop): mixed {
        return match ($prop) {
            'name' => $this->name,
            default => throw new Error("Propriedade $prop não definida."),
        };
    }
 
    public function __set(string $prop, $value): void {
        switch ($prop) {
            case 'name':
                if (! is_string($value)) {
                    throw new TypeError('Nome deve ser uma string');
                }
                if (strlen($value) === 0) {
                    throw new ValueError('Nome não pode ser vazio');
                }
                $this->name = $value;
                break;
            default:
                throw new Error("Erro ao definir a propriedade $prop");
        }
    }
}
```

Você notou como o código pode se tornar confuso? Agora, imagine se a classe tiver várias propriedades.

## Utilização

Os `Ganchos de Propriedade` foram projetados para facilitar a aplicação de comportamentos adicionais de forma específica para uma única propriedade.

Por exemplo, podemos verificar se o `$name` está vazio.

``` php
class User 
{
    public string $name {
        set {
            if (strlen($value) === 0) {
                throw new ValueError("Nome não pode ser vazio");
            }
            $this->name = $value;
        }
        get { 
            return strtoupper($this->name);
        }
    }
 
    public function __construct(string $name) {
        $this->name = $name;
    }
}
```

Atualmente, a `RFC` introduziu dois ganchos, `get` e `set`, mas o design desenvolvido é flexível o suficiente para permitir a inclusão de mais ganchos no futuro.

Além disso, a sintaxe proposta também suporta uma forma abreviada ou sintaxe curta.

``` php
class User 
{
    public string $name {
        get => strtoupper($this->name);
    }
 
    public function __construct(string $name) {
        $this->name = $name;
    }
}
```

### Interfaces

Essa funcionalidade também pode ser utilizada dentro de `Interfaces`.

``` php
interface Named
{
    public string $name { get; }
}
 
class User implements Named
{
    public function __construct(public readonly string $name) {}
}
```

### get

O gancho `get` se definido, substitui o comportamento padrão de leitura do PHP.

``` php
class User
{
    public function __construct(private string $firstName, private string $lastName) {}
 
    public string $fullName {
        get { 
            return $this->firstName . " " . $this->lastName;
        }
    }
}
 
$user = new User('Marcos', 'Marcolin');
echo $user->fullName; // Marcos Marcolin
```

Obviamente, os tipos são validados em tempo de execução, portanto, o gancho deve retornar o tipo definido na propriedade.

No exemplo mencionado, `$fullName` não é uma propriedade gravável, então resultará em um erro ao tentar escrever nela.

No exemplo a seguir, a escrita é permitida, então podemos fazer:

``` php
class User
{
    public string $name {
        get {
            return strtoupper($this->name);
        }
    }
}
 
$user = new User();
$user->name = 'marcos'; // O valor salvo será 'marcos'
echo $user->name; // A saída será 'MARCOS'
```

## set

O gancho `set` se definido, substitui o comportamento padrão de gravação do PHP.

``` php
class User
{
    public function __construct(private string $firstName, private string $lastName) {}
 
    public string $fullName {
        set (string $value) {
            [$this->firstName, $this->lastName)] = explode(' ', $value, 2);
        }
    }
 
    public function getFirst(): string {
        return $this->firstName;
    }
}
 
$user = new User('Marcos', 'Marcolin');
$user->fullName = 'Rasmus Lerdorf';
echo $user->getFirst(); // Rasmus
```

**O gancho aceita apenas um argumento**, se específicado, deve informar o tipo e nome do parâmetro.

### set implícito

Se o tipo da propriedade for definida, pode-se o omitir o tipo do argumento do gancho.

``` php
public string $fullName  { 
    set (string $value) { 
        [$this -> first, $this -> last] = explode ('',  $value ,  2); 
    } 
}

// Omite o tipo
public string $fullName { 
    set { 
        [$this -> first, $this -> last] = explode (' ',  $value,  2); 
    } 
}
```

**Se o parâmetro não for especificado, o padrão será `$value`.**

Como mencionei anteriormente com o `get`, também é possível usar a sintaxe curta para o `set`.

``` php
class User {
    public string $username {
        set(string $value) {
            $this->username = strtolower($value);
        }
    }
 
    // Sintaxe curta
    public string $username {
        set => strtolower($value);
    }
}
```

## Herança

Uma classe filha pode definir ou redefinir ganchos individuais em uma propriedade ao redefinir a própria propriedade e apenas 
os ganchos que deseja substituir. O tipo e a visibilidade da propriedade estão sujeitos às suas próprias regras, 
independentemente desta `RFC`.

Além disso, uma classe filha pode adicionar ganchos a uma propriedade que não possui nenhum.

``` php
class Point
{
    public int $x;
    public int $y;
}
 
class PositivePoint extends Point
{
    public int $x {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('X não pode ser negativo.');
            }
            $this->x = $value;
        }
    }
}
```

Cada gancho substitui as implementações pai independentemente umas das outras.

## Ganchos finais

Os ganchos também podem ser declarados `final`, **nesse caso, não podem ser substituídos.**

``` php
class User 
{
    public string $username {
        final set => strtolower($value);
    }
}
 
class Manager extends User
{
    public string $username {
        // Isso é permitido
        get => strtoupper($this->username);
        // Isso não é permtido
        set => strtoupper($value);
    }
}
```

Bom, eu vou parando por aqui. :)

Espero que tenham gostado desta breve introdução aos `Property Hooks`.

Você pode ler mais sobre a proposta na publicação oficial: [clique aqui](https://wiki.php.net/rfc/property-hooks).

Até a próxima e abraços! 🐘


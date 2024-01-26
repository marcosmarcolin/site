---
extends: _layouts.post
section: content
title: Criando sua primeira extensão em C para PHP
date: 2023-12-26
description: Esse estudo foi motivado por uma curiosidade que gerou uma demanda de trabalho.
categories: [php, phpfoundation, opensource, c]
---

Anteriormente, abordei a **importância da determinação ao enfrentar desafios na programação**. Para quem tiver interesse, o link está disponível no final deste post, evitando distrações.

No último mês do ano passado, tive a oportunidade de apresentar uma palestra sobre o desenvolvimento de extensões em `C` para o `PHP`. 
O principal objetivo foi compartilhar conhecimento, contribuindo assim para o aprimoramento das minhas habilidades nesta área específica.

Essa apresentação foi realizada inicialmente para um público mais restrito na PHP Conference 2023, como [mencionado anteriormente](https://www.marcosmarcolin.com.br/blog/php-conference-2023/). 
Posteriormente, ampliei a audiência para cerca de 40 pessoas na [IXCSoft](https://ixcsoft.com/), local onde a palestra teve origem.

Fiquei extremamente satisfeito por poder compartilhar esse conteúdo e desmistificar, em parte, um assunto complexo e frequentemente carente de informações. 

Abaixo, você pode conferir detalhes mais técnicos sobre o conteúdo apresentado.

## Desenvolvendo sua primeira extensão em C para PHP

Durante a apresentação, destaquei alguns pontos **para a criação de extensões para o PHP**, fazendo uso de recursos da `Zend Engine` que facilitam o processo de desenvolvimento. 🐘

Como exemplo, demonstrei a criação de uma extensão em `C` que disponibiliza a função `base64_validate()` na _userland(PHP)_. Além disso, explorei a abordagem orientada a objetos por meio da criação de uma classe.

O _stub_ do código ficou da seguinte maneira:

```php
<?php

function base64_validate(string $str = ''): bool {}

class PHPConfBR
{
    public function base64_validate(string $str = ''): bool {}
}
```

Os principais tópicos abordados na apresentação incluem:

- Compreensão do ciclo de vida do PHP.
- Exploração do conceito de extensões.
- Motivações para o desenvolvimento de uma extensão em Linguagem C.
- Interação com o núcleo da linguagem (Zend Engine) por meio de extensões.
- Processo de construção de uma extensão em C para utilização no PHP.

Entre outros temas abordados de forma resumida.

Os slides da apresentação estão disponíveis no [SpeakerDeck](https://speakerdeck.com/marcosmarcolin/desenvolvendo-sua-primeira-extensao-em-c-para-php).

O exemplo completo encontra-se no meu repositório no [GitHub](https://github.com/marcosmarcolin/phpconfbr_2023).

A quem participou, muito obrigado por seu apoio. 🤝

---

Artigo citado no início deste post: [Seja determinado para resolver problemas desafiadores em Programação
](https://www.marcosmarcolin.com.br/blog/seja-determinado-em-programacao/).

---

Espero que apreciem a leitura e, caso tenham alguma dúvida ou comentário, fiquem à vontade para compartilhar.

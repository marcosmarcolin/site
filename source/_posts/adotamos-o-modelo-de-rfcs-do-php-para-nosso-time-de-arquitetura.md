---
extends: _layouts.post
section: content
title: Adotamos o ‘modelo’ de RFC’s do PHP para nosso time de Arquitetura
date: 2022-12-07
description: Adotamos o ‘modelo’ de RFC’s do PHP para nosso time de Arquitetura
categories: [php, arquitetura, rfc]
---

No início de 2021, um desenvolvedor com mais tempo de ‘casa’ e um dos principais do meu empregador, teve ideia de iniciar um time interno no setor de desenvolvimento. A fim de estudar **Arquitetura de Software** e aplicar nos projetos, além de discutir novas soluções.

## O Time de Arquitetura

Para este time foram convidadas algumas pessoas para participarem com a finalidade de **discutir problemas de arquitetura, estudar padrões de projetos, propor soluções, entre outras coisas.** Esse time tem encontros geralmente com um intervalo de 7 à 10 dias para discutir novas demandas e revisar as que estão em progresso.

No início, praticamente todas as questões envolviam a resolução e melhorias de código com a linguagem PHP, envolvendo em torno de 8 profissionais. Atualmente o time já está na casa das dezenas no número de participantes e conta com profissionais de especialidades diversas. São discutidos temas como padronização de projetos, utilização de design patterns, refatorações, testes, otimizações de código e consultas, Javascript, NodeJS e mais um montão de coisas.

Não irei prolongar aqui sobre este time, talvez em outro artigo farei a abordagem mais detalhada.

## RFC*(Request for Comments)*

Caso não conheça o que é RFC, deixarei um link com maiores detalhes no final deste artigo.

Em resumo, é um modelo adotado por algumas tecnologias para aceitar/receber sugestões de mudanças. Em uma linguagem como PHP, pode ser uma depreciação ou exclusão de uma funcionalidade, pequeno ajuste ou feature, por exemplo. E isso tudo é resolvido de forma democrática, através de pessoas com direito à votação.

Desde que conheço o PHP(meados de 2010), é utilizado o processo de RFC para decidir mudanças e elas podem ser abertas por qualquer pessoa interessada. Leia [aqui](https://wiki.php.net/rfc/howto) como iniciar uma.

* * *

Voltando ao assunto principal: conforme nosso time aumentou, consequentemente a demanda também e isso foi um start para uma melhor organização do que já vinhamos discutindo. E como devemos respeitar a democracia, por que não utiliza-lá em nosso time?

Posteriormente, foram surgindo questões para serem debatidas e com isso surgem divergências de opiniões. Tendo esse imbróglio, sugeri adotarmos o **modelo de [RFC](https://wiki.php.net/rfc) utilizado no desenvolvimento do core do PHP em nosso time,** sendo assim, possível propor soluções com um detalhamento maior, além de uma votação justa.

Claro que, não desenvolvemos um sistema de votação idêntico ao que à Linguagem usa, com permissões, controle de votos e etc. Nós simplificamos e incrementamos em nosso quadro do Notion. O [Marcelo](https://www.linkedin.com/in/marcelo-acordi/?lipi=urn%3Ali%3Apage%3Ad_flagship3_people_connections%3B8hgq6cacRZiTGzl6%2FEj4Nw%3D%3D), nosso maestro da ferramenta nos ajudou nesta tarefa.

Hoje temos a seguinte estrutura:

![Menu do Notion com o esquema de RFCs](/assets/images/blog/rfcs-1.png)

**Desta maneira, podemos organizar as RFCs de uma forma simples e democrática.** Quando um tema gera uma discussão com divergência de opiniões, sugerimos o autor escrever uma RFC com mais detalhes e abrir para votação. Abaixo você pode visualizar alguns temas discutidos recentemente.

![Tabela com algumas RFCs discutidas e aprovadas](/assets/images/blog/rfcs-2.png)

No item da RFC no Notion, é possível visualizar quem aprovou ou reprovou, bem como a quantidade de votos a favor e contra. Caso alguém tenha alguma dúvida ou outro ponto a ser destacado, é possível comentar no item e iniciar uma discussão.

![Detalhe de uma RFC](/assets/images/blog/rfcs-3.png)

Para iniciar uma RFC, é necessário preencher algumas informações, dentre elas:

* Introdução ao assunto
* Proposta
* Alterações incompatíveis com versões anteriores(possíveis depreciações)
* Impacto
* Tarefas abertas com o tema
* Patches e testes

Para facilitar a escrita, o Marcelo já deixou pronto um template com as informações acima.

## Conclusão

**Até o momento os processos estão fluindo bem,** mesmo que as operações são manuais, pois não existe nenhuma automatização para fechar a RFC pós um período de tempo aberto ou ter uma quantidade miníma de votos, por exemplo.

Portanto, o autor e o presidente do grupo no mês, ficam responsáveis por ‘cobrar’ os integrantes para votarem ou discutirem. Não tem determinado um prazo máximo para discussão, mas estamos resolvendo isso atualmente.

Preciso destacar que nem tudo que é discutido é aberto uma RFC. A maioria dos temas são resolvidos em pequenos cartões no Board do Notion e revisados semanalmente.

Hoje, temos em torno de 60 desenvolvedores na equipe de desenvolvimento e este modelo está adequando-se ao nosso processo e pretendemos continuar evoluindo-o. **Nosso objetivo é não burocratizar, mas sim tomar decisões com base nos benefícios que podemos obter através das RFCs e de uma forma justa, não concentrando apenas em algumas pessoas.**

**E aí, como vocês organizam essas demandas de Arquitetura? Conta aí!**

* * *

Obrigado por sua atenção e até o próximo artigo!

Agradecimento especial ao [Jean Detoni](https://br.linkedin.com/in/jean-cesar-detoni-0a0237b6) por iniciar o time de Arquitetura e ao [Marcelo](https://www.linkedin.com/in/marcelo-acordi/?lipi=urn%3Ali%3Apage%3Ad_flagship3_people_connections%3B8hgq6cacRZiTGzl6%2FEj4Nw%3D%3D) por estruturar toda nossa organização no Notion.

## Links úteis

* https://wiki.php.net/rfc
* https://pt.wikipedia.org/wiki/Request_for_Comments
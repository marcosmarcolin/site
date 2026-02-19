---
extends: _layouts.post
section: content
title: 🐘 PHP 30 Anos – Uma conversa com Larry Garfield
date: 2026-02-18
description: Entrevista da série PHP 30 Anos com Larry Garfield.
categories: [ php, comunidade, php30anos ]
---

> 🇺🇸 **Esta entrevista também está disponível
em [Inglês](https://www.marcosmarcolin.com.br/blog/php-30-years-larry-garfield-en/).**

Esta entrevista faz parte da série **PHP 30 Anos – Entrevista com Contribuidores**, criada para celebrar as três décadas
da linguagem e destacar as pessoas que ajudaram e continuam ajudando a moldar o ecossistema PHP.

Larry Garfield é uma das vozes mais respeitadas do ecossistema PHP moderno.
Contribuidor de longa data do Drupal, ele liderou a iniciativa de *Web Services* do Drupal 8, que ajudou a transformar o
Drupal em uma plataforma PHP moderna.
Ele já atuou como *Principal Engineer* na MakersHub, *Staff Engineer* na TYPO3 e na LegalZoom, e *Director of Developer
Experience* na Platform.sh.

Larry é membro do *Core Committee* da PHP-FIG e coautor de várias RFCs importantes do PHP, incluindo propostas relacionadas
a **`Enums`**, **`Property Hooks`** e ao **`Pipe Operator`**.

Ele também é autor de vários livros sobre PHP, incluindo _Thinking Functionally in PHP_ e _Exploring PHP 8.0_.

A seguir, você confere a entrevista completa.

---

### Houve algum mentor, pessoa ou referência que influenciou sua jornada com PHP?

Eu não tive um mentor específico e ativo, mas certamente fui influenciado por muitas pessoas ao longo dos anos, direta e
indiretamente.

Fabien Potencier, famoso por seu trabalho com o Symfony, se destaca como alguém de quem aprendi muito, mesmo que não diretamente.

Meu colaborador de RFCs, Ilija Tovilo, foi uma grande fonte de aprendizado.

### Como começou a sua jornada com PHP e o que motivou você a continuar contribuindo ativamente com a linguagem?

Eu tive meu primeiro contato com PHP 3 em 1999, na faculdade, por recomendação de um amigo. Achei mais acessível do que
muitas outras coisas e, como eu já me interessava por desenvolvimento web, mergulhei de cabeça. Eventualmente, comecei a
fazer consultoria freelancer para políticos locais, e foi aí que eu passei pela fase “todo dev PHP inventa seu próprio
CMS e depois abandona”. Tenho o prazer de dizer que nenhum código meu daquela época ainda existe.

Depois do mestrado e de uma breve passagem pelo jornalismo de tecnologia, consegui um emprego em uma pequena agência local
que usava PHP, embora, olhando para trás, não muito bem. Por volta dessa época (2005), eu também me envolvi com o
Drupal, inicialmente porque eu procurava um projeto do qual pudesse aprender para construir um novo BBS para o meu clube
online de RPG de Star Trek. (Sim, eu sou nerd.) No fim, acabei usando o Drupal para isso e também fui “puxado” para o
Drupal em si. Foi o primeiro projeto *Open Source* para o qual contribuí, e eu me tornei, ao longo da década seguinte, um
dos desenvolvedores líderes. Com o tempo, em parte (mas não exclusivamente) por causa do meu envolvimento, aquela agência
cresceu e virou uma das principais consultorias de Drupal do mundo.

Em 2007, no DrupalCon Sunnyvale, Rasmus Lerdorf implorou para que a comunidade Drupal abandonasse o suporte ao PHP 4 e
focasse no PHP 5, algo que poucos projetos faziam por medo de perder mercado, já que a maioria dos provedores de hospedagem (ao que parecia)
não oferecia suporte ao PHP 5. Jonah Braun, do Joomla, sugeriu para outro colega meu do Drupal, durante um piquenique,
que os projetos deveriam coordenar a migração para o PHP 5 ao mesmo tempo. Esse colega mencionou isso em um comentário de
blog, eu li, e assim começou a campanha _GoPHP5_, para coordenar vários projetos e provedores de hospedagem se comprometendo a suportar PHP 5.2
de uma vez só (na época, a versão mais recente).

Nós lançamos em 5 de janeiro de 2007 com 6 projetos e 3 provedores de hospedagem comprometidos a suportar apenas PHP 5.2 nas próximas
versões. Um mês depois, já tínhamos mais de 100 projetos e 200 provedores de hospedagem aderindo, e o time do **PHP Internals** tinha
decidido abandonar o suporte ao PHP 4 também. Nós conseguimos enterrar uma linguagem (PHP 4) e, eu acredito, salvamos
o PHP.

Depois disso, escrevi o novo DBAL do Drupal 7, que ainda é usado até hoje. No Drupal 8, eu liderei o esforço para
modernizar a base de código, integrar componentes do Symfony e, de modo geral, reformular todo o sistema. Isso aconteceu
no pano de fundo do “Renascimento do PHP” do PHP 5.3 ao 5.6. Dezenas de pessoas, de dezenas de projetos, passaram
milhares de horas derrubando muros entre projetos PHP e criando uma comunidade mais integrada e ampla. O *Composer/Packagist*
foi instrumental nisso, assim como o que viria a se tornar a PHP-FIG. Embora eu não tenha sido membro fundador da FIG, eu
me envolvi rapidamente e me tornei um líder de longa data desse esforço. (Eu ainda faço parte do *Core Committee* da FIG,
tendo coescrito a maior parte do estatuto atual junto com Michael Cullom.)

Infelizmente, eu deixei o Drupal em 2017 em circunstâncias nada ideais (a liderança do projeto se mostrou muito mais
preconceituosa e desonesta do que eu poderia imaginar), mas continuei ativo na comunidade mais ampla, especialmente no
circuito de conferências, onde eu palestrava com frequência em eventos pelo mundo. Nessa época eu trabalhava com
relações com desenvolvedores (*DevRel*) em uma *startup* de hospedagem e tocava meu trabalho com PHP em paralelo.

Eu entrei na lista do **PHP Internals** durante o projeto _GoPHP5_, mas eu só comecei a contribuir com o PHP em si por
volta de 2020. A primeira RFC que eu publiquei foi sobre *comprehensions* no estilo do Python, mas ela não tinha uma
implementação significativa e a recepção foi morna, então eu abandonei. A primeira que realmente foi para frente foi
**`Enums`**, que eu colaborei com Ilija Tovilo. Ele fez o código, mas não queria se incomodar em escrever a RFC em inglês
ou discutir na *mailing list*. Eu, felizmente, escrevo inglês técnico muito bem e não me importo de discutir. :-)
Essa foi a primeira de várias colaborações, e trabalhamos juntos desde então.

Eu também autopubliquei meu primeiro livro solo, _Thinking Functionally in PHP_, em 2020, baseado no então recém-lançado
PHP 7.4. Ele teve um sucesso razoável e, desde então, tem servido como guia para eu escolher em quais recursos trabalhar
no PHP. Como tornar PHP uma linguagem melhor para programação funcional? Como tornar técnicas funcionais mais fáceis de
usar? O **`Pipe Operator`**, **partial function application**, **`Enums`** e RFCs semelhantes fazem parte dessa história
maior.

Embora eu tenha publicado algumas bibliotecas PHP ao longo dos anos, a mais ambiciosa foi `Crell/Serde`, lançada em 2022.

Eu comecei esse projeto originalmente enquanto trabalhava para a TYPO3, porque precisávamos de um novo
*config-loader/deserializer* mais flexível do que qualquer coisa no mercado, então eu construí um. Claro, a TYPO3
acabou não usando, mas viva o *Open Source*: eu ainda pude lançar o projeto.

---

### Qual é o seu papel atualmente, e que tipo de trabalho você faz no dia a dia?

Enquanto eu escrevo isto, estou procurando um novo trabalho, então é isso que eu faço.

Em paralelo, eu tenho trabalhado em uma nova ferramenta de gerenciamento de site “majoritariamente estático” para o meu
próprio blog, que eu acho que finalmente está perto de ficar pronta. (Famosas últimas palavras.) Eu também estou
trabalhando em várias RFCs do PHP, em parceria com outras pessoas, e planejando uma atualização do meu livro de
programação funcional, agora que o PHP evoluiu o suficiente para justificar isso.

O que eu gostaria de estar fazendo é liderar uma equipe, ajudando as pessoas a evoluírem as próprias habilidades e a
modernizar e melhorar uma base de código mais antiga. Eu acho isso divertido, desde que a liderança não brigue comigo. Eu
sou estranho. :-)

---

### Qual foi o maior desafio ou o momento mais marcante da sua trajetória dentro do ecossistema PHP?

Acho que não houve só um!

_GoPHP5_ foi minha primeira entrada de verdade na comunidade mais ampla e, eu acho, preparou o terreno para quase tudo que
veio depois para mim: colaboração, cooperação entre projetos e empurrar a linguagem para frente. Não tinha nenhum código
ali, era só coordenação de pessoas e marketing. Mas funcionou.

O trabalho que fizemos para tirar o Drupal da própria “bolha”, como parte do Renascimento do PHP, foi o próximo passo
lógico desse processo. Foram 5 anos de desgaste e, embora o resultado não tenha sido exatamente o que eu esperava, ainda
assim foi um momento definidor para o projeto e para mim pessoalmente. Foi nessa era que eu realmente me tornei
conhecido na comunidade PHP fora do Drupal.

Eu defendo programação funcional desde 2011, quando dei minha primeira palestra sobre o tema em uma conferência de
Drupal. Claro, meu conhecimento nessa área cresceu bastante desde então, e com meu livro de 2020 eu consolidei uma
posição como “o cara de FP” em muitos círculos de PHP. E eu estou OK com isso, e esse é um dos fios condutores de boa
parte do meu trabalho no **PHP Internals**.

Colocar **`Enums`** no PHP foi mais fácil do que algumas RFCs que vieram depois, mas também foi um grande ponto de virada,
quando eu me tornei “um contribuidor do core”. Eu não sei se isso me trouxe algo além de precisar de remédio para azia,
mas ainda assim foi uma sensação incrível.

---

### O que você considera essencial para ter chegado à posição que ocupa hoje dentro do ecossistema PHP (seja no core, na Foundation ou na comunidade)?

Ingenuidade e teimosia.

Não me ocorreu o quão grande o _GoPHP5_ era até eu já estar bem no meio. Eu só queria poder usar `PDO` para a camada de banco
de dados do Drupal. Eu não comecei querendo mudar a direção do ecossistema; eu só quis resolver uma dor. Se eu tivesse
percebido o tamanho da coisa, talvez eu nem tivesse começado. Mas, uma vez dentro, eu fui até o fim.

Minha missão “oficial” no Drupal 8 era *web services*. Eu não comecei querendo reescrever o sistema todo, mas em algum
momento isso virou o caminho para fazer *web services* funcionar melhor, e lá fomos nós. Se eu tivesse percebido que estava
me inscrevendo para 5 anos de estresse em uma organização disfuncional, culminando em reescrever grande parte do Drupal,
talvez eu nem tivesse começado. Mas, uma vez dentro, eu fui até o fim.

Eu não comecei querendo entrar em *DevRel*, mas eu gostava de palestrar em conferências, e isso me levou a uma posição *full
time* em *DevRel* por 5 anos, viajando muito para vários lugares legais.

Eu não comecei querendo ser “o cara de FP”. Eu só queria escrever código melhor e compartilhar o que aprendi com outras
pessoas.

Como diz o velho lema dos engenheiros: “Nós fazemos essas coisas não porque elas são fáceis, mas porque achamos que seriam
fáceis.”

Às vezes, “só vai” é o melhor caminho. Você não sabe o tamanho de uma tarefa até estar dentro dela. Se é importante,
tente. Às vezes você vai falhar, e tudo bem. Você chegou mais longe do que chegaria se nem tivesse tentado. E quando você
consegue, é uma sensação muito boa.

---

### Que tipo de impacto você acredita exercer hoje no ecossistema ou na comunidade PHP?

É difícil julgar. Eu gostaria de achar que sou uma força a favor de “levar o tempo necessário para fazer direito”. O
melhor feedback que eu costumo receber é “você me fez pensar” ou “eu nunca tinha pensado assim, mas você tem razão”.

Mais recentemente, eu escrevi um longo texto sobre os impactos ambientais enormes e negativos da IA no meu artigo
[Selfish AI](https://www.garfieldtech.com/blog/selfish-ai), criticando quem adota IA enquanto ignora essas externalidades
negativas. Muitas pessoas me agradeceram por colocar em palavras o que elas estavam pensando.

Talvez esse seja meu melhor impacto: transformar conceitos meio “escorregadios” em passos compreensíveis e deixá-los
acionáveis. Seja em coisas grandes, como “aqui está por que deveríamos converter o Drupal para OOP”, ou em coisas menores,
como “aqui está como pensar sobre `null`” ([Much Ado About Null](https://www.garfieldtech.com/blog/much-ado-about-null)),
eu espero conseguir deixar as pessoas com quem eu trabalho mais inteligentes, mais habilidosas e mais abertas para tudo o
que existe por aí.

Nenhum de nós sabe tudo. Todos nós sabemos muito, muito pouco, em comparação com tudo o que há para saber.

---

## Sobre PHP e a PHP Foundation

### Na sua opinião, quais foram os avanços mais significativos do PHP nos últimos anos?

Isso pode parecer pequeno, mas **`constructor property promotion`**.

Antes do `PHP 8.0`, defender injeção de dependências de forma limpa era... honestamente, bem difícil. Fazer DI direito
envolvia digitar praticamente a mesma sequência de caracteres (tipo e nome da variável) pelo menos 4 vezes. Muitos devs,
compreensivelmente, simplesmente não queriam ter esse trabalho, e não faziam. É daí que vêm gambiarras feias como as
“facades” do Laravel.

*Constructor promotion*, embora seja “só” açúcar sintático que some na compilação, reduz esse número para 1. Ele torna
estupidamente fácil declarar “esta classe precisa de X, Y e Z”. Combinado com um bom *container* de DI com *autowiring*, na
maioria dos casos é: “escreve uma classe, lista o que você quer, pronto”. O benefício ergonômico disso não dá para
subestimar. (E isso também significa que as facades do Laravel hoje estão resolvendo um problema que não existe há 6 anos,
então todo mundo precisa parar de usar isso, agora mesmo.)

**`Named arguments`** e **`attributes`** saíram na mesma época, e os três se encaixaram perfeitamente. O 8.0 foi, de fato, uma
revolução.

Mais recentemente, pode parecer autopromoção eu destacar as RFCs de **`Asymmetric Visibility`** e **`Property Hooks`** que eu
e Ilija escrevemos, mas, juntas (e com *interface properties* que conseguimos no caminho), elas mudaram completamente a
forma como se escreve PHP. (Ou como poderia/deveria ser.) “Me dê informações sobre este objeto” agora é só uma *property*.
Se ela é *backed* por um valor real ou não é irrelevante. Ela pode ser dinâmica, cacheada ou apenas “gravável” internamente.
Ainda estamos internalizando os efeitos dessa mudança, mas é enorme.

E claro, o avanço geral para um sistema de tipos mais forte, que tem sido um processo incremental por anos. Eu acredito
muito em *type-driven development*: quanto mais lógica você consegue empurrar para o seu sistema de tipos e deixar o sistema
de tipos forçar seu código para certos formatos, menos código você precisa escrever. PHP tem o sistema de tipos com
*enforcement* mais forte entre as principais linguagens interpretadas. Ele merece bem mais crédito por isso do que recebe.

---

### Na sua visão, quais são os maiores desafios hoje para novos contribuidores se envolverem com o core do PHP?

O PHP é uma organização “sem estrutura”. Isso... tem prós e contras. Eu recomendo fortemente que todos leiam
“[The Tyranny of Structurelessness](https://www.jofreeman.com/joreen/tyranny.htm)” de Jo Freeman.

Mesmo que o processo de RFC seja, em teoria, bem aberto e documentado, os “caminhos de entrada” não são claros. Existem
muitas regras informais e não escritas sobre o que é ou não aceitável, e quem, entre os revisores mais comuns, vai se
importar com o quê, e quais “portões” informais você precisa passar. (Por exemplo: quem vai implicar com a linguagem do
texto da RFC, quem vai implicar com o código, quem não vai revisar nada e só vai votar não no final sem avisar, etc.)
Se você ainda não está “dentro”, isso assusta bastante. Infelizmente, esforços para resolver isso sempre batem numa
parede.

O outro grande problema é que o *codebase* do PHP é uma bagunça. Ele não é realmente escrito em C; ele é escrito em uma
linguagem de macros feita em C, e a documentação *inline* no código é, no melhor dos casos, mínima. De novo: existem
explicações e documentação, pelo menos para parte disso, mas muita coisa é só “leia este arquivo não documentado de 10.000
linhas com um monte de macros usando termos que você ainda não conhece, boa sorte”.

Existem pessoas que conseguiram aprender o *codebase* no estado atual. Eu invejo essas pessoas. Eu ainda me perco, até hoje,
na maior parte dele.

---

### Como você enxerga o papel da PHP Foundation no futuro da linguagem?

A PHP Foundation foi e continua sendo absolutamente crucial para o crescimento contínuo do PHP na última meia década.
Hoje em dia, algo em torno de metade de todos os *merges* em `php-src` vem de um dos desenvolvedores pagos pela Foundation.
E isso não é só RFCs e outras melhorias (das quais há muitas), mas também correções de bugs e manutenção “invisível”.

Eu gostaria muito que a Foundation assumisse um papel mais forte e mais de liderança no PHP. Não só no código (onde um
pouco mais de planejamento interno seria bem útil), mas também em marketing para a comunidade mais ampla. A gente
provavelmente nunca vai conseguir fazer PHP ser “cool”, mas pelo menos fazer com que ele “não seja uncool” parece
alcançável.

Se o seu negócio usa PHP, você precisa doar para a Foundation. Não pouco. Esta é a nossa linguagem e, se queremos que ela
continue prosperando, precisamos coletivamente colocar o dinheiro onde está a nossa boca.

---

### O PHP ainda carrega a fama de ser uma linguagem “velha” ou “ruim” em alguns círculos. Como você vê essa imagem atualmente?

“JavaScript é uma linguagem tão estúpida. Nem tem classes, você fica nesse inferno de callbacks, e qual é a ideia de ter
que dar `parseInt()` em tudo?”

Essa era uma crítica completamente válida ao JavaScript... em 2005. Se você tentasse fazer essa afirmação hoje, seria
ridicularizado, porque seu conhecimento está 20 anos desatualizado. (Embora a coerção de tipos ainda seja ruim.)

O mesmo é verdade para o PHP... ou pelo menos deveria ser. PHP moderno, bem escrito, é uma linguagem muito, muito boa, com
a maioria dos recursos que você esperaria de uma linguagem “moderna”. Ainda existem algumas lacunas, claro; o mesmo vale
para qualquer linguagem. `PHP 8.6` terá uma sintaxe de **`partial function application`** mais flexível do que qualquer outra
linguagem que eu conheço. O sistema de tipos é notavelmente robusto, faltando apenas *generics*, que são, bom, difíceis em
uma linguagem interpretada. (Ninguém tem isso ainda.)

E ainda assim o PHP continua carregando a reputação do PHP 4, enquanto o JavaScript não carrega a reputação do JS de 2005.

Francamente, essa desconexão é a maior ameaça ao PHP. A linguagem em si está bem. O ecossistema é forte. Mas a percepção
e o marketing foram fracos por 20 anos, e ainda estamos sentindo a dor de uma geração de programadores cujo único contato
com PHP foi aquele “hit-piece” do “fractal”, de 14 anos atrás.

Isso não ajuda com o estado do *codebase* do WordPress (o código PHP mais famoso e mais usado do planeta), nem com algumas
das... decisões de design interessantes do Laravel, nenhum dos quais usa a linguagem no seu máximo potencial moderno.

Eu acredito firmemente que enfrentar esse problema de imagem, de forma proativa e agressiva, é o maior desafio do PHP. Não
é sobre código, é sobre percepção. É sobre ter *bootcamps* para novos devs aprenderem PHP, da forma certa desde o começo.
(Por que JS e React são tão populares? Porque existem um milhão de *bootcamps* que formam programadores baratos de JS e
React.)

Eu queria ter tempo e energia para trabalhar nisso, mas não é exatamente onde estão minhas habilidades, e eu não tenho
disposição para fazer isso como projeto paralelo. Espero que seja uma área em que a Foundation possa ajudar, mas isso exigiria
expandir seu escopo para além do *codebase*. Se a gente não resolver isso, vai sufocar a linguagem.

---

### Para encerrar: qual mudança ou recurso você gostaria de ver no PHP nos próximos anos?

*Generics*, obviamente. :-)

Mas falando mais sério: a mudança mais importante que vem se formando e que precisamos empurrar mais, garantindo que
fique bem feita, é PHP em processos persistentes. FrankenPHP, Swoole, etc. fazem parte disso, mas ainda não estão
totalmente certos.

Não é só sobre *async*, embora isso seja absolutamente crítico. Nós temos *async* há anos, mas sem um *IO* unificado para lidar
com código bloqueante e não bloqueante, isso nunca realmente pegou. É por isso que os esforços atuais para uma nova
**`Async API`** nativa são tão interessantes, embora eu ache que ainda precisam de ajustes.

O modo *worker* do FrankenPHP também faz parte do quadro e, para projetos atuais, é provavelmente o caminho mais fácil para
seguir. Os ganhos de performance são enormes, mas tão importante quanto isso é que, quando o PHP não reinicia a cada
*request*, você pode gastar menos esforço otimizando ao extremo o *bootstrap*.

Pensa em quanto trabalho vai para compilar *containers* de DI perfeitamente otimizados, *event dispatchers*, *template engines*,
etc. Agora imagine se nada disso importasse... Se levar 100 ms a mais para iniciar um processo, mas apenas uma vez, e isso
exigir 100 vezes menos esforço de código do que espremer isso para 10 ms em toda *request*... isso é uma vitória enorme,
tanto para performance quanto para reduzir o trabalho do desenvolvedor.

O FrankenPHP ainda é estritamente *request/response/end*, pelo menos em nível de *request*.

HTTP moderno significa muitos *micro-requests*, *websockets*, conexões persistentes, *push events*, e usar HTTP 3 e UDP. Esse não
é o mundo para o qual o PHP e o PHP-FPM foram criados, mas é o mundo em que precisamos conseguir jogar com facilidade.

Eu quero conseguir subir um novo servidor em PHP que faça *boot* uma vez e continue de pé, com uma API simples para subir
*websockets* e *push events*, e que me permita usar todas as minhas bibliotecas e conhecimento existentes sem precisar
reaprender tudo.

Ainda não estamos lá. Mas estamos mais perto do que o PHP já esteve, e isso, em nível técnico, é o recurso mais importante
em que podemos estar trabalhando. Se isso significa FrankenPHP, a RFC de “true async”, algo novo construído em cima dos
dois, eu não sei. Mas é para lá que o PHP precisa ir.

---

## Off-topic

### Há alguma ferramenta, biblioteca ou prática no ecossistema PHP que você realmente gosta de usar hoje?

Basicamente, todo projeto PHP que eu crio hoje começa com **PHPUnit** e **PHPStan**. Eu também tenho **PHPBench** e
**PHPMetrics** no meu kit padrão, embora eu não use tanto.

Meu ambiente Docker quase sempre vem do [PHPDocker.io](https://phpdocker.io/). (Ótimo para dev, não tenho certeza se é bom
para produção.)

Eu também substituí quase totalmente *Makefiles* por [Taskfiles](https://github.com/Enrise/Taskfile). Eles são puro bash e
mais fáceis de manter, já que não precisam das gambiarras para evitar o cache “orientado a C” do GNU Make.

Minha IDE preferida é o IntelliJ da JetBrains. É a versão “genérica” deles, e adicionar os plugins de PHP transforma em
PHPStorm, mas eu também tenho plugins de outras linguagens instalados.

Eu não faço TDD estrito, mas sou um grande defensor de testes. Testes devem ser escritos em conjunto com o código que
está sendo testado. O que é digitado primeiro pode variar, eu faço um pouco de cada, mas eles devem ser escritos próximos
o suficiente para aparecerem no mesmo commit. Código testável é um ótimo proxy de código desacoplado, fácil de modificar,
fácil de reaproveitar, fácil de acelerar quando necessário, etc.

---

### Quais fontes você acompanha para se manter atualizado sobre PHP e desenvolvimento de software?

Eu leio a lista do **PHP Internals** com frequência, naturalmente.

Eu também acompanho a tag `#PHP` no Mastodon, o que me dá bastante conteúdo para eu ver ou ignorar. Eu estou no servidor
[PHPC.social](https://phpc.social/about), onde também sou um moderador de baixo nível.

---

### Você gostaria de deixar uma mensagem para a comunidade PHP do Brasil?

O universo do PHP por muito tempo foi dominado por europeus e, em segundo lugar, por americanos. Não precisa ser assim!
Essa é a beleza do *Open Source*. Qualquer pessoa, em qualquer lugar, pode se envolver. Ajude a revisar propostas no
Internals, lance bibliotecas, contribua com projetos existentes, blog, escreva documentação, o que combinar com seu
interesse pessoal. Você não precisa de permissão de ninguém. Você só precisa de um pouco de ingenuidade e teimosia. :-)

---

Siga **Larry** e explore seu trabalho:

- [GitHub](https://github.com/crell)
- [LinkedIn](https://www.linkedin.com/in/larry-garfield/)
- [Mastodon (@Crell)](https://phpc.social/@Crell)
- [Garfield Tech](https://www.garfieldtech.com/)

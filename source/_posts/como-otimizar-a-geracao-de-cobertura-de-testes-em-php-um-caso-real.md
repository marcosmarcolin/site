---
extends: _layouts.post
section: content
title: Como otimizar a geração de cobertura de testes em PHP? Um caso real.
date: 2022-11-24
description: Um caso real sobre otimização para geração de cobertura de código em PHP
categories: [php, testes, coverage, gitlab, pcov, xdebug, phpdbg, phpunit]
---

## O problema

Estávamos com lentidão para gerar a cobertura de testes PHP nas pipelines do GitLab, ou mesmo localmente usando Docker. Sempre foi utilizado o Xdebug para fazer esse trabalho, mas conforme o projeto cresce, os testes aumentam e o trabalho vai ficando lento, e isso é um custo para a empresa(recursos computacionais e desenvolvedores).

Para otimizar, realizamos algumas pesquisas para tentar diminuir o tempo de execução e encontramos várias fontes que estão citadas no final deste artigo.

Hoje, o _driver_ mais famoso para fazer esse trabalho é o [Xdebug](https://xdebug.org/) do Derick Rethans, inevitavelmente. Existem outros não tão novos como o [PHPDBG](https://www.php.net/manual/pt_BR/book.phpdbg.php) e [PCov](https://pecl.php.net/package/pcov), que são interessantes para o uso.

### Xdebug – Debugger and Profiler Tool for PHP

> Xdebug é uma extensão para PHP e fornece uma variedade de recursos para melhorar a experiência de desenvolvimento PHP.

Antes de mostrar os resultados, preciso citar que o Xdebug não realiza apenas a função de gerar cobertura de código, ele é um depurador de alto nível, que está entre os melhores de todas as linguagens de programação, inquestionável. Por isso, não podemos questionar sua efetividade, mas sua performance, neste caso sim.

### PHPDBG – The Interactive PHP Debugger

> phpdbg pretende ser uma plataforma de depuração leve, poderosa e fácil de usar.

Este _driver_ se mostrou muito efetivo e rápido sua execução, porém enfrentamos alguns problemas em seu uso relacionado à algumas características da nossa base de código. Suspeito que seja conflito com outra extensão que utilizamos, mas não vem ao caso.

Executando as tests suítes separadas, mostrou-se muito mais rápido que o Xdebug.

Também, **este driver parece não ser mais mantido e sua última versão foi lançada em 2013**, então leve em consideração isso antes de utilizar.

### PCOV – CodeCoverage compatible driver for PHP

> Um driver compatível com cobertura de código php independente para PHP.

Com o PCov foi diferente, tivemos total compatibilidade com um de nossos projetos, que é o caso real deste artigo. Não vou entrar no mérito de instalação e execução, isso você encontra facilmente por aí, mas caso tenha dúvida pode me chamar.

O Pcov do Joe Watkins e Remi Collet foi desenvolvido exatamente para isso, cobertura de código. Então, ele não se preocupa com outros trabalhos, comparado ao Xdebug.

**Este driver ainda é mantido e sua última versão foi lançada em 12/2021,** então leve em consideração isso antes de utilizar.

### PHPUnit – The PHP Testing Framework

> PHPUnit é uma estrutura de teste orientada ao programador para PHP. É uma instância da arquitetura xUnit para estruturas de teste de unidade.

A maioria das empresas utiliza essa estrutura para execução dos testes, logo, poderíamos afirmar que está pode ser a estrutura oficial do PHP.

O framework é compatível com todos os drivers citados neste artigo.

## Resultados

Realizamos vários testes em ambiente local com a stack: **Docker + Debian Buster + PHP 7.3.x + MariaDB 10.3.x + PHPUnit 9.5.x** e também no **GitLab**. Rodando testes unitários e de integração em uma grande suíte de testes.

Mostrarei os resultados comparativos de execução no GitLab, que é a ferramenta de CI/CD que utilizamos para gerenciar e entregar a maioria de nossos projetos.

_Xdebug v2.7.0 x PCov 1.0.11_

![Xdebug v2.7.0 x PCov 1.0.11](/assets/images/blog/xdebug_pcov.png)
Apenas execução dos testes

Na imagem acima, é possível perceber que tem 1 dia de diferença para a execução, mas nada que influencie o resultado final.

O resultado para nós já é excepcional, **reduzindo em quase 10 minutos o tempo de execução.**

_Xdebug x PCov_

![Xdebug v2.7.0 x PCov 1.0.11](/assets/images/blog/xdebug_pcov_pipeline.png)
Execução da pipeline completa

Acima, o resultado da execução da pipeline completa.

Pontos a destacar da imagem acima:

* **Tempo de execução:** de 17.5 minutos para quase 6.5 minutos, são quase 11 minutos de diferença.
* **Coverage:** quase inexpressível, está na mesma casa decimal. Digamos que baixou de 70.65 para 70.62. Não posso mostrar o valor real, é reservado à empresa.

## Conclusão

Sendo assim, tivemos como resultado que para o nosso caso de uso compensa e muito alterar o _driver_ de coverage, afetando em quase nada o resultado final de cobertura. Mas talvez, para o seu caso seja diferente, pois não existe uma solução mágica.

Devo reforçar também, que não estou comparando as ferramentas, mas sim o resultado final delas.

Eu, pessoalmente, indico você continuar usando o Xdebug caso estiver rodando uma suíte de testes pequena, sem testes de integração ou lentos. Porém, se você tiver um projeto grande, com uma boa parte legada por exemplo, a utilização do PCov ou PHPDBG vai ser mais vantajosa, mas como citei no início, o quanto isso custa para o seu negócio?

Abraços e até a próxima!

## Referências

* https://dev.to/swashata/setup-php-pcov-for-5-times-faster-phpunit-code-coverage-3d9c
* https://medium.com/hackernoon/generating-code-coverage-with-phpunite-and-phpdbg-4d20347ffb45
* https://mixable.blog/phpunit-faster-and-better-unit-tests-with-pcov/
* https://geshan.com.np/blog/2020/11/phpunit-code-coverage-pcov/
* https://phpunit.readthedocs.io/en/9.5/code-coverage-analysis.html
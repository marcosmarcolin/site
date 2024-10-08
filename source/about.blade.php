---
title: Sobre mim
description: Um pouco sobre mim
---
@extends('_layouts.main')

@section('body')
    <h1>Sobre mim</h1>

    <img src="/assets/img/marcos_marcolin.png"
         alt="Foto de Marcos Marcolin, engenheiro de software sênior"
         class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <p class="mb-6">Olá! Meu nome é <strong>Marcos Marcolin</strong>, sou Engenheiro de Software Sênior.</p>

    <h3>Experiência</h3>
    <p class="mb-6">Desde 2009, atuei como Webdesigner e desenvolvedor front-end. A partir de 2014, meu foco passou a ser o desenvolvimento back-end, especialmente em PHP.</p>

    <h3>Formação</h3>
    <p class="mb-6">Estudei Licenciatura em Informática na UTFPR, especialização em Desenvolvimento Web pela UNOESC e especialização em Engenharia de Software na Estácio de Sá.</p>

    <h3>Contato</h3>
    <p class="mb-6">Entre em contato comigo via email <a href="mailto:marcolindev@gmail.com">marcolindev@gmail.com</a> ou através dos meus perfis sociais:
        <a href="https://www.linkedin.com/in/marcosmarcolin/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
        <a href="https://twitter.com/marcolindev" target="_blank" rel="noopener noreferrer">Twitter</a> ou
        <a href="https://github.com/marcosmarcolin" target="_blank" rel="noopener noreferrer">GitHub</a>.
    </p>
@endsection

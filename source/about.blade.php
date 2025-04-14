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

    <p class="mb-6">Olá! Meu nome é <strong>Marcos Marcolin</strong>, sou <strong>Engenheiro de Software
            Sênior.</strong></p>

    <h3>Experiência</h3>
    <p class="mb-6">Desde 2009 na área, atuei como Webdesigner, desenvolvedor front-end e à partir de 2014, meu foco
        passou a ser o desenvolvimento back-end, especialmente em <strong>PHP.</strong></p>

    <h3>Formação</h3>
    <p class="mb-6">Estudei <strong>Licenciatura em Informática</strong> na UTFPR, especialização em <strong>Desenvolvimento
            Web</strong> pela UNOESC e especialização em <strong>Engenharia de Software</strong> na Estácio de Sá.</p>

    <h3>Contato</h3>
    <p class="mb-6">Entre em contato comigo via email <a href="mailto:marcolindev@gmail.com">marcolindev@gmail.com</a>
        ou através dos meus perfis sociais:
        <a href="https://www.linkedin.com/in/marcosmarcolin/" target="_blank" rel="noopener noreferrer">LinkedIn</a> ou
        <a href="https://github.com/marcosmarcolin" target="_blank" rel="noopener noreferrer">GitHub</a>.
    </p>
@endsection

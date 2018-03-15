<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>
          <a class="nav-link" href="#">About</a>
          
          @if(Auth::check())
            <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }} </a>
          @endif
        </nav>
      </div>
    </div>

     <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">
         The Bootstrap Blog 
        </h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
      </div>
    </div>
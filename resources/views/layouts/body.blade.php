    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          @yield('content')

          @include('layouts.bottom_navigation')

        </div><!-- /.blog-main -->

        @include('layouts.sidebar')        

      </div><!-- /.row -->

    </div><!-- /.container -->
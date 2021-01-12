@include('includes.header')
@yield('content')
@unless (url()->current() == route('contact'))

@include('includes.side')
@endunless
@include('includes.footer')

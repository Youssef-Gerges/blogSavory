<!-- sidebar -->
<aside class="col-md-4 col-sm-8 col-xs-8">
    <div class="sidebar">

        <!-- search option -->
        <div class="search-widget">
            <form method="GET" action="{{ route('search') }}" id="form">
            <div class="input-group margin-bottom-sm">
                <input class="form-control" type="text" placeholder="Search here" name="q">
                <a class="input-group-addon" style="border: none;
                border-radius: 0px;
                color: #E4840D;
                background-color: #1E1E1E;"
                onclick="document.getElementById('form').submit();"
                >
                    <i class="fa fa-search fa-fw"></i>
                </a>
            </div>
            </form>
        </div>

        <!-- subscribe form -->
        <div class="subscribe-widget">
            <h4 class="text-capitalize text-center">
                get recent update by email
            </h4>
            <div class="input-group margin-bottom-sm">
                <input class="form-control" type="text" placeholder="Your Email">
                <a href="#" class="input-group-addon">
                    <i class="fa fa-paper-plane fa-fw"></i>
                </a>
            </div>
        </div>

        <!-- sidebar share button -->
        <div class="share-widget hidden-xs hidden-sm">
            <ul class="social-share text-center">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul> <!-- /.sidebar-share-button -->
        </div> <!-- /.share-widget -->

    </div>
</aside>
<!-- end of sidebar -->

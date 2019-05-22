@include('partials.discoverModal')

<!--SIDEBAR-->
<div class="">
    @auth
        <div class="list-group">
            <div class="sidebar-heading">
                <button type="button" id="btnDiscover" class="btn bg-gray btn-sm btn-block mb-2 border" data-toggle="collapse" data-target="#sidebar">Categories <span class="fa fa-caret-down"></span></button>  
            </div>
            <div id="sidebar" class="collapse-sm">
                <div class="list-group list-group-flush">
                    <a href="/home" class="list-group-item">All Announcements</a>
                    @foreach($categories as $category)
                        <a href="/posts/categories/{{$category->id}}" class="list-group-item">
                            {{ $category->display_name }}
                        </a>
                    @endforeach

                    <button class="btn btn-primary btn-sm my-3" data-toggle="modal" data-target="#discoverModal">Discover <i class="fa fa-lightbulb-o"></i></button>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="list-group">
            <div class="sidebar-heading">
                <button type="button" class="btn bg-default btn-sm btn-block mb-2 border" data-toggle="collapse" data-target="#sidebar-archive">Announcement Archives <span class="fa fa-caret-down"></span></button>
                
            </div>
            <div id="sidebar-archive" class="collapse-out">
                <div class="list-group">
                    @foreach($archives as $stats)
                        <p class="text-center">
                            <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                                {{ $stats['month'].' '.$stats['year'].' ('.$stats['published'].')'}}            
                            </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    @endauth
    
    <hr>
    <!--Footer-->
    <footer id="footer">
        <div class="text-center brand text-secondary small mt-5">
            &copy; UEW Messenger, 2019. Powered by Xandech Internet Solutions
        </div>
            
        <div class="text-center brand text-secondary small py-2">
            <span>
                <a href="#">About Us</a> - 
                <a href="#">Terms &amp; Conditions</a> - 
                <a href="#">Help</a>
            </span>
        </div>

    </footer>
</div>
<!--SIDEBAR END-->
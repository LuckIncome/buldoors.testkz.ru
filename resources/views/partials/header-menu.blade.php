<div class="collapse navbar-collapse" id="mainNavbar">
    <a href="#" class="closeBtn" style="display: none;"><i class="">×</i></a>
    <ul class="navbar-nav mx-auto">
        @foreach($items as $menu_item)
            <li class="nav-item"><a class="nav-link" href="{{ $menu_item->link() }}" class="menu__item">{{ $menu_item->title }}</a></li>
        @endforeach
    </ul>
</div>

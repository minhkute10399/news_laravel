<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a>
                    <i class="fa fa-home"></i>Category
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li>
                        <a href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    {{-- <li><a href="{{ route('product.index') }}">Product</a></li>
                    <li><a href="{{ route('productimage.index') }}">Product Images</a></li> --}}
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-home"></i>User
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li>
                        <a href="{{ route('users.index') }}">Users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-home"></i>Post
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('posts.index') }}">Post</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

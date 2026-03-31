<div class="shadow py-4 px-3">
    <ul class="userSidebar">
        <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
        <li><a href="">Profile</a></li>
        <li class="{{ request()->routeIs('user.orders') ? 'active' : '' }}"><a
                href="{{ route('user.orders') }}">Orders</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>


<style>
    .userSidebar{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .userSidebar .active{
        background: bisque;
        border-radius: 10px;
    }

    .userSidebar li:hover{
        background: bisque;
        border-radius: 10px;
    }

    .userSidebar li a{
        display: block;
        color: #000;
        padding: 8px 12px;
        font-size: 16px;
    }

</style>

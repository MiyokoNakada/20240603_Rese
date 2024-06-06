<div class="drower-menu">
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">Home</a></li>
      <li>
        @if (Auth::check())
        <form id="logout-form" class="logout" action="/logout" method="post" style="display: none;">
          @csrf
        </form>
        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        @endif
      </li>
      <li><a href="/mypage">Mypage</a></li>
    </ul>
  </nav>
  <div class="menu" id="menu">
    <span class="menu__line--top"></span>
    <span class="menu__line--middle"></span>
    <span class="menu__line--bottom"></span>
  </div>
  <h1 class="header-ttl">Rese</h1>
</div>
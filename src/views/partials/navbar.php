<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">CRUD Clientes</a>

    <a class="nav-link ml-auto text-white" href="javascript:" id="btn-logout">Sair</a>
    <form class="form-inline mt-2 mt-md-0 hidden" method="post" action="/login/out" id="form-logout">
      <input type="hidden" name="_token" id="_token" value="<?=$_SESSION['uid']?>">
    </form>
  </nav>
</header>

<form class="form-signin text-center" method="post" accept-charset="utf-8" action="index.php?controller=login&action=check">
  <h1 class="h4 mb-3">Faça seu login</h1>
  <label for="email" class="sr-only">E-mail</label>
  <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required autofocus autocomplete="email">

  <label for="password" class="sr-only">Senha</label>
  <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>

  <button class="btn btn-primary btn-block" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted"><small>&copy; <?= date('Y') ?></small></p>
</form>
<form class="form-signin text-center" method="post" accept-charset="utf-8" action="/login/check">
  <h1 class="h4 mb-3">Faça seu login</h1>

  <label for="email" class="sr-only">E-mail</label>
  <input type="email" id="email" name="email" class="form-control <?=isset($errors['email']) ? 'is-invalid' : ''?>"
         placeholder="E-mail" autofocus autocomplete="email" required aria-required="true"
        value="<?=$values['email']??''?>">
  <div class="invalid-feedback">
    <?=$errors['email'] ?? ''?>
  </div>

  <label for="password" class="sr-only">Senha</label>
  <input type="password" id="password" name="password" class="form-control <?=isset($errors['password']) ? 'is-invalid' : ''?>"
         placeholder="Senha" required aria-required="true">
  <div class="invalid-feedback">
    <?=$errors['password'] ?? ''?>
  </div>

  <button class="btn btn-primary btn-block" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted"><small>&copy; <?= date('Y') ?></small></p>
</form>

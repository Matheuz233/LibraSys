<div class="mt-6 grid grid-cols-2 gap-2">

  <div class="border border-stone-700 rounded">
    <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
    <form class=" px-4 py-2" method="post">
      <div class="flex flex-col">
        <label class="text-stone-400 mb-1">E-mail</label>
        <input type="email"
          name="email"
          class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />

      </div>

      <div class="flex flex-col">
        <label class="text-stone-400 mb-1">Senha</label>
        <input type="password"
          name="password"
          class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />
      </div>

      <button type="submit" class="border-stone-800 border-2 rounded bg-stone-900 px-4 py-1 my-4 hover:bg-stone-800">Entrar</button>

    </form>
  </div>

  <div class="border border-stone-700 rounded">
    <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
    <form class=" px-4 py-2" method="POST" action="/registrar">
      <?php if (isset($mensagem)  && strlen($mensagem) > 0): ?>
        <div class="border-green-800 border-2 rounded bg-green-900 px-4 py-1 my-4 text-white font-bold">
          <?= $mensagem ?>
        </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['validacoes']) && is_array($_SESSION['validacoes']) && sizeof($_SESSION['validacoes'])): ?>
        <div class="border-red-800 border-2 rounded bg-red-900 px-4 py-1 my-4 text-white font-bold">
          <ul>
            <li>Erros de Validações:</li>

            <?php foreach ($_SESSION['validacoes'] as $validacao): ?>

              <li><?= $validacao ?></li>

            <?php endforeach; ?>

          </ul>
        </div>
      <?php endif; ?>
      <div class="flex flex-col">
        <label class="text-stone-400 mb-1">Nome</label>
        <input type="text"
          name="nome"
          class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />
      </div>

      <div class="flex flex-col">
        <label class="text-stone-400 mb-1">E-mail</label>
        <input type="email"
          name="email"
          class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />

      </div>

      <div class="flex flex-col">
        <label class="text-stone-400 mb-1">Senha</label>
        <input type="password"
          name="senha"
          class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />
      </div>

      <button type="reset" class="border-stone-800 border-2 rounded bg-stone-900 px-4 py-1 my-4 hover:bg-stone-800">Cancelar</button>

      <button type="submit" class="border-stone-800 border-2 rounded bg-stone-900 px-4 py-1 my-4 hover:bg-stone-800">Registrar</button>

    </form>


  </div>
</div>
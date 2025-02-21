<h1 class="mt-6 font-bold text-lg">Meus Livros</h1>

<div class="grid grid-cols-2 space-x-5">
  <div class="flex flex-col gap-4">
      <?php foreach ($livros as $livro): ?>
        <?php require 'partials/_livro.php'; ?>
      <?php endforeach; ?>
  </div>

  <div>
    <div class="border border-stone-700 rounded">
      <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo livro!</h1>
      <form class=" px-4 py-2" method="post" action="/livro-criar">
        <?php if ($validacoes = flash()->get('validacoes')): ?>
          <div class="border-red-800 border-2 rounded bg-red-900 px-4 py-1 my-4 text-white font-bold">
            <ul>
              <li>Erros de Validações:</li>

              <?php foreach ($validacoes as $validacao): ?>

                <li><?= $validacao ?></li>

              <?php endforeach; ?>

            </ul>
          </div>
        <?php endif; ?>

        <div class="flex flex-col">
          <label class="text-stone-400 mb-1">Titulo</label>
          <input type="text"
            name="titulo"
            class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />
        </div>

        <div class="flex flex-col">
          <input type="hidden" name="livro_id">
          <label class="text-stone-400 mb-1">Autor</label>
          <input type="text"
            name="autor"
            class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" />
        </div>

        <div class="flex flex-col">
          <input type="hidden" name="livro_id">
          <label class="text-stone-400 mb-1">Descrição</label>
          <textarea
            name="descricao"
            class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1"></textarea>
        </div>

        <button type="submit" class="border-stone-800 border-2 rounded bg-stone-900 px-4 py-1 my-4 hover:bg-stone-800">Salvar</button>
      </form>
    </div>
  </div>

</div>
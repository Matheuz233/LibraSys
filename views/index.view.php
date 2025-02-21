<form class="w-full flex space-x-2 mt-6">
  <input type="text" name="pesquisar" class="border-stone-800 border-2 rounded-sm bg-stone-900 text-sm focus:outline px-2 py-1" placeholder="Pesquisar..." />
  <button type="submit">🔎</button>
</form>

<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
  <?php
  foreach ($livros as $livro):
  ?>

    <?php require 'partials/_livro.php'; ?>
  <?php
  endforeach;
  ?>

</section>
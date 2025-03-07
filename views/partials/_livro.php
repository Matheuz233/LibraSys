<div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
  <div class="flex gap-4">
    <div class="w-1/3">
      <img class="w-32 h-42" src="
        <?php if ($livro->imagem): ?>
          <?= $livro->imagem ?>
        <?php endif; ?>
      " alt="<?= $livro->titulo ?>" />
    </div>
    <div class="space-y-1">
      <a href="/livro?id=<?= $livro->id ?>" class="font-semibold focus:underline"><?= $livro->titulo ?></a>
      <div class="text-xs italic"><?= $livro->autor ?></div>
      <div class="text-sm mt-2"><?= $livro->descricao ?></div>
      <div class="text-xs italic"><?= str_repeat("⭐", $livro->nota_avaliacao) ?>(<?= $livro->count_avaliacoes ?> Avaliações)</div>
    </div>
  </div>
</div>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LibraSys</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-950 text-stone-200">
  <header class="bg-stone-900 border-b-stone-800 border-b-2">
    <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
      <div class="font-bold text-xl tracking-wide">LibraSys</div>
      <ul class="flex space-x-4 font-bold">
        <li><a href="/" class="text-lime-500">Explorar</a></li>
        <?php if (auth()): ?>
          <li><a href="/meus-livros" class="hover:underline">Meus Livros</a></li>
        <?php endif; ?>
      </ul>
      <ul>
        <?php if (auth()): ?>
          <li><a href="/logout" class="hover:underline">Sair</a></li>
        <?php else: ?>
          <li><a href="/login" class="hover:underline">Fazer Login</a></li>
          <li><a href="/registrar" class="hover:underline">Registrar</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <main class="mx-auto max-w-screen-lg space-y-6">
    <?php if ($mensagem = flash()->get('mensagem')): ?>

      <div class="border-green-800 border-2 rounded bg-green-900 px-4 py-1 my-4 text-white font-bold">
        <?= $mensagem ?>
      </div>

    <?php endif; ?>
    <?php require "views/{$view}.view.php" ?>
  </main>
</body>

</html>
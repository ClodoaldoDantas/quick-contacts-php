<?php loadPartial("header"); ?>

<div class="max-w-md py-8 md:py-12 px-4 mx-auto">
  <a
    href="/"
    class="flex items-center mb-10 gap-2 max-w-max text-zinc-900">
    <i class="ph ph-arrow-left text-lg"></i>
    Voltar aos contatos
  </a>

  <header class="mb-8">
    <h1 class="flex items-center gap-2 text-xl font-bold">
      <i class="ph-bold ph-user-plus"></i>
      Adicionar novo contato
    </h1>

    <p class="text-zinc-600">
      Preencha os detalhes abaixo para criar um novo contato
    </p>
  </header>

  <?php if (!empty($errors)) : ?>
    <div class="p-4 mb-4 bg-red-50 border border-red-200 rounded-md">
      <?php foreach ($errors as $error) : ?>
        <p class="text-red-500 text-sm"><?= $error ?></p>
      <?php endforeach ?>
    </div>
  <?php endif ?>

  <form class="space-y-4" action="/contacts" method="POST">
    <div class="flex flex-col gap-1">
      <label class="text-sm font-semibold" for="name">Nome</label>

      <input
        name="name"
        id="name"
        type="text"
        placeholder="John Doe"
        class="py-2 px-3 w-full rounded-md border border-zinc-300 text-sm text-zinc-900 placeholder:text-zinc-500" />
    </div>

    <div class="flex flex-col gap-1">
      <label class="text-sm font-semibold" for="email">E-mail</label>

      <input
        name="email"
        id="email"
        type="text"
        placeholder="john@example.com"
        class="py-2 px-3 w-full rounded-md border border-zinc-300 text-sm text-zinc-900 placeholder:text-zinc-500" />
    </div>

    <div class="flex flex-col gap-1">
      <label class="text-sm font-semibold" for="phone">Telefone</label>

      <input
        name="phone"
        id="phone"
        type="tel"
        placeholder="(28) 3864-1830"
        class="py-2 px-3 w-full rounded-md border border-zinc-300 text-sm text-zinc-900 placeholder:text-zinc-500" />
    </div>

    <button
      type="submit"
      class="px-4 py-2 rounded text-white bg-blue-600 w-full cursor-pointer disabled:opacity-50">
      Adicionar contato
    </button>
  </form>
</div>

<?php loadPartial("footer"); ?>
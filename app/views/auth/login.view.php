<?php loadPartial("header"); ?>

<div class="max-w-md py-8 md:py-12 px-4 mx-auto">
  <a
    href="/"
    class="flex items-center mb-10 gap-2 max-w-max text-zinc-900">
    <i class="ph ph-arrow-left text-lg"></i>
    Voltar a página inicial
  </a>

  <header class="mb-8">
    <h1 class="flex items-center gap-2 text-xl font-bold">
      <i class="ph-bold ph-sign-in"></i>
      Entre na sua conta
    </h1>

    <p class="text-zinc-600">
      Preencha os dados abaixo para acessar sua conta
    </p>
  </header>

  <?php loadPartial("form-errors", ["errors" => $errors ?? null]); ?>

  <form class="space-y-4" action="/contacts" method="POST">
    <div class="flex flex-col gap-1">
      <label class="text-sm font-semibold" for="email">E-mail</label>

      <input
        name="email"
        id="email"
        type="text"
        placeholder="fulano@gmail.com"
        class="py-2 px-3 w-full rounded-md border border-zinc-300 text-sm text-zinc-900 placeholder:text-zinc-500" />
    </div>

    <div class="flex flex-col gap-1">
      <label class="text-sm font-semibold" for="password">Senha</label>

      <input
        name="password"
        id="password"
        type="password"
        placeholder="********"
        class="py-2 px-3 w-full rounded-md border border-zinc-300 text-sm text-zinc-900 placeholder:text-zinc-500" />
    </div>

    <button
      type="submit"
      class="px-4 py-2 rounded text-white bg-blue-600 w-full cursor-pointer disabled:opacity-50">
      Entrar
    </button>
  </form>
</div>

<?php loadPartial("footer"); ?>
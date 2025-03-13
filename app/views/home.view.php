<?php loadPartial("header"); ?>

<div class="min-h-dvh w-full flex items-center justify-center">
  <div class="max-w-5xl px-4 text-center space-y-6">
    <h1 class="text-4xl md:text-6xl font-bold tracking-tight">
      Mantenha seus contatos <span class="text-blue-600">organizados</span>
    </h1>

    <p class="text-lg md:text-xl text-zinc-600 max-w-2xl mx-auto">
      Uma maneira simples e intuitiva de gerenciar seus contatos com
      ferramentas de organização poderosas e armazenamento seguro.
    </p>

    <?php $isAuthenticated = Core\Session::has("user"); ?>

    <?php if ($isAuthenticated) : ?>
      <div class="flex flex-wrap items-center justify-center gap-4">
        <a
          href="/contacts"
          class="px-4 py-2 rounded text-lg text-zinc-600 border border-input bg-transparent hover:bg-zinc-600 hover:text-white flex items-center gap-2">
          <i class="ph-bold text-xl ph-address-book"></i>
          Minha Agenda
        </a>
      </div>
    <?php else : ?>
      <div class="flex flex-wrap items-center justify-center gap-4">
        <a
          href="/sign-up"
          class="px-4 py-2 rounded text-white text-lg bg-blue-600 hover:bg-blue-500 flex items-center gap-2">
          <i class="ph-bold ph-user-plus"></i>
          Inicie agora
        </a>

        <a
          href="/sign-in"
          class="px-4 py-2 rounded text-lg text-zinc-600 border border-input bg-transparent hover:bg-zinc-600 hover:text-white flex items-center gap-2">
          <i class="ph-bold ph-sign-in"></i>
          Fazer login
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php loadPartial("footer"); ?>
<?php loadPartial("header"); ?>

<div class="max-w-5xl py-8 md:py-12 px-4 mx-auto">
  <!-- Header -->
  <header class="flex flex-wrap items-center justify-between gap-4 mb-10">
    <div class="flex flex-col">
      <h1 class="text-xl font-bold text-zinc-900">Contatos</h1>
      <p class="text-zinc-600">Gerencie seus contatos em um só lugar</p>
    </div>

    <a
      class="px-4 py-2 rounded text-white bg-blue-600 flex items-center gap-2"
      href="/contacts/new">
      <i class="ph-bold ph-user-plus text-lg"></i>
      Adicionar Contato
    </a>
  </header>

  <!-- Contacts -->
  <div class="grid sm:grid-cols-2 gap-4">
    <!-- Card -->
    <div class="bg-white p-4 rounded shadow flex items-center gap-4">
      <span
        class="flex items-center justify-center shrink-0 rounded-full h-12 w-12 bg-zinc-100 border border-zinc-200 text-zinc-900 font-semibold">
        AJ
      </span>

      <div class="flex flex-col gap-1">
        <strong>Alex Johnson</strong>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-envelope-simple text-lg"></i>
          <a class="text-sm hover:underline" href="#">alex@example.com</a>
        </div>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-phone text-lg"></i>
          <a class="text-sm hover:underline" href="#">(11) 3948-1265</a>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="bg-white p-4 rounded shadow flex items-center gap-4">
      <span
        class="flex items-center justify-center shrink-0 rounded-full h-12 w-12 bg-zinc-100 border border-zinc-200 text-zinc-900 font-semibold">
        AJ
      </span>

      <div class="flex flex-col gap-1">
        <strong>Alex Johnson</strong>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-envelope-simple text-lg"></i>
          <a class="text-sm hover:underline" href="#">alex@example.com</a>
        </div>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-phone text-lg"></i>
          <a class="text-sm hover:underline" href="#">(11) 3948-1265</a>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="bg-white p-4 rounded shadow flex items-center gap-4">
      <span
        class="flex items-center justify-center shrink-0 rounded-full h-12 w-12 bg-zinc-100 border border-zinc-200 text-zinc-900 font-semibold">
        AJ
      </span>

      <div class="flex flex-col gap-1">
        <strong>Alex Johnson</strong>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-envelope-simple text-lg"></i>
          <a class="text-sm hover:underline" href="#">alex@example.com</a>
        </div>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-phone text-lg"></i>
          <a class="text-sm hover:underline" href="#">(11) 3948-1265</a>
        </div>
      </div>
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="bg-white p-4 rounded shadow flex items-center gap-4">
      <span
        class="flex items-center justify-center shrink-0 rounded-full h-12 w-12 bg-zinc-100 border border-zinc-200 text-zinc-900 font-semibold">
        AJ
      </span>

      <div class="flex flex-col gap-1">
        <strong>Alex Johnson</strong>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-envelope-simple text-lg"></i>
          <a class="text-sm hover:underline" href="#">alex@example.com</a>
        </div>

        <div class="flex items-center gap-1 text-zinc-600">
          <i class="ph ph-phone text-lg"></i>
          <a class="text-sm hover:underline" href="#">(11) 3948-1265</a>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
</div>

<?php loadPartial("footer"); ?>
<script setup>
import AppLink from '@/Components/App/AppLink.vue';
import AppLogo from '@/Components/App/AppLogo.vue';
import AppSwitchLang from '@/Components/App/AppSwitchLang.vue';

</script>

<template>
    <div class="font-landing max-w-screen-xl mx-auto text-fl-xs text-slate-800">
      <header class="p-4 mb-6 bg-gray-100 shadow-sm">
        <nav class="flex justify-between items-center">
          <AppLogo />
          <div class="flex gap-4 items-center">
            <AppSwitchLang />
            <AppLink :href="route('templates.show')" cta class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
              Create CV
            </AppLink>
          </div>
        </nav>
      </header>
      <main class="flex flex-col p-4 bg-gray-50 shadow-inner rounded-lg">
        <slot />
      </main>
    </div>
  </template>
  
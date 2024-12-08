<script setup>
import AppHeader from '@/Components/App/AppHeader.vue';
</script>

<template>
  <div class="font-landing max-w-screen-xl mx-auto text-xl text-slate-100 ">
     <AppHeader />
    <main class="flex flex-col p-4  rounded-lg">
      <slot />
    </main>
  </div>
</template>


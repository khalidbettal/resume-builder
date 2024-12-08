<script setup>
import AppLink from '@/Components/App/AppLink.vue';
import AppLogo from '@/Components/App/AppLogo.vue';
import AppSwitchLang from '@/Components/App/AppSwitchLang.vue';
</script>
<template>
<header class="p-4 mb-6  ">
    <nav class="flex justify-between items-center">
      <AppLogo />
      <div class="flex gap-4 items-center">
        <AppSwitchLang />
        <AppLink :href="route('templates.show')" cta>
          Create CV
        </AppLink>
      </div>
    </nav>
  </header>
</template>
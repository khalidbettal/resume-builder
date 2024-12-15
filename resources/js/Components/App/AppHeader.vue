<script setup>
import AppLink from '@/Components/App/AppLink.vue';
import AppLogo from '@/Components/App/AppLogo.vue';
import AppSwitchLang from '@/Components/App/AppSwitchLang.vue';
import AppProfileAvatar from './AppProfileAvatar.vue';
</script>
<template>
<header class="p-4 mb-6  ">
    <nav class="flex justify-between items-center">
      <AppLogo />
      <div class="flex gap-4 items-center">
        <AppProfileAvatar />
        <AppSwitchLang />
         <!-- Avatar with Plus symbol for mobile screens -->
         <AppLink :href="route('templates.show')" class="block sm:hidden">
          <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex justify-center items-center">
            <span class="text-2xl font-bold">+</span>
          </div>
        </AppLink>

        <!-- Regular AppLink for desktop, not showing the Plus symbol -->
        <AppLink :href="route('templates.show')" cta class="hidden sm:block">
          {{ $t('app.create-cv') }}
        </AppLink>
      </div>
    </nav>
  </header>
</template>
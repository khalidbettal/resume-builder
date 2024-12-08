<script  setup>
import { Link } from '@inertiajs/vue3';


</script>

<template>
  <h1>
    <Link
      :href="route('home')"
      class="bg-none font-extrabold sm:text-2xl font-logo uppercase tracking-widest"
      active-class="bg-none"
    >
      <span
        class="text-transparent bg-gradient-to-br from-emerald-700 to-emerald-400 bg-clip-text hover:opacity-80"
      >
        My App
      </span>
    </Link>
  </h1>
</template>
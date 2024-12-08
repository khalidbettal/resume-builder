<script  setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    cta: Boolean,
    icon: Boolean,
    external: Boolean
})
</script>

<template>
  <Link
    class="inline-flex justify-center items-center gap-x-1 font-light cursor-pointer"
    :class="[{
      'bg-gradient-to-br from-emerald-600 to-emerald-400 bg-clip-text hover:text-transparent': !cta && !icon,
      'hover:opacity-80': icon,
      'bg-primary font-normal text-white px-4 py-2 rounded  bg-gradient-to-br from-emerald-600 to-emerald-400 hover:opacity-80': cta,
    }]"
    active-class="decoration-violet-800"
    :href="href"
    :external="external"
  >
    <slot />
  </Link>
</template>

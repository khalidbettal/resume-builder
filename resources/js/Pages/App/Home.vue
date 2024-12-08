<script lang="ts" setup>
import AppLink from '@/Components/App/AppLink.vue';
import AppHeroImg from '@/Components/App/AppHeroImg.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout>
    <section
      class="min-h-[calc(100vh-var(--header-height))] flex flex-col justify-center items-center text-center mx-auto gap-8 flex-wrap font-bold p-4  text-slate-100"
    >
      <div class="leading-normal">
        <h2 class="mb-2 text-5xl max-sm:text-4xl font-extrabold text-gray-200">
          Create your  
          <span
            class="text-nowrap text-transparent bg-gradient-to-bl from-emerald-600 to-emerald-400 bg-clip-text"
          >
            CV for free
          </span>
          <br />
          and own your data
          <span class="text-transparent bg-gradient-to-br from-emerald-600 to-emerald-400 bg-clip-text">.</span>
        </h2>
        <p class="mb-4 font-light text-gray-300 max-w-prose mx-auto max-sm:text-lg py-2">
          CvFy is an open-sourced multilingual and privacy-friendly resume builder that helps you create your CV and download it in PDF in just a few minutes.
        </p>
        <AppLink
          :href="route('templates.show')"
          cta
        >
          <span>Get Started</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            class="size-4"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M13.5 4.5L21 12m0 0-7.5 7.5M21 12H3"
            />
          </svg>
        </AppLink>
      </div>
      <AppHeroImg />
      <div class="text-xs font-light">
        Made with ♥️ by
        <a
          class="underline"
          href="https://github.com/khalidbettal"
          external
        >
          <span class="text-violet-800">
            Khalid Bettal
          </span>
        </a>
      </div>
    </section>
  </AppLayout>
</template>

<style scoped>
:root {
  --header-height: calc(104px + calc(1.97rem + 4.50 * var(--fluid-bp)));
}
</style>


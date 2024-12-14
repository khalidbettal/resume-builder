<script setup >
import AppLayout from '@/Layouts/AppLayout.vue';
import img1 from '@/Assets/cv-screenshot-one-col-eliot.png'
import img2 from '@/Assets/cv-screenshot-one-col-les.png'
import img3 from '@/Assets/cv-screenshot-two-col.png'

const IMAGES = [
  img1,
  img2,
  img3
]

</script>

<template>
  <AppLayout>
    <section class="min-h-[calc(100vh-var(--header-height))] flex flex-col justify-center items-center text-center mx-auto gap-8 flex-wrap font-bold p-4  text-slate-100">
      <h1>choose template</h1>
      <div class="flex items-center relative w-full lg:w-3/5">
        <div
          v-for="url in IMAGES"
          :key="url"
          class="cv-example"
        >
          <img
            width="908"
            height="1269"
            alt="CV example"
            format="webp"
            sizes="100px md:250px"
            :src="url"
            loading="eager"
            preload
          >
        </div>
      </div>
    </section>
  </AppLayout>
  </template>

  <style scoped>
  .cv-example {
    flex: 1;
    margin: 0 10px;
    max-width: 33.33%;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
    border-radius: 10px;
    overflow: hidden;
  }

</style>

  
  
 

  
  
  
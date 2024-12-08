<script setup >
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <div class="bg-gray-50 p-6 md:p-12">
      <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-lg overflow-hidden">
        <!-- Header Section -->
        <div class="bg-emerald-600 text-white text-center p-8">
          <div class="flex justify-center items-center mb-4">
            <img 
              src="https://via.placeholder.com/150" 
              alt="User Image" 
              class="rounded-full w-32 h-32 object-cover border-4 border-white shadow-lg"
            />
          </div>
          <h1 class="text-4xl font-extrabold">Khalid Bettal</h1>
          <p class="mt-2 text-lg">Web Developer | Vue.js & Laravel Enthusiast</p>
          <div class="mt-4 space-x-6 text-sm">
            <span>Email: khalid@example.com</span>
            <span>Phone: +212 6 12 34 56 78</span>
            <span>Location: Morocco</span>
          </div>
        </div>
  
        <!-- Skills Section -->
        <section class="px-6 py-8 md:px-12">
          <h2 class="text-2xl font-semibold text-gray-800 border-b pb-4">Skills</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 mt-6">
            <div class="flex items-center text-gray-600">
              <span class="text-emerald-500">&#9679;</span>
              <span class="ml-2">Vue.js</span>
            </div>
            <div class="flex items-center text-gray-600">
              <span class="text-emerald-500">&#9679;</span>
              <span class="ml-2">Tailwind CSS</span>
            </div>
            <div class="flex items-center text-gray-600">
              <span class="text-emerald-500">&#9679;</span>
              <span class="ml-2">Laravel</span>
            </div>
            <div class="flex items-center text-gray-600">
              <span class="text-emerald-500">&#9679;</span>
              <span class="ml-2">API Integration</span>
            </div>
          </div>
        </section>
  
        <!-- Experience Section -->
        <section class="px-6 py-8 md:px-12 bg-gray-50">
          <h2 class="text-2xl font-semibold text-gray-800 border-b pb-4">Experience</h2>
          <div class="mt-6 space-y-6">
            <div>
              <h3 class="text-xl font-semibold text-gray-700">Frontend Developer</h3>
              <p class="text-sm text-gray-500">Company Name | Jan 2022 - Present</p>
              <ul class="list-disc ml-6 mt-2 text-gray-600">
                <li>Built responsive web applications using Vue.js and Tailwind CSS.</li>
                <li>Collaborated in a team to develop scalable frontend architectures.</li>
              </ul>
            </div>
            <div>
              <h3 class="text-xl font-semibold text-gray-700">Backend Developer</h3>
              <p class="text-sm text-gray-500">Company Name | Jan 2020 - Dec 2021</p>
              <ul class="list-disc ml-6 mt-2 text-gray-600">
                <li>Developed RESTful APIs using Laravel for seamless data integration.</li>
                <li>Optimized backend processes to improve performance and reliability.</li>
              </ul>
            </div>
          </div>
        </section>
  
        <!-- Education Section -->
        <section class="px-6 py-8 md:px-12">
          <h2 class="text-2xl font-semibold text-gray-800 border-b pb-4">Education</h2>
          <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-700">Bachelor's Degree in Computer Science</h3>
            <p class="text-sm text-gray-500">University Name | Graduated: 2019</p>
          </div>
        </section>
  
        <!-- Footer Section -->
        <footer class="bg-gray-50 text-center py-6">
          <p class="text-sm text-gray-500">© 2024 Khalid Bettal. All rights reserved.</p>
        </footer>
      </div>
    </div>
  </template>
  
 
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
  
  * {
    font-family: 'Inter', sans-serif;
  }
  
  </style>
  
  
  
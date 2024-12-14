<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';  // Import Inertia

const isDropdownOpen = ref(false);


const languages = [
  { code: 'en', name: 'English', flag: 'https://flagcdn.com/w20/gb.png' },
  { code: 'fr', name: 'Français', flag: 'https://flagcdn.com/w20/fr.png' },
  { code: 'es', name: 'Español', flag: 'https://flagcdn.com/w20/es.png' },
  { code: 'ar', name: 'العربية', flag: 'https://flagcdn.com/w20/ma.png' },
  { code: 'zh', name: '中文', flag: 'https://flagcdn.com/w20/cn.png' },
];

// Get current locale from Inertia props
const { props } = usePage();

// Toggle the dropdown menu visibility
const toggleDropdown = () => {
  isDropdownOpen.value = !isDropdownOpen.value;
};

const getURL = (lang) => {
    const currentUrl = new URL(window.location.href);
    return currentUrl.pathname.replace(`/${props.currentLocale}`, `/${lang.code}`);
};

// Change the language by sending a request to Laravel backend
async function changeLanguage(lang) {
    const currentUrl = new URL(window.location.href);

    // Replace the locale in the URL
    const newUrl = currentUrl.pathname.replace(`/${props.currentLocale}`, `/${lang.code}`);

    window.location.href = newUrl;

}
</script>

<template>
  <div class="relative inline-block text-left">
    <!-- Button to open the language dropdown -->
    <button
      class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-400"
      @click="toggleDropdown"
    >
      <img :src="languages.find(lang => lang.code === props.currentLocale).flag" alt="Current Language" class="w-4 h-4 mr-2">
      <span class="uppercase">{{ languages.find(lang => lang.code === props.currentLocale).code }}</span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ml-2">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>

    <!-- Dropdown menu for language selection -->
    <div v-if="isDropdownOpen" class="absolute right-0 z-20 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg">
      <ul class="py-1 text-sm text-gray-700">
        <li
          v-for="lang in languages"
          :key="lang.code"
          
        >
          <Link
            :href="getURL(lang)"
            @click="changeLanguage(lang)"
            class="flex items-center px-4 py-2 cursor-pointer hover:bg-emerald-100"
          >
          <img :src="lang.flag" alt="" class="w-4 h-4 mr-2">
          {{ lang.name }}
        </Link>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
/* Add any custom styles if needed */
</style>

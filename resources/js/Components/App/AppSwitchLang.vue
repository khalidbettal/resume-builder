<script setup>
import { ref, computed } from 'vue';
import { router as inertiaRouter } from '@inertiajs/vue3';

// Define available languages
const languages = [
  { code: 'en', name: 'English', flag: 'https://flagcdn.com/w20/gb.png' },
  { code: 'fr', name: 'Français', flag: 'https://flagcdn.com/w20/fr.png' },
  { code: 'es', name: 'Español', flag: 'https://flagcdn.com/w20/es.png' },
  { code: 'ar', name: 'العربية', flag: 'https://flagcdn.com/w20/ma.png' },
];

// Props to get the current locale
const props = defineProps(['currentLocale']);

// Reactive variables
const isDropdownOpen = ref(false);

// Computed for the current language
const currentLanguage = computed(() => {
    const locale = props.currentLocale || localStorage.getItem('locale') || 'en';
    return languages.find(lang => lang.code === locale) || languages[0];
});


// Function to toggle dropdown visibility
function toggleDropdown() {
  isDropdownOpen.value = !isDropdownOpen.value;
}

// Function to get the updated URL for a selected language
function getURL(lang) {
  const currentUrl = new URL(window.location.href);
  return currentUrl.pathname.replace(`/${props.currentLocale}`, `/${lang.code}`);
}

async function changeLanguage(lang) {
    await inertiaRouter.post(`/locale-switch/${lang.code}`, {}, {
        preserveScroll: true,
        onSuccess: () => {
            localStorage.setItem('locale', lang.code);
            window.location.reload();
        },
    });
}





</script>

<template>
  <div class="relative inline-block text-left">
    <!-- Trigger Button -->
    <button
      class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-400"
      @click="toggleDropdown"
    >
      <img :src="currentLanguage.flag" alt="" class="w-4 h-4 mr-2">
      <span class="uppercase">{{ currentLanguage.code }}</span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ml-2">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>

    <!-- Dropdown Menu -->
    <div
      v-if="isDropdownOpen"
      class="absolute right-0 z-20 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg"
    >
      <ul class="py-1 text-sm text-gray-700">
        <li
  v-for="lang in languages"
  :key="lang.code"
  class="flex items-center px-4 py-2 cursor-pointer hover:bg-emerald-100"
  :class="{ 'bg-emerald-200': lang.code === currentLanguage.code }"
  @click="changeLanguage(lang)"
>
  <img :src="lang.flag" alt="" class="w-4 h-4 mr-2">
  {{ lang.name }}
</li>

      </ul>
    </div>
  </div>
</template>

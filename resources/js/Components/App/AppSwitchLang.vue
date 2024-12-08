<script  setup>
import { ref } from 'vue';

// Define locales and the selected language
const locales = [
  { code: 'en', name: 'English' },
  { code: 'fr', name: 'Français' },
  { code: 'es', name: 'Español' },
];
const selected = ref('en');
const isDropdownOpen = ref(false);

// Handle language selection
function selectLanguage(code) {
  if (locales.some(l => l.code === code)) {
    selected.value = code;
    isDropdownOpen.value = false; // Close the dropdown
  }
}

// Toggle dropdown visibility
function toggleDropdown() {
  isDropdownOpen.value = !isDropdownOpen.value;
}
</script>

<template>
  <div class="relative inline-block text-left">
    <!-- Button with globe icon and selected language -->
    <button
      class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-400"
      @click="toggleDropdown"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-5 h-5 mr-2 text-gray-600"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"
        />
      </svg>
      <span class="uppercase">{{ selected }}</span>
    </button>

    <!-- Dropdown menu -->
    <div
      v-if="isDropdownOpen"
      class="absolute z-20 w-20 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg"
    >
      <ul class="py-1 text-sm text-gray-700">
        <li
          v-for="loc in locales"
          :key="loc.code"
          @click="selectLanguage(loc.code)"
          class="px-4 py-2 cursor-pointer hover:bg-emerald-100"
        >
          <span class="uppercase ">{{ loc.code }}</span>
          <!-- <span>{{ loc.name }}</span> -->
        </li>
      </ul>
    </div>
  </div>
</template>



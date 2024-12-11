<template>
    <ul>
      <li v-for="(properties, localeCode) in locales" :key="localeCode">
        <a
          :href="getLocalizedURL(localeCode)"
          :rel="'alternate'"
          :hreflang="localeCode"
          :class="{ 'active-locale': localeCode === currentLocale }"
        >
          {{ properties.native }}
        </a>
      </li>
    </ul>
  </template>
  
  <script>
  export default {
    props: {
      locales: {
        type: Object,
        required: true,
      },
      currentLocale: {
        type: String,
        required: true,
      },
    },
    methods: {
      getLocalizedURL(localeCode) {
        // Generate the localized URL
        return `/locale-switch/${localeCode}`;
      },
    },
  };
  </script>
  
  <style>
  .active-locale {
    font-weight: bold;
    text-decoration: underline;
  }
  </style>
    
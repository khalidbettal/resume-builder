<script setup>
import AppLogo from '@/Components/App/AppLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900"
    >
        <div>
            <Link href="/">
                <AppLogo class="h-20 w-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden  px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-900"
        >
            <slot />
        </div>
    </div>
</template>

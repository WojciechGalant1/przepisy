<script setup>
import {Head, Link} from '@inertiajs/vue3';
import {usePage} from '@inertiajs/inertia-vue3';

import ApplicationLogo2 from "@/Components/ApplicationLogo2.vue";
import BreakfastLogo from "@/Components/BreakfastLogo.vue";
import MainDishLogo from "@/Components/MainDishLogo.vue";
import SnackLogo from "@/Components/SnackLogo.vue";
import DessertLogo from "@/Components/DessertLogo.vue";
import AllRecipesBtn from "@/Components/AllRecipesBtn.vue";
import AppLayout from "@/Layouts/AppLayout.vue";


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>

<template>
    <Head title="Welcome"/>

    <AppLayout>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Dashboard
            </Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Register
                </Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <ApplicationLogo2/>

            </div>
            <div class="flex justify-center">



            </div>


            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <a
                        href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div
                                class="h-16 w-16  dark:bg-red-800/20 flex items-center justify-center rounded-full"
                            >
                                <BreakfastLogo/>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Śniadania</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                 Odkryj różnorodne przepisy, począwszy od szybkich i prostych propozycji na poranne pośpieszki, po bardziej wyrafinowane dania na weekendowe śniadania w gronie rodziny.
                                 Zadbaj o smaczny początek dnia, korzystając z naszych pomysłów na klasyczne potrawy, oryginalne kompozycje i zdrowe przekąski. 

                            </p>
                        </div>

                        
                    </a>

                    <a
                        href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div
                                class="h-16 w-16 dark:bg-red-800/20 flex items-center justify-center rounded-full"
                            >
                                <MainDishLogo/>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Dania główne</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Od prostych i błyskawicznych przepisów na codzienne posiłki po wyjątkowe potrawy idealne na specjalne okazje – tutaj znajdziesz wszystko, czego potrzebujesz, by sprawić, że Twoje dania główne staną się prawdziwymi arcydziełami smaku. 

                            </p>
                        </div>

                        
                    </a>

                    <a
                        href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div
                                class="h-16 w-16 dark:bg-red-800/20 flex items-center justify-center rounded-full"
                            >
                                <SnackLogo/>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Przekąski</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                                Przekąski to kategoria przepisów na strony z przepisami, która obejmuje szeroki zakres potraw, które można podawać jako mały posiłek lub przekąskę. Przekąski mogą być słodkie lub wytrawne, ciepłe lub zimne, a ich przygotowanie może trwać od kilku minut do kilku godzin.
                            </p>
                        </div>

                        
                    </a>

                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                    >
                        <div>
                            <div
                                class="h-16 w-16 dark:bg-red-800/20 flex items-center justify-center rounded-full"
                            >
                                <DessertLogo/>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Desery</h2>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                
Desery to kategoria przepisów na stronie z przepisami, która obejmuje słodkie potrawy podawane jako zakończenie posiłku lub jako samodzielna przekąska.
 Desery mogą być proste lub złożone, a ich przygotowanie może trwać od kilku minut do kilku godzin.

                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </AppLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>

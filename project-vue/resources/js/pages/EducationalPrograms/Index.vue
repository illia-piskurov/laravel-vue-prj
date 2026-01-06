<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

interface EducationalProgram {
    id: number;
    department: string;
    code_and_name: string;
    name_of_edu_program: string;
    degree: string;
    state_catalog: string;
    year_of_start: string;
}

const props = defineProps<{
    programs: EducationalProgram[];
}>();

// Пример группировки по департаменту (институту), как на скриншоте
const groupedPrograms = computed(() => {
    return props.programs.reduce(
        (acc, program) => {
            if (!acc[program.department]) {
                acc[program.department] = [];
            }
            acc[program.department].push(program);
            return acc;
        },
        {} as Record<string, EducationalProgram[]>,
    );
});
</script>

<template>
    <Head title="Освітні програми" />

    <div class="min-h-screen bg-gray-100 font-sans">
        <div class="bg-blue-600 p-4 text-white shadow-md">
            <h1 class="text-2xl font-normal">Освітні програми</h1>
        </div>

        <div class="mx-auto max-w-[1600px] p-4">
            <nav class="mb-6 text-sm text-blue-500">
                <Link href="/" class="hover:underline">Головна</Link>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-gray-600">Освітні програми</span>
            </nav>

            <div class="mb-6 flex gap-2">
                <button class="rounded bg-blue-600 px-4 py-2 text-white shadow transition hover:bg-blue-700">Додати</button>
                <button class="rounded bg-gray-500 px-4 py-2 text-white shadow transition hover:bg-gray-600">Архів</button>
            </div>

            <button class="mb-6 rounded bg-blue-700 px-4 py-2 text-sm text-white">Роздрукувати таблицю</button>

            <div class="overflow-hidden rounded-sm border border-gray-300 bg-white shadow">
                <table class="w-full border-collapse text-center text-sm">
                    <thead class="bg-gray-700 text-[11px] font-bold text-white uppercase">
                        <tr>
                            <th class="w-1/6 border border-gray-600 p-2">Випускова кафедра / Циклова комісія</th>
                            <th class="border border-gray-600 p-2">Код та назва спеціальності</th>
                            <th class="border border-gray-600 p-2">Назва освітньої програми</th>
                            <th class="border border-gray-600 p-2">Ступінь вищої освіти</th>
                            <th class="border border-gray-600 p-2">Стан інформації щодо ОП у каталозі</th>
                            <th class="border border-gray-600 p-2">Роки прийому</th>
                            <th class="border border-gray-600 p-2">pdf</th>
                        </tr>
                    </thead>

                    <tr class="bg-gray-100">
                        <td v-for="i in 7" :key="i" class="border border-gray-300 p-1">
                            <input
                                type="text"
                                placeholder="Пошук по полю"
                                class="w-full rounded border border-gray-300 p-1 text-[11px] focus:border-blue-500 focus:outline-none"
                            />
                        </td>
                    </tr>

                    <tr class="bg-blue-500 text-[12px] font-bold text-white">
                        <td class="border border-blue-600 p-2">Загальна кількість програм</td>
                        <td class="border border-blue-600 p-2">Створені</td>
                        <td class="border border-blue-600 p-2 text-center">Надіслані на верифікацію</td>
                        <td class="border border-blue-600 p-2">Відхилені при верифікації</td>
                        <td class="border border-blue-600 p-2">Верифіковані та оприлюднені</td>
                        <td class="border border-blue-600 p-2">В архіві</td>
                        <td class="border border-blue-600 p-2"></td>
                    </tr>
                    <tr class="bg-white text-[13px]">
                        <td class="border border-gray-300 p-2">{{ programs.length }}</td>
                        <td class="border border-gray-300 p-2">166</td>
                        <td class="border border-gray-300 p-2">11</td>
                        <td class="border border-gray-300 p-2">190</td>
                        <td class="border border-gray-300 p-2">359</td>
                        <td class="border border-gray-300 p-2">718</td>
                        <td class="border border-gray-300 p-2"></td>
                    </tr>

                    <template v-for="(group, depName) in groupedPrograms" :key="depName">
                        <tr class="bg-blue-600 font-medium text-white italic">
                            <td colspan="7" class="border border-blue-700 p-2">
                                {{ depName }}
                            </td>
                        </tr>

                        <tr v-for="program in group" :key="program.id" class="text-[13px] transition-colors hover:bg-blue-50">
                            <td class="border border-gray-300 p-3">{{ program.department }}</td>
                            <td class="border border-gray-300 p-3">{{ program.code_and_name }}</td>
                            <td class="cursor-pointer border border-gray-300 p-3 text-blue-600 hover:underline">
                                {{ program.name_of_edu_program }}
                            </td>
                            <td class="border border-gray-300 p-3">{{ program.degree }}</td>
                            <td class="border border-gray-300 p-3">{{ program.state_catalog }}</td>
                            <td class="border border-gray-300 p-3">{{ program.year_of_start }}</td>
                            <td class="border border-gray-300 p-3 text-red-500">
                                <span class="cursor-pointer">📄</span>
                            </td>
                        </tr>
                    </template>
                </table>
            </div>
        </div>
    </div>
</template>

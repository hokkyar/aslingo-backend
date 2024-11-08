<template>
    <div class="relative mb-4">
        <div
            @click="toggleDropdown"
            :class="[
                'border p-3 shadow-sm cursor-pointer bg-gray-50 hover:bg-gray-100 transition ease-in-out duration-200',
                isDropdownOpen ? 'rounded-t-lg' : 'rounded-lg',
            ]"
        >
            <span>{{ selectedOptionLabel }}</span>
            <svg
                class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                />
            </svg>
        </div>
        <div
            v-if="isDropdownOpen"
            class="absolute w-full bg-white border-l border-r border-b rounded-b-lg shadow-lg z-10 max-h-60 overflow-y-auto"
        >
            <div
                v-for="(item, index) in options"
                :key="index"
                @click="selectOption(item)"
                class="p-3 hover:bg-gray-100 cursor-pointer"
            >
                {{ item.label }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            required: true,
        },
        value: {
            type: String,
            default: "",
        },
        quiz_selected: {
            type: String,
            default: "",
        },
    },
    data() {
        return {
            isDropdownOpen: false,
            selectedOption: this.value || this.quiz_selected,
        };
    },
    computed: {
        selectedOptionLabel() {
            const selected = this.options.find(
                (option) => option.value === this.selectedOption
            );
            return selected ? selected.label : "Choose here";
        },
    },

    methods: {
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        selectOption(item) {
            this.selectedOption = item.value;
            this.isDropdownOpen = false;
            this.$emit("input", item.value);
            this.$emit("select", item);
        },
    },
};
</script>

<style scoped>
/* Tambahkan gaya tambahan jika perlu */
</style>

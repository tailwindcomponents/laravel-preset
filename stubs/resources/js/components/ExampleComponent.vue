<template>
    <div class="flex items-center justify-center mt-16 mx-6 w-full">
        <div class="p-6 bg-white shadow rounded-md max-w-xl w-full">
            <h3 class="text-gray-700 text-lg">Example Component</h3>

            <p class="text-gray-600 mt-3">I'm an example component.</p>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
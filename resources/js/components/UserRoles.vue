<template>
    <div class="">
        <Multiselect
            v-model="selectedOptions"
            class="multiselect-blue"
            mode="tags"
            :close-on-select="false"
            :searchable="true"
            :create-option="false"
            :options="options"
            :can-clear="false"
        />
        <div v-for="(role, index) in selectedOptions" :key="index">
            <input :value="role" type="text" name="roles[]" hidden>
        </div>
    </div>
</template>

<script>
    import Multiselect from '@vueform/multiselect'

    export default {
        props:{
            roles:{
                type: Array,
                default: []
            },
            userRoles:{
                type: Array,
                default: []
            }
        },
        mounted(){
            this.options = this.roles
            this.selectedOptions = this.userRoles
        },
        data(){
            return{
                options:[],
                selectedOptions:[],
            }
        },
        methods:{

        },
        components:{
            Multiselect
        }
    }
</script>

<style scoped>

.multiselect-blue {
  --ms-tag-bg: #0d6efd;
  --ms-tag-color: #ffffff;
  --ms-ring-color: #548ee6;
  --ms-ring-width: 1px;
}

</style>
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
        <div v-for="(permission, index) in selectedOptions" :key="index">
            <input :value="permission" type="text" name="permissions[]" hidden>
        </div>
    </div>
</template>

<script>
    import Multiselect from '@vueform/multiselect'

    export default {
        props:{
            permissions:{
                type: Array,
                default: []
            },
            rolePermissions:{
                type: Array,
                default: []
            }
        },
        mounted(){
            this.options = this.permissions
            this.selectedOptions = this.rolePermissions
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
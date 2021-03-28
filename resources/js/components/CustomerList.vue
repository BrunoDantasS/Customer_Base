<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Customers</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Cell</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Note</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody v-for="customer in customers" :key="customer.id">
                <tr>
                    <td scope="row">{{ customer.id }}</td>
                    <td scope="row">{{ customer.name }}</td>
                    <td scope="row">{{ customer.birth_date }}</td>
                    <td scope="row">{{ customer.cpf }}</td>
                    <td scope="row">{{ customer.cell }}</td>
                    <td scope="row">{{ customer.email }}</td>
                    <td scope="row">{{ customer.address }}</td>
                    <td scope="row">{{ customer.note }}</td>

                    <td>
                        <button class="btn btn-danger btn-sm" @click.prevent="deleteCustomer(customer.id)">
                            Delete
                        </button>
                    </td>

                    <td>
                        <router-link :to="{ name: 'get_customer', params: {id: customer.id} }" class="btn btn-primary btn-sm">
                            Edit
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: 'Customer',
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                let url = this.url + '/api/get_customers';
                this.axios.get(url).then(response => {
                    this.customers = response.data
                    console.log(this.customers);
                });
            },
            deleteCustomer(id) {
                let url = this.url + `/api/delete_customer/${id}`;
                this.axios.delete(url).then(response => {
                    if (response.status) {
                        this.loadData();
                        this.$utils.showSuccess('success', response.message);
                    } else {
                        this.$utils.showError('Error', response.message);
                    }
                });
            }
        },

        mounted() {
            console.log('Customer List Component Mounted');
        },
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                customers: []
            }
        }
    }
</script>

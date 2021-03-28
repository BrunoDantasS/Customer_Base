<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Add Customer</h2>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form id="validateForm" @submit.prevent="saveCustomer" enctype="multipart/form-data" novalidate>

                    <div class="alert alert-danger" v-if="errors.length">
                        <ul class="mb-0">
                            <li v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" v-model="customer.name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="date" id="birth_date" v-model="customer.birth_date" class="form-control" placeholder="Enter Birth Date">
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" v-model="customer.cpf" class="form-control" placeholder="Enter CPF">
                    </div>
                    <div class="form-group">
                        <label for="cell">Cell</label>
                        <input type="tel" id="cell" v-model="customer.cell" class="form-control" placeholder="Enter Cell">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" v-model="customer.email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" v-model="customer.address" class="form-control" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea type="text" id="note" v-model="customer.note" class="form-control" placeholder="Enter Note" cols=60 rows="5" maxlength="500" wrap="hard"></textarea>
                    </div>

                    <button class="btn btn-primary mt-4">Submit</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: document.head.querySelector('meta[name="url"]').content,
                customer: {},
                name: '',
                birth_date: '',
                cpf: '',
                cell: '',
                email: '',
                address: '',
                note: '',
                errors: [],
            }
        },
        methods: {
            saveCustomer() {
                this.errors = [];
                if (!this.customer.name) {
                    this.errors.push('Name is required.');
                }
                if (!this.customer.birth_date) {
                    this.errors.push('Birth Date is required.');
                }
                if (!this.customer.cpf) {
                    this.errors.push('CPF is required.');
                }
                if (!this.customer.cell) {
                    this.errors.push('Cell is required.');
                }
                if (!this.customer.email) {
                    this.errors.push('Email is required.');
                }
                if (!this.customer.address) {
                    this.errors.push('Address is required.');
                }

                if (!this.errors.length) {
                    let formData = new FormData();
                    formData.append('name', this.customer.name);
                    formData.append('birth_date', this.customer.birth_date);
                    formData.append('cpf', this.customer.cpf);
                    formData.append('cell', this.customer.cell);
                    formData.append('email', this.customer.email);
                    formData.append('address', this.customer.address);
                    formData.append('note', this.customer.note);
                    let url = this.url + '/api/save_customer';
                    this.axios.post(url, formData).then((response) => {
                        if (response.status) {
                            document.getElementById('name').value = '';
                            document.getElementById('birth_date').value = '';
                            document.getElementById('cpf').value = '';
                            document.getElementById('cell').value = '';
                            document.getElementById('email').value = '';
                            document.getElementById('address').value = '';
                            document.getElementById('note').value = '';
                            this.$utils.showSuccess('success', response.message);
                        } else {
                            this.$utils.showErrr('Error', response.message);
                        }
                    }).catch(error => {
                        this.errors.push(error.response.data.error)
                    });
                }
            }
        },
        mounted: function() {
            console.log('Add Contacts Component Loaded');
        }

    }
</script>

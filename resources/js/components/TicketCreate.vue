<template>
    <div>
    <form @submit.prevent="submit">
        <div class="alert alert-success" v-show="success">Ticket created successfully.</div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Your Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required autofocus>
                <div class="alert alert-danger" v-if="errors && errors.name">
                    {{ errors.name[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Your E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" v-model="fields.email" required autocomplete="email">
                <div class="alert alert-danger" v-if="errors && errors.email">
                    {{ errors.email[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="category_id" class="col-md-4 col-form-label text-md-right">Ticket Category</label>

            <div class="col-md-6">
                <select class="form-control" id="category_id" name="category_id" v-model="fields.category_id">
                    <option v-for="category in categories"
                            :value="category.id">{{ category.name }}
                    </option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.category_id">
                    {{ errors.category_id[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Ticket Description</label>

            <div class="col-md-6">
                <textarea id="description" rows="5" class="form-control" name="description" v-model="fields.description" required></textarea>
                <div class="alert alert-danger" v-if="errors && errors.description">
                    {{ errors.description[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Submit Ticket
                </button>
            </div>
        </div>
    </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: null,
                fields: {},
                success: false,
                errors: {}
            }
        },
        mounted() {
            axios.get('/api/categories').then(response => {
                this.categories = response.data.data;
            })
        },
        methods: {
            submit() {
                axios.post('/api/tickets', this.fields).then(response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                }).catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log('Error');
                });
            }
        }
    }
</script>

<template>
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form @submit.prevent="Register">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name"
                                v-model="user.name" :class="{'is-invalid':errors.name}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <span class="invalid-feedback" v-if="errors.name">{{errors.name[0]}}</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email"
                                v-model="user.email" :class="{'is-invalid':errors.email}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span class="invalid-feedback" v-if="errors.email">{{errors.email[0]}}</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password"
                                v-model="user.password" :class="{'is-invalid':errors.password}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span class="invalid-feedback" v-if="errors.password">{{errors.password[0]}}</span>

                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password"
                                v-model="user.password_comfirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</template>

<script>
    import * as auth from '../../service/auth_service'
    export default {
        data(){
            return {
                user:{
                    name:'',
                    email:'',
                    password:'',
                    password_confirmation:''
                },
                errors:[]
            }
        },
        methods:{
            Register:async function(){
                try {
                    const response = await auth.register(this.user)
                    console.log(response)
                    this.$router.push('/login')
                }catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.errors=error.response.data.errors
                            break
                        case 401:
                            toast.fire({
                                icon:'error',
                                text: error.response.data.message
                            })
                            break
                        case 500:
                            toast.fire({
                                icon:'error',
                                text: error.response.data.errors
                            })
                            break
                        default:
                            toast.fire({
                                icon:'error',
                                text:'some error occurred, Please try again !'
                            })
                            break
                    }
                }
            }

        }

    }
</script>
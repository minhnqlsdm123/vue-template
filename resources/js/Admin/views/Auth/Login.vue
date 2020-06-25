<template>
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form @submit.prevent="Login">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email"
                               v-model="user.email" v-bind:class="{'is-invalid':errors.email}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span class="error invalid-feedback" v-if="errors.email">{{errors.email[0]}}</span>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password"
                               v-model="user.password" v-bind:class="{'is-invalid':errors.password}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <span class="error invalid-feedback" v-if="errors.password">{{errors.password[0]}}</span>

                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" v-model="user.remember_me">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</template>

<script>
    import * as auth from '../../service/auth_service'
    export default {
        data(){
            return {
                user:{
                    email:'',
                    password:'',
                    remember_me:false
                },
                errors:[]
            }
        },
        methods:{
            Login: async function(){
                try {
                    const response = await auth.login(this.user)
                    this.errors={}
                    this.$router.push({name:'Dashboard'})
                    console.log(response)
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
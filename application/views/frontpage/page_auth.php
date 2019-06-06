<?php
/**
 * Created by PhpStorm.
 * User: zhanang19
 * Date: 10/05/2019
 * Time: 19:40
 * Project: e-commerce
 */
?>

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">
        <h2 class="my-5 h2 text-center">Halaman Autentikasi</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h3 class="mt-4 h3 text-center">Registrasi Pelanggan</h3>
                    </div>
                    <div id="register-alert" class="alert alert-dismissible" style="display:none" role="alert">
                        <span id="register-alert-msg"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="registration-form" action="<?= base_url('page/register') ?>" method="POST" class="card-body">
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name">Nama Lengkap</label>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="md-form">
                            <textarea type="text" name="address" id="address" class="md-textarea form-control"></textarea>
                            <label for="address">Alamat</label>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="md-form">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email">Email</label>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="md-form">
                            <input type="text" name="username" id="username" class="form-control">
                            <label for="username">Username</label>
                            <div class="invalid-feedback">Username tidak boleh kosong</div>
                        </div>

                        <div class="md-form">
                            <input type="password" name="password" id="password" class="form-control">
                            <label for="password">Password</label>
                            <div class="invalid-feedback">Password tidak boleh kosong</div>
                        </div>

                        <div class="md-form">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <div class="invalid-feedback">Konfirmasi password tidak boleh kosong</div>
                        </div>
                        
                        <button class="btn btn-primary btn-lg btn-block mt-4" type="submit">Register</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                        <h3 class="mt-4 h3 text-center">Login Pelanggan</h3>
                    </div>
                    <form id="login-form" action="<?= base_url('page/login') ?>" method="POST" class="card-body">
                        <div class="md-form">
                            <input type="text" name="username_login" id="username_login" class="form-control">
                            <label for="username_login">Username</label>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="md-form">
                            <input type="password" name="password_login" id="password_login" class="form-control">
                            <label for="password_login">Password</label>
                            <div class="invalid-feedback"></div>
                        </div>
                        
                        <button class="btn btn-primary btn-lg btn-block mt-4" type="submit">Login</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</main>
<!--Main layout-->
<script>
    $(function () {
        $('#registration-form').submit(function (e) { 
            e.preventDefault();
            $('.form-control.is-invalid').removeClass('.is-invalid')
            $('.invalid-feedback').empty()
            $.ajax({
                type: this.method,
                url: this.action,
                data: $(this).serialize(),
                success: function (response) {
                    $('#registration-form').trigger('reset')
                    $('#register-alert').addClass('alert-success fade show').fadeIn();
                    $('#register-alert-msg').html(response.message);
                },
                error: function (xhr, status, error) {
                    $.each(xhr.responseJSON, function (key, value) { 
                        $('#'+key).addClass('is-invalid').next().next().html(value)
                    });
                }
            });
        });

        $('#login-form').submit(function (e) { 
            e.preventDefault();
            $('.form-control.is-invalid').removeClass('.is-invalid')
            $('.invalid-feedback').empty()
            $.ajax({
                type: this.method,
                url: this.action,
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response)
                    location.reload()
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                    $.each(xhr.responseJSON, function (key, value) { 
                        $('#'+key).addClass('is-invalid').next().next().html(value)
                    });
                }
            });
        });
    });
</script>
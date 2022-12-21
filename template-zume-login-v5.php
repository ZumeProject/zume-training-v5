<?php
/*
Template Name: Zume Login v5
*/
if ( function_exists( 'zume_current_language' ) ) {
    $zume_current_lang = zume_current_language();
}

?>

<?php get_header(); ?>

<div id="content" class="grid-x grid-padding-x"><div class="cell">

        <div id="inner-content">

            <!-- Challenge -->
            <div class="grid-x grid-margin-x">
                <div class="medium-2 small-1 cell"></div>
                <div class="medium-8 small-10 cell center">
                    <h1 class="primary-color-text">
                        <strong><?php esc_html_e( 'Login', 'zume' ) ?></strong>
                    </h1>
                </div>
                <div class="medium-2 small-1 cell"></div>
            </div>

            <div class="grid-x ">
                <div class="large-2 cell"></div>
                <div class="large-8 small-12 cell">
                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js" ></script>
                    <style>
                        #signon {
                            width: 100%;
                            margin:2em 0;
                        }
                        #login-logo {
                            width: 100px;
                            position:absolute;
                            top:80px;
                            left:20px;
                            display:none;
                        }
                    </style>
                    <div style="text-align: center;">
                        <div id="signon">
                            <div class="login-logo" style="display:none; text-align:center;">
                                <img src="<?php echo trailingslashit( get_stylesheet_directory_uri() ) ?>mysteryman.png" width="30px;" /><br>
                                <span class="u_name"></span>
                            </div>
                        </div>
                        <button class="button" id="jwt_register_user">Register User</button><br>
                        <div style="text-align:center; margin: 0 auto; width:200px;"><input type="text" id="username" placeholder="Username" value="" /> </div>
                        <div style="text-align:center; margin: 0 auto; width:200px;"><input type="password" id="password" placeholder="Password" value="" /> </div>
                        <button class="button" id="jwt_login">Login</button><br>
                        <button class="button" id="jwt_logout">Logout</button><br>
                        <hr>
                        <button class="button" id="get_me">Get Me</button><br>
                        <hr>
                        <div id="response"></div>
                        <hr>
                    </div>

                    <script>
                        jQuery(document).ready(function(){

                            window.jsObject = [<?php echo json_encode([
                                'root' => esc_url_raw( rest_url() ),
                                'nonce' => wp_create_nonce( 'wp_rest' ),
                                'translations' => [
                                    'add' => __( 'Add Magic', 'prayer-global' ),
                                ],
                            ]) ?>][0]

                            window.user_object = false

                            if ( typeof Cookies.get('zume_token') !== 'undefined' ) {
                                jQuery('.login-logo').show()
                                jQuery('.u_name').html( Cookies.get('zume_name') )
                            }

                            window.api_post = ( action, data ) => {
                                return jQuery.ajax({
                                    type: "POST",
                                    data: JSON.stringify({ action: action, data: data }),
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    url: window.jsObject.root + 'dt-login/v1/login',
                                    beforeSend: function (xhr) {
                                        if (localStorage.token) {
                                            xhr.setRequestHeader('Authorization', 'Bearer ' + Cookies.get('zume_token'));
                                        }
                                    }
                                })
                                    .fail(function(e) {
                                        console.log(e)
                                    })
                            }
                            window.api_remote_post = ( endpoint, data ) => {
                                return jQuery.ajax({
                                    type: "POST",
                                    data: JSON.stringify(data),
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    url: `https://zume5.training/tools/wp-json/`+endpoint,
                                    beforeSend: function (xhr) {
                                        if (localStorage.token) {
                                            xhr.setRequestHeader('Authorization', 'Bearer ' + Cookies.get('zume_token'));
                                        }
                                    }
                                })
                                    .fail(function(e) {
                                        console.log(e)
                                    })
                            }
                            window.api_remote_get = ( endpoint ) => {
                                return jQuery.ajax({
                                    type: "GET",
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                    url: `https://zume5.training/tools/wp-json/`+endpoint,
                                    beforeSend: function (xhr) {
                                        if (localStorage.token) {
                                            xhr.setRequestHeader('Authorization', 'Bearer ' + Cookies.get('zume_token'));
                                        }
                                    }
                                })
                                    .fail(function(e) {
                                        console.log(e)
                                    })
                            }
                            jQuery('#get_me').click(function(){
                                window.api_remote_get('dt/v1/user/my')
                                    .done(function(data){
                                        console.log(data);
                                        jQuery('#response').html(
                                            JSON.stringify(data)
                                        )
                                    })
                            })
                            jQuery('#jwt_register_user').click(function(){
                                const d = new Date();
                                window.time = d.getTime();
                                let new_user_params = {
                                    'user-email': window.time + '@email.com',
                                    'user-display': window.time,
                                    'user-password': window.time,
                                    'locale': 'en'
                                }
                                window.api_remote_post('dt/v1/users/register', new_user_params)
                                    .done(function(data){
                                        console.log(data)
                                        window.user_object = data
                                        Cookies.set('zume_token', data.jwt.token )
                                        Cookies.set('zume_name', data.jwt.user_display_name )
                                        jQuery('.login-logo').show()
                                        jQuery('.u_name').html( data.jwt.user_display_name )
                                        jQuery('#response').html(JSON.stringify(data))
                                    })
                            })
                            jQuery('#jwt_login').click(function() {
                                let username = jQuery('#username').val()
                                let password = jQuery('#password').val()
                                jQuery.ajax({
                                    type: "POST",
                                    url: "https://zume5.training/tools/wp-json/jwt-auth/v1/token",
                                    data: {
                                        username: username,
                                        password: password
                                    },
                                    success: function(data) {
                                        console.log(data)
                                        Cookies.set('zume_token', data.token )
                                        Cookies.set('zume_name', data.user_display_name )
                                        jQuery('.login-logo').show()
                                        jQuery('.u_name').html( data.user_display_name )
                                        jQuery('#response').html(JSON.stringify(data))
                                    },
                                    error: function() {
                                        alert("Login Failed");
                                    }
                                });
                            });
                            jQuery('#jwt_logout').click(function() {
                                jQuery('.login-logo').hide()
                                Cookies.remove( 'zume_token' )
                                Cookies.remove( 'zume_name' )
                            });
                        })
                    </script>

                </div>
                <div class="large-2 cell"></div>
            </div>

        </div> <!-- end #inner-content -->

    </div> <!-- cell -->
</div> <!-- content -->

<?php get_footer(); ?>

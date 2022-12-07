<?php

if ( ! function_exists('disciple_tools_login_shortcode') ) {
    add_action('init', 'disciple_tools_login_shortcode');
    function disciple_tools_login_shortcode()
    {
        add_shortcode('disciple_tools_login_widget', ['DT_Login_Widget', 'load']);
    }
}

if ( ! class_exists('DT_Login_Widget' ) ) {
    class DT_Login_Widget {

        private static $_instance = null;
        public static function instance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct() {
            add_action( 'rest_api_init', array( $this,  'add_api_routes' ) );
        }

        public static function load() {
            // enqueue script
            // enqueue css
            // enquque html
            // add rest api
            
            ?>
            Test short code. <button class="button" onclick="window.api_post('test', 'test').done(function(data){console.log(data)})">Test</button>
            <script>
                jQuery(document).ready(function(){
                    let jsObject = [<?php echo json_encode([
                        'root' => esc_url_raw( rest_url() ),
                        'nonce' => wp_create_nonce( 'wp_rest' ),
                        'translations' => [
                            'add' => __( 'Add Magic', 'prayer-global' ),
                        ],
                    ]) ?>][0]
                    window.api_post = ( action, data ) => {
                        return jQuery.ajax({
                            type: "POST",
                            data: JSON.stringify({ action: action, data: data }),
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            url: jsObject.root + 'dt-login/v1/login',
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader('X-WP-Nonce', jsObject.nonce )
                            }
                        })
                            .fail(function(e) {
                                console.log(e)
                            })
                    }
                })
            </script>
            <?php
        }

        public function add_api_routes() {
            $namespace = 'dt-login/v1';
            register_rest_route( $namespace, '/login', array(
                array(
                    'methods'         => WP_REST_Server::CREATABLE,
                    'callback'        => array( $this, 'login' ),
                    'permission_callback' => '__return_true'
                ),
            ) );
        }

        public function login( WP_REST_Request $request){
            $params = $request->get_params();

            return true;
        }
    }
    DT_Login_Widget::instance();
}



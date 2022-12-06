<?php
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

class Zume_Lists {

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'rest_api_init', array( $this,  'add_api_routes' ) );
    }

    public function add_api_routes() {
        $version = '5';
        $namespace = 'zume/v' . $version;

        register_rest_route( $namespace, '/languages', array(
            array(
                'methods'         => WP_REST_Server::READABLE,
                'callback'        => array( $this, 'endpoint_languages' ),
                'permission_callback' => '__return_true'
            ),
        ) );
        register_rest_route( $namespace, '/menu', array(
            array(
                'methods'         => WP_REST_Server::READABLE,
                'callback'        => array( $this, 'endpoint_menu' ),
                'permission_callback' => '__return_true'
            ),
        ) );
    }

    public function endpoint_languages( WP_REST_Request $request){
        return self::languages();
    }

    public static function languages() {
        $languages = [
            [
            "enDisplayName" => "English",
            "code" => "en",
            "locale" => "en",
            "nativeName" => "English",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Arabic",
            "code" => "ar",
            "locale" => "ar_LB",
            "nativeName" => "العربية",
            "rtl" => true
            ],
            [
            "enDisplayName" => "Arabic (JO)",
            "code" => "ar_jo",
            "locale" => "ar_JO",
            "nativeName" => "العربية - الأردن",
            "rtl" => true
            ],
            [
            "enDisplayName" => "American Sign Language",
            "code" => "asl",
            "locale" => "asl",
            "nativeName" => "Sign Language",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Bhojpuri",
            "code" => "bho",
            "locale" => "bho",
            "nativeName" => "भोजपुरी",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Bengali (India)",
            "code" => "bn",
            "locale" => "bn_IN",
            "nativeName" => "বাংলা",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Bosnian",
            "code" => "bs",
            "locale" => "bs_BA",
            "nativeName" => "Bosanski",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Cantonese (Traditional)",
            "code" => "zhhk",
            "locale" => "zh_HK",
            "nativeName" => "粵語 (繁體)",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Croatian",
            "code" => "hr",
            "locale" => "hr",
            "nativeName" => "Hrvatski",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Farsi/Persian",
            "code" => "fa",
            "locale" => "fa_IR",
            "nativeName" => "فارسی",
            "rtl" => true
            ],
            [
            "enDisplayName" => "French",
            "code" => "fr",
            "locale" => "fr_FR",
            "nativeName" => "Français",
            "rtl" => false
            ],
            [
            "enDisplayName" => "German",
            "code" => "de",
            "locale" => "de_DE",
            "nativeName" => "Deutsch",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Gujarati",
            "code" => "gu",
            "locale" => "gu",
            "nativeName" => "ગુજરાતી",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Hausa",
            "code" => "ha",
            "locale" => "ha_NG",
            "nativeName" => "Hausa",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Hindi",
            "code" => "hi",
            "locale" => "hi_IN",
            "nativeName" => "हिंदी",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Indonesian",
            "code" => "id",
            "locale" => "id_ID",
            "nativeName" => "Bahasa Indonesia",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Italian",
            "code" => "it",
            "locale" => "it_IT",
            "nativeName" => "Italiano",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Kannada",
            "code" => "kn",
            "locale" => "kn",
            "nativeName" => "ಕನ್ನಡ",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Korean",
            "code" => "ko",
            "locale" => "ko_KR",
            "nativeName" => "한국어",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Kurdish",
            "code" => "ku",
            "locale" => "ku",
            "nativeName" => "کوردی",
            "rtl" => true
            ],
            [
            "enDisplayName" => "Lao",
            "code" => "lo",
            "locale" => "lo",
            "nativeName" => "ພາສາລາວ",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Maithili",
            "code" => "mai",
            "locale" => "mai",
            "nativeName" => "\uD805\uDCA7\uD805\uDCBB\uD805\uDC9F\uD805\uDCB1\uD805\uDCAA\uD805\uDCB2",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Mandarin (Traditional)",
            "code" => "zhtw",
            "locale" => "zh_TW",
            "nativeName" => "國語（繁體)",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Mandarin (Simplified)",
            "code" => "zhcn",
            "locale" => "zh_CN",
            "nativeName" => "国语（简体)",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Marathi",
            "code" => "mr",
            "locale" => "mr",
            "nativeName" => "मराठी",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Malayalam",
            "code" => "ml",
            "locale" => "ml_IN",
            "nativeName" => "മലയാളം",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Oriya",
            "code" => "or",
            "locale" => "or_IN",
            "nativeName" => "ଓଡ଼ିଆ",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Panjabi",
            "code" => "pa",
            "locale" => "pa_IN",
            "nativeName" => "Apagibete",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Portuguese",
            "code" => "pt",
            "locale" => "pt_PT",
            "nativeName" => "Português",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Russian",
            "code" => "ru",
            "locale" => "ru_RU",
            "nativeName" => "русский",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Romanian",
            "code" => "ro",
            "locale" => "ro_RO",
            "nativeName" => "Română",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Slovenian",
            "code" => "sl",
            "locale" => "sl_Sl",
            "nativeName" => "Slovenščina",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Spanish",
            "code" => "es",
            "locale" => "es",
            "nativeName" => "Español",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Somali",
            "code" => "so",
            "locale" => "so",
            "nativeName" => "Soomaaliga",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Swahili",
            "code" => "swa",
            "locale" => "swa",
            "nativeName" => "Kiswahili",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Tamil",
            "code" => "ta",
            "locale" => "ta_IN",
            "nativeName" => "தமிழ்",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Telugu",
            "code" => "te",
            "locale" => "te",
            "nativeName" => "తెలుగు",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Thai",
            "code" => "th",
            "locale" => "th_TH",
            "nativeName" => "ไทย",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Urdu",
            "code" => "ur",
            "locale" => "ur",
            "nativeName" => "اُردُو",
            "rtl" => true
            ],
            [
            "enDisplayName" => "Vietnamese",
            "code" => "vi",
            "locale" => "vi",
            "nativeName" => "Tiếng Việt",
            "rtl" => false
            ],
            [
            "enDisplayName" => "Yoruba",
            "code" => "yo",
            "locale" => "yo",
            "nativeName" => "Yorùbá",
            "rtl" => false
            ]
        ];

        return $languages;
    }

    public function endpoint_menu( WP_REST_Request $request){
        return self::menu();
    }

    public static function menu() {

        $language_code = get_locale();
        if ( 'en' === $language_code ) {
            $language_code = '';
        } else {
            $language_code = $language_code . '/';
        }

        $menu = [
            'home' => [
                'label' => __( 'Home', 'zume' ),
                'visible' => true,
                'active' => true,
                'url' => '/'.$language_code,
                'submenu' => []
            ],
            'course' => [
                'label' => __( 'Course', 'zume' ),
                'visible' => true,
                'active' => false,
                'url' => '/'.$language_code.'training',
                'submenu' => [
                    'course_overview' => [
                        'label' => __( 'Course Overview', 'zume' ),
                        'visible' => ( is_user_logged_in() ),
                        'active' => false,
                        'url' => '/'.$language_code.'training',
                        'submenu' => []
                    ],
                    'groups' => [
                        'label' => __( 'Groups', 'zume' ),
                        'visible' => ( is_user_logged_in() ),
                        'active' => false,
                        'url' => '/'.$language_code.'groups',
                        'submenu' => []
                    ],
                    'checklist' => [
                        'label' => __( 'Checklist', 'zume' ),
                        'visible' => ( is_user_logged_in() ),
                        'active' => false,
                        'url' => '/'.$language_code.'checklist',
                        'submenu' => []
                    ],
                    'download' => [
                        'label' => __( 'Download Guidebook', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'download',
                        'submenu' => []
                    ],
                    'get_a_coach' => [
                        'label' => __( 'Get a Coach', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'get-a-coach',
                        'submenu' => []
                    ],
                    'join_online_group' => [
                        'label' => __( 'Join an Online Group', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'join-an-online-group',
                        'submenu' => []
                    ],
                ],
            ],
            'about' => [
                'label' => __( 'About', 'zume' ),
                'visible' => true,
                'active' => false,
                'url' => '#',
                'submenu' => [
                    'about' => [
                        'label' => __( 'About', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'about',
                        'submenu' => []
                    ],
                    'vision' => [
                        'label' => __( 'Vision', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'vision',
                        'submenu' => []
                    ],
                    'faq' => [
                        'label' =>  __( 'FAQs', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'faq',
                        'submenu' => []
                    ],
                    'resources' => [
                        'label' => __( 'Resources', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'resources',
                        'submenu' => []
                    ],
                    'how_to_follow_jesus' => [
                        'label' => __( 'How to Follow Jesus', 'zume' ),
                        'visible' => false,
                        'active' => false,
                        'url' => '/'.$language_code.'how-to-follow-jesus',
                        'submenu' => []
                    ],
                    'mobile_app' => [
                        'label' => __( 'Mobile App', 'zume' ),
                        'visible' => true,
                        'active' => false,
                        'url' => '/'.$language_code.'mobile-app',
                        'submenu' => []
                    ],
                ],
            ],
            'settings' => [
                'label' => __( 'Settings', 'zume' ),
                'visible' => ( is_user_logged_in() ),
                'active' => false,
                'url' => '#',
                'submenu' => [
                    'profile' => [
                        'label' => __( 'Profile', 'zume' ),
                        'visible' => ( is_user_logged_in() ),
                        'active' => false,
                        'url' => '/'.$language_code.'profile',
                        'submenu' => []
                    ],
                    'admin' => [
                        'label' => 'Admin',
                        'visible' => ( is_user_logged_in() && dt_current_user_has_role('Administrator') ),
                        'active' => false,
                        'url' => '/wp-admin',
                        'submenu' => []
                    ],
                    'logout' => [
                        'label' => __( 'Logout', 'zume' ),
                        'visible' => ( is_user_logged_in() ),
                        'active' => false,
                        'url' => '/'.$language_code.'logout',
                        'submenu' => []
                    ],
                ],
            ],
            'login' => [
                'label' => __( 'Login', 'zume' ),
                'visible' => ( ! is_user_logged_in() ),
                'active' => false,
                'url' => '/'.$language_code.'login',
                'submenu' => [],
            ],
            'register' => [
                'label' => __( 'Register', 'zume' ),
                'visible' => ( ! is_user_logged_in() ),
                'active' => false,
                'url' => '/'.$language_code.'register',
                'submenu' => [],
            ],
        ];

        dt_write_log($menu);

        return $menu;
    }
}
Zume_Lists::instance();

$zume_navigation_menu = array(
    __( 'Home', 'zume' ),
    __( 'Dashboard', 'zume' ),
    __( 'About', 'zume' ),
    __( 'Resources', 'zume' ),
    __( 'FAQs', 'zume' ),
    __( 'Resources', 'zume' ),
    __( 'Training', 'zume' ),
    __( 'Course', 'zume' ),
    __( 'Course Overview', 'zume' ),
    __( 'Groups', 'zume' ),
    __( 'Checklist', 'zume' ),
    __( 'Get a Coach', 'zume' ),
    __( 'Download Guidebook', 'zume' ),
    __( 'Overview', 'zume' ),
    __( 'Settings', 'zume' ),
    __( 'Profile', 'zume' ),
    __( 'Admin', 'zume' ),
    __( 'Logout', 'zume' ),
    __( 'Login', 'zume' ),
    __( 'Register', 'zume' ),
    __( 'Three-Month Plan', 'zume' ),
    __( 'Vision', 'zume' ),
    __( 'Mobile App', 'zume' ),
);

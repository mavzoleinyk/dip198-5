<?php
/*
 * This is the child theme for Total theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'dip198_enqueue_styles' );
function dip198_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap-theme', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array('parent-style'));
    wp_enqueue_style( 'font-icons', get_stylesheet_directory_uri() . '/assets/css/font-icons.css', array('parent-style'));
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/assets/css/theme-style.css', array('parent-style'));
    //wp_enqueue_style( 'theme-style-color', get_stylesheet_directory_uri() . '/assets/css/cyan.css', array('parent-style'));
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));

    //wp_enqueue_script('bootstrap-theme', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false, true);
    //wp_enqueue_script('flickity-js', get_stylesheet_directory_uri() . '/assets/js/flickity.pkgd.min.js', array('jquery'), false, true);
    //wp_enqueue_script('easing-js', get_stylesheet_directory_uri() . '/assets/js/easing.min.js', array('jquery'), false, true);
    //wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/assets/js/owl-carousel.min.js', array('jquery'), false, true);
    wp_enqueue_script('modernizr-js', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'), false, true);
    wp_enqueue_script('calc_script-js', get_stylesheet_directory_uri() . '/assets/js/calc_script.js', array('jquery'), false, true);
    wp_enqueue_script('scripts-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), false, true);
}
/*
 * Your code goes below
*/
// Отключаем любые CSS стили плагинов
function custom_dequeue() {
    wp_dequeue_style('wpex-style');
    wp_dequeue_style('tablepress-default');
    wp_dequeue_style('wpex-tablepress');
    wp_dequeue_style('mediaelement');
    wp_dequeue_style('wp-mediaelement');
    wp_dequeue_style('');
    wp_dequeue_style('');
    wp_dequeue_style('wpex-mobile-menu-breakpoint-max');
    wp_dequeue_style('wpex-mobile-menu-breakpoint-min');
    wp_dequeue_style('');
    wp_dequeue_style('ticons');
    wp_dequeue_style('');
    wp_dequeue_style('');
    if ( is_page(10) ) {
		wp_dequeue_style( 'wpcdt-public-css' );
        wp_dequeue_style( 'vcex-shortcodes' );
        wp_dequeue_style( '' );
	}
}
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );

//Отключаем любые js скрипты
function project_dequeue_unnecessary_scripts() {
    wp_deregister_script('mediaelement-core');
    wp_deregister_script('mediaelement-migrate');
    wp_deregister_script('wp-mediaelement');
    wp_deregister_script('mediaelement-vimeo');
    wp_deregister_script('');
    wp_deregister_script('');
    wp_deregister_script('sidr');
    wp_deregister_script('hoverintent');
    wp_deregister_script('supersubs');
    wp_deregister_script('superfish');
    wp_deregister_script('easing');
    if ( is_page(10) ) {
		wp_dequeue_script( '' );
        wp_dequeue_script( 'image_zoooom' );
        wp_dequeue_script( 'image_zoooom-init' );
        wp_dequeue_script( '' );
	}
}
add_action( 'wp_print_scripts', 'project_dequeue_unnecessary_scripts', 9999 );


//  Actions
add_action( 'widgets_init', 'cust_widgets' );
// Some weare
function cust_widgets(){
    register_sidebar([
        'name' => 'Виджет для размещения копирайта',
        'id' => 'cust_footer_1',
        'before_widget' => null,
        'after_widget' => null,
    ]);
    register_sidebar([
        'name' => 'Сайдбар блок 1',
        'id' => 'cust_sidebar_1',
        'before_widget' => null,
        'after_widget' => null,
    ]);
    register_sidebar([
        'name' => 'Сайдбар блок 2',
        'id' => 'cust_sidebar_2',
		'before_widget' => '<aside id="%1$s" class="footer-widget widget widget__custom-block %2$s clr">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
    ]);
}

//Shortcods
add_shortcode( 'si-section-action', 'si_section_action' );
function si_section_action( $attr ){
    $params = shortcode_atts([
        'text' => '',
    ], $attr);

    return '<section class="section actions-posts mt-40 mb-0" style="background: url(https://dip198.com/wp-content/themes/dip198/assets/img/content-action-bg.jpg); background-repeat: no-repeat;">
    <div class="content-action">
      <div class="content-action-title">В нашей компании вы найдёте следующие акции и скидки:</div>
      <div class="content-action-container">
        <div class="content-action-item">Заказывая два и более диплома за один раз, вы получите скидку в 2000 рублей на каждый документ.</div>
        <div class="content-action-item">Скидка для постоянных клиентов - 2000 рублей для каждого клиента, осуществляющего повторный заказ в нашей компании.</div>
        <div class="content-action-item">Скидка на день рождения в 1000 рублей на любой заказ при подтверждении. акция действует за три дня до и три дня после указанной даты, таким образом сделать заказ можно в течение недели.</div>
      </div>
    </div>
  </section>';
}


/**
 * Изменяет хлебные крошки Yoast.
 *
 * Вывести в шаблоне: do_action('pretty_breadcrumb');
 * https://wp-kama.ru/plugin/yoast/kak-izmenit-vyorstku-hlebnyh-kroshek-yoast-na-svoyu
 */
class Pretty_Breadcrumb
{

    /**
     * Какую позицию занимает элемент в цепочке хлебных крошек.
     *
     * @var int
     */
    private $el_position = 0;

    public function __construct()
    {
        add_action('pretty_breadcrumb', [$this, 'render']);
    }

    /**
     * Выводит на экран сгенерированные крошки.
     *
     * @return void
     */
    public function render()
    {
        if (!function_exists('yoast_breadcrumb')) {
            return;
        }

        // Регистрируем фильтры для изменения дефолтной вёрстки крошек
        add_filter('wpseo_breadcrumb_single_link', [$this, 'modify_yoast_items'], 10, 2);
        add_filter('wpseo_breadcrumb_output', [$this, 'modify_yoast_output']);
        add_filter('wpseo_breadcrumb_output_wrapper', [$this, 'modify_yoast_wrapper']);
        add_filter('wpseo_breadcrumb_separator', '__return_empty_string');

        // Выводим крошки на экран
        yoast_breadcrumb();

        // Отключаем фильтры
        remove_filter('wpseo_breadcrumb_single_link', [$this, 'modify_yoast_items']);
        remove_filter('wpseo_breadcrumb_output', [$this, 'modify_yoast_output']);
        remove_filter('wpseo_breadcrumb_output_wrapper', [$this, 'modify_yoast_wrapper']);
        remove_filter('wpseo_breadcrumb_separator', '__return_empty_string');

        // Обнуляем счётчик
        $this->el_position = 0;
    }

    /**
     * Изменяет html код li элементов.
     *
     * @param string $link_html Дефолтная вёрстка элемента хлебных крошек.
     * @param array $link_data Массив данных об элементе хлебных крошек.
     *
     * @return string
     */
    function modify_yoast_items($link_html, $link_data)
    {
        // Шаблон контейнера li
        $li = '<span itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem" %s>%s</span>';

        // Содержимое li в зависимости от позиции элемента
        if (strpos($link_html, 'breadcrumb_last') === false) {
            $li_inner = sprintf('
                <a itemprop="item" href="%s" class="pathway">
                    <span itemprop="name">%s</span>
                </a>
            ', $link_data['url'], $link_data['text']);
            $li_inner .= '<span class="divider"> / </span>';
            $li_class = '';
        } else {
            $li_inner = sprintf('<span itemprop="name">%s</span>', $link_data['text']);
            $li_class = 'class="active"';
        }

        $li_inner .= sprintf('<meta itemprop="position" content="%d"/>', ++$this->el_position);

        // Вкладываем сформированное содержание в li и возвращаем полученный элемент хлебных крошек.
        return sprintf($li, $li_class, $li_inner);
    }

    /**
     * Возвращает псевдо wrapper, который в будущем будет вырезан из вёрстки.
     * Если этого не сделать, то будущие li будут обёртнуты в единый span Yoast'ом.
     *
     * @return string
     */
    function modify_yoast_wrapper()
    {
        return 'wrapper'; // Будущий "уникальный" тег для вырезки из html
    }

    /**
     * Изменяет дефолтный html код крошек Yoast.
     *
     * @param string $html
     *
     * @return string
     */
    function modify_yoast_output($html)
    {
        // Убираем псевдо wrapper
        $html = str_replace(['<wrapper>', '</wrapper>'], '', $html);

        // Формируем контейнер для li элементов
        $ul = '<nav itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList" class="breadcrumb site-breadcrumbs wpex-clr hidden-phone position-absolute has-js-fix">%s</nav>';

        // Вставляем в контейнер li элменты
        $html = sprintf($ul, $html);

        return $html;
    }
}

new Pretty_Breadcrumb();

function mw_faqhook_page_1673180069332() { 
    if(is_page ("559")){ 
    ?> 
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Так получилось, что для работы у меня еть и навыки, и знания, но диплома вот подходящего нет. Поэтому интересно, насколько тщательно его будут проверять при приёме на работу?","acceptedAnswer":[{"@type":"Answer","text":"В подавляющем большинстве случаев проверка диплома исключительно формальная, поэтому её, как правило, опускают. Дело в том, что для подтверждения подлинности работодателю придётся связываться непосредственно с ВУЗом, выдавшим документ, при этом в письменном виде, и ждать ответа. Подобные действия затянут собеседование и приём на работу, поэтому чаще всего работодатель проверяет только наличие диплома, а не его подлинность."}]},{"@type":"Question","name":"Добрый день. Живу довольно далеко от Москвы, буквально в другом часовом поясе, поэтому хочу уточнить по доставке — есть ли по ней ограничения?","acceptedAnswer":[{"@type":"Answer","text":"Ограничений по доставке дипломов в нашей компании нет. Мы работаем с любым городом России без исключений, при этом выбираем наиболее удобный и оптимальный способ доставки. Единственной проблемой может стать расстояние — если город действительно находится далеко, то это увеличит сроки. Чтобы уточнить это, свяжитесь с нашими менеджерами онлайн или по телефону, они помогут рассчитать примерное время доставки."}]},{"@type":"Question","name":"Сколько стоит изготовить у вас диплом?","acceptedAnswer":[{"@type":"Answer","text":"Стоимость диплома и любого другого документа в нашей компании состоит из цены за оригинальный бланк и затрат на заполнение и печать. Поэтому разные документы также стоят по-разному — подробнее узнать это можно непосредственно в каталоге. Также вы можете связаться с нашими менеджерами, чтобы они рассчитали индивидуальную стоимость в зависимости от условий и других факторов."}]},{"@type":"Question","name":"Раньше с такими сервисами работал но тут как-то всё по-другому. Пытаюсь найти информацию по предоплате и не могу, в чём подвох?","acceptedAnswer":[{"@type":"Answer","text":"Наш сервис принимает оплату за диплом только по факту выполненной работы, после получения документа клиентом. Мы не требует предоплату или другие денежные операции, пока документ не окажется у вас в руках."}]},{"@type":"Question","name":"Привет. вопрос по длительности изготовления — сколько времени занимает сделать диплом?","acceptedAnswer":[{"@type":"Answer","text":"Сроки изготовления индивидуальны для каждого отдельного документа и зависят о того типа и особенностей заполнения. В большинстве случаев процесс укладывается в 1-3 дня. Также стоит учитывать доставку, сроки которой зависят от расположения клиента. Рассчитать время помогут менеджеры при заказе документа, поэтому стоит ориентироваться на их информацию."}]},{"@type":"Question","name":"Вопрос следующий, на какие специальности тут можно заказать документ?","acceptedAnswer":[{"@type":"Answer","text":"Наша компания изготавливает дипломы о высшем образовании на любую специальность, представленную в ВУЗах России. Узнать об этом подробнее лучше у наших менеджеров."}]},{"@type":"Question","name":"Прочитал вроде весь сайт, а не могу понять, как ставится тема для дипломной работы?","acceptedAnswer":[{"@type":"Answer","text":"Тематика дипломной работы выбирается, исходя из выбранного ВУЗа и специальности, а также года выдачи, которые формируют перечень тем в целом. Впрочем, вы можете указать тему работы в заявке на оформление диплома, либо сообщить о ней менеджеру, который занимается заказом."}]},{"@type":"Question","name":"Смотрите, у меня есть диплом а вкладыш с оценками куда-то пропал. Можно его изготовить отдельно или надо прям вообще всё заказывать?","acceptedAnswer":[{"@type":"Answer","text":"Наша компания занимается изготовлением вкладышей с оценками, поэтому оформлять заказ на весь комплект не придётся. Однако для этого нужно будет приготовить отсканированную копию вашего диплома, к которому требуется приложение — так мы избежим несоответствий и других ошибок."}]},{"@type":"Question","name":"Есть у сайта какие-то гарантии?","acceptedAnswer":[{"@type":"Answer","text":"Наша компания гарантирует высокое качество и подлинность бланков, а также аутентичность заполнения документов в соответствии с особенностями конкретных ВУЗов. Это позволяет избежать любых проблем с возможными проверками. Также мы не требуем предоплаты, а оплата происходит только после получения и проверки диплома клиентом."}]},{"@type":"Question","name":"Если в дипломе нашлась опечатка, что делать? Заказывать новый?","acceptedAnswer":[{"@type":"Answer","text":"Если в документе, изготовленном нашей компанией. обнаружилась опечатка или ошибка, судитесь с нашими менеджерами. Мы изготовим и вышлем новый, правильный документ полностью бесплатно."}]}]}</script><!-- Generated by https://www.matthewwoodward.co.uk/ --> 
    <?php 
    } 
    } 
add_action("wp_head", "mw_faqhook_page_1673180069332");

// noindex for pagination
add_filter("wpseo_robots", function($robots) {
    if (is_paged() && is_archive()) {
        return 'noindex,follow';
    } else {
        return $robots;
    }
});

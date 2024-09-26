<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>
<!doctype html>
<html lang="ru">

<head>
    <?

    use Bitrix\Main\Page\Asset;
    use Bitrix\UI\EntitySelector\SearchQuery;

    // Пример подключения JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.7.0.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.bundle.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancybox/jquery.fancybox.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/myscripts.js');
    // Пример подключения CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vars.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap-grid.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');

    $APPLICATION->ShowHead();
    ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>

<body>

    <?
    $APPLICATION->ShowPanel();
    ?>

    <div class="container">
        <div class="header">
            <div class="header_logo">
                <a href="/"><img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.png" alt=""></a>
            </div>
            <div class="header_content">
                <div class="row">
                    <span>Плюшевые игрушки <i>ручной работы<i></span>
                </div>
                <div class="row">

                    <?
                    
                    $APPLICATION->IncludeComponent("bitrix:search.title", "main_search", Array(

	),
	false
); ?><br>
                </div>
                <div class="row">
                    <? $APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
); ?>
                </div>
            </div>
            <div class="header_cart">
            <a class="header_cart_auth" href="#">
                <svg>
                    <use xlink:href="#power-button"></use>
                </svg>
               Войти</a>
                <?php
                // Ссылка на корзину
                $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "small_cart", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",	// Страница оформления заказа
		"SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
		"SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
		"SHOW_EMPTY_VALUES" => "Y",	// Выводить нулевые значения в пустой корзине
		"SHOW_PERSONAL_LINK" => "Y",	// Отображать персональный раздел
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Страница персонального раздела
		"SHOW_AUTHOR" => "N",	// Добавить возможность авторизации
		"PATH_TO_AUTHORIZE" => "",	// Страница авторизации
		"SHOW_REGISTRATION" => "Y",	// Добавить возможность регистрации
		"PATH_TO_REGISTER" => SITE_DIR."login/",	// Страница регистрации
		"PATH_TO_PROFILE" => SITE_DIR."personal/",	// Страница профиля
		"SHOW_PRODUCTS" => "N",	// Показывать список товаров
		"POSITION_FIXED" => "N",	// Отображать корзину поверх шаблона
		"HIDE_ON_BASKET_PAGES" => "N",	// Не показывать на страницах корзины и оформления заказа
	),
	false
);
                ?>
            </div>
        </div>
<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148   
 */






$current_dir = "http://sport_shop.loc/sites/all/themes/zen/sitemade/"; //for <base>
include ("my_templates/for_main.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(drupal_is_front_page()) {front_page_css();}?>

<div class="container">
<div id="page">

  <header class="header" id="header" role="banner">
    <div class="row-fluid">
       <div class="span3" id="logo_image">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>
       </div>

      <div class="span6">
          <div class="span6">

            <p>Добро пожаловать, <?php if (!empty($user) && $user->uid != 0) {print render ($user->name);} else {echo "Гость";} ?>! </p>
          </div>
          <div class="span6">
             <div class="span2" id="for_mail">
                
             </div>
             <div class="span10">
               <p><a href="mailto:slavata8@rambler.ru">slavata8@rambler.ru</a></p>
             </div>
          </div> 
          <div class="row-fluid"><p></p></div>
          <div class="row-fluid">
            <div class="span3"></div>
            <div class="span6">
              <div id="phone_numb"><p>8(8352)00-00-00</p></div>
            </div>
            <div class="span3"></div>
          </div>
          <div class="row-fluid"><br></div>
          <div class="row-fluid" id="header_form">     
               <div class="span3"></div>
               <div class="span9"><?php print render($page['header']); ?></div>
               <div class="span3"></div>
          </div>
        </div>
        
         <div class="span3">
          <div class="row-fluid" id="autoriz_span">
               <p><?php if (!empty($user) && $user->uid != 0) {echo "<a href='/user'>Настройка учетной записи</a><a href='/user/logout'> Выход </a>";} 
                else {echo "<a href='/user'>Вход|Регистрация</a>";} ?>
                <?php print render($page['autorization']); ?></p>
          </div>
          <a href="/cart" id="cart_img_link">
          <div class="row-fluid"  id="cart_img">
             <!--<img id="cart_img" src="images\cart.png" width="139" height="107"> -->
            <div id="cart_text">
            <?php
                // Вывод упрощенной корзины. template.php
                print simple_commerce_cart();
                ?>
                
            
            </div>
          </div>
         </a> 
        </div>
        
    </div>
   <div class="row-fluid"><br></div>
     <div class="row-fluid">
       <div id="banner2"><p class="banner2_text"><br>Выгодное предложение от "Славата" при  покупке в инетернет-магазине!</p>
       </div>
     </div>   
  </header>

  <div id="main">
   <div class="content-wrapper">
    <div id="content" class="column" role="main">
       




      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php if(!drupal_is_front_page()){
            
            if (arg(0)=='taxonomy' && arg(1)=='term' && arg(2)=='all') {
             $title = "Товары";
             drupal_set_title("Товары");}



            print render($title_prefix);
            if ($title){
                   echo "<h1 class='page__title title' id='page-title'>";
                   print $title;
                   echo "</h1>";}
             print render($title_suffix); 
             print $messages; 
             print render($tabs); 
             print render($page['help']);
             if ($action_links){ 
                    echo "<ul class='action-links'>";
                    print render($action_links);
                    echo "</ul>";}
             print render($page['content']); 
             print $feed_icons;
            
             if (arg(0)=='node'){
               echo "<div class='read_more_link'><a href='/taxonomy/term/all?field_field_product_manufactured_tid=All&field_recommended_value[1]=1'> Узнать больше </a></div>"; //ССылка на распродажу
             }       

           }
      ?>  
         
    </div>
    
     <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>
    
    <?php if ($sidebar_first || $sidebar_second): ?>
    
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    
    <?php endif; ?>

     
  </div>


 <div class="row-fluid">    
  <div class="navbar">
   <div id="navigation" class="navbar-inner">

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix', 'nav', 'pull-right'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div>
   </div>
  </div>
</div>
  <!-- Содержимое если мы на главной странице-->
       <?php if(drupal_is_front_page()){
            print render($title_prefix);
            if ($title){
                   echo "<h1 class='page__title title' id='page-title'>";
                   print $title;
                   echo "</h1>";}
             print render($title_suffix); 
             print $messages; 
             print render($tabs); 
             print render($page['help']);
             if ($action_links){ 
                    echo "<ul class='action-links'>";
                    print render($action_links);
                    echo "</ul>";}
             print render($page['content']); 
             print $feed_icons;
        
             echo "<div class='read_more_link'><a href='/taxonomy/term/all?field_field_product_manufactured_tid=All&field_sale_value[1]=1'> Узнать больше </a></div>"; //ССылка на распродажу
           }
       ?>      
 <!-- -->
  <!--Про скидку-->     
  <?php if (drupal_is_front_page()){for_banner_sales2(1);} ?> 
  
<!-- Популярное-->
   <?php print render($page['content_second']); ?> 
<!-- Нас благодарят -->
   <?php if ($page['content_graditude']) { for_graditude(1); print render($page['content_graditude']);for_graditude(2); } ?>

<!-- -->
   <?php print render($page['content_third']);
       if (drupal_is_front_page()){ 
         echo "<div class='read_more_link'><a href='/taxonomy/term/all'> Узнать больше </a></div>"; //ССылка на распродажу
        } 
            ?> 
<!-- -->
   
<!-- Про скидки 2 -->
   <?php for_banner_sales2(2); ?> 
<!-- Наши работы -->
   <?php if (drupal_is_front_page()){for_our_works();}?>
<!-- События -->
   <?php if($page['content_news']){for_our_news(1);print render($page['content_news']);for_our_news(2);} ?>   
<!-- Бренды -->
   <?php if (drupal_is_front_page()){for_brends();}?>   
   
    <?php print render($page['footer']); ?>
 
<!-- -->
</div>
  <!-- Концовка страницы -->
   <div class="row-fluid" id="big_green_br">
    <p></p>
   </div>
<!-- -->
   <div class="row-fluid" id="about_us">
      
        <div class="span3" id ="ending_banner">
          <br><br> 
          <p><a href="/about_company">О КОМПАНИИ</a></p>
          <p><a href="/about_us">О нас</a></p>
          <p><a href="/vacancy">Вакансии</a></p>
          <p><a href="/for_partners">Партнерам</a></p>
          <p><a href="/contacts">Контакты</a></p>
          <p><a href="/certificates">Сертификаты</a></p>
          <p><a href="/advantages">Приемущества</a></p>
       </div>
       <div class="span3">
          <br><br> 
          <p><a href="/my_account">МОЙ СЧЕТ</a></p>
          <p><a href="/my_orders">Мои заказы</a></p>
          <p>Мои желаемые товары</p>
       </div>
       <div class="span3">
          <br><br> 
          <p>ПОМОЩЬ</p>
          <p>Как сделать заказ</p>
          <p>Способы оплаты</p>
          <p>Возврат</p>
          <p>Доставка</p>
          <p>Помощь</p>
          <p>Обратная связь</p>
       </div>
       <div class="span3">
          <br><br> 
          <p>ЮРИДИЧЕСКИМ ЛИЦАМ</p>
          <p>Покупка товаров (b2b)</p>
          <p>Подарочные сертификаты</p>  
       </div>

    </div>
<!-- -->
    <div class="row-fluid" id="about_us2">
      <hr id="black_hr">
      <div class="span6">
        <p>Copyright &copy 2013 Славата</p>
      </div>
      <div class="span5" id="logo_end">
        <div class="row-fluid">
          <div class="span7"><p id="right">Разработка сайта</p></div>
          <div class="span5" id="maker_logo"></div>
          
        </div
      </div>
    </div>
  <?php print render($page['bottom']); ?>
</div>
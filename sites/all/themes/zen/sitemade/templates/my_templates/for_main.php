<!-- For main page -->

<!-- Нас благодарят -->
<?php 
 
  function for_graditude($part)
  {  if ($part==1){
  	echo "<div class='row-fluid'><br><br></div>
    <div class='row-fluid' id='blag'>
      <p><br>Нас благодарят<br></p>
      <div class='row-fluid'>
         <div class='well'>
           <div id='blag_text'>";
    }
     else
    {
    echo " </div>
         </div>     
       </div>
      </div>  ";
    }
   } 
  

 
  function for_banner_sales2($ban)
  {  echo "  <div id='use_shadow'>
               <div class='row-fluid' id='big_green_br'>
                 <p id='banner4'>";
     if ($ban==2) {echo "При заказе в интернет-магазине СКИДКА 5%";}
      else  {echo "СКИДКА 5% При заказе в интернет-магазине";}

     echo "</p>
               </div>
             </div>";
  }

  function for_our_news($part)
  { if ($part==1){
  	echo "
   <div class='row-fluid'><br><br></div>
    <div class='row-fluid' id='blag'>
     <p><br>События<br></p>
     <div class='row-fluid'>
         
         <div class='well'>
           <div id='blag_text'>";
    }
    else
    {echo "     
           </div>
         </div>     
      </div>
    </div> ";
    }

  }

  function for_our_works()
  {
    echo "  <div class='row-fluid'>
      <br><p id='banner3'>Наши работы<br></p>  
   </div>
   <div class='row-fluid'>
     <div class='slider4'>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo1.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo2.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo3.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo4.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo1.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo2.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo3.png' width='200' height='200'></div>
      <div class='slide'><img src='/sites/all/themes/zen/sitemade/images/photo4.png' width='200' height='200'></div>
     </div>";

  }

  function for_brends()
  {
  	echo "
    <div class='row-fluid'>
     <br><p id='banner3'>Бренды<br><br><br></p>  
   </div>
   <div class='row-fluid'>
     <div class='slider5'>
      <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_1.png' width='200' height='200'></div>
      <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_2.png' width='200' height='200'></div>
       <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_3.png' width='200' height='200'></div>
      <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_4.png' width='200' height='200'></div>
       <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_5.png' width='200' height='200'></div>
      <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_6.png' width='200' height='200'></div>
      <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_1.png' width='200' height='200'></div>
      <div class='slide'> <img src='/sites/all/themes/zen/sitemade/images/brand_2.png' width='200' height='200'></div>
     </div>";
  }


function front_page_css()
{ echo "
  <style type='text/css'>
     .views-view-grid 
       {width: auto;
       	max-width: 95%;
		margin-left: 5%;}  
 
     .product-grid-col
      {width: 225px;}
  </style>";
}


  ?>
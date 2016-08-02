<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->set('title', 'Конкурс') ?>

<?php $view['slots']->start('body') ?>

<body>
<div id="wrapper">
 <div id="sheet">
  <!--Header-->
  <?php echo $view->render('blocks/headerout.html.php'); ?>
  <!--End Header-->
  <div class="page">
   <!--sidebar-->
   <div class="sidebar">
    <div class="sidebar-menu">
     <ul>
      <li><a href="/">Головна</a></li>
      <li><a href="/login">Вхід</a></li>
      <li><a href="/register">Реєстрація</a></li>
     </ul>
    </div>
   </div>
   <!--End sidebar-->

   <!--Content-->
   <?php echo $view->render('blocks/konkyrs.html.php'); ?>
   <!--End Content-->
  </div>

  <!--Footer-->
  <?php echo $view->render('blocks/footer.html.php'); ?>
  <!--End Footer-->
 </div>
</div>
</body>

<?php $view['slots']->stop() ?>
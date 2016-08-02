<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->set('title', 'Реєстрація') ?>

<?php $view['slots']->start('body') ?>

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
            <div class="content">
                <p><h4>Реестрація</h4></p>
                <hr width="700px"/>

                <div class="done"><p>Реестрація виконана! <a href="/login">Натисни тут</a> щоб увійти.</p></div><!--close done-->
                <div class="form" align="center" >
                    <form id="regForm" class="regForm" action="<?php echo $view['router']->path('setting_register') ?>">
                        <table align="center" width="35%" cellspacing="1" cellpadding="1" border="0">
                            <tr>
                                <td colspan="2" ></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="username">Логін:</label>
                                </td>
                                <td>
                                    <input id="username" class="form-control" name="username" type="text" placeholder="Логін" size="25" maxlength="8" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Пароль:</label>
                                </td>
                                <td>
                                    <input id="password" class="form-control" name="password" type="password" placeholder="Пароль" size="25" maxlength="15" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                </td>
                                <td>
                                    <input id="email" class="form-control" name="email" type="text" placeholder="Email" size="25" maxlength="50" />
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" name="register" value="Реєстрація" class="btn btn-primary" /><img id="loading" src="image/loading.gif" alt="working.." />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div id="error">&nbsp;</div></td>
                            </tr>
                        </table>
                    </form>
                </div><!--close form-->

            </div>
            <!--End Content-->
        </div>
        <!--Footer-->
        <?php echo $view->render('blocks/footer.html.php'); ?>
        <!--End Footer-->
    </div>
</div>

<script type="text/javascript">
    //alert('reg1');
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#regForm').submit(function(e) {
            e.preventDefault();
            register();
        });
    });
</script>

<?php $view['slots']->stop() ?>

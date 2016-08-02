<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->set('title', 'Зміна пароля') ?>

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
                <p><h4>Введіть свій Email.</h4></p>
                <hr width="700px"/>
                <div class="done"><H3>Новий пароль відправленно.</H3><p>Перевірь вхідні / відкрий пошту та натисни на посилання.</p></div><!--close done-->
                <div class="form">
                    <form id="passreset" action="<?php echo $view['router']->path('setting_pass_reset') ?>" >
                        <table align="center" width="35%" cellspacing="1" cellpadding="1" border="0">
                            <tr>
                                <td>
                                    <label for="email">Ваш Email:</label>
                                </td>
                                <td>
                                    <input id="email" class="form-control" name="email" type="text" size="25" maxlength="30" />
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" value="Відправити" class="btn btn-primary" /><img id="loading" src="image/loading.gif" alt="Sending.." />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><div id="error">&nbsp;</div></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!--close form-->
            </div>
            <!--End Content-->
        </div>
        <!--Footer-->
        <?php echo $view->render('blocks/footer.html.php'); ?>
        <!--End Footer-->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#passreset').submit(function(e) {
            passreset();
            e.preventDefault();
        });
    });
</script>

<?php $view['slots']->stop() ?>

<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->set('title', 'Головна') ?>

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
                    <div class="form-block">
                        <form id="loginForm" class="form-signin" action="<?php echo $view['router']->path('setting_login') ?>" >
                            <table align="center" width="50%" cellspacing="1" cellpadding="1" border="0">
                                <tr><td colspan="2" ></td></tr>
                                <!-- put login-->
                                <tr>
                                    <td>
                                        <label for="username" class="control-label" >Логін:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="username" name="username" type="text" class="form-control" placeholder="Логін" size="25" maxlength="18" required="" autofocus="" />
                                    </td>
                                </tr>
                                <!-- put password-->
                                <tr><td><label for="password">Пароль:</label></td></tr>

                                <tr>
                                    <td>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="Пароль" size="25" maxlength="15" required="" autofocus=""/>
                                    </td>
                                </tr>
                                <!---->

                                <tr>
                                    <td>
                                        <button type="submit" name="submit" value="Login" class="btn btn-lg btn-primary btn-block" >Увійти<img id="loading" src="image/loading.gif" alt="Logging in.." /></button>
                                    </td>
                                </tr>

                                <tr><td colspan="2"><div id="error">&nbsp;</div></td></tr>

                                <tr><td class="normalLinks"><a href="/pass_reset">Забув пароль ?</a></td></tr>

                            </table>
                        </form>
                        <!--Close form-->
                    </div>
                </div>
            </div>
            <!--End sidebar-->
            <!--Content-->
            <div class="content">

                <div class="content-text">

                    <h2>Про цей сайт</h2>
                    <p>
                        Проект знаходиться в В-тестуванні.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>

                <div class="form-block" align="center">
                    <form >
                        <a href="/register" class="btn btn-primary btn-lg active" role="button">Дізнатися більше</a>
                    </form>
                </div>
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
        $('#loginForm').submit(function(e) {
            login();
            e.preventDefault();
        });
    });
</script>

<?php $view['slots']->stop() ?>

<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->set('title', 'Вхід') ?>

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

            <div class="content" >
                <div class="form-block"  >
                    <? if(!empty($error)){echo "<div class='error'>".$error."</div>";}?>
                    <p><h4>Вхід</h4></p>
                    <hr width="700px">
                    <div class="form" align="center" >
                        <form id="loginForm" action="<?php echo $view['router']->path('setting_login') ?>">
                            <table  width="35%" cellspacing="1" cellpadding="1" border="0" >
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
                                        <label for="password">Пароль:&nbsp;</label>
                                    </td>
                                    <td>
                                        <input id="password" class="form-control" name="password" type="password" placeholder="Пароль" size="25" maxlength="15" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <input type="submit" name="submit" value="Увійти" class="btn btn-primary" /><img id="loading" src="image/loading.gif" alt="Logging in.." />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div id="error">&nbsp;</div></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="normalLinks">
                                        <a href="/pass_reset">Забув пароль ?</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <!--Close form-->
                    <!----------------------------------------------------------------------------------->
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